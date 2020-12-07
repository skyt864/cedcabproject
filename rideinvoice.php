 
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


if (isset($_GET['id'])) {
  # code...

   $id=$_GET['id'];

// echo $id;
  $sql = $ride1 -> rideinvoice($id, $Dbcon-> conn);
  echo '<a href="adminallrides.php">press this to go back</a>';
 foreach ($sql as $key) 

 {
  ?>

  <table id="printtable">
<tr>
            
        <td>ride_date</td>
        <td>pickup</td>
        <td>droploc</td>
        <td>total_distance</td>
        <td>luggage</td>
        <td>total_fare</td>
        <td>status</td>
        <td>customer_user_id</td>
       
      </tr>
      <tr>
    <td><?php echo $key['ride_date']?></td>
    </br> 
   <td><?php echo $key['pickup']?></td>
  <td><?php  echo $key['droploc']?></td>
  <td><?php echo $key['total_distance']?></td>
  <td><?php  echo $key['luggage']?></td>
    <td><?php  echo $key['total_fare']?></td>
      <td><?php  echo $key['status']?></td>
        <td><?php  echo $key['customer_user_id']?></td>
  
</tr>
  </table>
   

<?php } ?>

<?php }?>

       
  






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
    <p id="para"><a href="adminallrides.php">PRESS THIS TO GO BACK TO YOUR DASH BOARD</a></p>
    </tr>
    <?php

    $sr=1;
    $sql=$ride1->adminallusers($Dbcon-> conn);
    // print_r($sql);
    // print_r($sql);
    // echo $sql;
    // exit();
    foreach ($sql as $key) {

        ?>
   
        
    </tr>
    
<?php } ?>

</br>
</br>
</br>
<a href="rideinvoice.php?id=<?php echo  $key['customer_user_id'];?>" class="printtable" onclick="window.print()">Do you want to Print ?</a>
    
</body>
<?php
include('footer2.php');
?>
</html>
