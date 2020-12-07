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

$Dbcon = new Dbconnection();
 $ride1 = new Ridee();
 if (isset($_GET['id'])) {
    $id=$_GET['id'];
   }  
 
if(isset($_GET['id'])=='delete')
{

  $sql = $ride1 -> deletelocation($Dbcon-> conn); 
echo $sql;
echo '<script>alert("Request is being approved")</script>';

  }

  if(isset($_GET['id'])=='edit')
{

  $sql = $ride1 -> editlocation($Dbcon-> conn); 
echo $sql;
echo '<script>alert("Request is being disapproved")</script>';

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
	<h1>admin Location List</h1>
	
	<table>
		<tr>
		<td>id</td>
		<td>place name</td>
		<td>distance</td>
		
		<td>is_available</td>
		<td>Action</td>
		<td>Action</td>
	
	</tr>
	<br>
    <p id="para"><a href="adminpanel.php">PRESS THIS TO GO BACK TO YOUR DASH BOARD</a></p>
	<?php


	$sql=$ride1->locationlist($Dbcon-> conn);
	// print_r($sql);
	// echo $sql;
	// exit();
	foreach ($sql as $key) {

		?>
	<tr>
		<td><?php echo $key['id'];?></td>
		<td><?php echo $key['name'];?></td>
		<td><?php echo $key['distance'];?></td>
		<td><?php if($key['is_available'])
		{
			echo "is_available";
		}
		else
		{
			echo "not is_available";
		}




		;?></td>
		<td><a href="deleteadminlocation.php?id=<?php echo $key['id']?>"><input type='submit' value='Delete'></a></td>
		<td><a href="editlocation.php?id=<?php echo $key['id']?>"><input type='submit' value='Edit'></a></td>
      
	</tr>
<?php } ?>
	</table>
</body>
<?php 

include('footer2.php');
?>
</html>