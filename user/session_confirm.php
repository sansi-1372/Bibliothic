<?php
session_start();
    // $names = $_GET['names'];
    if(isset($_SESSION['user_id'])){
        $email_id = $_SESSION['user_id'];
        include("../registration/config.php");
        if($con){
            $query1 = "SELECT * FROM users WHERE useremail = '$email_id';";
            if($result1 = $con->query($query1)){
                $row = $result1->fetch_assoc();
                if($row){
                    $names = $row['username'];
                }
                else{
                    echo "Invalid";
                }
            }
            else{
                echo "Invalid";
            }
        }
    }
    else{
        echo "not set yet";
    }
?>