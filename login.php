<?php
session_start();
include('db.php');
include('header.php');

if(isset($_POST['btnLogin'])){
	$username = $_POST['username'];
	$password =$_POST['password'];
	$epassword = md5($password);
	$sql = "SELECT username,password FROM users WHERE username='$username' AND password='$epassword'";
	$results = mysqli_query($db,$sql);

	if(mysqli_num_rows($results)>0){
		$_SESSION['username'] = $_POST['username'];
		header('Location:index.php');
	}else{
		echo"Invalid username/password";
		header('Location:login.php');
	}
}


?>