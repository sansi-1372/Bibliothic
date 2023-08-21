
 <?php
        // user login
        session_start();
        // echo session_id();
        if(isset($_POST['login'])){
            include_once("config.php");
            if($con){
                $email = $_POST['email2'];
                $pass = $_POST['pass2'];
                $query2 = "select userpass from users where useremail = '$email';";
                if($result2 = $con->query($query2)){
                    $row = $result2->fetch_assoc();
                    if($row){
                        if($row['userpass'] == $pass){
                            // echo "LOGIN SUCCESSFUL";
                            $_SESSION['user_id']=$email;
                            header("Location: user/user_home.php");
                            // header("Location: books-search.php");
                            die();
                        }
                        else{
                        echo "Invalid Credentials";
                        }
                    }
                    else{
                        echo "Invalid Credentials";
                    }
                }
            }
            // $result2 = $con->query($query2);
        }

        if(isset($_POST['regus'])){
            include_once("config.php");
            if($con){
            $name = $_POST['name1'];
            $age = $_POST['age1'];
            $number = $_POST['num1'];
            $gender = $_POST['gender1'];
            $email = $_POST['email1'];
            $pass = $_POST['pass1'];
            if($name != ""){
                $query1 = "INSERT INTO `users` (`username`, `userage`, `userphno`, `usergender`, `useremail`, `userpass`) VALUES ('$name', '$age', '$number', '$gender', '$email', '$pass');";
                $result1 = $con->query($query1);
                if($result1){
                    echo "Sucessfully Registered";
                    include_once("regmail.php");
                }
            }

            }
        }

        //Seller Login

        if(isset($_POST['sellogin'])){
            include_once("config.php");
            if($con!=NULL){
                $email = $_POST['semail'];
                $pass = $_POST['spass'];
                $query2 = "select selpass from seller where selemail = '$email';";
                if($result2 = $con->query($query2)){
                $row = $result2->fetch_assoc();
                if($row){
                    if($row['selpass'] == $pass){
                        // $nameQuery = "select selname from seller where selemail = '$email';";
                        // $dat = $con->query($nameQuery)->fetch_assoc();
                        echo "LOGIN SUCCESSFUL";
                        echo "We will update further soon!";
                        // $names = $dat['selname'];
                        $_SESSION['sel_id'] = $email;
                        echo $_SESSION['sel_id'];
                        header("Location: seller/seller_page.php");
                    }
                    else{
                        echo "Invalid Credentials";
                    }
                }
                else{
                    echo "Invalid Credentials";
                }
                }
            }
          // $result2 = $con->query($query2);
        }

        if(isset($_POST['selreg'])){
            include_once("config.php");
            $name2 = $_POST['name2'];
            $age2 = $_POST['age2'];
            $email2 = $_POST['email2'];
            $gender2 = $_POST['gender2'];
            $city2 = $_POST['city'];
            $pincode2 = $_POST['pincode'];
            $addr2 = $_POST['addr'];
            $phno2 = $_POST['num2'];
            $pass2 = $_POST['pass2'];
            // echo  $city2.$name2.$age2.$email2.$gender2.$pincode2.$addr2.$phno2.$pass2;
            if($name2 != "" && $age2!= ""  && $email2!= ""  && $gender2!= ""  && $city2!= ""  && $pincode2!= ""  && $addr2!= ""
                && $phno2!= ""  && $pass2!= ""){
                $query2 = "INSERT INTO `seller`
                           (`selname`, `selage`, `selhpno`, `selgender`, `selemail`, `selcity`,`selpin`,`seladdr`,`selpass`)
                           VALUES ('$name2', '$age2', '$phno2', '$gender2', '$email2', '$city2','$pincode2','$addr2','$pass2');";
                $result2 = $con->query($query2);
                if($result2){
                    echo "<center>Sucessfully Registered</center>";
                    // include<"selmail.php">
                    // include_once("regmail.php");
                }
                else{
                    echo "Try Again!";
                }
            }
        }
    ?>


<div class="main-user-login" id="main-user-login">
            <div class="img-user" style="display: inline-block; width: 40%;">
                <center>
                    <img src="images/person-giving-book.jpg" alt="" style="border-radius: 10px;">
                </center>
            </div>
            <div class="login-user" id="login-user" style="display: inline-block; width: 50%;">
                <center>
                    <h2>User Login</h2>
                    <form method="post" action="index.php">
                        <table>  
                            <tr>
                                <td><label for="email">MAIL</label></td>
                                <td><input type="email" name="email2" id="email2" placeholder="Enter Your Mail"></td>
                            </tr>
                            <tr>
                                <td><label for="pass2">PASSWORD</label></td>
                                <td><input type="password" name="pass2" id="pass2" placeholder="Enter Your Password"></td>
                            </tr>
                        </table>
                        <input type="submit" name="login" value="Login" class="submit-style">
                        <br>
                        <!-- <input type="submit" name="login" value="Login" class="submit-style"> -->
                        <!-- <button onclick="submit">Login</button> -->
                    </form>
                </center>
                
                <center>
                    <p id="err1" style="text-align: center;"></p>
                </center>
            </div>
    </div>
    <hr>

<!-- User Registration -->
<div class="main-user-form">
            <div class="img-user" style="display: inline-block; width: 40%;">
                <center>
                    <img src="images/person-reading.jpg" alt="" style="border-radius: 10px;">
                </center>
            </div>
            <div class="form-user" id="form-user" style="display: inline-block; width: 50%;">
                <center>
                    <h2>User Registration</h2>
                    <form method="post" action="index.php" name="usereg">
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
                            <tr>
                                <td><label for="email">MAIL</label></td>
                                <td><input type="email" name="email1" id="email1" placeholder="Enter Your Mail"></td>
                            </tr>
                            <tr>
                                <td><label for="pass2">PASSWORD</label></td>
                                <td><input type="password" name="pass1" id="pass1" placeholder="Enter Your Password"></td>
                            </tr>
                        </table>
                        <br>
                        <!-- <button onclick="submit">Register</button> -->
                        <input type="submit" name="regus" value="Sign up" class="submit-style">
                    </form>
                </center>
                
                <center>
                    <p id="err1" style="text-align: center;"></p>
                </center>
            </div>
    </div>
    <hr>
    <!-- Seller Login -->

    <div class="seller-login">
        <div class="login-user" id="login-seller" style="display: flex; width: 50%;item-align:center">
        <img src="images/person-giving-book2.jpg" alt="" style="width: 50%; margin: 0 34% 0 17%; border-radius: 10px;">
                <center>
                    <h2>Seller login</h2>
                    <form method="post" action="index.php">
                        <table>  
                            <tr>
                                <td><label for="email">MAIL</label></td>
                                <td><input type="email" name="semail" id="email2" placeholder="Enter Your Mail"></td>
                            </tr>
                            <tr>
                                <td><label for="pass2">PASSWORD</label></td>
                                <td><input type="password" name="spass" id="pass2" placeholder="Enter Your Password"></td>
                            </tr>
                        </table>
                        <br>
                        <input type="submit" name="sellogin" value="Login" class="submit-style">
                        <!-- <button onclick="submit">Login</button> -->
                    </form>
                </center>
                
                <center>
                    <p id="err1" style="text-align: center;"></p>
                </center>
            </div>
        </div>
        <hr>

        <!-- Seller Registration -->
        <div class="main-seller-form">
            <div class="seller-img" style="display:inline-block; width: 45%;padding-left:50px">
                <!-- <img src="images/person-giving-book.jpg" alt="" style="border-radius: 10px;"> -->
                <!-- <br> -->
                <!-- <img src="images/person-giving-book2.jpg" alt="" style="width: 68%;" style="border-radius: 10px;"> -->
            </div>
            <div class="form-seller" style="display: inline-block; width: 34%;">
                <center>
                    <h2>Seller Registration</h2>
                    <form method = "post" action = "index.php">
                        <table>
                            <tr>
                                <td><label for="name1">NAME</label></td>
                                <td><input type="text" id="name2" name="name2" placeholder="Enter Name"></td>
                            </tr>
                            <tr>
                                <td><label for="age">AGE</label></td>
                                <td><input type="text" id="age2" name="age2" placeholder="Enter your Age"></td>
                            </tr>
                            <tr>
                                <td><label for="gender2">GENDER</label></td>
                                <td>
                                    <input type="radio" name="gender2" value="m">Male
                                    <input type="radio" name="gender2" value="f">Female
                                </td>
                            </tr>
                            <tr>
                                <td><label for="email">MAIL</label></td>
                                <td><input type="email" id="email2" name="email2" placeholder="Enter Your Mail"></td>
                            </tr>
                            <tr>
                                <td><label for="city">CITY</label></td>
                                <td>
                                    <input list="cities" name="city" placeholder="Select your City">
                                    <datalist id="cities">
                                        <option value="Vellore">
                                        <option value="Chennai">
                                        <option value="Bangalore">
                                        <option value="Mumbai">
                                        <option value="Delhi">
                                    </datalist>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="pincode">PINCODE</label></td>
                                <td><input type="number" id="pincode" name="pincode" placeholder="Enter Pincode"></td>
                            </tr>
                            <tr>
                                <td><label for="addr">ADDRESS</label></td>
                                <td><input type="text" id="addr" name="addr" placeholder="Enter Full Address" style="height : 4rem;"></td>
                            </tr>
                            <tr>
                                <td><label for="phone">NUMBER</label></td>
                                <td><input type="number" name="num2" id="num2" placeholder="Enter Your Number"></td>
                            </tr>
                            <tr>
                                <td><label for="password">PASSWORD</label></td>
                                <td><input type="password" id="pass2" name = "pass2" placeholder = "Enter password"> </td>
                            </tr>
                        </table>
                        <br>
                        <!-- <button type="button" onclick="validateForm()">Register</button> -->
                        <input type = "submit" name = "selreg" value = "Register" class="submit-style">
                    </form>
                </center>

                <center>
                    <p id="err1" style="text-align: center;"></p>
                </center>
            </div>
        </div>
        <br>
        <hr>