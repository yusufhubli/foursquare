<?php
require "connect.php";
require 'home.php';
if($_SERVER['REQUEST_METHOD']=='GET'){
    $sql = "SELECT *FROM `purchase`";
    $result = mysqli_query($conn,$sql);
    if($result){
    $product = Array();
    while($res = mysqli_fetch_assoc($result)){
    array_push($product,new house($res['pid'],$res['image'],$res['homeName'],$res['address'],$res['price'],$res['type'],$res['cid']));
    }
   echo json_encode($product);
  }
}
?>