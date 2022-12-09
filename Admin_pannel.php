<?php
include('connection.php');
session_start();

if (isset($_SESSION['uname'])) {
    $name = $_SESSION['uname'];
} else {
    header('Location:admin_login.php');
}
$sql_query = " SELECT * from employee where Emp_ID ='$name' ";
$result = mysqli_query($con, $sql_query);
$row = mysqli_fetch_array($result);
$Customer_ID = $row['Emp_ID'];
$Contact_NO = $row['Phone_no'];
$salary = $row['Salary'];
$stdate = $row['start_date'];
$ldate = $row['leave_date'];
$Name = $row['Emp_name'];
if ($ldate = " ") {
    $ldate = "None";
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
                <div class="menu-items" style="background-color:whitesmoke ;">
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
                        echo '<li><a style="color: red;" href="admin_logout.php">Admin Logout</a></li>';
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
    <div class="student-profile py-4" style="border-style: groove; border-radius:5px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card shadow-sm">
                        <div class="card-header bg-transparent text-center">
                            <img class="profile_img" src="./Images/user.png" alt="pic">
                            <h3><?php echo strtoupper($Name); ?></h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8" style="border-style: groove; border-radius:5px;">
                    <div class="card shadow-sm">
                        <div class="card-header bg-transparent border-0">
                            <h3 class="mb-0"><i class="far fa-clone pr-1"></i>General Information</h3>
                        </div>
                        <div class="card-body pt-0" id="admin_table">
                            <table class="table table-bordered" style="border-style: groove; border-radius:5px;">
                                <tr>
                                    <th width="30%">ID </th>
                                    <td width="2%">:</td>
                                    <td><?php echo strtoupper($Customer_ID); ?></td>
                                </tr>
                                <tr>
                                    <th width="30%">Name </th>
                                    <td width="2%">:</td>
                                    <td><?php echo strtoupper($Name); ?></td>
                                </tr>
                                <tr>
                                    <th width="30%">Contact Number </th>
                                    <td width="2%">:</td>
                                    <td><?php echo strtoupper($Contact_NO); ?></td>
                                </tr>
                                <tr>
                                    <th width="30%">Salary </th>
                                    <td width="2%">:</td>
                                    <td><?php echo strtoupper($salary); ?></td>
                                </tr>
                                <tr>
                                    <th width="30%">Startdate </th>
                                    <td width="2%">:</td>
                                    <td><?php echo strtoupper($stdate); ?></td>
                                </tr>

                                <tr>
                                    <th width="30%">Leave date </th>
                                    <td width="2%">:</td>
                                    <td><?php echo strtoupper($ldate); ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>