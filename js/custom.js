//Buttons
var header = document.getElementById("buttons");
var btns = header.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
      btns[i].addEventListener("click", function() {
          var current = document.getElementsByClassName("active");
          current[0].className = current[0].className.replace(" active", "");
          this.className += " active";
          document.getElementById("cnt").style.backgroundColor = "#3399ff";
          document.getElementById("cnt").style.pointerEvents = "auto";
      });
}

//Modal
function Modal(type){
    let modal_content = document.getElementById("modal_content");
    if (type == "1"){
        modal_content.innerHTML = '<h1>Confirm your slot</h1><fieldset class="flex"><input type="email" name="email" id="email" placeholder="email address" maxlength="100"><button class="btn btn_1 " value="otp" type="submit" id="form_btn">Send OTP</button></fieldset>';
    } else {
        modal_content.innerHTML = '<h1>No data found</h1>';
    }
}
