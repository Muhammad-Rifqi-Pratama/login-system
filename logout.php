<?php 
require 'functions.php';
session_start();
// cek session
if(empty($_SESSION["login"])){
    header("location:login.php");
    exit;
}
session_destroy();
$_SESSION = [];
session_unset();
setcookie('key1','',time()-3600);
setcookie('key2','',time()-3600);
header("location:login.php");
exit;
?>