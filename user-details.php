<?php 
session_start();
if(!isset($_SESSION['user_id'])) {
    header('Location: login.php');
}

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
        <title>User Details</title>
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
            <div class="user-avtar" onclick="toggleDrop()">
                <img src="<?php echo $img; ?>" alt="">
                <span class="title"><?php echo $username; ?></span>
                <i class="fa fa-angle-down down-arrow"></i>
            </div>
        </header>

        <div class="row">
            <div class="side width-0">
                <ul class="links">
                    <li class="link"><a href="index.php">Home</a></li>
                    <li class="link"><a href="ask-question.php">Ask Question</a></li>
                    <li class="link"><a href="about.php">About Us</a></li>
                    <li class="link"><a class="active" href="user-details.php">User</a></li>
                </ul>
            </div>

            <div class="main margin-left-0">
                <div class="container">
                   <?php include_once "get_user.php"; ?>
                    <div class="container-box">
                        <div class="user-img">
                            <img src="<?php echo $img_path; ?>" alt="">
                        </div>
                    </div>
                    <div class="user-details">
                        <h2 class="user-title"> <?php echo $user_name; ?> </h2>
                        <hr>
                        <div class="details">
                            <span class="title">User ID: </span>
                            <span class="sub-title"><?php echo $user_id; ?></span>
                        </div>
                        <div class="details">
                            <span class="title">Name: </span>
                            <span class="sub-title"><?php echo $name; ?></span>
                        </div>
                        <div class="details">
                            <span class="title">Date of Brith: </span>
                            <span class="sub-title"><?php echo $dob; ?></span>
                        </div>
                        <div class="details">
                            <span class="title">Email: </span>
                            <span class="sub-title"><?php echo $email; ?></span>
                        </div>
                        <div class="details">
                            <span class="title">Department: </span>
                            <span class="sub-title"><?php echo $dept; ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="js/all.js"></script>
    </body>
</html>