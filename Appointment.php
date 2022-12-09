<?php
include 'connection.php';
session_start();
if (isset($_SESSION['uname'])) {
    $name = $_SESSION['uname'];
}

if(isset($_POST['submit'])){
    $uname =mysqli_real_escape_string($con,$_POST['username']);
    $contactno = mysqli_real_escape_string($con,$_POST['phone']);
    $siteaddr = mysqli_real_escape_string($con,$_POST['address']);
    $Email = mysqli_real_escape_string($con,$_POST['email']);
    $sql = "INSERT into `appointment` (`appointment_ID`, `Name`, `contact_NO`, `Site_address`, `Email`, `Responded`) VALUES (NULL,'$uname','$contactno','$siteaddr','$Email',NULL)";
    if ($con->query($sql) == true)
    {
        echo '<h1>Your appointment request is live on our servers we will email you shortly for confirmation</h1>';
    }
    else
    {
        echo "error, $sql <br> $con->error()";
    }
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
    <title>Engineering Works Associates</title>
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
                        <h1>Engineering Works Associates</h1>
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
                    ?>
                    <li><a href="Appointment.php">Appointment</a></li>
                    <li><a href="contact.php">contact</a></li>
                    <?php
                        if (isset($_SESSION['uname']))
                        {
                            echo '<li><a href="user_detail.php">User details</a></li>';
                            echo '<li><a style="color: red;" href="logout.php">Logout</a></li>';
                        }
                    ?>
                </div>
            </div>
        </div>
    </nav>

    </section>
    <section class="book_appointment">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <h1 style="text-align: center;">Book an appointment now!</h1>
                    <form action="Appointment.php" method="post">
                        <ul id="login_details">
                            <li>
                                <p>
                                    Name:
                                    <input type="text" name="username" style="margin-left: 68px;" placeholder="Name">
                                </p>
                            </li>
                            <li style="margin-top: 5px;">
                                <p>
                                    Address of site:
                                    <input type="text" name="address" style="margin-left: 11px;" placeholder="Address">
                                </p>
                            </li>
                            <li style="margin-top: 5px;">
                                <p>
                                    Phone Number:
                                    <input type="tel" name="phone" style="margin-left: 11px;" placeholder="Phone Number">
                                </p>
                            </li>
                            <li style="margin-top: 5px;">
                                <p>
                                    Email:
                                    <input type="email" name="email" style="margin-left: 68px; " placeholder="Email">
                                </p>
                            </li>
                            <input type="submit" name="submit" id="btn_login" value="Book Now!">
                        </ul>
                    </form>

                </div>
            </div>
        </div>
    </section>
</body>
</html>