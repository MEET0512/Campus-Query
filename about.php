<?php 
session_start();

require "connection.php";

$username = ''; 

if(isset($_SESSION['user_id'])) {
    $id = $_SESSION['user_id'];
    $sql = "select name,img from user_details where user_id = '$id'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $username = $row['name'];
    if($row['img']!= "") {
        $img = "img/user-img/".$row['img'];
    } else {
        $img = "img/user.png";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="UTF-8">
        <title>About us</title>
        <link rel="icon" href="img/icons/Logo-min(1).jpg" sizes="152x152" type="image/x-icon">
        <link rel="stylesheet" href="css/style.css">
        <link href='https://fonts.googleapis.com/css?family=Sen' rel='stylesheet'>
        <script type="text/javascript" src="fontawesome/js/all.min.js"></script>
    </head>
    <body>
        <div class="user-menu" id="umenu">
            <a href="user-details.php">View Profile</a>
            <hr>
            <a href="logout.php">Logout</a>
        </div>
        <header>

            <span class="fa fa-bars menu-logo" onclick="toggleMenu()"></span>

            <a href="index.php" class="flex-logo">
                <img src="img/icons/Logo(1)%20.jpg" alt="" class="logo">
            </a>
            <!--
<button class="btn-login">LogIn <i class="fas fa-sign-in-alt"></i> </button>
-->
            <?php 
            if(isset($_SESSION['user_id'])) {
            ?>
            <div class="user-avtar" onclick="toggleDrop()">
                <img src="<?php echo $img; ?>" alt="">
                <span class="title"><?php echo $username; ?></span>
                <i class="fa fa-angle-down down-arrow"></i>
            </div>
            <?php }?>
        </header>

        <div class="row">
            <div class="side width-0">
                <ul class="links">
                    <li class="link"><a href="index.php">Home</a></li>
                    <li class="link"><a href="ask-question.php">Ask Question</a></li>
                    <li class="link"><a class="active" href="about.php">About Us</a></li>
                    <li class="link"><a href="user-details.php">User</a></li>
                </ul>
            </div>

            <div class="main margin-left-0">
                <div class="container">
                    <div class="container-box">
                        <div class="user-img">
                            <img src="img/meet.jpg" alt="">
                        </div>
                    </div>
                    <div class="user-details">
                        <h2 class="user-title"> Meet Patel </h2>
                        <hr>
                        <div class="details">
                            <span class="title">Enrollment no: </span>
                            <span class="sub-title"> 180413107013 </span>
                        </div>
                        <div class="details">
                            <span class="title">Department: </span>
                            <span class="sub-title">Computer</span>
                        </div>
                        <div class="details">
                            <span class="title">Class: </span>
                            <span class="sub-title">TYCE-2</span>
                        </div>
                        <div class="details">
                            <span class="title">Batch:</span>
                            <span class="sub-title">D</span>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="container-box">
                        <div class="user-img">
                            <img src="img/jd.jpg" alt="">
                        </div>
                    </div>
                    <div class="user-details">
                        <h2 class="user-title"> Jaldeep Upadhyay </h2>
                        <hr>
                        <div class="details">
                            <span class="title">Enrollment no: </span>
                            <span class="sub-title"> 180413107024 </span>
                        </div>
                        <div class="details">
                            <span class="title">Department: </span>
                            <span class="sub-title">Computer</span>
                        </div>
                        <div class="details">
                            <span class="title">Class: </span>
                            <span class="sub-title">TYCE-2</span>
                        </div>
                        <div class="details">
                            <span class="title">Batch:</span>
                            <span class="sub-title">D</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="js/all.js"></script>
    </body>
</html>