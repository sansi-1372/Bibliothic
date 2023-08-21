<?php
    $query_ = "SELECT * FROM seller WHERE selemail = (SELECT selemail FROM books WHERE book_id = $id);";
    $query_u = "SELECT * FROM users WHERE useremail = '$email_id';";
    $query_b = "SELECT * FROM books WHERE book_id = '$id';";
    $subject = "Order Placed!";
    $to = $user_id;
    if($result2=$con->query($query_)) $row2 = $result2->fetch_assoc();
    if($result1=$con->query($query_u)) $row1 = $result1->fetch_assoc();
    if($result3=$con->query($query_b)) $row3 = $result3->fetch_assoc();
    $user_n = $row1['username'];
    $user_ph = $row1['userphno'];
    $hdr= "From: Bibiliathon <thedemo9982@gmail.com>";
    $msg = "Dear ".$row1['username'].",\r\nYour Order has been sucessfully placed.
            Your Seller is: ".$row2['selname']."
            \nYou need to pay: ".$row3['book_price']."/-
            \nPlease Visit the following address to take your book!\n".
            $row2['seladdr']."\r\n".$row2['selcity']."\r\n".$row2['selpin']."
            \r\n Regards,\r\nTeam Bibiliathon.";
    $m = mail($to,$subject,$msg,$hdr);
    $subject2 = "Your book has been ordered!";
    $to2 = $row2['selemail'];
    $msg2 = "Dear ".$row2['selname'].",\r\nYour book:\r\n".
             $row3['book_name']."\r\n written by ".$row3['book_author'].
             "\nhas been successfully placed.The buyer details are as follows:\r\n".
             $user_n."\r\n"."Phone No: ".$user_ph."\r\nRegards,\r\nTeam Bibiliathon";
    $m2 = mail($to2,$subject2,$msg2,$hdr);
    if($m && $m2){
        echo "Mail has been sent";
    }
    else{
        echo "Unable to sent you mail";
    }

?>