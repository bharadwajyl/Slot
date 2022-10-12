<?php
//Check the type of the form posted
if (isset($_POST["FormType"])){
    switch ($_POST["FormType"]) {
        case "otp":
            slot::OtpGeneration(''.$_POST['date'].'',''.$_POST['time'].'',''.$_POST['email'].'');
            break;
        case "verify":
            slot::OtpVerification(''.$_POST['otp'].'');
            break;
        default:
            echo "Under Development";
    }
}

//Class
class slot{
    public function OtpGeneration($date, $time, $email){
        //Validate email
        $domains = array('gmail.com', 'outlook.com', 'yahoo.in', 'yahoo.com', 'hotmail.com');
        $pattern = "/^[a-z0-9._%+-]+@[a-z0-9.-]*(" . implode('|', $domains) . ")$/i";
        if(!preg_match($pattern, $email)) {print "Temporary emails are not allowed"; return 1;}
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){print "Invalid email format"; return 1;}
        
        //Generate otp
        function generateNumericOTP($n) {
	        $generator = "1357902468";
	        $result = "";
	        for ($i = 1; $i <= $n; $i++) {
		        $result .= substr($generator, (rand()%(strlen($generator))), 1);
	        }
	        return $result;
        }
        $n = 4;
        $randomno = (generateNumericOTP($n));
        
        //Insert into DB for future use
        require("db.php");
        $sql = "INSERT INTO slot (date, time, email, verification) VALUES ('$date', '$time', '$email', '$randomno')";
        $conn->query($sql) === TRUE;
        
        //Mail
        $headers = "From: noreplay@bboysdreamsfell.tech" . "\r\n" . "CC:  noreplay@bboysdreamsfell.tech";
        if (mail("$email","Your one time passcode","$randomno",$headers)){
            print('<h1>Check your spam folder</h1> <p>Date: '.$date.' , Time: '.$time.'</p> <fieldset class="flex"><input type="tel" name="otp" id="otp" placeholder="OTP" maxlength="4"><button class="btn btn_1 " value="verify" type="submit" id="form_btn">Verify</button></fieldset>');
        } else {
            print("Please try after sometime");
        }
        
    }
    public function OtpVerification($otp){
        if (!is_numeric($otp)) { print("Only numerical values are allowed"); return 1;}
        require("db.php");
        $sql = "SELECT * FROM slot WHERE verification='$otp'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $conn->query("UPDATE slot SET verification='verified' WHERE verification='$otp'") === TRUE;
            print('<h1>Verified successfully</h1><p>Next step will be user details collection</p>');
        } else {
            print("Wrong OTP");
        }
    }
}
?>

