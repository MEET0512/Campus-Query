<?php

require "connection.php";

$user_id = $name = $dept = $dob = $email = $img = $user_name = '';

$id = $_SESSION['user_id'];

$sql = "select * from user_details where user_id = '$id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$user_id = $row['user_id'];
$name = $row['name'];
$dept = $row['dept_name'];
$email = $row['email'];
$user_name = $row['username'];
$img = $row['img'];
if($row['img']!= "") {
    $img_path = "img/user-img/".$row['img'];
} else {
    $img_path = "img/user.png";
}
$date = date_create($row['dob']);
$dob = date_format($date,'d-m-Y');
?>