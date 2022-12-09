<?php
include('connection.php');
session_start();

if (isset($_SESSION['uname'])) {
    $name = $_SESSION['uname'];
} else {
    header('Location:admin_login.php');
}
if (isset($_POST['submit'])) {
    $ID = mysqli_real_escape_string($con,$_POST['si']);
    $tp = mysqli_real_escape_string($con,$_POST['T']);
    $ammo = mysqli_real_escape_string($con,$_POST['amm']);
    $grd = mysqli_real_escape_string($con,$_POST['G']);
    $empid = mysqli_real_escape_string($con,$_POST['eid']);
    $addre = mysqli_real_escape_string($con,$_POST['addr']);
    $sd = mysqli_real_escape_string($con,$_POST['sdate']);
    $pd = mysqli_real_escape_string($con,$_POST['pdate']);
    $hd = mysqli_real_escape_string($con,$_POST['hdate']);
    $stat = mysqli_real_escape_string($con,$_POST['ss']);
    $sql = "UPDATE `site` SET `site_ID` = '$ID', `Type` = '$tp', `amount` = '$ammo', `Construction_grade` = '$grd', `Emp_ID` = '$empid',`Site_address` = '$addre', `Start_date` = '$sd', `Promise_date` = '$pd', `Hand_over_date` = '$hd',`Site_stat` = '$hd' WHERE `site`.`site_ID` = '$ID'";

    $sqll = "UPDATE `relation_tab` SET `Site_ID` = '$ID' WHERE `relation_tab`.`Site_ID` = '$ID'";
    $sqlll = "UPDATE `site_img` SET `Site_ID` = '$ID' WHERE `site_img`.`site_id` = '$ID'";
    if ($con->query($sql) == true) {
        echo '<h1>Updated!</h1>';
    } else {
        echo "error, $sql <br> $con->error()";
    }
}
if (isset($_POST["insert"])) {
    $ii=mysqli_real_escape_string($con,$_POST['eid']);
    $file = addslashes(file_get_contents($_FILES['image']['tmp_name']));
    $query = "INSERT INTO `site_img` (`site_id`, `img`) VALUES ('$ii','$file')";
    if (mysqli_query($con, $query)) {
        echo '<script>alert("Image Inserted into Database")</script>';
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
                        <input type="submit" name="search_student" value="Update a Site">
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

                        Enter Site ID:
                        <input type="number" name="roll_no">
                        <input type="submit" name="search_by_roll_num_for_search" value="search">
                    </form>
                </center>

                <?php
            }
            if (isset($_POST['search_by_roll_num_for_search'])) {
                global $roll;
                $roll = mysqli_real_escape_string($con,$_POST['roll_no']);
                $query = "select * from `site` where `site`.`site_ID` = '$roll'";
                $query_run = mysqli_query($con, $query);
                while ($row = mysqli_fetch_assoc($query_run)) {
                ?>
                    <table>
                        <form action="update_site.php" method="post">
                            <tr>
                                <td>Site ID:</td>
                                <td>
                                    <input type="number" name="si" value="<?php echo $row['site_ID']; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>Type:</td>
                                <td>
                                    <input type="text" name="T" value="<?php echo $row['Type']; ?>">
                                </td>
                            </tr>

                            <tr>
                                <td>Ammount:</td>
                                <td>
                                    <input type="number" name="amm" value="<?php echo $row['amount']; ?>">
                                </td>
                            </tr>

                            <tr>
                                <td>Construction Grade:</td>
                                <td>
                                    <input type="text" name="G" value="<?php echo $row['Construction_grade']; ?>">
                                </td>
                            </tr>

                            <tr>
                                <td>Employee ID:</td>
                                <td>
                                    <input type="number" name="eid" value="<?php echo $row['Emp_ID']; ?>">
                                </td>
                            </tr>

                            <tr>
                                <td>Site address:</td>
                                <td>
                                    <input type="text" name="addr" value="<?php echo $row['Site_address']; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>Start Date:</td>
                                <td>
                                    <input type="date" name="sdate" value="<?php echo $row['Start_date']; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>Promise date:</td>
                                <td>
                                    <input type="date" name="pdate" value="<?php echo $row['Promise_date']; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>Hand Over Date:</td>
                                <td>
                                    <input type="date" name="hdate" value="<?php echo $row['Hand_over_date']; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>Site Stat:</td>
                                <td>
                                    <input type="text" name="ss" value="<?php echo $row['Site_stat']; ?>">
                                </td>
                            <tr>
                                <td>
                                    <input type="submit" name="submit" value="Update Now!">
                                </td>
                            </tr>
                        </form>
                        </tr>
                    </table>

                    <br />
                    <table class="table table-bordered">
                        <tr>
                            <th>Image</th>
                        </tr>
                        <?php
                        $temp = mysqli_real_escape_string($con,$_POST['roll_no']);
                        $query = "SELECT * FROM `site_img` WHERE `site_img`.`site_id` = '$temp'";
                        $result = mysqli_query($con, $query);
                        while ($row = mysqli_fetch_array($result)) {
                            echo '
                                  <tr>  
                                       <td>  
                                       
                                            <img src="data:image/jpeg;base64,' . base64_encode($row['img']) . '" height="200" width="200" class="img-thumnail" />  
                                       </td>
                                  </tr>  
                             ';
                        }
                        ?>
                    </table>
                    <br>
                    <form method="post" enctype="multipart/form-data">
                        <input type="file" name="image">
                        <br>
                        <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-info" />
                        <input type="hidden" value="<?php echo $temp;?>" name="eid">
                    </form>
                <?php
                }
            }

                ?>
        </div>
    </div>
</body>

</html>
<script>
    $(document).ready(function() {
        $('#insert').click(function() {
            var image_name = $('#image').val();
            if (image_name == '') {
                alert("Please Select Image");
                return false;
            } else {
                var extension = $('#image').val().split('.').pop().toLowerCase();
                if (jQuery.inArray(extension, ['gif', 'png', 'jpg', 'jpeg']) == -1) { //images with gif,png,jpg,jpeg is allowed
                    alert('Invalid Image File');
                    $('#image').val('');
                    return false;
                }
            }
        });
    });
</script>