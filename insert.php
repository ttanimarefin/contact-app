<?php

include('db.php');

if(isset($_POST['btnsubmit'])){
     $name=$_POST['name'];
     $email=$_POST['email'];
     $phone=$_POST['phone'];
     $address=$_POST['address'];
     $description=$_POST['description'];
     $date=date('Y-m-d');

     $sql = "INSERT INTO clients(name,email,phone,address,description,created)VALUES('$name','$email','$phone','$address','$description','$date')";
     
     $result=mysqli_query($db,$sql);
     if($result==true){
        header('location:index.php');
     }

}

?>