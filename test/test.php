<?php 
    $date = $_GET['date'];
    echo $date;
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <form action="test.php">
            <input type="date" name="date">
            <input type="submit" value="Go">
    </form>
</body>
</html>