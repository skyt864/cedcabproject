  <?php
if(!isset($_SERVER['HTTP_REFERER'])){
    // redirect them to your desired location
    header('location:login.php');
    exit;
}
include('header2.php');
include('Dbconnection.php');
include('ride.php');
// include('footer.php');

$Dbcon = new Dbconnection();
 $ride1 = new Ridee();  
if(isset($_POST['submit'])){
$id = $_POST['id'];

// echo $id;
$sql=$ride1 -> admincompp($id,$Dbcon-> conn);
// print_r($sql);
} 
//   if (isset($_POST['id'])) {
//   $ID= $_GET['id'];
//   echo $ID;
// }
//   if (('$ID'=='bookid')) {
//   	$sql =$ride1->approve($Dbcon-> conn); 
// echo $sql;
// echo '<script>alert("Request is being approved")</script>';
//   }
//   if (('$ID'=='bookidd')) {
//   $sql=$ride1->disapprove($Dbcon-> conn);
//   echo $sql;
//   echo '<script>alert("Request is being disapproved")</script>';
//   }

//   }
  
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
	<h1>ALL COMPLETED RIDES</h1>
	<br>
	<table>
		<tr>
		<td>serial no.</td>
		<td>ride_date</td>
		<td>pickup</td>
		<td>droploc</td>
		<td>total_distance</td>
			<td>luggage</td>
			<td>total_fare</td>
			
	<p id="para"><a href="adminpanel.php">PRESS THIS TO GO BACK TO YOUR DASH BOARD</a></p>

   <div class="">
   <form action="admincompletedrides.php" method="POST">
       <select name="id" id="btt" >
       <option value="">NO filter </option>
    <option value="1">Date</option>
    <option value="2">Fare</option>
    <option value="3">filter by week</option>
    <option value="4">filter by month</option>
    <option value="5">sort by distance</option>
     </select>
      <input type="submit" value="submit" name="submit">
  </br>
     </form>
 </br>
</div>  
<?php
 $sr=1;
  // if(isset($_POST['submit'])){
    $id = isset($_POST['id'])?$_POST['id']:'';
    $sql=$ride1 -> admincompp($id,$Dbcon-> conn);
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
			echo $key['luggage'];?>kg<?php
		}
		else
		{
		echo "empty";	# code...
		}
		?></td>
		<td>Rs.<?php echo $key['total_fare'];?></td>
		<!-- <td><button onclick="approve()">APPROVE</button><button onclick="disapprove()">DISAPPROVE</button></td> -->
		
	</tr>
<?php } ?>
	</table>
	</table>
</body>

<?php 

include('footer.php');
?>
</html>
</html>