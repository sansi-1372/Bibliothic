<?php
    session_start();
    include("../registration/config.php");
    function dataMen($row,$de){
        $id = $row['book_id'];
        $img = $id.".".$row['imgtype'];
        echo "<tr>
                <td> <img src=\"../upload/".$img."\" width=\"150px\"></td>
                <td>".$row['book_name']."</td>
                <td> Author:<br>".$row['book_author']."</td>
                <td>Price:<br>".$row['book_price']."</td>";
        if($de == 1){
            echo "<td> <a href=\"delivers.php?id=".$id."\">Deliver</a>
                    </td></tr>";
                }
                // <td> <a href="
            //   </tr>";
    }
    if(isset($_POST['delivery'])){
        $randomNumber = rand(100000,999999);
        echo $id;
        
    }
    if($con){
        if($_SESSION['sel_id']){
            $sel_email = $_SESSION['sel_id'];
            $query1= "SELECT * FROM books WHERE selemail = '$sel_email' AND book_order = '0';";
            $query2= "SELECT * FROM books WHERE book_id = (SELECT book_id FROM orders WHERE  delivered = '0') AND selemail = '$sel_email';";
    //     }
    //     else{
    //         echo "Session not present";
    //     }
    // }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ongoing Sells</title>
    <link rel="icon" href="../images/logo.png">
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <section>
        <h2>Yet to be bought</h2>
        <table style="width: 100%;">
            <?php
                if($result = $con->query($query1)){
                    while($row=$result->fetch_assoc()){
                        dataMen($row,0);
                        echo "</tr>";
                    }
                }
                else{
                    echo "No data available";
                }
        //     }
        // }
             ?>
        </table>
    </section>
    <section>
        <h2>Not Delivered</h2>
        <table style="width:100%">
            <!-- <tr>
                <th>Image</th>
                <th>Book Name</th>
                <th>Author</th>
                <th>Price Set</th>
                <th>Deliver</th>
                <!-- <th>Update</th> -->
            <!-- </tr> -->
            <?php
                if($result = $con->query($query2)){
                    while($row=$result->fetch_assoc()){
                        if($row){
                            dataMen($row,1);
                        }
                        else echo"<tr><td colspan=\"5\">No book Present here</td></tr>";  
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
    <center><a href="seller_page.php">Go Back</a><center>
</body>
</html>

<!-- 
$sel_email = $_SESSION['sel_id'];
            $query1 = "SELECT * FROM orders WHERE delivered = 0 AND book_id = 
                      (SELECT book_id FROM books WHERE selemail = '$sel_email';);";
            if($result = $con->query($query1)){
                while($row= $result->fetch_assoc()){
                    $row['order_id'];
                    $row['book_id'];
                    $row['user_email'];
                }
            } -->