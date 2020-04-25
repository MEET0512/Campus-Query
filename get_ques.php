<?php

require "connection.php";

$sql = "select * from question_details ORDER BY que_id desc";
$result = $conn->query($sql);

?>