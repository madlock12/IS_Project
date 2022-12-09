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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <script src="js/jquery-3.2.1.min.js"></script>
    <title>Engineering Work Associates</title>
</head>

<body style="background-color: whitesmoke;font-family: sans-serif">
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
                        <h1 style="font-size:xx-large;"><strong>Engineering Work Associates</strong></h1>
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

    <section class="header_how">
        <div class="container">
            <div class="row">
                <div class="col-6 mt-auto mb-auto text-center">
                    <video width="320" height="240" controls autoplay>
                        <source src=Videos/project_vid.mp4 type=video/ogg>
                    </video>
                </div>

                <div class="col-6 mt-auto mb-auto text-right" id="lists">
                    <ul style="list-style-type: none; background-color: whitesmoke;" >
                        <li>
                            <img src="images/Group 896.png" alt="couch">
                        </li>
                        <li>
                            <p> At gulshan e meymar sector S site 1 being demonstrated.!
                            </p>
                        </li>
                        <li>
                            <h1>"Our standard procedures."</h1>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <br>
    <section class="header_how">
        <div class="container">
            <div class="row">
                <div class="col-6 mt-auto mb-auto text-center">
                    <video width="320" height="200" controls autoplay>
                        <source src=Videos/project_vid_2.mp4 type=video/ogg>
                    </video>

                </div>

                <div class="col-6 mt-auto mb-auto text-right" id="lists">
                    <ul style="list-style-type: none;background-color: whitesmoke;">
                        <li>
                            <h1>"How we implement our standard safety protocols.!"</h1>
                        </li>
                        <li>
                            <p>At gulshan e meymar sector S site 1.
                            </p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <br>
    <section class="header_how">
        <div class="container">
            <div class="row">
                <div class="col-6 mt-auto mb-auto text-center">
                    <video width="320" height="200" controls autoplay>
                        <source src=Videos/project_vid_3.mp4 type=video/ogg>
                    </video>
                </div>

                <div class="col-6 mt-auto mb-auto text-right" id="lists">
                    <ul style="list-style-type: none; background-color: whitesmoke;">
                        <li>
                            <h1>"Basic marking to avoid inaccuracies.!"</h1>
                        </li>
                        <li>
                            <p>Basic markings on gulshan e meymar sector S site 1 before column work.
                            </p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="Elevations" style="margin-top: 100px;">
        <div class="container">
            <div class="row">
                <h1 style="text-align: center; text-decoration: solid; background-color: whitesmoke;">Our Designs.</h1>
                <div class="col-6 mt-auto mb-auto text-center">
                    <img src="images/E1.jpeg" width="390px" alt="couch">
                    <div class="bottom-left">Gulshan-e-Iqbal Block 7.</div>
                </div>
                <div class="col-6 mt-auto mb-auto text-center">
                    <img src="images/E2.jpeg"  alt="couch">
                    <div class="bottom-left">Gulshan-e-Meymar Sector S, B69.</div>
                </div>
            </div>
        </div>
    </section>
    <section class="Elevations" style="margin-top: 50px;">
        <div class="container">
            <div class="row">
                <div class="col-6 mt-auto mb-auto text-center">
                    <img src="images/E3.jpeg" width="390px" height="300px" alt="couch">
                    <div class="bottom-left">Gulshan-e-Meymar Sector S, B3.</div>
                </div>
                <div class="col-6 mt-auto mb-auto text-center">
                    <img src="images/E4.jpeg" width="530px" alt="couch">
                    <div class="bottom-left">Gulshan-e-Meymar Sector S, B3.</div>
                </div>
            </div>
        </div>
    </section>

</body>

</html>