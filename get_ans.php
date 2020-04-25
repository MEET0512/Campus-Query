<?php
 require "connection.php";

$sql = "select ans_id,ans,user_id,img from ans_details where que_id='$que_id' ORDER BY ans_id desc";

$ans = $conn->query($sql);
?>