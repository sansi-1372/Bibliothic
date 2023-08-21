<?php
    session_start();
    
    if(isset($_POST['book_sub'])){
        // echo isset($_FILES['photo']);
        include_once("../registration/config.php");
        $sel_email = $_SESSION['sel_id'];
        $book_name = $_POST['book_name'];
        $book_auth= $_POST['book_author'];
        $book_year = $_POST['book_year'];
        $book_price = $_POST['book_price'];
        $book_pin = $_POST['book_pin'];
            // echo  $city2.$name2.$age2.$email2.$gender2.$pincode2.$addr2.$phno2.$pass2;
        if(preg_match("/[a-zA-Z0-9]/",$book_name)&&
           preg_match("/[a-zA-Z0-9]/",$book_auth)&&
           preg_match("/[0-9]{4}/",$book_year)&&preg_match("/[0-9]/",$book_price)&&
           preg_match("/[0-9]{6}/",$book_pin))
           {
            if(isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0){
                $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg","png" => "image/png");
                $filename = $_FILES["photo"]["name"];
                $filetype = $_FILES["photo"]["type"];
                $filesize = $_FILES["photo"]["size"];

            
                // Verify file extension
                $ext = pathinfo($filename, PATHINFO_EXTENSION);
                if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
            
                // Verify file size - 5MB maximum
                $maxsize = 5*1024 *100;
                if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
            
                // Verify MYME type of the file
                if(in_array($filetype, $allowed)){
                    // Check whether file exists before uploading it
                    $query1 = 'SELECT book_id from books ORDER BY book_id DESC LIMIT 1';
                    if($result1=$con->query($query1))
                    {
                        $row = $result1->fetch_assoc();
                        if($row){
                            $filename = (int)$row['book_id'] + 1;
                            $filename.='.'.$ext;
                        }
                        else{
                            $filename = '1'.'.'.$ext;
                        }
                    }
                    // if(file_exists("../upload/" . $filename)){
                    //     $filename = 
                    // }
                    $query2 = "INSERT INTO books 
                              (`book_name`,`book_author`,`book_year`,`book_price`,`book_pin`,`imgtype`,`selemail`,`book_order`)
                              VALUES('$book_name','$book_auth','$book_year','$book_price','$book_pin','$ext','$sel_email','0');";
                    $result2 = $con->query($query2);
                    if($result2){
                        move_uploaded_file($_FILES["photo"]["tmp_name"], "../upload/" . $filename);
                        echo "<center>Successfully Registered</center>";
                    }
                }
                else{
                        echo "Error: There was a problem uploading your file. Please try again."; 
                }
            }
            else{
                echo "Error: " . $_FILES["photo"];
            }
                    // include<"selmail.php">
                    // include_once("regmail.php");
        }
        else{
            echo "Invalid Data Entered!";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Upload</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="icon" href="../images/logo.png">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200&display=swap" rel="stylesheet">
</head>
<body>
    <div>
        <center>
        <h2>Upload a Book to sell</h2>
            <form action="new_upload.php" method = "POST" name="upl_book" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td><label for="">Book Name:</label></td>
                        <td><input type="text" name="book_name"></td>
                    </tr>
                    <tr>
                        <td><label for="">Author:</label></td>
                        <td><input type="text" name="book_author"></td>
                    </tr>
                    <tr>
                        <td><label for="">Year:</label></td>
                        <td><input type="text" name="book_year"></td>
                    </tr>
                    <tr>
                        <td><label for="">Price:</label></td>
                        <td><input type="number" name="book_price"></td>
                    </tr>
                    <tr>
                        <td><label for="">pincode:</label></td>
                        <td><input type="text" name="book_pin"></td>
                    </tr>
                    <tr>
                        <td>
                            <label for="fileSelect">Image:</label>
                        </td>
                        <td>
                            <input type="file" name="photo" id="fileSelect">
                            <!-- <span><strong>Note:</strong> Only .jpg, .jpeg, .gif, .png formats allowed to a max size of 5 MB.</span> -->
                        </td>
                    </tr>
                </table>
                <center><input type="submit" class="submit-style" value="Upload" name="book_sub"></center>
            </form>
            <a href="seller_page.php">Go Back</a>
        </center>
    </div>
</body>
</html>