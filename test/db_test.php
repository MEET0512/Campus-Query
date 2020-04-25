<?php 

$server_name = "localhost";
$user_name = "root";
$password = "";
$database = "campus_query";

$conn = new mysqli($server_name, $user_name, $password, $database);

if( $conn -> connect_error ) {
    die("Connection Failed: ".$conn -> connect_error);
}

echo "Connection sucessfully done.";

?>