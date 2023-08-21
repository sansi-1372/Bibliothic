<?php
    include_once("session_confirm.php");
    function dataMen($row){
        $id = $row['book_id'];
        $img = $id.".".$row['imgtype'];
        echo "<tr>
                <td> <img src=\"../upload/".$img."\" width=\"150px\"></td>
                <td>".$row['book_name']."</td>
                <td> Author:<br>".$row['book_author']."</td>
                <td>Price:<br>".$row['book_price']."</td>
                <td> Date ordered:<br>".$row['ord_date']."</td>
                <td> Sold By:<br>".$row['selname']."</td>"."
                <td>
                            <form action=\"curr_ord.php\" method=\"post\" name=\"cancel_form\">
                                <input type=\"hidden\" value=$id name=\"book_id\">
                                <input type=\"submit\" value= \"cancel\" class=\"submit-style\" name=\"cancelo\">
                            </form>
                 </td>";
            //   </tr>";
    }
    if(isset($_POST['cancelo'])){
        $book_id = $_POST['book_id'];
        $query1 = "UPDATE books SET book_order = '0' WHERE book_id = '$book_id'";
        $query2 = "DELETE FROM orders WHERE book_id = '$book_id'";
        if($con){
            $result1 = $con->query($query1);
            $result2 = $con->query($query2);
            if($result1&&$result2){
                echo "<tr><td>sucessfully cancelled</td></tr>";
            }
        }
    }
    if($con){
        if($_SESSION['user_id']){
            $user_email = $_SESSION['user_id'];
            $query1= "SELECT b.book_id, b.book_name,b.imgtype, b.book_price,b.book_author,o.ord_date,s.selname
                      FROM books b
                        INNER JOIN orders o ON b.book_id = o.book_id
                        INNER JOIN seller s ON b.selemail = s.selemail
                     WHERE b.book_id = (SELECT book_id FROM orders WHERE useremail = '$user_email' AND delivered = '0');";
            

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Current Orders</title>
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
        <!-- <a href="index.php" class="nav-items">Current Orders </a> -->
        <!-- <a href="index.php" class="nav-items">Previous buys </a> -->
        <!-- <a href="index.php" class="nav-items">About Us</a> -->
        <span class="user_identity">Welcome <?php echo $names; ?>,</span>
    </nav> 
    <section>
    <h2>Your Current Orders</h2>
        <table style="width: 100%;">
            <!-- <tr>
                <th>Image</th>
                <th>Book Name</th>
                <th>Author</th>
                <th>Price Set</th>
                <th>Update</th>
            </tr> -->
            <?php
                if($result = $con->query($query1)){
                    while($row=$result->fetch_assoc()){
                        dataMen($row);
                        echo "</tr>";
                    }
                }
                else{
                    echo "No data available";
                }
            }
        }
             ?>
        </table>
    </section>
    <center><a href="user_home.php">Go Back</a></center>
</body>
</html>