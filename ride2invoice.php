 <?php
 if(!isset($_SERVER['HTTP_REFERER'])){
    // redirect them to your desired location
    header('location:login.php');
    exit;
}
include('header.php');
include('ride.php');
include('Dbconnection.php');
$ride1 = new Ridee();
$Dbcon = new Dbconnection();
// include('footer.php');
if (isset($_GET['id'])) {
  # code...

   $id=$_GET['id'];

// echo $id;
  $sql = $ride1 -> userinvoice($id, $Dbcon-> conn);

 foreach ($sql as $key) {


		?>
	<tr>
		
	 DATE	<td><?php echo $key['ride_date'];?></td>
	</br>
	pickup	<td><?php echo $key['pickup'];?></td>
		</br>
	DROP	<td><?php echo $key['droploc'];?></td>
		</br>
	total distance	<td><?php echo $key['total_distance'];?>km</td>
		</br>
	Luggage	<td><?php if ($key['luggage']) {
			echo $key['luggage'];?>kg<?php
		}
		else
		{
		echo "empty";	# code...
		}
	}
}
		?></tr>

       
  






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<!--    <link rel="stylesheet" type="text/css" href="pendingridescss.css"> -->
</head>
<style>
  
table, th, td {
        border: 2px solid #6e2f2f;
        border-collapse: collapse;
        width: 100%;
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
.showtable{
  background-color: yellow;
  color:red;
  padding:15px;
  border-style: double;
  border-radius: 20px;
} 
.printtable{
  margin-left: 500px;
  background-color: lightgreen;
  color:red;
  padding:15px;
  border-style: double;
  border-radius: 20px;

}
</style>
<body>
    </br>
  </br>
    <p id="para"><a href="completedrides.php">PRESS THIS TO GO BACK TO YOUR DASH BOARD</a></p>
    </tr>
   
<!-- <a href="ride2invoice.php?action=1&id=<?php //echo  $key['ride_id'];?>" class="showtable">Show Table</a> -->
<a href="ride2invoice.php?action=1&id=<?php echo  $key['ride_id'];?>" class="showtable"onclick="window.print()">PRINT</a>
	</table>
</body>


<?php 

include('footer2.php');
?>

</html>