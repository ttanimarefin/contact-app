<?php
include ('db.php');

$id= $_POST['id'];
$name= $_POST['name'];
$email= $_POST['email'];
$phone= $_POST['phone'];
$address= $_POST['address'];
$description= $_POST['description'];

$result = mysqli_query($db,"update clients set name='$name', email='$email', phone='$phone',address='$address',description='$description' where id='$id'");

if ($result==true){
    $_SESSION ['message']='The client update successfully ';
    header('location:index.php');
}
?>