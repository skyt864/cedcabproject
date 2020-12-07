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
// include('locationlist.php');
$ride1 = new Ridee();
$Dbcon = new Dbconnection();

$id=$_GET['id'];
echo $id;
  $sql=$ride1->editadminlocation($id,$Dbcon-> conn );
// print_r($sql);
 foreach($sql as $key)
 {
 	
  $placename=$key['name'];
 $distance=$key['distance'];
 $available=$key['is_available'];	
 	}
 ?>
 <?php

 if(isset($_POST['update']))
 {
 	 $id=$_POST['id'];

 	$name=$_POST['name'];
 	$distance=$_POST['distance'];
 	// if($distance== intval($distance))
 	// {
 	// 	echo '<script>alert("incorrect field")</script>';
 	// }
 	$available=$_POST['available'];
 	$sql=$ride1->updateadminlocation($id,$name,$distance,$available,$Dbcon-> conn );
 	// header("location:adminpanel.php");
 }


 ?>
<form action="editlocation.php" method="POST">
				<strong>place name</strong> : <input type="text" name="name" pattern="^[a-zA-Z ]*$" value="<?php echo $placename;?>" required>
				</br>
				</br>
				<strong>distance</strong> : <input type="number" name="distance" step=".01" value="<?php echo $distance;?>"required>
				</br>
				<strong>is available</strong> : <input type="text" name="available" value="<?php echo $available;?>"required>
				<input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
				
				</br>
				<input type="submit" name="update" value="update">
			</form>
			<?php 

include('footer.php');
?>
