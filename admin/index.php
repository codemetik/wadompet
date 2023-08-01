<?php 
session_start();

if (!isset($_SESSION['agent'])) {
	header('location:../index.php');
}
?>