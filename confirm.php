<?php
session_start();
include_once './dbconfig.php';
if(!isset($_SESSION['username'])){
	header('location: index.php');
}
if (isset($_POST['book'])) {
    $id = $_POST['id'];
    $_SESSION['id']=$id;
    $date = $_POST['date'];
    $_SESSION['date']=$date;
}
if (isset($_POST['confirm'])) {
    $username=$_SESSION['username'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $ids=$_SESSION['id'];
    $dates=$_SESSION['date'];

    mysqli_query($con, "INSERT INTO bookings(id,username,p_name,gender,age,seats,date_journey,status,phone,email) VALUES($ids,'$username','$name','$gender',$age,1,'$dates','BOOKED','$phone','$email')");
    mysqli_query($con,"UPDATE buses SET seat_av=(seat_av-1) WHERE id=$ids");
    header('location: success.php');
}

?>
<html>

<head>
    <title>Confirm Booking</title>
    <link rel='stylesheet' href="w3.css">
    <link rel='stylesheet' href="my.css">
</head>

<body>
    <ul class="topnav">
        <li><a href="./home.php">Bus Bookings</a></li>
        <li><a href="./home.php" class="w3-bar-item w3-button w3-red">Home</a></li>
        <li><a href="./booking.php" class="w3-bar-item w3-button">My Bookings</a></li>
        <li class="right"><a href="./logout.php">Logout</a></li>
        <li class="right"><a href="./help.php">Help</a></li>
    </ul>
    <br>
    <div class='w3-container w3-card-4'>
        <div class='w3-center'>
            <h1>CONFIRM YOUR BOOKING</h1>
            <span><?php echo $date; ?></span>
        </div>
        <form method='POST' action='<?php echo htmlentities($_SERVER['PHP_SELF']); ?>'>
            <div class='w3-row w3-border'>
                <div class='w3-container w3-half'>
                <h2>Passenger Information</h2>
                    Full Name <input type='text' name='name' class='inp_box' style='width:30%' placeholder='Name' required></input><br>

                    Age <input type='number' name='age' class='inp_box' placeholder='Age' style='width:10%' required></input><br>

                    <label for='gender'>Gender</label><br>
                    <input type="radio" name="gender" value="Male" required>
                    <label for="gender1">Male</label><br>
                    <input type="radio" name="gender" value="Female" required>
                    <label for="gender2">Female</label><br>
                </div>
                <div class='w3-container w3-half'>
                    <h2>Contact Details</h2>
                    Phone <input type='number' name='phone' class='inp_box' style='width:50%' placeholder='Phone' required></input><br>
                    Email <input type='email' name='email' class='inp_box' placeholder='Email' style='width:50%' required></input><br>
                </div>
            </div>
            <br>
            <div class='w3-center'>
                <button type='submit' name='confirm' class='w3-button w3-round w3-green'>Confirm</button>
            </div>
        </form>
    </div>
<style>
    .inp_box{
	width: 350px;
	border-radius:25px;
	outline: none;
	padding: 10px 10px;
	border:1px solid blue;
	margin: 8px 0;
	box-sizing: border-box;
}
</style>
</body>
<footer>
<div class="foot w3-center" style="margin-top:50px;">
	<span>Book my Bus &copy; 2021</span>
</div>
</footer>
</html>
