<!DOCTYPE html>
<html lang="en">
<head>
    <title>BIBLIOTHIC</title>

    <meta name="Author", content="METAMORPHOSIS GROUP 5">
    <meta name="keywords", content="BIBLIOTHIC, Books">
    <title>BIBLIOTHIC</title>

    <!-- LINKS -->
    <link rel="stylesheet" href="css/styles.css">
    <link rel="icon" href="images/logo.png">

    <!-- FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dongle:wght@700&display=swap" rel="stylesheet">
</head>
<body>
    <br><br>
    <!-- NAVIGATION -->
    <nav style="margin-right: 1000px;">
        <img src="images/logo.png" alt="Logo" height="80" width="80" style="margin-left: 4%; border-bottom-right-radius: 10%; border-bottom-left-radius: 10%;">
        <a style="font-size: 60px; position: relative; bottom: 30%; margin-right: 200px;">BIBLIOTHIC</a>
        <a href="index.php" class="nav-items">Home |</a>
        <a href="#login-user" class="nav-items">Login |</a>
        <a href="#form-user" class="nav-items">Register |</a>
        <a href="#about" class="nav-items">About Us</a>
    </nav>


    <!-- ADMIN -->
    <div style="padding-top:50px">
    <center><h2>ADMIN PAGE</h2></center>
    </div>
    
    <hr>
    <!-- USER INFO -->
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "Rayraf#8127";
    $dbname = "bibliothic";
    $con1 = mysqli_connect($servername, $username, $password, $dbname);
    if($con1){
        echo "connected successfully!";
    }
    ?>

    <div class="user-info">
        <center>
            <h3>USERS INFORMATION</h3>
            <table>
                <?php
                $query1 = "select * from users";
                echo "<tr>";
                    echo "<td>Name</td>";
                    echo "<td>Age</td>";
                    echo "<td>Number</td>";
                    echo "<td>Gender</td>";
                    echo "<td>Email</td>";
                    echo "<tr>";
                    try{
                        if($result1 = $con1->query($query1)){
                            while($row = $result1->fetch_assoc()) {
                                $name = $row['username'];
                                $age = $row['userage'];
                                $number = $row['userphno'];
                                $gender = $row['usergender'];
                                $email = $row['useremail'];
                                echo "<tr>";
                                echo "<td>$name</td>";
                                echo "<td>$age</td>";
                                echo "<td>$number</td>";
                                echo "<td>$gender</td>";
                                echo "<td>$email</td>";
                                echo "<tr>";
                            }
                        // else{
                        //     throw Exception;
                        // }
                        }
                    }
                    catch(Exception $e){
                        echo $e;
                    }
                ?>
            </table>
        </center>
    </div>

    <br>
    <hr>
    <!-- BOOKS INFO -->
    
     <div class="books-info">
        <center>
            <h3>BOOKS INFORMATION</h3>
            <table>
                <?php
                $query2 = "select * from books";
                $result2 = $con1->query($query2);
                echo "<tr>";
                echo "<td>Book ID</td>";
                echo "<td>Book Name</td>";
                echo "<td>Year</td>";
                echo "<td>Price [INR]</td>";
                echo "<td>Availibility</td>";
                echo "<tr>";
                while($row1 = $result2->fetch_assoc()) {
                    $name = $row1['book_id'];
                    $age = $row1['book_name'];
                    $number = $row1['book_year'];
                    $gender = $row1['book_price'];
                    $email = $row1['book_order'];
                    echo "<tr>";
                    echo "<td>$name</td>";
                    echo "<td>$age</td>";
                    echo "<td>$number</td>";
                    echo "<td>$gender</td>";
                    echo "<td>$email</td>";
                    echo "<tr>";
                }
                
                ?>
            </table>
        </center>
        <br>
    </div>
    <hr>
    <!-- FOOTER -->
    <footer>
        <center><img src="images/logo.png" alt="LOGO" class="footer-image"></center>
        <center style="color: white;">BIBLIOTHIC</center>
        <center>
            <a href=""><img src="images/facebook.png" alt="" height="32px" width="32px"></a>
            <a href=""><img src="images/linkedin.png" alt="" height="32px" width="32px"></a>
            <a href=""><img src="images/twitter.png" alt="" height="32px" width="32px"></a>
            <a href=""><img src="images/youtube.png" alt="" height="32px" width="32px"></a>
            <a href=""><img src="images/instagram.png" alt="" height="32px" width="32px"></a>  
        </center>
        <br>
        <center style="color: white; font-family: Arial, Helvetica, sans-serif; font-size: 1.5rem;">© BIBLIOTHIC</center>
    </footer>
</body>
</html>