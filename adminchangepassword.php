<?php
if(!isset($_SERVER['HTTP_REFERER'])){
    // redirect them to your desired location
    header('location:login.php');
    exit;
}
include('header2.php');

include('Dbconnection.php');
include('ride.php');
if(isset($_POST['submit']))
{

    $oldpass=$_POST['fname'];
    $newpassword=$_POST['lname'];
    print_r ($oldpass);
    echo $newpassword;
    $ride1=new Ridee();
 	$Dbcon=new Dbconnection();
    $sql=$ride1->adminchangepassword($oldpass,$newpassword,$Dbcon-> conn );
    print_r($sql);
foreach ($sql as $key) {
    //print_r ($key);
    foreach($key as $value){
        
      echo $value;
      if($value==$newpassword)
      {
          echo '<script>alert("u entered same new password as old one")</script>';
      }
      else{
        $sql=$ride1->adminnewpassword($newpassword,$Dbcon-> conn );
        // print_r ($sql);
      }
}
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form action="adminchangepassword.php" method="POST">
  <label for="fname">old Password:</label><br>
  <input type="text" id="fname" name="fname"><br>
  <label for="lname">New Password:</label><br>
  <input type="text" id="lname" name="lname">
  <input type="submit"value="submit" name="submit">
  <!-- <a href="changepassword.php?id=submit"name="submit">Submit</a> -->
  <!-- <a href="olafrontend.php?id=bookid" name="bookid" class="btn btn- btn-block">Book Now</a> -->
</form>


<a  href=adminpanel.php>Click to go back to your dashboard</a>
</body>
<?php 

include('footer2.php');
?>
</html>
</html>