<?php
include('header2.php');
include('Dbconnection.php');
include('ride.php');
if(isset($_POST['submit']))
{

    $distance=$_POST['distance'];
    $placename=$_POST['name'];
 
    $ride1=new Ridee();
 	$Dbcon=new Dbconnection();
    $sql=$ride1->addlocation($distance,$placename,$Dbcon-> conn );
    print_r($sql);


}


?>



<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>signup page</title>
		<!-- <link rel="stylesheet" type="text/css" href="mycss.css"> -->
	</head>
    <style>
    .wrapper img
{
	opacity: 0.6;
	position :absolute;
	z-index: -1;
}
.signup
{
	text-align: center;
	margin-top:500px
	position:relative;
    padding:50px;
}
</style>
	<body>
		<h1>ADMIN LOCATION PANEL</h1>
		<a  href=adminpanel.php>Click to go back to your dashboard</a>
		<div class="wrapper">
			<img src="https://cms-web.olacabs.com/00000000383.jpg" alt="taxi">
		</div>
		<div class="signup">
			<form action="addnewlocation.php" method="POST">
				<strong>place name</strong> : <input type="text" name="name">
				</br>
				</br>
				<strong>distance</strong> : <input type="number" name="distance">
				</br>
				
				</br>
				<input type="submit" name="submit" value="submit">
			</form>
			
			
		</div>
		
	</body>
	<?php 

include('footer2.php');
?>
</html>