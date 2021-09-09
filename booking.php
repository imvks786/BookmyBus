<?php
session_start();
include_once './dbconfig.php';
if(!isset($_SESSION['username'])){
	header('location: index.php');
}
?>
<html>
    <head>
        <title>Bookings</title>
        <link rel="stylesheet" href="w3.css">
        <link rel="stylesheet" href="./my.css">
    </head>
<body>
<ul class="topnav">
<li><a href="./home.php">Bus Bookings</a></li>  
  <li><a href="./home.php" class="w3-bar-item w3-button">Home</a></li>
  <li><a href="./booking.php" class="w3-bar-item w3-button w3-red">My Bookings</a></li>
  <li  class="right"><a href="./logout.php">Logout</a></li>
  <li  class="right"><a href="./help.php">Help</a></li>
</ul>
<br>
<div class='w3-container'>
    <div class='w3-card w3-center w3-white'>
        <div class='w3-container w3-blue'>
             <h3><b>BOOKING DETAILS</b></h3>
        </div>
        <?php
        $username=$_SESSION['username'];
        $result=mysqli_query($con,"SELECT * FROM bookings WHERE username='$username'");
        if(mysqli_num_rows($result)>0){
		    while($row=mysqli_fetch_array($result)){
            echo 
            "
            <div class='w3-row w3-border'>
                <div class='w3-container w3-half'>
                    <h3>Passenger Details</h3>
                    <h4><b>PASSENGER NAME:</b> ".$row["p_name"]."</h4>
                    <h4><b>AGE:</b> ".$row["age"]."</h4>
                    <h4><b>GENDER:</b> ".$row["gender"]."</h4>
                </div>
                <div class='w3-container w3-half'>
                    <h3>Booking Details</h3>
                    <h4><b>BOOKING ID:</b> ".$row["booking_id"]."</h4>
                    <h4><b>DATE OF JOURNEY:</b> ".$row["date_journey"]."</h4>
                    <h4><b>NO OF SEATS:</b> ".$row["seats"]."</h4>
                </div>
                <div class='w3-container'>
                    <h5 style='color:green;background-color:#acf5a6'>Status: <b>".$row['status']."</b></h5>
                </div>
            </div>";
            }
        }
        ?>
    </div>
</div>
<br>
<br>
<hr>
<style>
body{
		background-image: url('./static/bk1.jfif');
		background-repeat: no-repeat;
		background-size: cover;
	 }

</style>
<div class="foot w3-center">
	<span>Book my Bus &copy; 2021</span>
    <p>BookmyBus All rights reserved</p>
</div>
</body>
</html>