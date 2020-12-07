<?php
if(!isset($_SERVER['HTTP_REFERER'])){
    // redirect them to your desired location
    header('location:login.php');
    exit;
}
include('header.php');

include('Dbconnection.php');
include('ride.php');
if(isset($_POST['submit']))
{

    $name=$_POST['fname'];
    $mob=$_POST['lname'];
    // print_r ($name);
    // echo $mob;
    $ride1=new Ridee();
  $Dbcon=new Dbconnection();
    $sql=$ride1->userupdateinfo($name,$mob,$Dbcon-> conn );
    print_r($sql);

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
    
    <form action="userupdateinfo.php" method="POST">
  <label for="fname">Name:</label><br>
  <input type="text" id="fname" name="fname" required><br>
  <label for="lname">Mobile No:</label><br>
  <input type="number" id="lname" name="lname"required >
  <input type="submit"value="submit" name="submit">
  <!-- <a href="changepassword.php?id=submit"name="submit">Submit</a> -->
  <!-- <a href="olafrontend.php?id=bookid" name="bookid" class="btn btn- btn-block">Book Now</a> -->
</form>


<a  href=newuserpanel.php>Click to go back to your dashboard</a>
</body>
<?php 

include('footer2.php');
?>
</html>
</html>