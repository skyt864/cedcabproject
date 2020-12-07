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
	<table>
	</br>
	</br>
	</br>
		<p id="para"><a href="newuserpanel.php">PRESS THIS TO GO BACK TO YOUR DASH BOARD</a></p>

	
	
	</tr>
	<?php

	$sr=1;
	$sql=$ride1->UserTotalfare($Dbcon-> conn);
    // print_r($sql);
    
     foreach ($sql as $key) {
//print_r ($key);
foreach($key as $value){
    
  echo "<h1>Your total expenditure is  $value</h1>";
		?>
<!-- <td><p id="para"><a href="usserpanel.php">PRESS THIS TO GO BACK TO YOUR DASH BOARD</a>$value</p></td> -->
<?php } ?>
<?php } ?>
	</table>
</body>
<?php 

include('footer2.php');
?>
</html>