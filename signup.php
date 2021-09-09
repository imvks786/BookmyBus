<?php
session_start();
include_once './dbconfig.php';

if (isset($_POST['submit'])){
	$username=$_POST['username'];
	$password=$_POST['password'];
    $name=$_POST['name'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $address=$_POST['address'];

    $res=mysqli_query($con,"SELECT * FROM users WHERE username='$username'");
    $row=mysqli_num_rows($res);
    if($row>0){
        echo "<script>alert('Username Not Available!');</script>";
    }
    else{
    mysqli_query($con,"INSERT INTO users(name,username,password,phone,email,address) values('$name','$username','$password',$phone,'$email','$address')"); 

    echo "<script>alert('SUCCESSFULL');</script>";
    }
}
?>
<html>
    <head>
        <title>BUS RESERVATION SYSTEM</title>
        <link rel='stylesheet' href='w3.css'>
        <link rel='stylesheet' href='my.css'>
    </head>
<body>
<ul class="topnav">
    <li><a href="./index.php" class="w3-bar-item w3-button w3-red">Bus Bookings</a></li>  
    <li  class="right"><a href="./index.php">Login</a></li>
    <li  class="right"><a href="./signup.php" class="w3-bar-item w3-button w3-blue">Signup</a></li>
</ul>
<div class='w3-container w3-card-4 w3-white w3-round'  style="height:auto;width:500px;margin-top:20px;margin-left:100px;margin-right:100px;">
<form method='POST' action='<?php echo htmlentities($_SERVER['PHP_SELF']); ?>'>
<h3>Register</h3>
    <label for='name'>Full Name</label>
    <input type='text' name='name' class='w3-input' required></input><br>

    <label for='username'>Username</label>
    <input type='text' name='username' id='usr' class='w3-input' required></input><br>

    <label for='password'>Password</label>
    <input type='password' name='password' id='pwd' onblur='leng()' class='w3-input' required></input><span id='txt' style='color:red;'></span><br>

    <label for='c_password'>Confirm Password</label>
    <input type='password' name='c_password' id='cpwd' onblur='check()' class='w3-input' required></input><span id='match' style='color:red;'></span><br>

    <label for='phone'>Phone</label>
    <input type='number' name='phone' class='w3-input' required></input><br>

    <label for='email'>Email</label>
    <input type='email' name='email' class='w3-input' required></input><br>

    <label for='address'>Address</label>
    <textarea type='text' name='address' rows='2' cols='10' class='w3-input' required></textarea><br>

    <button type='submit' class='w3-button w3-round w3-blue' name='submit'>Signup</button>
</form>
<br>
</div>
<br><br>
<script>
    function leng(){
        var len=document.getElementById('pwd').value.length;
        if(len<8){
            document.getElementById('txt').textContent='Password too Weak!';
        }
        else{
            document.getElementById('txt').textContent='';
        }
    }
    function check(){
        var pwd=document.getElementById('pwd').value;
        var cpwd=document.getElementById('cpwd').value;
        if(pwd!=cpwd){
            document.getElementById('match').textContent='Password Not Match!';
        }
        else{
            document.getElementById('match').textContent='';
        }
    }
</script>
<style>
body{
		background-image: url('./static/bk.jpg');
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
