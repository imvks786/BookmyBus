<?php
session_start();
include_once './dbconfig.php';

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
	<li><a href="./admin/admin.php" class="w3-bar-item w3-button">Admin Login</a></li>
	<li><a href="./status.php" class="w3-bar-item w3-button w3-blue">Ticket Status</a></li>
    <li  class="right"><a href="./index.php">Login</a></li>
    <li  class="right"><a href="./signup.php">Signup</a></li>
</ul>
<br>
<div class='w3-container w3-card-4 w3-round' style="width: 500px; margin: 0 auto;">
    <form method='POST' action='<?php echo htmlentities($_SERVER['PHP_SELF']); ?>'>
        Booking ID: <input type='number' class='w3-input' name='book_id' placeholder='BOOKING ID' required></input><br>
        <button type='submit' name='check' class='w3-button w3-blue w3-round'>Check</button>
</form>
</div>
<br>
<br>
<table class='w3-table w3-table-all w3-card'>
        <th>Booking ID</th>
        <th>Passenger Name</th>
        <th>Gender</th>
        <th>Age</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Date Journey</th>
        <th>Status</th>
<?php
if(isset($_POST['check'])){
    $bk_id=$_POST['book_id'];
    $id=0;
    $result=mysqli_query($con,"SELECT * FROM bookings WHERE booking_id=$bk_id");
        if(mysqli_num_rows($result)>0){
		    while($row=mysqli_fetch_array($result)){
            $id=$row['id'];
            echo 
            "<tr>
            <td>".$row['booking_id']."</td>
            <td>".$row['p_name']."</td>
            <td>".$row['gender']."</td>
            <td>".$row['age']."</td>
            <td>".$row['phone']."</td>
            <td>".$row['email']."</td>
            <td>".$row['date_journey']."</td>
            <td style='color:green;background-color:#acf5a6'>".$row['status']."</td>";
            }
        }
        else{ echo "<h3 class='w3-center'>NO DATA FOUND FOR GIVEN BOOKING ID.</h3>";}
if($id==null){}
else{
$r=mysqli_query($con,"SELECT * FROM buses WHERE id=$id");
        if(mysqli_num_rows($r)>0){
		    while($row=mysqli_fetch_array($r)){
                echo 
                "
                <div class='w3-row w3-border'>
                  <div class='w3-container w3-half'>
                    <h3>Booking Details</h3>
                    <span><b>Bus Name:</b> ".$row["bus_name"]."</span><br>
                    <span><b>Source:</b> ".$row["source"]."</span><br>
                    <span><b>Destination:</b> ".$row["destination"]."</span><br>
                </div>
                <div class='w3-container w3-half'>
                    <h3>Bus Timing</h3>
                    <span><b>Arrival:</b> ".$row["arrival"]."</span><br>
                    <span><b>Departure:</b> ".$row["dep"]."</span><br>
                </div>
            </div>";
                }
            }
            else{}
    }
}

?>
</table>
<footer>
<div class="foot w3-center" style="margin-top:200px;">
	<span>Book my Bus &copy; 2021</span>
</div>
</footer>
</body>
</html>