<?php
include 'connection.php';
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
    <link rel="stylesheet" href="style.css">
    <script src="jquery-3.6.0.min.js"></script>
    <title>Engineering Works Associates</title>
    </head>
    <?php
        if(isset($_POST['submit'])){
        $uname =mysqli_real_escape_string($con,$_POST['id']);
        $password = mysqli_real_escape_string($con,$_POST['password']);

        //$password=encrypt($password,"786");
        
        if ($uname != " " && $password != " "){
        $sql_val="SELECT password from users where Customer_ID='$uname'";
        $r=mysqli_query($con,$sql_val);
        $ro=mysqli_fetch_assoc($r);
        $pp=$ro['password'];
        $pp=decrypt($pp,"786");//decrypted-password that is stored in database

        if($pp==$password){
            //$sql_query = "SELECT count(*) as cntUser from users where Customer_ID='$uname' AND password='$password'";
            $sql_query = "SELECT count(*) as cntUser from users where Customer_ID='$uname'";
            $result = mysqli_query($con,$sql_query);
            $row = mysqli_fetch_assoc($result);
        }
        else{$row=NULL;}
        $count = $row['cntUser'];
            echo "Number of Rows found in data base = $count <br>";
        if($count > 0){
            $_SESSION['uname'] = $uname;
            header('Location:user_detail.php');
        }
        else{
            echo "Wrong credentials";
        }
    }
}
?>

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
                    <li><a href="login.php">Login</a></li>
                    <li><a href="Appointment.php">Appointment</a></li>
                    <li><a href="contact.php">contact</a></li>
                    <?php
                        if (isset($_SESSION['uname']))
                        {
                            echo '<li><a href="user_detail.php">User details</a></li>';
                        }
                    ?>
                </div>
            </div>
        </div>
    </nav>
    <h1 style="text-align: center; margin-top: 20px;">YOU DREAM IT</h1>
    <section class="header">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-12 mt-auto mb-auto">
                    <div class="section_logo">
                        <a href="Home.php"><img src="./images/Final-Logo.png" alt="logo" width="250px"></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <h1 style="text-align: center;">WE BUILD IT</h1>
    
    <section class="Login">
        <div class="container">
            <div class="row">
                <div class="col-12">

                    <h1 style="text-align: center;">Please Login</h1>
                    <form action="login.php" method="post">
                        <ul id="login_details">
                            <li>
                                <p>
                                    Customer ID:
                                    <input type="number" style="margin-left: 0px;" name="id" id="email_input"
                                        placeholder="ID" />
                                </p>
                            </li>
                            <li>
                                <p>
                                    Password:
                                    <input type="password" name="password" style="margin-left: 16px;"
                                        id="password_input" placeholder="Password" />
                                </p>
                            </li>
                            <input type="submit" id="btn_login" value="login" name="submit" />
                        </ul>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

</html>