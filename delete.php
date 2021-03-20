<?php
include('session.php');
include('db.php');

$id=$_GET['id'];
$sql = "DELETE FROM clients WHERE id  ='$id'";
$result = mysqli_query($db,$sql);

$_SESSION['message'] ="The client successfully delete";
header('Location:index.php');