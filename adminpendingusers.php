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
$sql=$ride1 -> adminpenall($id,$Dbcon-> conn);
// print_r($sql);
} 
if(!isset($_GET['action'])&& isset($_GET['id']))
{
   $id=$_GET['id'];
if(!(is_numeric($_GET['id'])))
{
  $sql = $ride1 -> adminunblockuser($id, $Dbcon-> conn); 
  // echo $sql;
echo '<script>alert("User is being Appoved!!")</script>';
}
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
	table {
		width:100%;
		/*margin: 0px 20px;*/
	}
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
	<h1>ADMIN PENDING USERS</h1>
	
	
	<table>
		<tr>
			<th>Serial no</th>
		
		<th>user_name</th>
		<th>name</th>
		<th>dateofsignup</th>
		<th>mobile</th>
			<th>isblock</th>
			
			<th>password</th>
             <th>Action</th>   

    </br>
    <br>
	<p id="para"><a href="adminpanel.php">PRESS THIS TO GO BACK TO YOUR DASH BOARD</a></p>
</br>
  <div class="">
   <form action="adminpendingusers.php" method="POST">
    <select name="id" id="btt" >
       <option value="">NO filter</option>
    <option value="1">Date</option>
    <option value="2">name</option>
     </select>
      <input type="submit" value="submit" name="submit">
     </form>
</div> 
	</tr>
	<?php

	 $sr=1;
  // if(isset($_POST['submit'])){
    $id = isset($_POST['id'])?$_POST['id']:'';
    $sql=$ride1 -> adminpenall($id,$Dbcon-> conn);
	// print_r($sql);
	// print_r($sql);
	// echo $sql;
	// exit();
	foreach ($sql as $key) {

		?>
	<tr>
		<td><?php echo $sr++;?></td>
		<td><?php echo $key['user_name'];?></td>
		<td><?php echo $key['name'];?></td>
		<td><?php echo $key['dateofsignup'];?></td>
		<td><?php echo $key['mobile'];?></td>
		<td><?php if ($key['isblock'])
                        {
                        	echo "Blocked";
                        }
                        else
                        {
                        	echo"not blocked";
                        }

		;?>
			
		</td>
		
		<td><?php echo $key['password'];?></td>
       <td><a href="adminpendingusers.php?id=<?php echo $key['user_name']; ?>">Approve user?</a></td>
		
	</tr>
<?php } ?>
	</table>
</body>

<?php 

include('footer2.php');
?>
</html>
</html>