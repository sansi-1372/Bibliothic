<?php
    $subject = "Registration Confirmation";
    $to = $email;
    $hdr= "From: Bibiliathon <thedemo9982@gmail.com>";
    $msg = "Dear ".$name.",\r\nYou have Sucessfully registered on Bibiliathon\r\nYour Details are as follows:\r\nName:".$name."\r\nAge:".$age."\r\nGender:".$gender."\r\nPhone Number:".$number."\nThankyou,\nTeam Bibiliathon";
    $m = mail($to,$subject,$msg,$hdr);
    if($m){
        echo "You have been sent confirmation mail";
    }
    else{
        echo "Unable to sent you mail";
    }
?>