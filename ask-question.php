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
        <title> Ask Question </title>
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

            <div class="user-avtar" onclick="toggleDrop()">
                <img src="<?php echo $img; ?>" alt=""> 
                <span class="title"> <?php echo $username; ?> </span>
                <i class="fa fa-angle-down down-arrow" onclick="toggleDrop()"></i>
            </div>
        </header>

        <div class="row">
            <div class="side width-0">
                <ul class="links">
                    <li class="link"><a href="index.php">Home</a></li>
                    <li class="link"><a class="active" href="ask-question.html">Ask Question</a></li>
                    <li class="link"><a href="about.php">About Us</a></li>
                    <li class="link"><a href="user-details.php">User</a></li>
                </ul>
            </div>

            <div class="main margin-left-0">
                <div class="container-box">
                    <h3 class="title">Ask Question</h3>
                    <hr>

                    <div class="form-container">
                        <?php include_once "post_que.php"; ?>
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" id="question_form" onsubmit="return validate_queform()">

                            <div class="form-group">
                                <label for=""> Title </label>
                                <input type="text" name="title" class="form-control" placeholder="Title" id="txttitle">
                                <span id="error_title" class="danger"></span>
                            </div>

                            <div class="form-group">
                                <label for=""> Question </label>
                                <textarea name="que" id="txtque" cols="30" rows="8" class="form-control" style="resize: none;" placeholder="Question ..."></textarea>
                                <span id="error_question" class="danger"></span>
                            </div>
                            
                            <div class="form-group">
                                <label for="">Select Image <span class="sub-title">(optional)</span></label>
                                <input type="file" name="img" class="form-control" id="img">
                                <span class="danger" id="error_img"></span>
                            </div>

                            <div class="form-group">
                                <label for=""> Department </label>
                                <select name="dept" id="dept" class="form-control">
                                    <option value="0">---Select Department---</option>
                                    <option value="Computer">Computer</option>
                                    <option value="EC">EC</option>
                                    <option value="IT">IT</option>
                                    <option value="Civil">Civil</option>
                                </select>
                                <span id="error_dept" class="danger"></span>
                            </div>

                            <input type="submit" value="Post Question" class="btn btn-primary" name="post_que">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script src="js/all.js"></script>
    </body>
</html>