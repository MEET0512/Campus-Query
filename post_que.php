<?php

require "connection.php";

$title = $que = $dept = '';

if(isset($_POST['post_que'])) {
    $title = $_POST['title'];
    $que = $_POST['que'];
    $dept = $_POST['dept'];
    $id = $_SESSION['user_id'];

    $target_dir = "img/que-img/";
    $target_file = $target_dir . basename($_FILES["img"]["name"]);

    $img = basename($_FILES["img"]["name"]); 

    if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
        $sql = "insert into question_details values ('','$title','$que','$dept','0','$img','$id')";

        if($conn->query($sql) === true) {
            echo "<div class='message-box message-sucess' id='alert'>
                    <span class='close' onclick='CloseMsg(\"alert\")'>&times;</span>
                    Your Question is submitted sucessfully.
                </div>";
            echo "<script> document.getElementById('alert').style.top = '1.5%';</script>";
        } else {
            echo "<div class='message-box message-danger' id='alert'>
                    <span class='close' onclick='CloseMsg(\"alert\")'>&times;</span>
                    Error occure while submit question. try again.
                </div>";
            echo "<script> document.getElementById('alert').style.top = '1.5%';</script>";
        }
    } else {
        echo "<div class='message-box message-danger' id='alert'>
                    <span class='close' onclick='CloseMsg(\"alert\")'>&times;</span>
                    Error occure while submit question. try again.
                </div>";
        echo "<script> document.getElementById('alert').style.top = '1.5%';</script>";
    }
}

?>