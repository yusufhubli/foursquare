<?php
  require './home.php';
  require "connect.php";
   if($_SERVER['REQUEST_METHOD']=='GET'){
   $sql = "SELECT *FROM `clients`";
   $result = mysqli_query($conn,$sql);
   if($result){
   $product = Array();
   while($res = mysqli_fetch_assoc($result)){
   array_push($product,new users($res['cid'],$res['image'],$res['name'],$res['email'],$res['phone']));
   }
  echo json_encode($product);
 }
}
?>