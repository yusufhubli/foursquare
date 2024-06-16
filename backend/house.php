<?php
  require './home.php';
  require "connect.php";
   if($_SERVER['REQUEST_METHOD']=='GET'){
   $sql = "SELECT *FROM `house`";
   $result = mysqli_query($conn,$sql);
   if($result){
   $product = Array();
   while($res = mysqli_fetch_assoc($result)){
   array_push($product,new home($res['id'],$res['image'],$res['homeName'],$res['address'],$res['price'],$res['type'],$res['builtup_area'],$res['total_area'],$res['owner'],$res['about_home'],$res['agent'],$res['number']));
   }
  echo json_encode($product);
 }
}
?>