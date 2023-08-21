<?php
    session_start();
    include("../registration/config.php");
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
    if($con){
        if($_SESSION['sel_id']){
            $sel_email = $_SESSION['sel_id'];
            $query1= "SELECT * FROM books WHERE book_id = (SELECT book_id FROM orders WHERE  delivered = '1') AND selemail = '$sel_email';";
        }
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
    <title>Past Books</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="icon" href="../images/logo.png">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200&display=swap" rel="stylesheet">
</head>
<body>
<h2>Previously Sold</h2>
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
                        echo "No Books Sold yet";
                    }
                }
                else{
                    echo "No data available";
                }
                }
            ?>
        </table>
        <center><a href="seller_page.php">Go Back</a><center>
</body>
</html>