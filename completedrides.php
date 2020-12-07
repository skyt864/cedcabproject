 <?php
 if(!isset($_SERVER['HTTP_REFERER'])){
    // redirect them to your desired location
    header('location:login.php');
    exit;
}
include('header2.php');
include('ride.php');
include('Dbconnection.php');
// include('footer.php');
$ride1 = new Ridee();
$Dbcon = new Dbconnection();
if(isset($_POST['submit'])){
$id = $_POST['id'];

// echo $id;
$sql=$ride1 -> completedusersridessort($id,$Dbcon-> conn);
// print_r($sql);
}


?> 


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
<!-- 	<link rel="stylesheet" type="text/css" href="pendingridescss.css"> -->
</head>
<style>
table, th, td {
        border: 2px solid #6e2f2f;
        border-collapse: collapse;
      
        background-color: lightgrey;
      }
      th, td {
        padding: 10px;
      }
</style>
<style>
#para a
{
	color:red;
	
	margin-right: 1px;
}	
</style>
<body>
	
	<h1>User COMPLETED RIDES</h1>
  <br>
  <br>
	<!-- <label for="">Sort</label>
        <select id="sortData">
            <option value="">---Select---</option>
            <option value="ride_date">By Ride Date</option>
            <option value="total_fare">By Fare</option>
        </select>
        <label for="">Filter</label>
        <select id="filterData">
            <option value="">---Select---</option>
            <option value="week">Last Week</option>
            <option value="month">Last Month</option>
            
        </select>
        <div id="Rideresult"></div>
   -->
</select>
	<table id="myTable">
		<tr>
		<td>tbl_ride</td>
		<td>ride_date</td>
		<td>pickup</td>
		<td>droploc</td>
		<td>total_distance</td>
			<td>luggage</td>
			<td>total_fare</td>
			<td>Invoice</td>
	<p id="para"><a href="newuserpanel.php">PRESS THIS TO GO BACK TO YOUR DASH BOARD</a></p>
	<div class="">
   <form action="completedrides.php" method="POST">
    <select name="id" id="btt" >
       <option value="">NO filter </option>
    <option value="1">Date</option>
    <option value="2">Fare</option>
    <option value="3">filter by week</option>
    <option value="4">filter by month</option>
     <option value="5">distance</option>
    <!-- <option value="2">Fare</option> -->
<!-- <option value="3">fare</option> -->
   </select>
      <input type="submit" value="submit" name="submit">
     </form>
</div>   
	</tr>
	<?php

	$sr=1;
	$id = isset($_POST['id'])?$_POST['id']:'';
  $sql=$ride1 -> completedusersridessort($id,$Dbcon-> conn);
	 // print_r($sql);
	// echo $sql;
	// exit();
	foreach ($sql as $key) {

		?>
	<tr>
		<td><?php echo $sr++;?></td>
		<td><?php echo $key['ride_date'];?></td>
		<td><?php echo $key['pickup'];?></td>
		<td><?php echo $key['droploc'];?></td>
		<td><?php echo $key['total_distance'];?>km</td>
		<td><?php if ($key['luggage']) {
			echo $key['luggage'];
		}
		else
		{
		echo "empty";	# code...
		}
		?></td>
		<td>Rs.<?php echo $key['total_fare'];?></td>
		<td><a href="ride2invoice.php?action=1&id=<?php echo  $key['ride_id'];?>" class="showtable">invoice</a></td>
		
	</tr>
<?php } ?>
	</table>
</body>


<?php 

include('footer2.php');
?>

</html>