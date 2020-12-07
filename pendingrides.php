 <?php
 if(!isset($_SERVER['HTTP_REFERER'])){
    // redirect them to your desired location
    header('location:login.php');
    exit;
}
include('header2.php');
include('ride.php');
// include('footer.php');
include('Dbconnection.php');
$ride1 = new Ridee();
$Dbcon = new Dbconnection();

if(isset($_POST['submit'])){
$id = $_POST['id'];

// echo $id;
$sql=$ride1 -> pendride($id,$Dbcon-> conn);
// print_r($sql);
}
if(isset($_GET['id']))
{
	$id=$_GET['id'];
	$sql=$ride1->deletepend($id,$Dbcon->conn);
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
	
	margin-right: 15px;
}	
</style>
<body>
	<h1>PENDING RIDES</h1>
<br>
	
	<table>
		<tr>
	   <th>serial no</th>
		<th>ride_date</th>
		<th>pickup</th>
		<th>droploc</th>
		<th>total_distance</th>
			<th>luggage</th>
			<th>total_fare</th>
			<th>Action</th>
<p id="para"><a href="newuserpanel.php">PRESS THIS TO GO BACK TO YOUR DASH BOARD</a></p>
<div class="">
   <form action="pendingrides.php" method="POST">
    <select name="id" id="btt" >
       <option value="">SORT </option>
    <option value="1">Date</option>
    <option value="2">Fare in asc</option>
    <option value="3">Fare in desc</option>
    <option value="4">filter by week</option>
    <option value="5">filter by month</option>
    <option value="6">distance</option>
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
  $sql=$ride1 -> pendride($id,$Dbcon-> conn);
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
			echo $key['luggage'];?>KG<?
		}
		else
		{
		echo "empty";	# code...
		}
		?></td>
		<td>Rs.<?php echo $key['total_fare'];?></td>
		<td><a href="pendingrides.php?id=<?php echo $key['ride_id']; ?>">Delete</a></td>
		
	</tr>
<?php } ?>
	</table>
</body>

<?php 

include('footer.php');
?>
</html>