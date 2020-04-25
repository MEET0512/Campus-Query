<?php 

require "db_test.php";

$id = "218BECEG024";
$sql = "select * from question_details where user_id = '$id'";
$result = $conn->query($sql);

while( $row = $result->fetch_assoc() ) {
   /* $date = date_create($row['dob']);
    echo "id: ".$row['user_id']."<br>name: ".$row['name']."<br>department: ".$row['dept_name']."<br>dob: ".date_format($date,"d/m/Y")."<br>email: ".$row['email'];*/
    print_r ($row);
}

?>