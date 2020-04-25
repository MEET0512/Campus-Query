<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title> Login </title>
        <link rel="icon" href="img/icons/Logo-min(1).jpg" sizes="152x152" type="image/x-icon">
        <link rel="stylesheet" href="css/style.css">
        <link href='https://fonts.googleapis.com/css?family=Sen' rel='stylesheet'>
        <script type="text/javascript" src="fontawesome/js/all.min.js"></script>
    </head>
    <body>
        <header>

            <span class="fa fa-bars menu-logo" onclick="toggleMenu()"></span>

            <a href="index.php" class="flex-logo">
                <img src="img/icons/Logo(1)%20.jpg" alt="" class="logo">
            </a>

        </header>

        <div class="row">
            <div class="side width-0">
                <ul class="links">
                    <li class="link"><a href="index.php">Home</a></li>
                    <li class="link"><a href="ask-question.php">Ask Question</a></li>
                    <li class="link"><a href="about.php">About Us</a></li>
                </ul>
            </div>

            <div class="main margin-left-0">
                <div class="container-box">
                    <h2 class="title">LogIn</h2>
                    <hr>
                    <?php include_once "login-varify.php"; ?>
                    <div class="form-container">
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" onsubmit="return validate_login()">
                            <div class="form-group">
                                <label for="">Username</label>
                                <input type="text" class="form-control" name="uname" autocomplete="off" id="uname" value="<?php echo $uname; ?>">
                                <span id="uname_error" class="danger"><?php echo $uname_error; ?></span>
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" class="form-control" id="pwd" name="pwd">
                                <span id="pwd_error" class="danger"> <?php echo $pwd_error; ?></span>
                            </div>
                            <input type="submit" name="login" value="LogIn" class="btn btn-primary">
                        </form>
                        <span>
                            Do not have account? <a href="singup.html" class="link-outline link-secondary link-outline-secondary">SingUp</a>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <script src="js/all.js"></script>
        
        <?php 
            if($pwd_error != "") {
                echo "<script> document.getElementById('pwd').style.boxShadow = '0px 0px 4px 2px #ff0000'; </script>";
            } else {
                echo "<script> document.getElementById('pwd').style.boxShadow = ''; </script>";
            }
        
            if($uname_error != "") {
                echo "<script> document.getElementById('uname').style.boxShadow = '0px 0px 4px 2px #ff0000'; </script>";
            } else {
                echo "<script> document.getElementById('uname').style.boxShadow = ''; </script>";
            }
        ?>
    </body>
</html>