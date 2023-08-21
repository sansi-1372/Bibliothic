<?php
//  session_start();
 $id = $_GET['id'];
//  echo $id;
 include("session_confirm.php");
 if(!isset($_COOKIE['val1'])){
    setcookie('val1',$id,time()+60*60*24*3);
    setcookie('count',1,time()+60*60*24*30*12);
 }
 elseif(!isset($_COOKIE['val2'])){
    setcookie('val2',$id,time()+60*60*24*3);
    setcookie('count',2,time()+60*60*24*30*12);
 }
 elseif(!isset($_COOKIE['val3'])){
    setcookie('val3',$id,time()+60*60*24*3);
    setcookie('count',3,time()+60*60*24*30*12);
 }
 else{
    setcookie('val1',$_COOKIE['val2'],time()+60*60*24*3);
    setcookie('val1',$_COOKIE['val3'],time()+60*60*24*3);
    setcookie('val1',$id,time()+60*60**24*3);
    setcookie('count',3,time()+60*60*24*30*12);
 }
 if($con){
    $query1 = "SELECT * FROM books WHERE book_id = '$id';";
    if($result1 = $con->query($query1)){
        if($row = $result1->fetch_assoc()){
            $name = $row['book_name'];
            $auth = $row['book_author'];
            $price = $row['book_price'];
            $pin = $row['book_pin'];
            $email = $row['selemail'];
            $book_date = $row['book_year'];
            $img = $id.".".$row['imgtype'];
        }

    }
    if($email){
        $query2 = "SELECT * FROM seller WHERE selemail = '$email';";
        if($result2 = $con->query($query2)){
            if($row = $result2->fetch_assoc()){
                $sel_name = $row['selname'];
            }
        }
    }
 }
 if(isset($_POST['place_ord'])){
    if($con){
        $user_id = $_SESSION['user_id'];
        $curr_date= date("d/m/Y");
        $query = "INSERT INTO orders (`book_id`,`useremail`,`ord_date`,`delivered`) VALUES ('$id','$user_id','$curr_date','0');";
        $query1 = "UPDATE books SET book_order = '1' WHERE book_id = '$id';";
        if($result=$con->query($query)){
            if($result = $con->query($query1)){
                include_once("ord_user.php");
                include_once("ord_seller.php");
                header("Location: curr_ord.php");
            }
            else{
                $query1 = "DELETE FROM orders WHERE book_id = $book_id;";
                $con->query($query1);
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
    <title>Book Display</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="icon" href="../images/logo.png">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200&display=swap" rel="stylesheet">
    <script>
        function dbox (msg) {
            if (msg != undefined) {
            document.getElementById("boxTxt").innerHTML = msg;
            document.getElementById("boxBack").classList.add("show");
            }
            else { document.getElementById("boxBack").classList.remove("show"); }
        }
    </script>
</head>
<body>
    <nav>
        <img src="../images/logo.png" alt="Logo" height="80" width="80" style="margin-left: 4%; border-bottom-right-radius: 10%; border-bottom-left-radius: 10%;">
        <a style="font-size: 60px; position: relative; bottom: 30%; margin-right: 200px;" class="nav-items">BIBLIOTHIC</a>
        <a href="index.php" class="nav-items">Home </a>
        <!-- <a href="index.php" class="nav-items">Current Orders </a>
        <a href="index.php" class="nav-items">Previous buys </a> -->
        <!-- <a href="index.php" class="nav-items">About Us</a> -->
        <span class="user_identity">Welcome <?php echo $names; ?>,</span>
    </nav>
    <section style="margin-top:30px;display:flex;">
    <div class="bookpage">
        <img src="../upload/<?php echo $img;?>" style="padding-left:20px;" height="300px" alt="hello">
    </div>
    <div class="bookpage">
        <h3><?php echo $name?></h3>
        Written by <?php echo $auth;?><br>
        &#x20B9; <?php echo $price;?><br>
        Pincode:<?php echo $pin;?><br>
        First bought in <?php echo $book_date;?><br>
        Sold by: <?php echo $sel_name;?><br>
        <input type="button" class="submit-style" value="Buy Now" onclick="dbox('Confirm the order')"/>
    </div>
    </div>
    </section>
    <div>
        <center><a href="user_home.php">Go Back</a></center>
    </div>
    <!-- (A) HTML DIALOG BOX -->
    <div id="boxBack"><div id="boxWrap">
    <div id="boxTxt"></div>
    <form method="post">
        <input type="submit" value="Place Order" onclick="dbox()" name="place_ord"/>
    </form>
    <input type="button" value="Cancel" onclick="dbox()">
    </div></div>
</body>
</html>