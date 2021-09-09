<?php
session_start();
include_once './dbconfig.php';
if(!isset($_SESSION['username'])){
	header('location: index.php');
}
unset($_SESSION['id']);
unset($_SESSION['date']);
?>
<html>

<head>
    <title>Confirm Booking</title>
    <link rel='stylesheet' href="w3.css">
</head>

<body>

<div class='w3-container w3-center'>
     <h1 style='color:green;background-color:#acf5a6'><b>SUCCESS!</b></h1>
    <h1>Your Ticket Booked Successfully.</h1>
    <h3>This page will redirect in 5 seconds.</h3>
</div>
<script>
        setTimeout(function(){
            window.location.href = './home.php';
        }, 3000);
</script>
</body>
</html>