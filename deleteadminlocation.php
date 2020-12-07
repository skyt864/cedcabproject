<?php
if(!isset($_SERVER['HTTP_REFERER'])){
    // redirect them to your desired location
    header('location:login.php');
    exit;
}
include('header2.php');
include('ride.php');

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
 
 $id=$key['id'];
 $sql=$ride1->deleteadminlocation($id,$placename,$distance,$Dbcon-> conn );
 
header("location:adminpanel.php");
 	}
 ?>
 <?php

 if(isset($_POST['update']))
 {
 	 $id=$_POST['id'];

 	$name=$_POST['name'];
 	$distance=$_POST['distance'];
 	$available=$_POST['is_available'];
 	$sql=$ride1->updateadminlocation($id,$name,$distance,$available,$Dbcon-> conn );
 	header("location:adminpanel.php");
 }


 ?>

<?php 

include('footer.php');
?>



<!-- <form action=".php" method="POST">
				<strong>place name</strong> : <input type="text" name="name" value="<?php //echo $placename;?>">
				</br>
				</br>
				<strong>distance</strong> : <input type="text" name="distance" value="<?php //echo $distance;?>">
				</br>
				<input type="hidden" name="id" value="<?php //echo $_GET['id'];?>">
				
				</br>
				<input type="submit" name="update" value="update">
			</form> -->