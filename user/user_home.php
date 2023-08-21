<?php
    include("session_confirm.php");
    if($con){
        $query2 = "SELECT * FROM books WHERE book_order = '0'";
    }
    if(isset($_POST['pinsearch'])){
        $bpin = $_POST['pinC'];
        $query2 = "SELECT * FROM books WHERE book_order = '0' AND book_pin-'$bpin'<100 AND book_pin-'$bpin'>=-100 ";
    }
    function bookDisp($row){
        $id = $row['book_id'];
        $img = $id.".".$row['imgtype'];
        echo "<div class=\"bookstyle\">
               <a href=\"book_disp.php?id=".$id."\">
                <center> <img src=\"../upload/".$img."\" width=\"150px\"></center>
                 <p>Name:".$row['book_name']."</p>
                 <p>Author:".$row['book_author']."</p>
                 <p>Pincode:".$row['book_pin']."</p>
                 <p>Price:".$row['book_price']."</p>
                </a>
              </div> ";
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
    <title>Home</title>
    <link rel="icon" href="../images/logo.png">
    <link rel="stylesheet" href="../css/styles.css">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200&display=swap" rel="stylesheet">
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
        <form action="user_home.php" method="post" style="display:inline-block;">
            <center><input type="submit" value="Off" name="logout";/></center>
        </form>
    </nav>
    <div style="background-color:#d8d8d8;display:flex;">
        <form action="user_home.php" method="POST" style="display:inline-block;padding:0 18% 0 1%;">
        <table >
            <tr>
                <td><input type="text" name="pinC" style="display:inline-block;"></td>
                <td><input type="submit" name="pinsearch" value="search" style="display:inline-block;"></td>
            </tr>
        </table>
        </form>
        <a href="curr_ord.php">Current Orders|</a>
        <a href="finish.php">Previous Buys|</a>
        <a href="update.php">Update Details</a>
    </div>
    <div style="padding:40px;display:flex; justify-content:space-evenly;flex-wrap:wrap;">
        <?php
            if($result = $con->query($query2)){
                while($row=$result->fetch_assoc()){
                    bookDisp($row);
                }
            }
        ?>
    </div>
    <div>
        <?php
            $cnt = $_COOKIE['count'];
            if($cnt==1){
                $val1 = $_COOKIE['val1'];
                $query1 = "SELECT book_name FROM books WHERE book_id='$val1';";
                if($result = $con->query($query1)){
                    if($row= $result->fetch_assoc()){
                        echo "<marquee> Your last visited book was".$row['book_name'];
                    }
                }
            }
            else if($cnt==2){
                $val1 = $_COOKIE['val1'];
                $val2 = $_COOKIE['val2'];
                $query1 = "SELECT book_name FROM books WHERE book_id IN('$val1','$val2');";
                if($result1 = $con->query($query1)){
                    if($row1= $result1->fetch_assoc()){
                        $var ="<marquee> Your last visited books were".$row1['book_name'];
                        while($row1= $result1->fetch_assoc()){
                            $var.=",".$row1['book_name'];
                        }
                        $var.="</marquee>";
                        echo $var;
                    }
                }
            }
            else{
                $val1 = $_COOKIE['val1'];
                $val2 = $_COOKIE['val2'];
                $val3 = $_COOKIE['val3'];
                $query1 = "SELECT book_name FROM books WHERE book_id IN('$val1','$val2','$val3');";
                if($result1 = $con->query($query1)){
                    if($row1= $result1->fetch_assoc()){
                        $var ="<marquee> Your last visited books were ".$row1['book_name'];
                        while($row1= $result1->fetch_assoc()){
                            $var.=", ".$row1['book_name'];
                        }
                        $var.="</marquee>";
                        echo $var;
                    }
                }
            }
        ?>
    </div>
</body>
</html>