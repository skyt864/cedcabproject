<?php

if(!(session_id())) {
	session_start();
}

class User {
	// public $user_id;
	// public $user_name;
	// public $password;
	// public $isblock;
	// public $dateofsignup;
	// public  $name;
	// public $mobile;
 //    public $user;
 //    public $isadmin;
 //    public $conn;

	function login($username, $password,$conn){
		$sql= "SELECT * from `tbl_user` WHERE `user_name`='$username' and `password`='$password'";
		
		
		
	    $result=$conn->query($sql);
	    // print_r($result);
	   
	   
		 $row = $result -> fetch_assoc();	
		if($result->num_rows > 0){
	        $_SESSION['LOGGEDIN']= true;

			$_SESSION['USERNAME'] = $username;

			$_SESSION['id']=$row['user_id'];
			$_SESSION['myblock']=$row['isblock'];
			$_SESSION['username']=$row['user_name'];
			$_SESSION['password']=$row['password'];
		}
		
     if($username==$_SESSION['username']&&$password==$_SESSION['password']&&$_SESSION['myblock']=='0')
     {
			$rtn ="login success";
			header("location:index.php");

		}
		else
		{
			$rtn="login failed";
			echo '<script>alert("lOGIN credentials didnt matched please register !! ")</script>'; 

		}
		return $rtn;

	}
	function adminlogin($username, $password,$conn){

		$new="SELECT `password`FROM `tbl_user` WHERE `user_name`= 'admin'";
		
		$result = $conn->query($new);
	  
	    print_r($result);
	    $admin=$result->fetch_assoc();
	    print_r($admin);
	    $k = $admin['password'];
	    echo $admin['password'];
		
			
		if(($username=='admin')&&($password == $admin['password']))
		{
		
			header("location:adminpanel.php");
			
		}

			
		
		     

	}

	function Register( $username, $password, $repassword, $name, $mobile,$conn ){
		// setcookie("username",$username,time()+84600);
		$sql= "SELECT `user_name` FROM `tbl_user` WHERE `user_name`= LOWER('$username')";
		// print_r($sql);
		$result=$conn->query($sql);
		// print_r($result) ;
		while($data=mysqli_fetch_assoc($result))
  		{
  			$row[]=$data;
  		
  		 $lower=$data['user_name'];
       $sql1="SELECT COUNT(`user_name`) FROM  `tbl_user` WHERE `user_name`='$lower'";
         $result1=$conn->query($sql1);
         print_r($result1);
       $row = $result1 -> fetch_assoc($result1);
        if($result1->num_rows > 0){
        	echo '<script>alert("Username already exists ")</script>';
        	 echo "<script> window.location.href = 'Register.php';</script>";

   }
   else
   {
   	return $result1;
   }
}
   // elseif ($password=='(?!.* )') {
   // return 5;
   // }
         
   if($password==$repassword && $username!=''&& $password!=''&&$repassword!=''&&is_numeric($mobile)!='0'&&$mobile!=''&&$name!=''&& trim($username,"")==$username){



			$sql1 = "INSERT INTO `tbl_user` (`user_name`, `name`, `dateofsignup`,
	             `mobile`,`isblock`, `password`) VALUES ('{$username}', '{$name}', NOW(), '{$mobile}','1', ('$password'))";
	             $result1 = $conn->query($sql1); 
	             return $result1;
	              echo "<script> window.location.href = 'index.php';</script>";
	             
		} 
     else
		{
			echo '<script>alert("PLEASE ENTER CORRECT INPUT FIELD ")</script>'; 
		}
		 return $result;
	
}
	



	function myroww($conn)
	{
		 // $k=array();
		 // 			$row=array();
  	// 	// echo $_SESSION['RIDE']['USERNAME'];
   //      $k=$_SESSION['RIDE']['USERNAME'];
   //     $fk="SELECT `user_id` FROM `tbl_user` WHERE `user_name`= '$k'";
   //       $result=$conn -> query($fk);
   //    $dataa=mysqli_fetch_assoc($result);
   // // print_r($dataa);
   // foreach ($dataa as $key) {
   //  	// echo $dataa['user_id'];
   //  	$foreignkey=$dataa['user_id'];
   //  	// echo $foreignkey;
   //  } 

  		$sql ="SELECT `name` FROM  `tbl_location` WHERE `is_available`= '1'" ;
  		$result=$conn -> query($sql);
  		while($data=mysqli_fetch_assoc($result))
  		{
  			$row[]=$data;
  		}
  		return $row;
	
	}

	function myrowww($conn)
	{
		 // $k=array();
		 // 			$row=array();
  	// 	// echo $_SESSION['RIDE']['USERNAME'];
   //      $k=$_SESSION['RIDE']['USERNAME'];
   //     $fk="SELECT `user_id` FROM `tbl_user` WHERE `user_name`= '$k'";
   //       $result=$conn -> query($fk);
   //    $dataa=mysqli_fetch_assoc($result);
   // // print_r($dataa);
   // foreach ($dataa as $key) {
   //  	// echo $dataa['user_id'];
   //  	$foreignkey=$dataa['user_id'];
   //  	// echo $foreignkey;
   //  } 

  		$sql ="SELECT `name`,`distance` FROM  `tbl_location` WHERE `is_available`= '1'" ;
  		$result=$conn -> query($sql);
  		while($data=mysqli_fetch_assoc($result))
  		{
  			$row[]=$data;
  		}
  		return $row;
	
	}

}





?>