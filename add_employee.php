<?php
include('connection.php');
session_start();

if (isset($_SESSION['uname'])) {
    $name = $_SESSION['uname'];
} else {
    header('Location:admin_login.php');
}
if (isset($_POST['su'])) {
    $i = mysqli_real_escape_string($con,$_POST['identity']);
    $n = mysqli_real_escape_string($con,$_POST['name']);
    $contactno = mysqli_real_escape_string($con,$_POST['phone']);
    $r = mysqli_real_escape_string($con,$_POST['rights']);
    $sal=mysqli_real_escape_string($con,$_POST['sal']);
    $sd=mysqli_real_escape_string($con,$_POST['sdate']);
    $ld=mysqli_real_escape_string($con,$_POST['ldate']);
    $p = mysqli_real_escape_string($con,$_POST['pas']);
    $p=encrypt($p,"786");

    $sql = "INSERT INTO `employee` (`Emp_ID`, `Phone_no`, `Admin_rights`, `Salary`, `start_date`, `leave_date`, `password`, `Emp_name`) VALUES ('$i', '$contactno', '$r', '$sal', '$sd', '$ld', '$p', '$n');";
    if ($con->query($sql) == true) {
        echo '<h1>Employee added to our data base</h1>';
    } else {
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
                    <li style="background-color: whitesmoke;"><a href="add_employee.php">Add Client</a></li>

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
                    <h1 style="text-align: center;">Add Employee</h1>
                    <form action="add_employee.php" method="post">
                        <ul id="login_details">
                            <li>
                                <p>
                                    Employee ID:
                                    <input type="number" name="identity" style="margin-left: 50px;" placeholder="ID">
                                </p>
                            </li>
                            <li style="margin-top: 5px;">
                                <p>
                                    Name:
                                    <input type="text" name="name" style="margin-left: 96px;" placeholder="Name">
                                </p>
                            </li>
                            <li style="margin-top: 5px;">
                                <p>
                                    Phone Number:
                                    <input type="tel" name="phone" style="margin-left: 40px;" placeholder="Phone Number">
                                </p>
                            </li>
                            <li style="margin-top: 5px;">
                                <p>
                                    Admin Rights(Y/N):
                                    <input type="text" name="rights" style="margin-left: 10px; " placeholder="Y/N">
                                </p>
                            </li>
                            <li style="margin-top: 5px;">
                                <p>
                                    Salary:
                                    <input type="number" name="sal" style="margin-left: 98px; " placeholder="Salary (Rs)">
                                </p>
                            </li>
                            <li style="margin-top: 5px;">
                                <p>
                                    Start date:
                                    <input type="date" name="sdate" style="margin-left: 78px; " placeholder="Start date">
                                </p>
                            </li>
                            <li style="margin-top: 5px;">
                                <p>
                                    Leave date:
                                    <input type="date" name="ldate" style="margin-left: 69px; " placeholder="Leave date">
                                </p>
                            </li>
                            <li style="margin-top: 5px;">
                                <p>
                                    Password:
                                    <input type="password" name="pas" style="margin-left: 77px; " placeholder="Password">
                                </p>
                            </li>
                            <input type="submit" name="su" id="btn_login" value="Add Employee">
                        </ul>
                    </form>

                </div>
            </div>
        </div>
    </section>
</body>

</html>