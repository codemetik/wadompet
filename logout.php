<?php 
unset($_COOKIE['username']);
setcookie("username","",0,'/');
header("location:index.php");
?>