  <?php
if(!isset($_SERVER['HTTP_REFERER'])){
    // redirect them to your desired location
    header('location:login.php');
    exit;
}
include('header2.php');
include('Dbconnection.php');
include('ride.php');


$Dbcon = new Dbconnection();
 $ride1 = new Ridee(); 
 if(isset($_POST['submit'])){
$id = $_POST['id'];

// echo $id;
$sql=$ride1 -> adminpendd($id,$Dbcon-> conn);
// print_r($sql);
} 
if (isset($_GET['id'])&&!isset($_GET['action'])) {
	# code...if(($_GET['id'])=='bookid')
{
$id=$_GET['id'];

  $sql = $ride1 -> approveride($id,$Dbcon-> conn); 
// echo $sql;
echo '<script>alert("Request approved")</script>';

  }
}

  if(isset(($_GET['id']))=='bookidd'&&isset($_GET['action']))
{
$id=$_GET['id'];
  $sql = $ride1 -> disapprovride($id,$Dbcon-> conn); 
// echo $sql;
echo '<script>alert("Request is being disapproved")</script>';

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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- <script src="sort.js"></script> -->

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
</br>
<!-- <p>Click the button to sort the table alphabetically, by name:</p> -->
<!-- <p><button onclick="sortTable()">Sort by name and number</button></p> -->


  


	<table id="myTable">
<tr>
            <th>serial no.</th>
		<th>ride_date</th>
		<th>pickup</th>
		<th>droploc</th>
		<th>total_distance</th>
			<th>luggage</th>
			<th>total_fare</th>
			<th>Action</th>
			<th>Action</th>
   </tr>
         
           	<p id="para"><a href="adminpanel.php">PRESS THIS TO GO BACK TO YOUR DASH BOARD</a></p>
             <div class="">
   <form action="adminpendingrides.php" method="POST">
    <select name="id" id="btt" >
       <option value="">NO filter</option>
    <option value="1">Date</option>
    <option value="2">Fare in asc</option>
    <option value="3">Fare in Desc</option>

    <option value="4">filter by week</option>
    <option value="5">filter by month</option>
     <option value="6">sort by Distance</option>
    <!-- <option value="2">Fare</option> -->
<!-- <option value="3">fare</option> -->
   </select>
      <input type="submit" value="submit" name="submit">
     </form>
</div>  
<?php
  $sr=1;
  // if(isset($_POST['submit'])){
    $id = isset($_POST['id'])?$_POST['id']:'';
    $sql=$ride1 -> adminpendd($id,$Dbcon-> conn);
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
			echo $key['luggage'];?>kg<?
		}
		else
		{
		echo "empty";	# code...
		}
		?></td>
		<td>Rs.<?php echo $key['total_fare'];?></td>
		<!-- <td><button onclick="approve()">APPROVE</button><button onclick="disapprove()">DISAPPROVE</button></td> -->
		<td><a href="adminpendingrides.php?id=<?php echo $key['ride_id'];?>" name="bookid">Approve</a></td>
		<td><a href="adminpendingrides.php?action=1&id=<?php echo $key['ride_id'];?>" name="bookidd">DisApprove</a></td>
	</tr>
<?php } ?>
	</table>
</body>

<?php 

include('footer.php');
?>
</html>
