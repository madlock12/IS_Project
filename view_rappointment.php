<?php
include('connection.php');
session_start();

if (isset($_SESSION['uname'])) {
    $name = $_SESSION['uname'];
    $query = "SELECT * from appointment where Responded='Y'";
    $result = mysqli_query($con, $query);
} else {
    header('Location:admin_login.php');
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

    <table align="center" border="1px" style="width:800px;background-color: whitesmoke; line-height:40px; text-align: center; padding:20px;margin:auto;">
        <tr>
            <th colspan="30">
                <h2>All Responded Appointment</h2>
            </th>
        </tr>
        <th> ID </th>
        <th> Potential Client Name </th>
        <th> Site Address </th>
        <th> Contact Number </th>
        <th> Email </th>
        <th> Responded </th>
        </tr>

        <?php while ($rows = mysqli_fetch_assoc($result)) {
        ?>
            <tr>
                <td><?php echo $rows['appointment_ID']; ?></td>
                <td><?php echo $rows['Name']; ?></td>
                <td><?php echo $rows['Site_address']; ?></td>
                <td><?php echo $rows['contact_NO']; ?></td>
                <td><?php echo $rows['Email']; ?></td>
                <td><?php
                    if ($rows['Responded'] == "Y") {
                        echo "Yes";
                    } else {
                        echo "NO";
                    }
                    ?></td>
            </tr>
        <?php
        }
        ?>

    </table>
</body>

</html>