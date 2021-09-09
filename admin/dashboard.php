<?php
session_start();
include_once '../dbconfig.php';
if(!isset($_SESSION['admin'])){
	header('location: admin.php');
}

?>
<html>
    <head>
        <title>Admin Login</title>
        <link rel='stylesheet' href='../w3.css'>
        <link rel='stylesheet' href='../my.css'>
    </head>
<body>
<ul class="topnav">
    <li><a href="./dashboard.php" class="w3-bar-item w3-button w3-red">Bus Bookings</a></li>
    <li  class="right"><a href="./admin_logout.php">Logout</a></li>  
</ul>
<br>
<div class='w3-container'>
    <div class='w3-card w3-center w3-white'>
        <div class='w3-container w3-blue'>
             <h3><b>BOOKING DETAILS</b></h3>
        </div>
        <table class="w3-table w3-table-all w3-card">
        <th>Booking ID</th>
        <th>Passenger Name</th>
        <th>Gender</th>
        <th>Age</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Date Journey</th>
        <th>Status</th>
        <?php
        $result=mysqli_query($con,"SELECT * FROM bookings");
        if(mysqli_num_rows($result)>0){
		    while($row=mysqli_fetch_array($result)){
            echo 
            "<tr>
            <td>".$row['booking_id']."</td>
            <td>".$row['p_name']."</td>
            <td>".$row['gender']."</td>
            <td>".$row['age']."</td>
            <td>".$row['phone']."</td>
            <td>".$row['email']."</td>
            <td>".$row['date_journey']."</td>
            <td>".$row['status']."</td>";
            }
        }
        ?>
    </div>
</div>