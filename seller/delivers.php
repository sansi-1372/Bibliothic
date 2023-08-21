<?php
 $id = $_GET['id'];
 echo $id;
 if(!isset($_COOKIE['otp']))
 {
    setcookie('otp',0,time()+5*60);
 }
 else{
    $cnt = $_COOKIE['otp'];
    $_COOKIE['otp'] = $cnt+1;
 }
 if(!isset($_COOKIE['rand'])){
    setcookie('rand',-1,time()+5*60);
 }
 function give_otp($useremail,$name){
    $random_num = rand(100000,999999);
    setcookie('rand',$random_num,time()+5*60);
    include_once("otpmail.php");
 }
 include_once("../registration/config.php");
 if($con){
    $query = "SELECT * FROM users WHERE useremail = (SELECT useremail FROM ORDERS WHERE book_id = '$id');";
    if($result=$con->query($query)){
        if($row = $result->fetch_assoc()){
            $user_email = $row['useremail'];
            $name = $row['username'];
            if($_COOKIE['otp']==0){
                give_otp($user_email,$name);
            }
    }
 }
 }
 if(isset($_POST['otp_check'])){
    if($_POST['otps']==$_COOKIE['rand']){
        if($con){
            $query = "UPDATE orders SET delivered = '1' WHERE book_id = '$id';";
            if($result = $con->query($query)){
                echo "Sucessfully Delivered";
                header("Location: curr_sell.php");
            }
            else{
                echo"InCorrect OTP";
            }
        }
    }
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="icon" href="../images/logo.png">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200&display=swap" rel="stylesheet">
</head>
<body>
    <!-- (A) HTML DIALOG BOX -->
    <div id="boxBack" class="show"><div id="boxWrap">
    <div id="boxTxt"></div>
    <form method="post" action="delivers.php?id=<?php echo $id;?>">
        <input type="text" name="otps">
        <input type="submit" value="Enter OTP" name="otp_check"/>
    </form>
    </div></div>
</body>
</html>