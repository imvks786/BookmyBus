<?php
session_start();
include_once '../dbconfig.php';
if(isset($_SESSION['username'])){
	header('location: home.php');
}
if(isset($_POST['login'])){
	$usr=$_POST['username'];
	$pwd=$_POST['password'];
		$ret=mysqli_query( $con, "SELECT * FROM admin WHERE userid='$usr' AND password='$pwd' "); 
		$row = mysqli_fetch_assoc($ret); 
		
		if(!$row) { 
		?>
			<script>
			alert("Username or Password Invaild !");
			window.open("./admin.php","_self")
			</script>
			
		<?php
			}
		else {
			$_SESSION['admin']=$usr;
			?>
			<script>
			alert("Login Successful!");
			window.open("./dashboard.php","_self")
			</script>
		<?php
			} 
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
    <li><a href="./index.php" class="w3-bar-item w3-button w3-red">Bus Bookings</a></li>  
	<li><a href="./admin/admin.php" class="w3-bar-item w3-button">Admin Login</a></li>
	<li><a href="../index.php" class="w3-bar-item w3-button">User Login</a></li>
</ul>
<br>

<div class='w3-container w3-card-4 w3-white w3-round' style="height: 400px;width: 320px;margin-top: 80px;margin-left:100px;margin-right:100px;">
<h4>Admin Login</h4><hr>
<form method='POST' action='<?php echo htmlentities($_SERVER['PHP_SELF']); ?>'>
    <label for='username'>Username</label>
    <input type='text' name='username'class='w3-input' required></input><br>

    <label for='password'>Password</label>
    <input type='password' name='password' class='w3-input' required></input><br>

    <button type='submit' name='login' class='w3-button w3-blue w3-round'>Login</button>
</form>
</div>
<style>
body{
		background-image: url('../static/bk.jpg');
		background-repeat: no-repeat;
		background-size: cover;
	 }
</style>
</body>
<footer>
<div class="foot w3-center" style="margin-top:200px;">
	<span>Book my Bus &copy; 2021</span>
</div>
</footer>
</html>