<?php
require "connect.php";
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $id = $_POST['id'];
    $name = $_POST['name'];   
    $image = $_FILES['image']['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
        echo $id;
         $sql = "SELECT *FROM `clients` WHERE `cid` ='$id'";
         $res = mysqli_query($conn,$sql);
         if(mysqli_num_rows($res)>0){
            $insert =  "UPDATE `clients` SET `image` = '$image',`name` = '$name', `email` = '$email', `phone` = '$phone' WHERE `clients`.`cid` = '$id'"; 
            $res2 =mysqli_query($conn,$insert);
            if($res2){
            move_uploaded_file($_FILES['image']['tmp_name'],"C:/xampp/htdocs/phpprograms/project1/frontend/profile/$image");
           // echo "<script>alert('inserted')</script>";
            }
         }else{
          //  echo mysqli_error($conn);
         }
    // "INSERT INTO `house` (`image`,`name`,`email`,`phone`) VALUES ('$image','$name','$email','$phone')"
        }
        header("location:http://localhost/phpprograms/project1/frontend/profile.html");
?>
