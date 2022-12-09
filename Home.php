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
    <title>Engineering Work Associates</title>
    <link rel="stylesheet" href="style.css" type="text/css">
    <script src="js/jquery-3.2.1.min.js"></script>
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
                <div class="logo" id="fade">
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
                        {
                            echo '<li><a href="user_detail.php">User details</a></li>';
                        }
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
    <section class="Moto">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-12 mt-auto mb-auto">
                    <h1>
                        You Dream it,<br>
                        We build it!.
                    </h1>
                </div>
            </div>
        </div>
    </section>
</body>


</html>