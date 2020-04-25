<?php 

require "connection.php";

$pwd_error = ''; 
$uname_error = '';
$uname = $pwd = '';

if(isset($_POST['login'])){
    $uname = $_POST['uname'];
    $pwd = $_POST['pwd'];
    $sql = "select user_id, password from user_details where username = '$uname'";
    $result = $conn->query($sql);

    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        if($pwd == $row['password']) {
            $_SESSION['user_id'] = $uname;
            echo "<script> window.location.href = '/Campus-Query/'; </script>";
        } else {
            $pwd_error = "Password is not match";
        }
    } else {
        $uname_error = "Username is not available";
        echo "<script> document.getElementById('uname').style.boxShadow = '0px 0px 4px 2px #ff0000'; </script>";
    }
}
?>