<?php
require "connect.php";
if($_SERVER['REQUEST_METHOD'] == "POST"){
   $data = file_get_contents("php://input");
    $user = json_decode($data,true);
  
    $sql = "DELETE FROM `purchase` WHERE `purchase`.`pid` = '$user'";
    $res = mysqli_query($conn,$sql);
   
}
?>


<!DOCTYPE html>

<html>

<head>
    <title>house update</title>
</head>

<body>
    <label for="">agent</label>
    <input type="text" name="agent">

    <br>

    <label for="">phone number</label>
    <input type="text" name="phone">

    <br>
</body>
</html>