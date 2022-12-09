<?php
include('connection.php');
session_start();

if (isset($_SESSION['uname'])) {
    $name = $_SESSION['uname'];
} else {
    header('Location:admin_login.php');
}
if (isset($_POST['su'])) {
    $i = mysqli_real_escape_string($con,$_POST['ci']);
    $n = mysqli_real_escape_string($con,$_POST['si']);
    $contactno = mysqli_real_escape_string($con,$_POST['ccn']);
    $ctype = mysqli_real_escape_string($con,$_POST['ct']);
    $cemail = mysqli_real_escape_string($con,$_POST['em']);
    $cname = mysqli_real_escape_string($con,$_POST['cn']);
    $cpass = mysqli_real_escape_string($con,$_POST['cp']);
    $ty = mysqli_real_escape_string($con,$_POST['t']);
    $am = mysqli_real_escape_string($con,$_POST['amm']);
    $g = mysqli_real_escape_string($con,$_POST['grade']);
    $InchargeEmp = mysqli_real_escape_string($con,$_POST['EI']);
    $saddr = mysqli_real_escape_string($con,$_POST['addr']);
    $stdate = mysqli_real_escape_string($con,$_POST['sdate']);
    $prodate = mysqli_real_escape_string($con,$_POST['pdate']);
    $handdate = mysqli_real_escape_string($con,$_POST['hdate']);
    $sta = mysqli_real_escape_string($con,$_POST['stat']);

    $cpass=encrypt($cpass,"786");
    $sqll = "INSERT INTO `users` (`Customer_ID`, `Contact_NO`,`client_type`,`Email`,`Client_Name`,`password`) VALUES ('$i', '$contactno','$ctype','$cemail','$cname','$cpass');";
    if ($con->query($sqll) == true) {
        $sqlll = "INSERT INTO `site` (`site_ID`, `Type`,`amount`,`Construction_grade`,`Emp_ID`,`Site_address`,`Start_date`,`Promise_date`,`Hand_over_date`,`Site_stat`) VALUES ('$n', '$ty','$am','$g','$InchargeEmp','$saddr','$stdate','$prodate','$handdate','$sta');";
        if ($con->query($sqlll) == true) {
            $sql = "INSERT INTO `relation_tab` (`Customer_ID`, `Site_ID`) VALUES ('$i', '$n');";
            if ($con->query($sql) == true) {
                echo "Added Client and his site to DataBase";
            } else {
                echo "error, $sql <br> $con->error()";
            }
        } else {
            echo "error, $sqlll <br> $con->error()";
        }
    } else {
        echo "error, $sqll <br> $con->error()";
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
                    <a href="Admin_pannel.php">
                        <h1>Engineering Work Associates</h1>
                    </a>
                </div>
                <div class="menu-items">
                    <li><a href="Admin_pannel.php">Admin Home</a></li>

                    <li><a href="view_site.php">View all sites</a></li>
                    <li><a href="view_asite.php">View active sites</a></li>
                    <li><a href="view_isite.php">View inactive sites</a></li>
                    <li><a href="update_site.php">Update Sites</a></li>
                    <li><a href="delete_sites.php">Delete Sites</a></li>

                    <li><a href="view_customer.php">View all Client</a></li>
                    <li><a href="view_acustomer.php">View active Client</a></li>
                    <li><a href="view_icustomer.php">View inactive Client</a></li>
                    <li><a href="update_customer.php">Update Client</a></li>
                    <li><a href="delete_customer.php">Delete Client</a></li>
                    <li><a href="add_customer.php">Add Client</a></li>
                    <li style="background-color: whitesmoke;"><a href="add_employee.php">Add Employee</a></li>

                    <li style="background-color: whitesmoke;"><a href="view_appointment.php">View all appointment</a></li>
                    <li style="background-color: whitesmoke;"><a href="view_uappointment.php">View Unresponded appointment</a></li>
                    <li style="background-color: whitesmoke;"><a href="view_rappointment.php">View Responded appointment</a></li>
                    <li style="background-color: whitesmoke;"><a href="update_appointment.php">Update appointment</a></li>
                    <li style="background-color: whitesmoke;"><a href="delete_appointment.php">Delete appointment</a></li>
                    <?php
                    if (isset($_SESSION['uname'])) {
                        echo '<li><a style="color: red;" href="admin_logout.php">Admin logout</a></li>';
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
                        <a href="Admin_pannel.php"><img src="./images/Final-Logo.png" alt="logo" width="300px"></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="book_appointment">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <h1 style="text-align: center;">Add Client</h1>
                    <form action="add_customer.php" method="post">
                        <ul id="login_details">
                            <li>
                                <p>
                                    Customer ID:
                                    <input type="number" name="ci" style="margin-left: 100px;" placeholder="Customer ID">
                                </p>
                            </li>
                            <li>
                                <p>
                                    Customer Contact number:
                                    <input type="tel" name="ccn" style="margin-left: 15px;" placeholder="Contact number">
                                </p>
                            </li>
                            <li>
                                <p>
                                    Client Type:
                                    <input type="text" name="ct" style="margin-left: 109px;" placeholder="R/C">
                                </p>
                            </li>
                            <li>
                                <p>
                                    Email:
                                    <input type="email" name="em" style="margin-left: 145px;" placeholder="Email">
                                </p>
                            </li>
                            <li>
                                <p>
                                    Client Name:
                                    <input type="text" name="cn" style="margin-left: 101px;" placeholder="Client Name">
                                </p>
                            </li>
                            <li>
                                <p>
                                    Client password:
                                    <input type="password" name="cp" style="margin-left: 79px;" placeholder="Client password">
                                </p>
                            </li>


                            <li>
                                <p>
                                    Site ID:
                                    <input type="number" name="si" style="margin-left: 136px;" placeholder="Site ID">
                                </p>
                            </li>
                            <li style="margin-top: 5px;">
                                <p>
                                    Type:
                                    <input type="text" name="t" style="margin-left: 150px;" placeholder="type">
                                </p>
                            </li>
                            <li style="margin-top: 5px;">
                                <p>
                                    Ammount:
                                    <input type="number" name="amm" style="margin-left: 117px; " placeholder="(Rs)">
                                </p>
                            </li>
                            <li style="margin-top: 5px;">
                                <p>
                                    Construction grade:
                                    <input type="text" name="grade" style="margin-left: 40px;" placeholder="Grade">
                                </p>
                            </li>
                            <li style="margin-top: 5px;">
                                <p>
                                    Incharge Employee ID:
                                    <input type="number" name="EI" style="margin-left: 10px; " placeholder="ID">
                                </p>
                            </li>
                            <li style="margin-top: 5px;">
                                <p>
                                    Site address:
                                    <input type="text" name="addr" style="margin-left: 78px; " placeholder="address">
                                </p>
                            </li>
                            <li style="margin-top: 5px;">
                                <p>
                                    Start date:
                                    <input type="date" name="sdate" style="margin-left: 69px; " placeholder="start date">
                                </p>
                            </li>
                            <li style="margin-top: 5px;">
                                <p>
                                    Promise date:
                                    <input type="date" name="pdate" style="margin-left: 77px; " placeholder="Promise date">
                                </p>
                            </li>
                            <li style="margin-top: 5px;">
                                <p>
                                    Handover date:
                                    <input type="date" name="hdate" style="margin-left: 77px; " placeholder="Handover date">
                                </p>
                            </li>
                            <li style="margin-top: 5px;">
                                <p>
                                    Site Stat:
                                    <input type="text" name="stat" style="margin-left: 77px; " placeholder="Site stats">
                                </p>
                            </li>
                            <input type="submit" name="su" id="btn_login" value="Add Client">
                        </ul>
                    </form>

                </div>
            </div>
        </div>
    </section>
</body>

</html>