<?php
    include_once("session_confirm.php");
    function dataMen($row){
        $id = $row['book_id'];
        $img = $id.".".$row['imgtype'];
        echo "<tr>
                <td> <img src=\"../upload/".$img."\" width=\"150px\"></td>
                <td>".$row['book_name']."</td>
                <td> Author:<br>".$row['book_author']."</td>
                <td>Price:<br>".$row['book_price']."</td>";
                // <td> <a href="
            //   </tr>";
    }
    if($_SESSION['user_id']){
        $email_id = $_SESSION['user_id'];
        $query1 = "SELECT * FROM BOOKS WHERE book_id = (SELECT book_id FROM orders WHERE useremail='$email_id' AND delivered = '1');";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Past Orders</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="icon" href="../images/logo.png">
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
    </nav>
    <h2>Previously Bought</h2>
        <table style="width: 100%;">
            <?php
                if($result = $con->query($query1)){
                    if($row = $result->fetch_assoc()){
                        dataMen($row);
                        while($row=$result->fetch_assoc()){
                            dataMen($row);
                            echo "</tr>";
                        }
                    }
                    else{
                        echo "No Orders Completed yet";
                    }
                }
                else{
                    echo "No data available";
                }
            }
        ?>
        </table>
        <center><a href="user_home.php">Go Back</a><center>
</body>
</html>