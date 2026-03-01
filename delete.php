<?php 
require 'functions.php';
$id = $_GET["id"];
if(empty($id)){
    header('location:index.php');
    exit;
}
if(delete($id) > 0){
    header("location:index.php");
    exit;
}
?>