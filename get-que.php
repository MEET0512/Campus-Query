<?php

require "connection.php";

$que_id = $title = $que = $img = $views = '';

if(isset($_GET['que_id'])){
    $que_id = $_GET['que_id'];

    $sql = "select que_id,title,que,img,views from question_details where que_id='$que_id'";
    $result = $conn->query($sql);

    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $que_id = $row['que_id'];
        $title = $row['title'];
        $que = $row['que'];
        if($row['img']!="") {
            $img = "img/que-img/".$row['img'];
        }
        $views = $row['views'];
    }
}

if(isset($_GET['view'])) {
    $user_id = $_SESSION['user_id'];
    $sql = "select v_id from que_views where que_id='$que_id' AND user_id='$user_id'";
    $result = $conn->query($sql);

    if(!($result->num_rows > 0)) {
        $views++;

        $sql = "update question_details SET views = '$views' where que_id='$que_id'";
        $conn->query($sql);

        $sql = "insert into que_views values ('','$que_id','$user_id')";
        $conn->query($sql);
    }
}

if(!isset($_GET['que_id']) && !isset($_POST['post_ans'])){
    echo "<script>window.location.href = '/Campus-Query/';</script>";
}

if(isset($_POST['post_ans'])) {
    $ans = $_POST['ans'];
    $user_id = $_SESSION['user_id'];

    $target_dir = "img/ans-img/";
    $target_file = $target_dir . basename($_FILES["img"]["name"]);

    $img_ans = basename($_FILES["img"]["name"]); 

    if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)){

        $sql = "insert into ans_details values ('','$ans','$img_ans','$que_id','$user_id')";

        if($conn->query($sql) === true) {
            echo "<div class='message-box message-sucess' id='alert'>
                    <span class='close' onclick='CloseMsg(\"alert\")'>&times;</span>
                    Your answer is submitted sucessfully.
                </div>";
            echo "<script> document.getElementById('alert').style.top = '1.5%';</script>";
            unset($_POST['post_ans']);
        } else {
            echo "<div class='message-box message-danger' id='alert'>
                    <span class='close' onclick='CloseMsg(\"alert\")'>&times;</span>
                    Error occure while submit answer. try again.
                </div>";
            echo "<script> document.getElementById('alert').style.top = '1.5%';</script>";
        }
    } else {
        echo "<div class='message-box message-danger' id='alert'>
                    <span class='close' onclick='CloseMsg(\"alert\")'>&times;</span>
                    Error occure while submit answer. try again.
                </div>";
        echo "<script> document.getElementById('alert').style.top = '1.5%';</script>";
    }
}
?>