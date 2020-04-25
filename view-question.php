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
        <title> Question </title>
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
                    <li class="link"><a href="user-details.php">User</a></li>
                </ul>
            </div>

            <div class="main margin-left-0">
                <div class="container">
                    <?php include_once "get-que.php"; ?>
                    <div class="container-box">
                        <h3 class="title"> <?php echo $title; ?> </h3>
                        <p class="sub-text">
                            <?php echo $que; ?>
                        </p>
                        <?php 
                        if($img!="") {
                        ?>
                        <img src="<?php echo $img; ?>" class="custom-img" alt="">
                        <?php } ?>
                        <div class="form-container">
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>?que_id=<?php echo $que_id;?>" method="post" onsubmit="return validate_ans()" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="">Your Answer</label>
                                    <textarea name="ans" id="ans" cols="30" rows="12" class="form-control" style="resize: none;"></textarea>
                                    <span class="danger" id="ans_error"></span>
                                </div>
                                <div class="form-group">
                                    <label for="">Select Image <span class="sub-title">(Optional)</span></label>
                                    <input type="file" class="form-control" id="img" name="img">
                                    <span class="danger" id="img_error"></span>
                                </div>
                                <input type="submit" value="Post Answer" name="post_ans" class="btn btn-primary">
                            </form>
                        </div>
                        <hr>
                        <?php include_once "get_ans.php"; ?>
                        <?php 
                        while ($row = $ans->fetch_assoc()){
                            $image = "img/ans-img/".$row['img'];
                        ?>
                        <div class="card-container">
                            <div class="ans-card">
                                <div class="avtar">
                                    <a href="user-details.html">
                                        <img src="img/user.png" alt="">
                                    </a>
                                </div>
                                <div class="text">
                                    <p><?php echo $row['ans']; ?></p>
                                    <?php 
                                        if($row['img']!=""){
                                    ?>
                                    <img src="<?php echo $image; ?>" alt="">
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>

        <script src="js/all.js"></script>
    </body>
</html>