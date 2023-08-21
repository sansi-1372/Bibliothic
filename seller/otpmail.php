<?php
    $subject = "OTP for delivery confirmation";
    $to = $useremail;
    $hdr= "From: Bibiliathon <thedemo9982@gmail.com>";
    $msg = "Dear ".$name.",\r\nYour OTP for confirming the delivery of order is:".$random_num."/r/nRegards,/r/nTeam Bibiliathon;";
    $m = mail($to,$subject,$msg,$hdr);
    if($m){
        echo "You have been sent confirmation mail";
    }
    else{
        echo "Unable to sent you mail";
    }
?>