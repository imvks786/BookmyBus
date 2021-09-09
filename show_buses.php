<?php   
session_start();
include_once './dbconfig.php';
if(!isset($_SESSION['username'])){
	header('location: index.php');
}
if (isset($_POST['submit'])){
    $from=$_POST['from'];
    $to=$_POST['to'];
    $date=$_POST['date'];
    $ndate=date("d-m-Y", strtotime($date));  
}
?>
<html>
    <head>
        <title>Search Results</title>
        <link rel="stylesheet" href="w3.css">
        <link rel="stylesheet" href="my.css">
    </head>
<body>
<ul class="topnav">
<li><a href="./home.php">Bus Bookings</a></li>  
  <li><a href="./home.php" class="w3-bar-item w3-button w3-red">Home</a></li>
  <li><a href="./booking.php" class="w3-bar-item w3-button">My Bookings</a></li>
  <li  class="right"><a href="./logout.php">Logout</a></li>
  <li  class="right"><a href="./help.php">Help</a></li>
</ul>
<div class='w3-container'>

<h1 style="text-align:left;">
    <b>Source: </b><?php echo $from; ?>
    <span style="float:right;">
    <b>Destination: </b><?php echo $to; ?>
    </span>
</h1>
<h2 class='w3-center'>Date of Journey: <?php echo $ndate; ?></h2>
<h1 class='w3-center'><?php if($from==$to){echo "NO BUSES FOUND FOR THIS ROUTE";} ?></h1>

<table class="w3-table w3-table-all w3-card">
        <th>Name</th>
        <th>Source</th>
        <th>Destination</th>
        <th>Departure</th>
        <th>Arrival</th>
        <th>Fare</th>
        <th>Seats Available</th>
        <?php 
		$result=mysqli_query($con,"SELECT * FROM buses WHERE source='$from' and destination='$to'");
        if(mysqli_num_rows($result)>0){
		    while($row=mysqli_fetch_array($result)){
                echo "<tr>
                        <td>".$row['bus_name']."</td>
                        <td>".$row['source']."</td>
                        <td>".$row['destination']."</td>
                        <td>".$row['dep']."</td>
                        <td>".$row['arrival']."</td>
                        <td>Rs.".$row['fare']."</td>";
                        if($row['seat_av']<10){echo "<td><b style='color:red;'>".$row['seat_av']."</b></td>";}
                        else{ echo "<td><b style='color:green;'>".$row['seat_av']."</b></td>";}

                echo   "<form method='POST' action='./confirm.php'>
                        <input name='id' type='hidden' value=".$row['id']."></input>
                        <input name='date' type='hidden' value=".$ndate."></input>
                        <td>";
                        if($row['seat_av']==0){echo "<span style='color:red;background-color:#f5cbcb;'><b>BOOKING CLOSED</b></span>";}
                        else{ echo "<button type='submit' name='book' class='w3-button w3-round w3-green'>Book Now</button>";}
                echo    "</td>
                        </form>
                    </tr>";
            }
        }?>
</table>

</div>
</body>
<footer>
<div class="foot w3-center" style="margin-top:50px;">
	<span>Book my Bus &copy; 2021</span>
</div>
</footer>
</html>