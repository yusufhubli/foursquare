<?php
require "connect.php";
//echo $_SERVER['REQUSET_METHOD'];
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $data = file_get_contents("php://input");
    $user = json_decode($data,true);
   // var_dump($user);
   foreach($user as $u){
         $email = $u['email'];
         $pass = $u['password'];
   
         $sql = "SELECT * FROM `clients` WHERE `email`='$email' OR `password`='$pass'";
         $res = mysqli_query($conn,$sql);
         $row = mysqli_fetch_assoc($res);
       if(mysqli_num_rows($res)>0){
               echo $row['cid'];
              // var_dump($row['cid']);
               }else{
                    echo "";
                }
           }    }

?>