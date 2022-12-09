<?php
include('connection.php');
session_start();

if (isset($_SESSION['uname'])) {
    $name = $_SESSION['uname'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="js/jquery-3.2.1.min.js"></script>
    <title>Engineering Work Associates</title>
</head>

<body>
    <nav>
        <div class="navbar">
            <div class="container nav-container">
                <input class="checkbox" type="checkbox" name="" id="" />
                <div class="hamburger-lines">
                    <span class="line line1"></span>
                    <span class="line line2"></span>
                    <span class="line line3"></span>
                </div>
                <div class="logo">
                    <a href="Home.php">
                        <h1>Engineering Work Associates</h1>
                    </a>
                </div>
                <div class="menu-items">
                    <li><a href="Home.php">Home</a></li>
                    <li><a href="our_projects.php">Our Projects</a></li>
                    <?php
                        if (!isset($_SESSION['uname']))
                        {
                            echo '<li><a href="login.php">Login</a></li>';
                        }
                        else
                        {echo '<li><a href="user_detail.php">User details</a></li>';}
                    ?>
                    <li><a href="Appointment.php">Appointment</a></li>
                    <li><a href="contact.php">contact</a></li>
                    <?php
                        if (isset($_SESSION['uname']))
                        {
                            echo '<li><a style="color: red;" href="logout.php">logout</a></li>';
                        }
                    ?>
                </div>
            </div>
        </div>
    </nav>
    <section class="header">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-12 mt-auto mb-auto">
                    <div class="section_logo">
                        <a href="Home.php"><img src="./images/Final-Logo.png" alt="logo" width="300px"></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="contact_us">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1>Contact Us</h1>
                    <p>
                        <a href="mailto:engineeringworkassociates@hotmail.com" class="link">engineeringworkassociates@hotmail.com</a>
                        <br>
                        <a href="tel:03332801685" class="link">0333-2801685</a>
                        <br>
                        "Bahria Town"
                        <br>
                        "Scheme 33"
                        <br>
                        "Gulshan Town"
                        <br>
                        "DHA"
                        <br>
                        "Karachi"
                        <br>
                        "Pakistan"
                    </p>


                </div>
            </div>
        </div>
</body>

</html>