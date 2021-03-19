<?php
include('db.php');
include('header.php');

// $id = $_GET['name'];

// $id = (isset($_GET['name']) ? $_GET['name'] : '');

if(isset($_GET['name'])){
    $id = $_GET['name'];
}else{
    $id = '';
}


echo $id;