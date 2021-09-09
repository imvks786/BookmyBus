<?php
session_start();
if(!isset($_SESSION['username'])){
	header('location: index.php');
}
unset($_SESSION['username']);
unset($_SESSION['id']);
unset($_SESSION['date']);
header('location: index.php');
?>