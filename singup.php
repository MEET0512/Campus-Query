<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title> Register </title>
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
                    <h2 class="title">SingUp</h2>
                    <hr>
                    <?php include_once "register_user.php"; ?>
                    <div class="form-container">
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" onsubmit="return validate_singup()">
                            <div class="form-group">
                                <label for="">User Id <span class="sub-title">(e.g. 18BECEG001)</span></label>
                                <input type="text" name="uid" class="form-control" id="user_id" value="<?php echo $user_id; ?>" onblur="getUname()">
                                <span class="danger" id="id_error"><?php echo $uerror; ?></span>
                            </div>
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" name="name" class="form-control" id="name" value="<?php echo $name; ?>">
                                <span class="danger" id="name_error"></span>
                            </div>
                            <div class="form-group">
                                <label for="">Date of Brith</label>
                                <input type="date" name="dob" class="form-control" id="dob" value="<?php echo $dob; ?>">
                                <span class="danger" id="dob_error"></span>
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" name="email" class="form-control" id="email" value="<?php echo $email; ?>">
                                <span class="danger" id="email_error"></span>
                            </div>
                            <div class="form-group">
                                <label for="">Department</label>
                                <select name="dept" id="dept" class="form-control" value="<?php echo $dept; ?>">
                                   <option value="0">---- Select department ----</option>
                                    <option value="Computer">Computer</option>
                                    <option value="Civil">Civil</option>
                                    <option value="EC">EC</option>
                                    <option value="Electrical">Electrical</option>
                                    <option value="Mecanical">Mecanical</option>
                                </select>
                                <span class="danger" id="dept_error"></span>
                            </div>
                            <div class="form-group">
                                <label for="">Username</label>
                                <input type="text" name="uname" id="uname" class="form-control" value="<?php echo $uname; ?>">
                                <span class="danger" id="uname_error"></span>
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" name="pwd" class="form-control" id="pwd">
                                <span class="danger" id="pwd_error"></span>
                            </div>
                            <div class="form-group">
                                <label for="">Conform Password</label>
                                <input type="password" name="cpwd" class="form-control" id="cpwd">
                                <span class="danger" id="cpwd_error"></span>
                            </div>
                            <div class="form-group">
                                <label for="">User Image</label>
                                <input type="file" name="img" class="form-control" id="img" value="<?php echo $img; ?>">
                                <span class="danger" id="img_error"></span>
                            </div>
                            <input type="submit" name="register" value="Register" class="btn btn-primary">
                        </form>
                        <span>
                            Already have account? <a href="login.php" class="link-outline link-outline-secondary link-secondary">LogIn</a>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <script src="js/all.js"></script>
        <?php 
            if($uerror != "") {
                 echo "<script> document.getElementById('user_id').style.boxShadow = '0px 0px 4px 2px #ff0000'; </script>";
            } else {
                 echo "<script> document.getElementById('pwd').style.boxShadow = ''; </script>";
            }
            
            if($error) {
                echo "<script> showMsg('signup-alert'); </sctipt>";
            }
        ?>
    </body>
</html>