<?php
    include_once("session_confirm.php");
    $user_id = $_SESSION['user_id'];
    if(isset($_POST['regus'])){
        $name = $_POST['name1'];
        $age = $_POST['age1'];
        if(isset($_POST['gender1'])) $g1 = $_POST['gender1'];
        $num = $_POST['num1'];
        $result1 = 0;
        $result2 = 0;
        $result3 = 0;
        $result4 = 0;
        if($name != ""){
            $query1 = "UPDATE users SET username = '$name' WHERE useremail = '$user_id'";
            $result1 = $con->query($query1);
        }
        if($age != ""){
            $query1 = "UPDATE users SET userage = '$age' WHERE useremail = '$user_id'";
            $result2 = $con->query($query1);
            }
        if($g1 != ""){
            $query1 = "UPDATE users SET usergender = '$g1' WHERE useremail = '$user_id'";
            $result3 = $con->query($query1);
            }
        if($num != ""){
            $query1 = "UPDATE users SET userphno = '$num' WHERE useremail = '$user_id'";
            $result4 = $con->query($query1);
            }
            if($result1||$result2||$result3||$resutl4){
                echo "Updated";
            }
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Details</title>
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
    </nav>
<div class="main-user-form">
            <div class="form-user" id="form-user" style="display: inline-block; width: 50%;">
                <center>
                    <h2>Update Details</h2>
                    <form method="post" action="update.php" name="usereg">
                        <table>
                            <tr>
                                <td><label for="name1">NAME</label></td>
                                <td><input type="text" name="name1" id="name1" placeholder="Enter Your Name"></td>
                            </tr>
                            <tr>
                                <td><label for="age">AGE</label></td>
                                <td><input type="number" name="age1" id="age1" placeholder="Enter Your Age"></td>
                            </tr>
                            <tr>
                                <td><label for="gender1">GENDER</label></td>
                                <td>
                                    <input type="radio" name="gender1" value="m">Male
                                    <input type="radio" name="gender1" value="f">Female
                                </td>
                            </tr>
                            <tr>
                                <td><label for="age">NUMBER</label></td>
                                <td><input type="number" name="num1" id="num1" placeholder="Enter Your Number"></td>
                            </tr>
                        </table>
                        <br>
                        <!-- <button onclick="submit">Register</button> -->
                        <input type="submit" name="regus" value="Update" class="submit-style">
                    </form>
                </center>
                
                <center>
                    <p id="err1" style="text-align: center;"></p>
                </center>
            </div>
    </div>    
    <center><a href="user_home.php">Go Back</a></center>

</body>
</html>