 
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
if(isset($_POST['submit'])){
$id = $_POST['id'];

// echo $id;
$sql=$ride1 -> adminaaal($id,$Dbcon-> conn);
// print_r($sql);
} 
if(!isset($_GET['action'])&& isset($_GET['id']))
{
   $id=$_GET['id'];
if((is_numeric($_GET['id'])))
{
  $sql = $ride1 -> adminblockuser($id, $Dbcon-> conn); 
  // echo $sql;
echo '<script>alert("User is being blocked")</script>';
}
else
{
 // echo "aaa";
$id=$_GET['id'];
  $sql = $ride1 -> adminunblockuser($id ,$Dbcon-> conn); 
// echo $sql;
}
}


  


 
// echo '<script>alert("User is being unblocked")</script>';

  
if(isset($_GET['action'])&& isset($_GET['id']))
{
   $id=$_GET['id'];
// echo $id;
  $sql = $ride1 -> invoice($id, $Dbcon-> conn);
// print_r($sql);
// echo $sql['user_id'];
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
        <td>print</td>
      </tr>
      <tr>
    <td><?php echo $key['user_id']?></td>
    </br> 
   <td><?php echo $key['user_name']?></td>
  <td><?php  echo $key['name']?></td>
   <td><?php echo $key['dateofsignup']?></td>
  <td><?php echo $key['mobile']?></td>
  <td><?php  echo $key['isblock']?></td>
  <td><a href="invoice.php">Print Now</a>
</tr>
  </table>
   

  <?php } 

}
  ?>

       
  






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
    <h1>ADMIN ALL USERS</h1>
  </br>
    <table>
        <tr>
            
        <td>user_id</td>
        <td>user_name</td>
        <td>name</td>
        <td>dateofsignup</td>
        <td>mobile</td>
            <td>isblock</td>
            
            <td>password</td>
            <td>Action</td>
            <td>Action</td>
            <td>Invoice</td>
    <p id="para"><a href="adminpanel.php">PRESS THIS TO GO BACK TO YOUR DASH BOARD</a></p>
    <p id="paraa"><a href="adminallusers.php">Refresh</a>
       <div class="">
   <form action="adminallusers.php" method="POST">
    <select name="id" id="btt" >
       <option value="">NO filter</option>
    <option value="1">Date</option>
    <option value="2">name</option>
     </select>
      <input type="submit" value="submit" name="submit">
     </form>
</div> 
</br>
    </tr>
    <?php

  $sr=1;
  // if(isset($_POST['submit'])){
    $id = isset($_POST['id'])?$_POST['id']:'';
    $sql=$ride1 -> adminaaal($id,$Dbcon-> conn);
    // print_r($sql);
    // print_r($sql);
    // echo $sql;
    // exit();
    foreach ($sql as $key) {
// $_SESSION['RIDE']['ID']= $key['user_id'];
// echo $_SESSION['RIDE']['ID'];
        ?>
    <tr>


    <td><?php echo $key['user_id'];?></td>
        <td><?php echo $key['user_name'];?></td>
        <td><?php echo $key['name'];?></td>
        <td><?php echo $key['dateofsignup'];?></td>
        <td><?php echo $key['mobile'];?></td>
        <td><?php if($key['isblock'])
                  {
                    echo "blocked";
                  }
                  else
                  {
                    echo "unblocked";
                  }




        ;?></td>
        
        <td><?php echo $key['password'];?></td>
       
       <td><a href="adminallusers.php?id=<?php echo $key['user_id']; ?>">Block</a></td>
        <td><a href="adminallusers.php?id=<?php echo $key['user_name']; ?>">Unblock</a></td>
        <td><a href="adminallusers.php?action=1&id=<?php echo  $key['user_id'];?>">Show Invoice</a></td>
    </tr>
    
<?php } ?>
    </table>
</body>
<?php
include('footer.php');
?>
</html>
