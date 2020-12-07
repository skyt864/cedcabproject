<?php
// session_start();

include('oops.php');
include ('Dbconnection.php');
$User=new User();
$Dbcon=new Dbconnection();
 $sql=$User->myrowww($Dbcon->conn);
 $locations=array();
       foreach ($sql as $key => $value) {
  
   $locations[$value['name']]=$value['distance'];
                                          } 

$pickup = $_REQUEST['pickup'];
$drop = $_REQUEST['drop'];
$cabtype = $_REQUEST['cabtype'];
$luggage = $_REQUEST['luggage'];

$_SESSION['RIDE']['PICKUP']=$pickup;
$_SESSION['RIDE']['DROP']=$drop;

$_SESSION['RIDE']['CABTYPE']=$cabtype;
$_SESSION['RIDE']['LUGGAGE']=$luggage;

if(isset($_SESSION['USERNAME'])) {
	$username=$_SESSION['USERNAME'];
	$_SESSION['RIDE']['USERNAME']= $username;
	$_SESSION['RIDE']['ID']=$_SESSION['id'];
 
}

if(!isset($_SESSION['USERNAME']))
{
	$_SESSION['RIDE']['PICKUP']=$pickup;
	$_SESSION['RIDE']['DROP']=$drop;
	// $_SESSION['RIDE']['CABTYPE']=$cabtype;
	if(isset($_SESSION['RIDE']['USERNAME']))
	{
		$_SESSION['RIDE']['USERNAME']= $username;
	}
		if(isset($_SESSION['RIDE']['ID']))
		{
			$_SESSION['RIDE']['ID']=$_SESSION['id'];
		}
		
			$_SESSION['RIDE']['CABTYPE']=$cabtype;

if (isset($_SESSION['RIDE']['LUGGAGE'])) {

$_SESSION['RIDE']['LUGGAGE']=$luggage;
}
		}
	
			
if (isset($_SESSION['RIDE']['LUGGAGE'])) {
	# code...
$_SESSION['RIDE']['LUGGAGE']=$luggage;
}
	
	
	

// if ($pickup==$drop) {
//  echo '<script>alert("same location not allowed")</script>';
//  return false;



// $_SESSION['LUGGAGE']=$luggage;

$fare = 0;
$dis =  abs(($locations[$pickup]) -  ($locations[$drop]));
$originaldis=$dis;
$_SESSION['RIDE']['ORIGINALDIS']=$originaldis;
switch ($cabtype) {
	case 'CedMicro':
	if ($dis<=10) {
$fare =$dis*13.5;
$fare+=50;
		break;		# code...
	}
	elseif ($dis>10&&$dis<=60) {
		$dis=$dis-10;
		$fare=135+($dis*12);
		$fare+=50;
		break;
	}
	elseif ($dis>=60&&$dis<=160) {
		$dis=$dis-60;
		$fare=735+($dis*10.20);
		$fare+=50;
break;
	}
	else
	{
		$dis=$dis-160;
		$fare=1755+($dis*8.50);
		$fare+=50;
break;
	}
	case 'CedMini':
	
	if($dis<=10) {
$fare = $dis*14.5;
$fare+=150;
		break;		# code...
	}
	elseif ($dis>10&&$dis<=60) {
		$dis=$dis-10;
		$fare=145+($dis*13);
		$fare+=150;
		break;
	}
	elseif ($dis>=60&&$dis<=160) {
		$dis=$dis-60;
		$fare=795+($dis*11.20);
		$fare+=150;
break;
	}
	else
	{
		$dis=$dis-160;
		$fare=1915+($dis*9.50);
		$fare+=150;
break;
}
	case 'CedRoyal':
	if($dis<=10) {
$fare =$dis*15.5;
$fare+=200;
		break;		# code...
	}
	elseif($dis>10&&$dis<=60) {
		$dis=$dis-10;
		$fare=155+($dis*14);
		$fare+=200;
		break;
	}
	elseif ($dis>=60&&$dis<=160) {
		$dis=$dis-60;
		$fare=855+($dis*12.20);
		$fare+=200;
break;
	}
	else
	{
		$dis=$dis-160;
		$fare=2075+($dis*10.50);
		$fare+=200;
break;
}
		case 'CedSUV':
		if($dis<=10) {
$fare =$dis*16.5;
$fare+=250;
		break;		# code...
	}
	elseif ($dis>10&&$dis<=60) {
		$dis=$dis-10;
		$fare=165+($dis*15);
		$fare+=250;
		break;
	}
	elseif ($dis>=60&&$dis<=160) {
		$dis=$dis-60;
		$fare=915+($dis*13.20);
		$fare+=250;
break;
	}
	else
	{
		$dis=$dis-160;
		$fare=2235+($dis*11.50);
		$fare+=250;
break;
}
		# code...
		break;
	default:
		# code...
		break;
}
if($luggage<=10 && $luggage!=0)
{
	if ($cabtype == 'CedSUV') {
$fare+=100;
			}
			else
			{
	$fare+=50;
}
}
elseif ($luggage>10 && $luggage<=20) {
	if ($cabtype== 'CedSUV') {
$fare+=200;
			}
			else
			{
	$fare+=100;
}
}
elseif ($luggage>20) {
	if ($cabtype== 'CedSUV') {
$fare+=400;
			}
			else
			{
	$fare+=200;
}
}
else
{
	$fare+=0;
}

 $_SESSION['RIDE']['FARE']=$fare;
 $_SESSION['FARE']=$fare;
                                   
      if(!isset($_SESSION['USERNAME']))
{
if (!isset($_SESSION['RIDE']['FARE']))
{
    $_SESSION['RIDE']['FARE']=$fare;
                             }  
                             }                           

if(isset($_SESSION['LOGGEDIN'])==true) {
	 echo '<p> Your Total Fare : <strong>Rs. '.$_SESSION['RIDE']['FARE'].'</strong></p>';
echo '<p> Your Total Distance : <strong> '.$_SESSION['RIDE']['ORIGINALDIS'].' km</strong></p>';
echo '<p> Your CAB Type : <strong> '.$_SESSION['RIDE']['CABTYPE'].'</strong></p>';

$pickup=$_SESSION['RIDE']['PICKUP'];
if(isset($_SESSION['RIDE']['IDD'])){
	$_SESSION['RIDE']['IDD']=$_SESSION['IDD'];
}


$drop=$_SESSION['RIDE']['DROP'];
$originaldis=$_SESSION['RIDE']['ORIGINALDIS'];
$fare=$_SESSION['RIDE']['FARE'];
$cabtype=$_SESSION['RIDE']['CABTYPE'];
$luggage=$_SESSION['RIDE']['LUGGAGE'];
$userr=$_SESSION['RIDE']['USERNAME'];



// $Ride=new Ride();

// $Dbcon =new DbConnection();

// $sql= $Ride->ride($pickup,$drop,$originaldis,$luggage,$fare,$Dbcon->conn);
// 	echo $sql;

}

if(isset($_SESSION['LOGGEDIN'])==false) {
echo '<p> Your Total Fare : <strong>Rs. '.$fare.'</strong></p>';
echo '<p> Your Total Distance : <strong> '.$originaldis.' km</strong></p>';
echo '<p> Your CAB Type : <strong> '.$cabtype.'</strong></p>';

}

// if(isset($_GET['bookid']))
// {
// 	echo "hii";
// 	$Ride=new Ride();

// $Dbcon =new DbConnection();

// $sql= $Ride->ride($pickup,$drop,$originaldis,$luggage,$fare,$Dbcon->conn);
// 	echo $sql;
// }


?>