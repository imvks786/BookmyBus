<?php
session_start();
include_once './dbconfig.php';
if(!isset($_SESSION['username'])){
	header('location: index.php');
}
?>
<html>
    <head>
        <title>BUS RESERVATION SYSTEM</title>
        <link rel="stylesheet" href="w3.css">
        <link rel="stylesheet" href="my.css">
    </head>
<body>
<ul class="topnav">
<li><a href="./home.php">Bus Bookings</a></li>  
  <li><a href="./home.php" class="w3-bar-item w3-button w3-red">Home</a></li>
  <li><a href="./booking.php" class="w3-bar-item w3-button">My Bookings</a></li>
  <li><a href="./status.php" class="w3-bar-item w3-button">Ticket Status</a></li>
  <li  class="right"><a href="./logout.php">Logout</a></li>
  <li  class="right"><a href="./logout.php">Help</a></li>
  <li  class="right w3-bar-item w3-button w3-white"><?php echo $_SESSION['username']; ?></li>
</ul>
<br>
<div class='w3-card-4 w3-center w3-white w3-round' style='width: 500px; margin: 0 auto; background: #000; color: #fff;'>
<div class='w3-container w3-red w3-round'>
    <h1>Book Your Bus Now</h1>
</div>
<form method='POST' action='./show_buses.php'>
    <label for='from'><b>From</b></label>
    <select name='from' class='w3-input'>
        <option value="Delhi">Delhi</option>
        <option value="Agra">Agra</option>
        <option value="Amritsar">Amritsar</option>
        <option value="Jaipur">Jaipur</option>
        <option value="Lucknow">Lucknow</option>
    </select>
    <label for='to'><b>To</b></label>
    <select name='to' class='w3-input'>
        <option value="Delhi">Delhi</option>
        <option value="Agra">Agra</option>
        <option value="Amritsar">Amritsar</option>
        <option value="Jaipur">Jaipur</option>
        <option value="Lucknow">Lucknow</option>
    </select>
    <label for='date'><b>Journey Date</b></label>
    <input type='date' name='date' class='w3-input' required></input><br>

    <button type='submit' name='submit' class='w3-button w3-red w3-round'>Search</button>
</form>
<br>
</div>
<style>
body{
		background-image: url('./static/bk1.jfif');
		background-repeat: no-repeat;
		background-size: cover;
	 }

</style>
</body>
<footer>
<div class="foot w3-center" style="margin-top:50px;">
	<span>Book my Bus &copy; 2021</span>
</div>
</footer>
</html>
