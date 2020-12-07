 
<?php
if(!isset($_SERVER['HTTP_REFERER'])){
    // redirect them to your desired location
    header('location:login.php');
    exit;
}
include('header2.php');

include('ride.php');
include('Dbconnection.php');
$ride1 = new Ridee();
$Dbcon = new Dbconnection();


if (isset($_GET['id'])) {
  # code...

   $id=$_GET['id'];

// echo $id;
  $sql = $ride1 -> invoice($id, $Dbcon-> conn);

 foreach ($sql as $key) 

 {
  ?>
  <table id="printtable">
<tr>
            
        <td>user_id</td>
        <td>user_name</td>
        <td>name</td>
        <td>dateofsignup</td>
        <td>mobile</td>
        <td>isblock</td>
       
      </tr>
      <tr>
    <td><?php echo $key['user_id']?></td>
    </br> 
   <td><?php echo $key['user_name']?></td>
  <td><?php  echo $key['name']?></td>
   <td><?php echo $key['dateofsignup']?></td>
  <td><?php echo $key['mobile']?></td>
  <td><?php  echo $key['isblock']?></td>
  
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
    <p id="para"><a href="adminallusers.php">PRESS THIS TO GO BACK TO YOUR DASH BOARD</a></p>
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
<a href="invoice.php?action=1&id=<?php echo  $key['user_id'];?>" class="showtable">Show Table</a>
</br>
</br>
</br>
<a href="invoice.php?action=1&id=<?php echo  $key['user_id'];?>" class="printtable" onclick="window.print()">Do you want to Print ?</a>
    
</body>
<?php
include('footer2.php');
?>
</html>
