<?php
 require "connect.php";
 if($_SERVER["REQUEST_METHOD"]=="POST"){
    $data = file_get_contents("php://input");
    $user = json_decode($data,true);
 
    foreach($user as $users){
    $id = $users['id'];
    $image = $users['image'];
    $homeName = $users['homeName'];
    $address = $users['address'];
    $price = $users['price'];
    $type = $users['type'];
    $userid=$users['userid'];
    $sql = "INSERT INTO `purchase` (`pid`, `image`, `homeName`, `address`,`price`,`type`,`cid`) VALUES ('$id', '$image', '$homeName', '$address','$price','$type','$userid')";
    $res = mysqli_query($conn,$sql);
   }
   if($res){
     echo "inserted";
   }else{
     echo 'error'.mysqli_error($conn);
    
   }
   header("location:http://localhost/phpprograms/project1/frontend/profile.html");
}
?>