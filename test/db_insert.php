<?php 

require 'db_test.php';

$u_id = "218BECEG024";
$name = "Meet Patel";
$dept_name = "Computer";
$dob = "1999-07-17";
$email = "meet.patel.mp13@gmailcom";
$img = "";

$sql = "INSERT INTO question_details VALUES ('', '$name', '$dept_name', '25', '', '$u_id')";

if( $conn->query( $sql ) === true ) {
    echo "Recored added.";
}else {
    echo "Error: ".$conn->error;   
}

?>