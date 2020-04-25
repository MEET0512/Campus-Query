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
        <title>Cumpus Query</title>
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
            <a href="index.php">
                <img src="img/icons/Logo(1)%20.jpg" alt="" class="logo">
            </a>
            <div class="search">
                <label for="searchBox">Search</label>
                <input type="text" placeholder="Search ..." class="Search-Box">
                <i class="fas fa-search search-logo" onclick="search()"></i>
            </div>
            <?php 
            if(isset($_SESSION['user_id'])) {
            ?>
            <div class="user-avtar" onclick="toggleDrop()">
                <img src="<?php echo $img; ?>" alt=""> 
                <span class="title"> <?php echo $username; ?> </span>
                <i class="fa fa-angle-down down-arrow" onclick="toggleDrop()"></i>
            </div>
            <?php 
            } else {
            ?>
            <form action="login.php">
                <button type="submit" class="btn-login">LogIn <i class="fas fa-sign-in-alt"></i> </button>
            </form>
            <?php } ?>
        </header>

        <div class="row">
            <div class="side">
                <ul class="links">
                    <li class="link"><a class="active" href="index.php">Home</a></li>
                    <li class="link"><a href="about.php">About Us</a></li>
                </ul>
            </div>

            <div class="main">
                <?php include_once "get_ques.php"; ?>
                <div class="content">
                    <h2 class="title">
                        Top Questions
                    </h2>
                    <a href="ask-question.php" class="btn-link btn-primary">
                        Ask Question
                    </a>
                    <hr>
                    <div class="container">
                        <?php 
                        while ($row = $result->fetch_assoc()) {
                            $que_id = $row['que_id'];
                            $sql1 = "select ans_id from ans_details where que_id='$que_id'";
                            $count = $conn->query($sql1);
                        ?>
                        <div class="card">
                            <div class="review">
                                <span>
                                    <?php echo $row['views']; ?>
                                    Views
                                </span>
                                <span>
                                    <?php echo $count->num_rows; ?>
                                    Answers
                                </span>
                            </div>
                            <div class="text">
                                <a href="view-question.php?que_id=<?php echo $row['que_id']; ?>&view=y" class="link"><?php echo $row['title']; ?></a>
                                <div class="keyword">
                                    <span>
                                        <a href="#"> <?php echo $row['dept_name']; ?> </a>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <?php 
                        }
                        ?>
                    </div>
                </div>
                <div class="right-side">
                    <div class="card">
                        <h3>
                            Top Department
                        </h3>
                        <ul class="keyword">
                            <li><a href="#"> Computer Department </a></li>
                            <li><a href="#"> Civil Department </a></li>
                            <li><a href="#"> EC Department </a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


        <script src="js/all.js"></script>
        <script>
            window.onclick = function (event) {
                if(!event.target.matches('.user-avtar')) {
                    var menu = document.getElementById('umenu');
                    if(menu.classList.contains('show')) {
                        menu.classList.remove('show');
                    }
                }
            }
        </script>
    </body>
</html>