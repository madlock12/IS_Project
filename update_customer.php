<?php
include('connection.php');
session_start();

if (isset($_SESSION['uname'])) {
    $name = $_SESSION['uname'];
} else {
    header('Location:admin_login.php');
}
if (isset($_POST['submit'])) {
    $ID = mysqli_real_escape_string($con,$_POST['ci']);
    $contactno = mysqli_real_escape_string($con,$_POST['num']);
    $typ = mysqli_real_escape_string($con,$_POST['tp']);
    $Email = mysqli_real_escape_string($con,$_POST['e']);
    $nam = mysqli_real_escape_string($con,$_POST['n']);
    $pas = mysqli_real_escape_string($con,$_POST['p']);
    $pas=encrypt($pas,"786");
    $sql = "UPDATE `users` SET `Customer_ID` = '$ID', `Contact_NO` = '$contactno', `Email` = '$Email', `Client_Name` = '$nam', `password`='$pas' WHERE `users`.`Customer_ID` ='$ID' ";
    $sqll = "UPDATE `relation_tab` SET `Customer_ID` = '$ID' WHERE `relation_tab`.`Customer_ID` = '$ID'";
    if ($con->query($sql) == true) {
        echo '<h1>Updated!</h1>';
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
    <div id="left_side">
        <form action="" method="post">
            <table>
                <tr>
                    <td>
                        <input type="submit" name="search_student" value="update a Client">
                    </td>
                </tr>
                </tr>
            </table>
        </form>
    </div>

    <div id="right_side"><br><br>
        <div id="demo">
            <?php
            if (isset($_POST['search_student'])) {
            ?>
                <center>
                    <form action="" method="post">

                        Enter customer ID:
                        <input type="number" name="roll_no">
                        <input type="submit" name="search_by_roll_num_for_search" value="search">
                    </form>
                </center>

                <?php
            }
            if (isset($_POST['search_by_roll_num_for_search'])) {
                $rol=mysqli_real_escape_string($con,$_POST['roll_no']);
                $query = "select * from users where Customer_ID = '$_rol'";
                $query_run = mysqli_query($con, $query);
                while ($row = mysqli_fetch_assoc($query_run)) {
                ?>
                    <table>
                        <form action="update_customer.php" method="post">
                            <tr>
                                <td>Customer ID:</td>
                                <td>
                                    <input type="number" name="ci" value="<?php echo $row['Customer_ID']; ?>">
                                </td>
                            </tr>

                            <tr>
                                <td>Contact Number:</td>
                                <td>
                                    <input type="tel" name="num" value="<?php echo $row['Contact_NO']; ?>">
                                </td>
                            </tr>

                            <tr>
                                <td>Client type (R/C):</td>
                                <td>
                                    <input type="text" name="tp" value="<?php echo $row['client_type']; ?>">
                                </td>
                            </tr>

                            <tr>
                                <td>Email:</td>
                                <td>
                                    <input type="email" name="e" value="<?php echo $row['Email']; ?>">
                                </td>
                            </tr>

                            <tr>
                                <td>Client Name:</td>
                                <td>
                                    <input type="text" name="n" value="<?php echo $row['Client_Name']; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>Password:</td>
                                <td>
                                    <?php $a=$row['password'];
                                    $temp=decrypt($a,"786");?>
                                    <input type="text" name="p" value="<?php echo $temp; ?>">
                                </td>
                                <input type="submit" name="submit" id="btn_login" value="Update Now!">
                            </tr>
                            
                        </table>
                        <?php
                }
            }
            
            ?>
        </div>
    </div>
</form>
</body>

</html>