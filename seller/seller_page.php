<?php
    session_start();
    // $names = $_GET['names'];
    if(isset($_SESSION['sel_id'])){
        $email_id = $_SESSION['sel_id'];
        include("../registration/config.php");
        if($con){
            $query1 = "SELECT * FROM seller WHERE selemail = '$email_id';";
            if($result1 = $con->query($query1)){
                $row = $result1->fetch_assoc();
                if($row){
                    $names = $row['selname'];
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
    if(isset($_POST['logout'])){
        session_destroy();
        header("Location: ../index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="icon" href="../images/logo.png">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200&display=swap" rel="stylesheet">
</head>
<body>
    <!-- NAVIGATION -->
    <nav style="margin-right: 100px;">

        <img src="../images/logo.png" alt="Logo" height="80" width="80" style="margin-left: 4%; border-bottom-right-radius: 10%; border-bottom-left-radius: 10%;">
        <a style="font-size: 60px; position: relative; bottom: 30%; margin-right: 150px;" class="nav-items">BIBLIOTHIC</a>
        <a href="#welcomePage" class="nav-items">Home  </a>
        <span class="user_identity">Welcome <?php echo $names;?>,</span>
        <form action="seller_page.php" method="post" style="display:inline-block;">
            <input type="submit" value="Off" name="logout"/>
        </form>
    </nav>
    <div  class="seller-content">
    <div>
        <a href="new_upload.php"><img src="../images/books.jpg" alt=""><center>Sell New Book</center></a>
    </div>
    <div>
        <a href="curr_sell.php"><img src="../images/review_order.jpg" alt=""><center>Ongoing Sells</center></a>
    </div>
    <div>
        <a href="finished.php"><img src="../images/completed.jpg" alt=""><center>Previously Sold</center></a>
    </div>
    </div>
    <!-- </section> -->
</body>
</html>