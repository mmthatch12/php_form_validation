<?php 
$emailTo="thatmatt11@gmail.com";
$subject="testing";
$body="It this thing working";
$headers="From: thatmatt11@gmail.com";
if (mail($emailTo, $subject, $body, $headers)){
    echo "Mail sent successfully!";
} else {
    echo "Mail not sent";
}



?>