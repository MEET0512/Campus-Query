<?php 

$host = "localhost";
$username = "root";
$password = "";
$db = "campus_query";

$conn = new mysqli($host, $username, $password, $db);

if($conn->connect_error) {
    die ("Error: ".$conn->connect_error);
}

?>