<?php

include('db.php');

     $name=$_POST['name'];
     $email=$_POST['email'];
     $phone=$_POST['phone'];
     $address=$_POST['address'];
     $description=$_POST['description'];
     $date=date('Y-m-d');

     if(!empty($name)&&!empty($address)&&!(email)){

     

     $sql = "INSERT INTO clients (name,email,phone,address,description,created)VALUES('$name','$email','$phone','$address','$description','$date')";
     var_dump($sql);
     $result=mysqli_query($db,$sql);
     if($result==true){
        header('location:index.php');
     }
   }else{
      echo"must be add name,email,address of client".'<a href="index.php">Go Back</a>';
   }


?>