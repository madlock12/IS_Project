<?php
include 'connection.php';
session_start();
if (!isset($_SESSION['uname'])) {
    header('Location:login.php');
} else {
    $id = $_SESSION['uname'];
}

$sql_query = " SELECT * from users where Customer_ID ='$id' ";
$result = mysqli_query($con, $sql_query);
$row = mysqli_fetch_array($result);
$Customer_ID = $row['Customer_ID'];
$Contact_NO = $row['Contact_NO'];
$Email = $row['Email'];
$Name = $row['Client_Name'];
// $sql = " SELECT site_id from relation_tab where Customer_ID='$id'";
// $id2=$con->query($sql);
$sql_query = " SELECT * from site,relation_tab,employee where relation_tab.Customer_ID='$id' AND relation_tab.Site_ID = site.site_ID ";
$result = mysqli_query($con, $sql_query);
$row = mysqli_fetch_array($result);
$siteaddr = $row['Site_address'];
$siteid=$row['site_ID'];
$grade = $row['Construction_grade'];
$startdate = $row['Start_date'];
$siteemp = $row['Emp_name'];
$sitestat = $row['Site_stat'];
$Emp_Contact_NO = $row['Phone_no'];
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Engineering Work Associates</title>
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="stylesheet" href="css/profile.css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css'>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="js/jquery-3.2.1.min.js"></script>
</head>

<body>
    <nav>
        <div class="navbar">
            <div class="container nav-container">
                <input class="checkbox" type="checkbox" name="" id="" />
                <div class="logo" id="fade">
                    <a href="Home.php">
                        <h3>Engineering Work Associates</h3>
                    </a>
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
    <div class="student-profile py-4">
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
                <div class="col-lg-8">
                    <div class="card shadow-sm">
                        <div class="card-header bg-transparent border-0">
                            <h3 class="mb-0"><i class="far fa-clone pr-1"></i>General Information</h3>
                        </div>
                        <div class="card-body pt-0">
                            <table class="table table-bordered">
                                <tr>
                                    <th width="30%">ID </th>
                                    <td width="2%">:</td>
                                    <td><?php echo strtoupper($Customer_ID); ?></td>
                                </tr>
                                <tr>
                                    <th width="30%">Contact Number </th>
                                    <td width="2%">:</td>
                                    <td><?php echo strtoupper($Contact_NO); ?></td>
                                </tr>
                                <tr>
                                    <th width="30%">Email</th>
                                    <td width="2%">:</td>
                                    <td><?php echo strtoupper($Email); ?></td>
                                </tr>
                                <tr>
                                    <th width="30%">Name </th>
                                    <td width="2%">:</td>
                                    <td><?php echo strtoupper($Name); ?></td>
                                </tr>

                                <tr>
                                    <th width="30%">Site Address </th>
                                    <td width="2%">:</td>
                                    <td><?php echo strtoupper($siteaddr); ?></td>
                                </tr>
                                <tr>
                                    <th width="30%">Grade </th>
                                    <td width="2%">:</td>
                                    <td><?php echo strtoupper($grade); ?></td>
                                </tr>
                                <tr>
                                    <th width="30%">Start Date </th>
                                    <td width="2%">:</td>
                                    <td><?php echo strtoupper($startdate); ?></td>
                                </tr>
                                <tr>
                                    <th width="30%">Site Incharge </th>
                                    <td width="2%">:</td>
                                    <td><?php echo strtoupper($siteemp); ?></td>
                                </tr>
                                <tr>
                                    <th width="30%">Site Incharge Contact Number </th>
                                    <td width="2%">:</td>
                                    <td><?php echo strtoupper($Emp_Contact_NO); ?></td>
                                </tr>
                                <tr>
                                    <th width="30%">Site Stats </th>
                                    <td width="2%">:</td>
                                    <td><?php echo strtoupper($sitestat); ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br />
    <table class="table table-bordered">
        <tr>
            <th>Image</th>
        </tr>
        <?php
        $query = "SELECT * FROM `site_img` WHERE `site_img`.`site_id` = '$siteid'";
        //$query = "SELECT * FROM `site_img` where `site_img`.`site_id`='roll_no'";
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
    <section class="picture_det">
        <div class="container">
            <div class="row">
                <div class="col-12">

                </div>
            </div>
        </div>
    </section>
</body>

</html>