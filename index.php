<?php
date_default_timezone_set('Asia/Kolkata');
$today = date('d');
$tomorrow =date("d", strtotime("+1 day"));
$dayaftertomorrow = date('d', strtotime('+2 day'));
$monthNum = date('m');
$dateObj   = DateTime::createFromFormat('!m', $monthNum);
$month = $dateObj->format('F');
?>

<!DOCTYPE html>
<html>
<head>

<!--TITLE-->
<title>Slot Booking</title>

<!--META TAGS-->
<meta charset="UTF-8" />
<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />

<!--AJAX-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

<!--GOOGLE FONTS-->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet"> 

<!--STYLE SHEET-->
<link rel="stylesheet" href="css/main.css">

</head>
<body>



<!--MAIN-->
<main>
    <section class="flex header">
        <figure>
            <img src="images/author.svg" alt="">
        </figure>
        <article>
            <h5>Dr. Manik Dalvi</h5>
            <p>Obstetrics & Gynecology</p>
            <a href="#" class="btn btn_2">View Profile</a>
        </article>
    </section>
    <section class="flex sliders">
        <label class="btn btn_1 flex-content date">
            <input type="radio" name="date" class="date" value="<?php echo $today; ?>" checked>
            <h4>Today</h4>
            <p>8 slots available</p>
        </label>
        <label class="btn btn_1 flex-content date">
            <input type="radio" name="date" class="date" value="<?php echo $tomorrow; ?>">
            <h4>Tomorrow</h4>
            <p>8 slots available</p>
        </label>
        <label class="btn btn_1 flex-content date">
            <input type="radio" name="date" class="date" value="<?php echo $dayaftertomorrow ?>">
            <h4><?php echo "$dayaftertomorrow, $month"; ?></h4>
            <p>8 slots available</p>
        </label>
    </section>
    <section class="slot flex" id="buttons">
            <label class="btn btn_2 active"><input type="radio" name="time" class="time" value="10" checked
            >10 AM</label>
            <label class="btn btn_2"><input type="radio" name="time" class="time" value="10:15">10:15 AM</label>
            <label class="btn btn_2"><input type="radio" name="time" class="time" value="10:30">10:30 AM</label>
            <label class="btn btn_2"><input type="radio" name="time" class="time" value="10:45">10:45 AM</label>
            <label class="btn btn_2"><input type="radio" name="time" class="time" value="11">11 AM</label>
            <label class="btn btn_2"><input type="radio" name="time" class="time" value="11:15">11:15 AM</label>
            <label class="btn btn_2"><input type="radio" name="time" class="time" value="11:30">11:30 AM</label>
            <label class="btn btn_2"><input type="radio" name="time" class="time" value="11:45">11:45 AM</label>
    </section>
    <section>
        <a href="#open-modal" class="btn btn_3" id="cnt" onclick="Modal(1)">CONTINUE</a>
    </section>
</main>


<!--Modal-->
<div id="open-modal" class="modal-window">
    <div>
        <section>
            <a href="#" title="Close" class="modal-close" onclick="Modal(0)">Close</a>
            <form id="modal_content">
                <h1>No data found</h1>
            </form>
        </section>
    </div>
</div>

<!--Javascript-->
<script type="text/javascript" src="js/custom.js"></script>
<script type="text/javascript" src="js/ajax.js"></script>
</body>
</html>
