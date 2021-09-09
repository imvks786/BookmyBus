<?php
session_start();
if(!isset($_SESSION['admin'])){
	header('location: admin.php');
}
unset($_SESSION['admin']);
header('location: admin.php');
?>