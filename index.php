<!DOCTYPE html>
<html>
    <head>
        <meta name="Author", content="IWP PROJECT">
        <meta name="keywords", content="BIBLIOTHIC, Books">
        <title>BIBLIOTHIC</title>

        <!-- LINKS -->
        <link rel="stylesheet" href="css/styles.css">
        <link rel="icon" href="images/logo.png">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200&display=swap" rel="stylesheet">

    <body>
        <!-- NAVIGATION -->
        <nav>
            <img src="images/logo.png" alt="Logo" height="80" width="80" style="margin-left: 4%; border-bottom-right-radius: 10%; border-bottom-left-radius: 10%;">
            <a style="font-size: 60px; position: relative; bottom: 30%; margin-right: 150px;" class="nav-items">BIBLIOTHIC</a>
            <a href="#welcomePage" class="nav-items">Home  </a>
            <a href="#main-user-login" class="nav-items">Login  </a>
            <a href="#form-user" class="nav-items">Register  </a>
            <a href="#about" class="nav-items">About Us</a>
        </nav>

        <!-- HOME -->
        <!-- <div>
            <marquee behavior="" direction="right" style="padding-top: 100px;">AAYUSHKA | FARHAN | KUNAL | SANSKRUTI</marquee>
        </div> -->
        <div style="margin-top:10px;" id="welcomePage">
            <span style="display: inline-block; width: 50%;">
                <img src="images/books-image.jpg" alt="" style="width: 95%; padding-left: 10px; border-radius: 10px;">
            </span>
            <span style="display: inline-block; width: 48%;">
                <p style="text-align: right;">
                    <h2 class="welcome">Welcome to Bibliothic</h2>
                    <h2 class="welcome">Here you can find thousands of books nearby you!</h2>
                    <h2 class="welcome">So what are you waiting for? Get started!</h2>
                </p>
            </span>
        </div>
        <br><hr>

        <!-- USER LOGIN -->
        <?php include("registration/user_login.php");?>
        <!-- <hr> -->
        <!-- USER REGISTRATION -->
        <!-- ?php include("registration/user_reg.php");?> -->
        <!-- <hr> -->
        <!-- SELLER LOGIN -->
        <!--  ?php include("registration/seller_login.php");?>
        <hr>
        <!-- SELLER REGISTRATION -->
        <!-- ?php include("registration/seller_reg.php");?>
        <hr>
        <!-- ABOUT -->
        <div class="about" id="about">
            <h2>ABOUT US</h2>
            <section>
                <p>An online marketplace where users can get books / novels on rent / purchase from other people nearby. Easily buy books or get them on rent for a few days or week. Affordable, faster access to books and ease of use .</p>
                
                <aside>
                An online marketplace where users can get books / novels on rent / purchase from other people nearby. Easily buy books or get them on rent for a few days or week. Affordable, faster access to books and ease of use. Built using HTML, CSS, JS, PHP and MYSQL
                    <p><em>- Aayushka</em></p>
                </aside>
                <center><img src="images/novel-lotr.jpg" alt="" style="border-radius: 3%; width: 50%;"></center>
                
                <article>
                    <p>An online marketplace where users can get books / novels on rent / purchase from other people nearby. Easily buy books or get them on rent for a few days or week. Affordable, faster access to books and ease of use! Built using HTML, CSS, JS, PHP and MYSQL and with loads of meticulous details. What are you waiting for? Start searching now and find thousands of books easily on this website.</p>
                </article>    
            </section>
            <hr>
            <br><br>
            <table>
                <tr class="info">
                    <td>
                        <h2>VISION</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla illum numquam tempore tempora totam minus velit est. Veniam nisi, in placeat maxime blanditiis quibusdam itaque vel. Quia doloremque cumque ab.</p>
                    </td>
                    <td>
                        <h2>MISSION</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit facere nesciunt placeat? Dignissimos odit officiis laudantium sint tempora hic dolorem sequi error qui, ea facilis alias porro necessitatibus ipsum!</p>
                    </td>
                </tr>
            </table>
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
            <center style="color: white; font-family: Arial, Helvetica, sans-serif; font-size: 1.5rem;">© BIBLIOTHIC 2022</center>
        </footer>
    </body>
</html>