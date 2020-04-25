<?php 

require "connection.php";

$user_id = $name = $dob = $email = $dept = $pwd = $cpwd = $img = $uname = '';
$uerror = '';
$error = false;

if(isset($_POST['register'])) {
    $user_id = $_POST['uid'];
    $name = $_POST['name'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $dept = $_POST['dept'];
    $uname = $_POST['uname'];
    $pwd = $_POST['pwd'];
    $cpwd = $_POST['cpwd'];

    $sql = "select user_id from user_details where user_id = '$user_id'";
    $result = $conn->query($sql);

    if($result->num_rows > 0) {
        $uerror = "already exist id select deferent id";
    } else {
        $target_dir = "img/user-img/";
        $target_file = $target_dir . basename($_FILES["img"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $img = basename($_FILES["img"]["name"]);
        $sql = "insert into user_details values ('$user_id','$name','$dept','$dob','$email','$img','$uname','$pwd')";
        if($conn->query($sql) === true) {
            echo "<script> window.location.href = '/Campus-Query/login.php'; </script>";
            //echo "saved.";
        } else {
            echo "<div class='message-box message-danger' id='alert'>
                    <span class='close' onclick='CloseMsg(\"alert\")'>&times;</span>
                    Error occure while register try again.
                </div>";
            echo "<script> document.getElementById('alert').style.top = '1.5%';</script>";
        }

        if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
            //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";

        } else {
            //echo "Sorry, there was an error uploading your file.";
            echo "<div class='message-box message-danger' id='alert'>
                    <span class='close' onclick='CloseMsg(\"alert\")'>&times;</span>
                    Error occure while register question. try again.
                </div>";
            echo "<script> document.getElementById('alert').style.top = '1.5%';</script>";
        }
    }
}
?>