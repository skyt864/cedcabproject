<?php




if(!(session_id())) {
  session_start();
}

Class Ridee{
public $pickup;
public $drop;
public $originaldis;
public $fare;
public $cabtype;
public $luggage;
public $userr;
public $value;
public $tdate;
public $k;

// public $conn;
 
function rideee($pickup,$drop,$originaldis,$luggage,$fare,$conn) //$pickup,$drop,$originaldis,$luggage,$fare,
 {

// echo "AKASH";
$tdate=date('Y/m/d');

$value= '1';
// $id= $_SESSION['RIDE']['USERNAME'];

$pickup=$_SESSION['RIDE']['PICKUP'];
$drop=$_SESSION['RIDE']['DROP'];
$originaldis=$_SESSION['RIDE']['ORIGINALDIS'];
$fare=$_SESSION['RIDE']['FARE'];
$cabtype=$_SESSION['RIDE']['CABTYPE'];
$luggage=$_SESSION['RIDE']['LUGGAGE'];
$k=$_SESSION['RIDE']['ID'];



$sql = "INSERT INTO `tbl_ride` ( `ride_date`, `pickup`, `droploc`, `total_distance`, `luggage`, `total_fare`, `status`,`customer_user_id` ) VALUES ('$tdate', '$pickup', '$drop', '$originaldis', '$luggage', '$fare', '1','$k')";

  $result = $conn-> query($sql);

  return $sql;

 
   
 }


 // function Pendingride($conn)
 // {

 // 	if(isset($_SESSION['RIDE']['USERNAME'])==true)
 // 	{
 // 		$k=$_SESSION['RIDE']['USERNAME'];
 // 		$sql = "SELECT * FROM  `tbl_ride` WHERE 'user_name' = '$k' AND 'status'= '1'";
 // 		$result=$conn -> query($sql);

 // 	 		return $sql;
 // 	}
 // }

function Pendingride($conn)
{
	// $row=array();
	
                   $k=array();
		 			$row=array();
  		// echo $_SESSION['RIDE']['USERNAME'];
          if(isset($_SESSION['USERNAME']))
          {
        $k=$_SESSION['USERNAME'];

      

       $fk="SELECT `user_id` FROM `tbl_user` WHERE `user_name`= '$k'";
       // echo $fk;
         $result=$conn -> query($fk);
      $dataa=mysqli_fetch_assoc($result);
   // print_r($dataa);
   foreach ($dataa as $key) {
    	// echo $dataa['user_id'];
    	$foreignkey=$dataa['user_id'];
    	// echo $foreignkey;
// echo $foreignkey;
    } 

  		$sql="SELECT * FROM  `tbl_ride` WHERE `status`= '1' AND `customer_user_id`= '$foreignkey'";
  		$result=$conn -> query($sql);
  		// $result = mysqli_query($conn, $sql);
  		while($data=mysqli_fetch_assoc($result))
  		{
  			$row[]=$data;
  		}
    }
    
  		return $row;
	



}
function completedrides($conn)
{
	// $row=array();
	
                   $k=array();
		 			$row=array();
  		 $_SESSION['USERNAME'];
        $k=$_SESSION['USERNAME'];
       $fk="SELECT `user_id` FROM `tbl_user` WHERE `user_name`= '$k'";
         $result=$conn -> query($fk);
      $dataa=mysqli_fetch_assoc($result);
   // print_r($dataa);
   foreach ($dataa as $key) {
    	// echo $dataa['user_id'];
    	$foreignkey=$dataa['user_id'];
    	// echo $foreignkey;
    } 

  		$sql="SELECT * FROM  `tbl_ride` WHERE `status`= '2' AND `customer_user_id`= '$foreignkey'";
  		$result=$conn -> query($sql);
  		// $result = mysqli_query($conn, $sql);
  		while($data=mysqli_fetch_assoc($result))
  		{
  			$row[]=$data;
  		}
  		return $row;
	



}
function Cancelride($conn)
{
	// $row=array();
	
                   $k=array();
		 			$row=array();
  		// echo $_SESSION['RIDE']['USERNAME'];
        $k=$_SESSION['USERNAME'];
        // echo $k;
       $fk="SELECT `user_id` FROM `tbl_user` WHERE `user_name`= '$k'";
         $result=$conn -> query($fk);
        $dataa=mysqli_fetch_assoc($result);
    // print_r($dataa);
   foreach ($dataa as $key) {
    	// echo $dataa['user_id'];
    	$foreignkey=$dataa['user_id'];
    	// echo $foreignkey;
    } 

  		$sql="SELECT * FROM  `tbl_ride` WHERE `status`= '0' AND `customer_user_id`= '$foreignkey'";
  		$result=$conn -> query($sql);
      // print_r($result);
  		// $result = mysqli_query($conn, $sql);
  		while($data=mysqli_fetch_assoc($result))
  		{
  			$row[]=$data;
  		}
      // print_r($row);
  		return $row;
	



}
function Userallrides($conn)
{
	// $row=array();
	
                   $k=array();
		 			$row=array();
  		// echo $_SESSION['RIDE']['USERNAME'];
        $k=$_SESSION['USERNAME'];
       $fk="SELECT `user_id` FROM `tbl_user` WHERE `user_name`= '$k'";
         $result=$conn -> query($fk);
      $dataa=mysqli_fetch_assoc($result);
   // print_r($dataa);
   foreach ($dataa as $key) {
    	// echo $dataa['user_id'];
    	$foreignkey=$dataa['user_id'];
    	// echo $foreignkey;
    } 

  		$sql="SELECT * FROM  `tbl_ride` WHERE   `customer_user_id`= '$foreignkey'";
      // echo $sql;
  		$result=$conn -> query($sql);
  		// $result = mysqli_query($conn, $sql);
  		while($data=mysqli_fetch_assoc($result))
  		{
  			$row[]=$data;
  		}
  		return $row;
	



}
function UserTotalfare($conn)
{
	// $row=array();
	
                   $k=array();
		 			$row=array();
  	
        $k=$_SESSION['RIDE']['USERNAME'];
       $fk="SELECT `user_id` FROM `tbl_user` WHERE `user_name`= '$k'";
         $result=$conn -> query($fk);
      $dataa=mysqli_fetch_assoc($result);
   // print_r($dataa);
   foreach ($dataa as $key) {
    	// echo $dataa['user_id'];
    	$foreignkey=$dataa['user_id'];
    	// echo $foreignkey;
    } 

  		$sql="SELECT SUM(`total_fare`) FROM  `tbl_ride` WHERE  `status`='2' AND `customer_user_id`= '$foreignkey'";
  		$result=$conn -> query($sql);
  		// $result = mysqli_query($conn, $sql);
  		while($data=mysqli_fetch_assoc($result))
  		{
  			$row[]=$data;
  		}
  		return $row;
	



}


function AdminTotalfare($conn)
{
	// $row=array();
	
      

  		$sql="SELECT SUM(`total_fare`) FROM  `tbl_ride` WHERE  `status`='2' ";
  		$result=$conn -> query($sql);
  		// $result = mysqli_query($conn, $sql);
  		while($data=mysqli_fetch_assoc($result))
  		{
  			$row[]=$data;
  		}
  		return $row;
	



}
function adminPendingridee($conn)
{
	// $row=array();
	
                    $k=array();
		 // 			$row=array();
  	// 	// echo $_SESSION['RIDE']['USERNAME'];
                    if(isset($_SESSION['RIDE']['USERNAME'])) {
                       $k=$_SESSION['RIDE']['USERNAME'];
                       $fk="SELECT `user_id` FROM `tbl_user` WHERE `user_name`= '$k'";
                    }
        
        
   //       $result=$conn -> query($fk);
   //    $dataa=mysqli_fetch_assoc($result);
   // // print_r($dataa);
   // foreach ($dataa as $key) {
   //  	// echo $dataa['user_id'];
   //  	$foreignkey=$dataa['user_id'];
   //  	// echo $foreignkey;
   //  } 

  		$sql="SELECT * FROM  `tbl_ride` WHERE `status`= '1'";
  		$result=$conn -> query($sql);
  		// $result = mysqli_query($conn, $sql);
  		while($data=mysqli_fetch_assoc($result))
  		{
  			$row[]=$data;
  		}
  		return $row;


}
function countrides($conn)
{
	// $row=array();
	
   //                  $k=array();
		 // // 			$row=array();
  	// // 	// echo $_SESSION['RIDE']['USERNAME'];
   //       $k=$_SESSION['RIDE']['USERNAME'];
   //      $fk="SELECT `user_id` FROM `tbl_user` WHERE `user_name`= '$k'";
   //       $result=$conn -> query($fk);
   //    $dataa=mysqli_fetch_assoc($result);
   // // print_r($dataa);
   // foreach ($dataa as $key) {
   //  	// echo $dataa['user_id'];
   //  	$foreignkey=$dataa['user_id'];
   //  	// echo $foreignkey;
   //  } 

  		$sql="SELECT COUNT(`ride_id`) FROM  `tbl_ride` WHERE `status`= '1'";
  		$result=$conn -> query($sql);
  		// $result = mysqli_query($conn, $sql);
  		while($data=mysqli_fetch_assoc($result))
  		{
  			$row[]=$data;
  		}
  		return $row;


}
function usercountrides($conn)
{
  $row=array();
  
                    $k=array();
          $row=array();
    //   // echo $_SESSION['RIDE']['USERNAME'];
         $k=$_SESSION['USERNAME'];
         // echo $k;
        $fk="SELECT `user_id` FROM `tbl_user` WHERE `user_name`= '$k'";
         $result=$conn -> query($fk);
      $dataa=mysqli_fetch_assoc($result);
   // print_r($dataa);
   foreach ($dataa as $key) {
     // echo $dataa['user_id'];
     $foreignkey=$dataa['user_id'];
    // echo $foreignkey;
}
  //  } 

      $sql="SELECT COUNT(`ride_id`) FROM  `tbl_ride` WHERE `status`= '1'AND `customer_user_id`='$foreignkey'";
      $result=$conn -> query($sql);
    while($data=mysqli_fetch_assoc($result))
      {
        $row[]=$data;
      }
      return $row;

}
function usercountrides2($conn)
{
  $row=array();
  
                    $k=array();
          $row=array();
    //   // echo $_SESSION['RIDE']['USERNAME'];
         $k=$_SESSION['USERNAME'];
         // echo $k;
        $fk="SELECT `user_id` FROM `tbl_user` WHERE `user_name`= '$k'";
         $result=$conn -> query($fk);
      $dataa=mysqli_fetch_assoc($result);
   // print_r($dataa);
   foreach ($dataa as $key) {
     // echo $dataa['user_id'];
     $foreignkey=$dataa['user_id'];
    // echo $foreignkey;
}
  //  } 

      $sql="SELECT COUNT(`ride_id`) FROM  `tbl_ride` WHERE `status`= '0'AND `customer_user_id`='$foreignkey'";
      $result=$conn -> query($sql);
    while($data=mysqli_fetch_assoc($result))
      {
        $row[]=$data;
      }
      return $row;

}
function usercountrides3($conn)
{
  $row=array();
  
                    $k=array();
          $row=array();
    //   // echo $_SESSION['RIDE']['USERNAME'];
         $k=$_SESSION['USERNAME'];
         // echo $k;
        $fk="SELECT `user_id` FROM `tbl_user` WHERE `user_name`= '$k'";
         $result=$conn -> query($fk);
      $dataa=mysqli_fetch_assoc($result);
   // print_r($dataa);
   foreach ($dataa as $key) {
     // echo $dataa['user_id'];
     $foreignkey=$dataa['user_id'];
    // echo $foreignkey;
}
  //  } 

      $sql="SELECT COUNT(`ride_id`) FROM  `tbl_ride` WHERE `status`= '2'AND `customer_user_id`='$foreignkey'";
      $result=$conn -> query($sql);
    while($data=mysqli_fetch_assoc($result))
      {
        $row[]=$data;
      }
      return $row;

}
function usercountrides5($conn)
{
  $row=array();
  
                    $k=array();
          $row=array();
    //   // echo $_SESSION['RIDE']['USERNAME'];
         $k=$_SESSION['USERNAME'];
         // echo $k;
        $fk="SELECT `user_id` FROM `tbl_user` WHERE `user_name`= '$k'";
         $result=$conn -> query($fk);
      $dataa=mysqli_fetch_assoc($result);
   // print_r($dataa);
   foreach ($dataa as $key) {
     // echo $dataa['user_id'];
     $foreignkey=$dataa['user_id'];
    // echo $foreignkey;
}
  //  } 

      $sql="SELECT COUNT(`ride_id`) FROM  `tbl_ride` WHERE  `customer_user_id`='$foreignkey'";
      $result=$conn -> query($sql);
    while($data=mysqli_fetch_assoc($result))
      {
        $row[]=$data;
      }
      return $row;

}
function userexpenditure($conn)
{
  $row=array();
  
                    $k=array();
          $row=array();
    //   // echo $_SESSION['RIDE']['USERNAME'];
         $k=$_SESSION['USERNAME'];
         // echo $k;
        $fk="SELECT `user_id` FROM `tbl_user` WHERE `user_name`= '$k'";
         $result=$conn -> query($fk);
      $dataa=mysqli_fetch_assoc($result);
   // print_r($dataa);
   foreach ($dataa as $key) {
     // echo $dataa['user_id'];
     $foreignkey=$dataa['user_id'];
    // echo $foreignkey;
}
  //  } 

      $sql="SELECT SUM(`total_fare`) FROM  `tbl_ride` WHERE  `status`='2' AND `customer_user_id`='$foreignkey'";
      $result=$conn -> query($sql);
    while($data=mysqli_fetch_assoc($result))
      {
        $row[]=$data;
      }
      return $row;

}
function countrides9($conn)
{
  // $row=array();
  
    //                 $k=array();
    //  //       $row=array();
    // //  // echo $_SESSION['RIDE']['USERNAME'];
    //      $k=$_SESSION['RIDE']['USERNAME'];
    //     $fk="SELECT `user_id` FROM `tbl_user` WHERE `user_name`= '$k'";
   //       $result=$conn -> query($fk);
   //    $dataa=mysqli_fetch_assoc($result);
   // // print_r($dataa);
   // foreach ($dataa as $key) {
   //   // echo $dataa['user_id'];
   //   $foreignkey=$dataa['user_id'];
   //   // echo $foreignkey;
   //  } 

      $sql="SELECT COUNT(`is_available`) FROM  `tbl_location` WHERE `is_available`= '1'";
      $result=$conn -> query($sql);
      // $result = mysqli_query($conn, $sql);
      while($data=mysqli_fetch_assoc($result))
      {
        $row[]=$data;
      }
      return $row;


}
function countrides2($conn)
{
	// $row=array();
	
   //                  $k=array();
		 // // 			$row=array();
  	// // 	// echo $_SESSION['RIDE']['USERNAME'];
   //       $k=$_SESSION['RIDE']['USERNAME'];
   //      $fk="SELECT `user_id` FROM `tbl_user` WHERE `user_name`= '$k'";
   //       $result=$conn -> query($fk);
   //    $dataa=mysqli_fetch_assoc($result);
   // // print_r($dataa);
   // foreach ($dataa as $key) {
   //  	// echo $dataa['user_id'];
   //  	$foreignkey=$dataa['user_id'];
   //  	// echo $foreignkey;
   //  } 

  		$sql="SELECT COUNT(`ride_id`) FROM  `tbl_ride` WHERE `status`= '0'";
  		$result=$conn -> query($sql);
  		// $result = mysqli_query($conn, $sql);
  		while($data=mysqli_fetch_assoc($result))
  		{
  			$row[]=$data;
  		}
  		return $row;


}
function countrides3($conn)
{
	// $row=array();
	
   //                  $k=array();
		 // // 			$row=array();
  	// // 	// echo $_SESSION['RIDE']['USERNAME'];
   //       $k=$_SESSION['RIDE']['USERNAME'];
   //      $fk="SELECT `user_id` FROM `tbl_user` WHERE `user_name`= '$k'";
   //       $result=$conn -> query($fk);
   //    $dataa=mysqli_fetch_assoc($result);
   // // print_r($dataa);
   // foreach ($dataa as $key) {
   //  	// echo $dataa['user_id'];
   //  	$foreignkey=$dataa['user_id'];
   //  	// echo $foreignkey;
   //  } 

  		$sql="SELECT COUNT(`ride_id`) FROM  `tbl_ride` WHERE `status`= '2'";
  		$result=$conn -> query($sql);
  		// $result = mysqli_query($conn, $sql);
  		while($data=mysqli_fetch_assoc($result))
  		{
  			$row[]=$data;
  		}
  		return $row;


}
function countrides4($conn)
{
	// $row=array();
	
   //                  $k=array();
		 // // 			$row=array();
  	// // 	// echo $_SESSION['RIDE']['USERNAME'];
   //       $k=$_SESSION['RIDE']['USERNAME'];
   //      $fk="SELECT `user_id` FROM `tbl_user` WHERE `user_name`= '$k'";
   //       $result=$conn -> query($fk);
   //    $dataa=mysqli_fetch_assoc($result);
   // // print_r($dataa);
   // foreach ($dataa as $key) {
   //  	// echo $dataa['user_id'];
   //  	$foreignkey=$dataa['user_id'];
   //  	// echo $foreignkey;
   //  } 

  		$sql="SELECT COUNT(`user_name`) FROM  `tbl_user` WHERE `is_admin`= 0 ";
  		$result=$conn -> query($sql);
  		// $result = mysqli_query($conn, $sql);
  		while($data=mysqli_fetch_assoc($result))
  		{
  			$row[]=$data;
  		}
  		return $row;


}
function countrides7($conn)
{
	// $row=array();
	
                    $k=array();
		 // 			$row=array();
  	// 	// echo $_SESSION['RIDE']['USERNAME'];
        //  $k=$_SESSION['RIDE']['USERNAME'];
        // $fk="SELECT `user_id` FROM `tbl_user` WHERE `user_name`= '$k'";
   //       $result=$conn -> query($fk);
   //    $dataa=mysqli_fetch_assoc($result);
   // // print_r($dataa);
   // foreach ($dataa as $key) {
   //  	// echo $dataa['user_id'];
   //  	$foreignkey=$dataa['user_id'];
   //  	// echo $foreignkey;
   //  } 

  		$sql="SELECT COUNT(`ride_id`) FROM  `tbl_ride` WHERE `status`= '2' OR `status`= '0' OR `status`= '1'";
  		$result=$conn -> query($sql);
  		// $result = mysqli_query($conn, $sql);
  		while($data=mysqli_fetch_assoc($result))
  		{
  			$row[]=$data;
  		}
  		return $row;


}
function countrides8($conn)
{
// 	$k=array();
$row=array();
// // echo $_SESSION['RIDE']['USERNAME'];
// $k=$_SESSION['RIDE']['USERNAME'];
// $fk="SELECT `user_id` FROM `tbl_user` WHERE `user_name`= '$k'";
// $result=$conn -> query($fk);
// $dataa=mysqli_fetch_assoc($result);
// // print_r($dataa);
// foreach ($dataa as $key) {
// // echo $dataa['user_id'];
// $foreignkey=$dataa['user_id'];
// // echo $foreignkey;
// } 

$sql="SELECT SUM(`total_fare`) FROM  `tbl_ride` WHERE  `status`='2' OR `status`='1'";
$result=$conn -> query($sql);
// $result = mysqli_query($conn, $sql);
while($data=mysqli_fetch_assoc($result))
{
$row[]=$data;
}
return $row;


}
function countrides5($conn)
{
	// $row=array();
	
                    $k=array();
		 // 			$row=array();
  	// 	// echo $_SESSION['RIDE']['USERNAME'];
         //$k=$_SESSION['RIDE']['USERNAME'];
       // $fk="SELECT `user_id` FROM `tbl_user` WHERE `user_name`= '$k'";
   //       $result=$conn -> query($fk);
   //    $dataa=mysqli_fetch_assoc($result);
   // // print_r($dataa);
   // foreach ($dataa as $key) {
   //  	// echo $dataa['user_id'];
   //  	$foreignkey=$dataa['user_id'];
   //  	// echo $foreignkey;
   //  } 

  		$sql="SELECT COUNT(`user_name`) FROM  `tbl_user` WHERE   `isblock`= 1 AND `is_admin`= 0 ";
  		$result=$conn -> query($sql);
  		// $result = mysqli_query($conn, $sql);
  		while($data=mysqli_fetch_assoc($result))
  		{
  			$row[]=$data;
  		}
  		return $row;


}
function countrides6($conn)
{
	// $row=array();
	
                    //$k=array();
		 // 			$row=array();
  	// 	// echo $_SESSION['RIDE']['USERNAME'];
        // $k=$_SESSION['RIDE']['USERNAME'];
        //$fk="SELECT `user_id` FROM `tbl_user` WHERE `user_name`= '$k'";
   //       $result=$conn -> query($fk);
   //    $dataa=mysqli_fetch_assoc($result);
   // // print_r($dataa);
   // foreach ($dataa as $key) {
   //  	// echo $dataa['user_id'];
   //  	$foreignkey=$dataa['user_id'];
   //  	// echo $foreignkey;
   //  } 

  		$sql="SELECT COUNT(`user_name`) FROM  `tbl_user` WHERE   `isblock`= 0 AND `is_admin`= 0 ";
  		$result=$conn -> query($sql);
  		// $result = mysqli_query($conn, $sql);
  		while($data=mysqli_fetch_assoc($result))
  		{
  			$row[]=$data;
  		}
  		return $row;


}
function approve($conn)
{
	//UPDATE table_name SET field1 = new-value1, field2 = new-value2
//[WHERE Clause]
	$k1=$_SESSION['RIDE']['USERNAME'];
	echo $k1;
	$sql="SELECT `user_id` FROM `tbl_user` WHERE `user_name`= '$k1'";
	$result=$conn -> query($sql);
	$dataa=mysqli_fetch_assoc($result);
	 foreach ($dataa as $key) {
    	
    	$myid=$dataa['user_id'];
    	
    } 
	$sql="UPDATE `tbl_user` SET `isblock`= 1 WHERE `user_id`= '$myid'";
	$result=$conn -> query($sql);
return $sql;
}
function approveride($id,$conn)
{
  //UPDATE table_name SET field1 = new-value1, field2 = new-value2
//[WHERE Clause]
  
  $sql="UPDATE `tbl_ride` SET `status`= 2 WHERE `ride_id`= '$id'";
  $result=$conn -> query($sql);
return $sql;
}
function disapprovride($id,$conn)
{
  //UPDATE table_name SET field1 = new-value1, field2 = new-value2
//[WHERE Clause]
  
  $sql="UPDATE `tbl_ride` SET `status`= 0 WHERE `ride_id`= '$id'";
  $result=$conn -> query($sql);
return $sql;
}
function disapprove($conn)
{
	//UPDATE table_name SET field1 = new-value1, field2 = new-value2
//[WHERE Clause]
	$k1=$_SESSION['RIDE']['USERNAME'];
	echo $k1;
	$sql="UPDATE `tbl_user` SET `isblock`= 0 WHERE `user_id`= '31'";
	$result=$conn -> query($sql);
return $sql;
}

function deleteride($k,$conn)
{
	//UPDATE table_name SET field1 = new-value1, field2 = new-value2
//[WHERE Clause]
 
    

	
	
	$sql="DELETE FROM `tbl_ride` WHERE `ride_id`= '$k'";
	$result=$conn -> query($sql);
return $sql;

}
function admincompletedridee($conn)
{
	// $row=array();
	
                    $k=array();
		 // 			$row=array();
  	// 	// echo $_SESSION['RIDE']['USERNAME'];
                    if(isset($_SESSION['RIDE']['USERNAME']))
                    {
                     $k=$_SESSION['RIDE']['USERNAME'];
        $fk="SELECT `user_id` FROM `tbl_user` WHERE `user_name`= '$k'"; 
                    }
         
   //       $result=$conn -> query($fk);
   //    $dataa=mysqli_fetch_assoc($result);
   // // print_r($dataa);
   // foreach ($dataa as $key) {
   //  	// echo $dataa['user_id'];
   //  	$foreignkey=$dataa['user_id'];
   //  	// echo $foreignkey;
   //  } 

  		$sql="SELECT * FROM  `tbl_ride` WHERE `status`= '2'";
  		$result=$conn -> query($sql);
  		// $result = mysqli_query($conn, $sql);
  		while($data=mysqli_fetch_assoc($result))
  		{
  			$row[]=$data;
  		}
  		return $row;


}
function alladmincompletedridee($conn)
{
	// $row=array();
	
                    $k=array();
		 // 			$row=array();
  	// 	// echo $_SESSION['RIDE']['USERNAME'];
                     if(isset($_SESSION['RIDE']['USERNAME'])){
                       $k=$_SESSION['RIDE']['USERNAME'];
        $fk="SELECT `user_id` FROM `tbl_user` WHERE `user_name`= '$k'";
                     }
        
   //       $result=$conn -> query($fk);
   //    $dataa=mysqli_fetch_assoc($result);
   // // print_r($dataa);
   // foreach ($dataa as $key) {
   //  	// echo $dataa['user_id'];
   //  	$foreignkey=$dataa['user_id'];
   //  	// echo $foreignkey;
   //  } 

  		$sql="SELECT * FROM  `tbl_ride` WHERE `status`= '2' OR `status`='1' OR `status`='0'";
  		$result=$conn -> query($sql);
  		// $result = mysqli_query($conn, $sql);
  		while($data=mysqli_fetch_assoc($result))
  		{
  			$row[]=$data;
  		}
  		return $row;


}
function changepassword($oldpass,$newpassword,$conn)
{
	// $row=array();
	$k=array();
	//$k=$_SESSION['RIDE']['USERNAME'];
	$k=$_SESSION['USERNAME'];
	echo $k;
	$sql="SELECT `password` FROM `tbl_user` WHERE `user_name`='$k'";
	$result=$conn -> query($sql);
	//$dataa=mysqli_fetch_assoc($result);
	//print_r($dataa);      
		 // 			$row=array();
  	// 	// echo $_SESSION['RIDE']['USERNAME'];
        // $k=$_SESSION['RIDE']['USERNAME'];
      //  $fk="SELECT `user_id` FROM `tbl_user` WHERE `user_name`= '$k'";
   //       $result=$conn -> query($fk);
   //    $dataa=mysqli_fetch_assoc($result);
   // // print_r($dataa);
   // foreach ($dataa as $key) {
   //  	// echo $dataa['user_id'];
   //  	$foreignkey=$dataa['user_id'];
   //  	// echo $foreignkey;
   //  } 

  	//	$sql="SELECT * FROM  `tbl_ride` WHERE `status`= '2' OR `status`='1' OR `status`='0'";
  	//	$result=$conn -> query($sql);
  		// $result = mysqli_query($conn, $sql);
  		while($data=mysqli_fetch_assoc($result))
  		{
  			$row[]=$data;
		  }
		  
		 

  		
return $row;

}
function adminchangepassword($oldpass,$newpassword,$conn)
{
	// $row=array();
	// $k=array();
	//$k=$_SESSION['RIDE']['USERNAME'];
	// $k=$_SESSION['RIDE']['USERNAME'];
	// echo $k;
	$sql="SELECT `password` FROM `tbl_user` WHERE `user_name` = 'admin'";
	$result=$conn -> query($sql);
	
  		while($data=mysqli_fetch_assoc($result))
  		{
  			$row[]=$data;
		  }
		  
		 

  		
return $row;

}
function newpassword($newpassword,$conn)
{
	echo $newpassword;
	$k=$_SESSION['USERNAME'];
	echo $k;
	$sql= "UPDATE `tbl_user` SET `password`= '$newpassword' WHERE `user_name`= '$k'";
				  $result=$conn -> query($sql);
				 $_SESSION['NEWPASSWORD']=$newpassword;
		  return 1;
}
function adminnewpassword($newpassword,$conn)
{
	echo $newpassword;
	$sql= "UPDATE `tbl_user` SET `password`= '$newpassword' WHERE `user_name`= 'admin'";
				  $result=$conn -> query($sql);
				 header("location:logout.php");
		  return 1;
}
function adminupdateinfo($name,$mob,$conn)
{
  
  $sql= "UPDATE `tbl_user` SET `name`= '$name' ,`mobile`='$mob' WHERE `user_name`= 'admin'";
          $result=$conn -> query($sql);
         header("location:adminpanel.php");
      return 1;
}
function userupdateinfo($name,$mob,$conn)
{
  // if(preg_match('/[^_\-0-9]/i', $name)== 'true')
  // {
  //   echo '<script>alert("wrong input name field")</script>';
  //   return false;
  // }
  if(trim($name)!=$name)
  {
     echo '<script>alert("wrong  name field")</script>';
    return false;
  }
 //  if(preg_match('/[^a-z_\-0-9]/i', $name)==true)
 // {
 //     echo '<script>alert("wrong input name field")</script>';
 //     return false;
 //  }
  // if(is_numeric($name)=='0')
  // {
  //   echo '<script>alert("wrong input name field")</script>';
  //   return false;
  // }
            $k =$_SESSION['id'];
  $sql= "UPDATE `tbl_user` SET `name`= '$name' ,`mobile`='$mob' WHERE `user_id`= '$k'";
          $result=$conn -> query($sql);
         // header("location:newuserpanel.php");
      return 1;
}

function addlocation($distance,$placename,$conn){
	// $_SESSION['con']=$conn;
  // if(preg_match('/[^a-z_\-0-9]/i', $distance)=='true')
  // {
  //   echo '<script>alert("wrong distance field type")</script>'; 
  //   return false;
  // }
  // if(is_numeric($placename)=='1')
  // {
  //   echo '<script>alert("wrong placename field type")</script>';
  //   return false; 
  // }

	if($distance!=''&& $placename!=''){
		// $sql = "INSERT INTO tbl_user (`user_name`, `name`, `dateofsignup`,
			// --  `mobile`, `password`) VALUES ('{$username}', '{$name}', '{$dateofsignup}', '{$mobile}', ('$password'))";
			$sql="INSERT INTO `tbl_location` ( `name`, `distance`, `is_available`) VALUES ('$placename', '$distance', '1')";
			 $result = $conn->query($sql); 
			   header("location:adminpanel.php");
			  return $result;
	}
	else
	{
		echo '<script>alert("wrong input ")</script>'; 
	}

}

function locationlist($conn){
	$sql= "SELECT * FROM `tbl_location`";
	
	$result = $conn->query($sql);
  if($result->num_rows > 0){
	while($data=mysqli_fetch_assoc($result))
  		{
  			$row[]=$data;
  		}
  		return $row;
    }
    else{
      echo '<script>alert("NO DATA IN DATA FIELD")</script>';

           }
  
}
function editadminlocation( $id,$conn){
  $sql= "SELECT *FROM `tbl_location` WHERE `id`= '$id'";
  
  $result = $conn->query($sql);
  while($data=mysqli_fetch_assoc($result))
      {
        $row[]=$data;
      }
      return $row;
  
}

function updateadminlocation( $id,$name,$distance,$available,$conn){
  $k=is_numeric($distance);
  $k1=is_numeric($available);
  if($k==1 && $k1==1&&($available==0 || $available==1))
  {

  $sql= "UPDATE `tbl_location` SET `name`='$name',`distance`='$distance',`is_available`='$available' WHERE `id`= '$id'";
  
  $result = $conn->query($sql);
      
  
}
else if($k!=1)
{
  echo '<script>alert("wrong input  field");</script>';
  echo "<script> window.location.href = 'adminpanel.php';</script>";
  
}
else
{
  echo '<script>alert("wrong input  field");</script>';
  echo "<script> window.location.href = 'adminpanel.php';</script>";
}
}

function deleteadminlocation( $id,$placename,$distance,$conn){

  echo $id;
  echo $placename;
  echo $distance;

  $sql= "DELETE FROM `tbl_location` WHERE `name`='$placename'AND`distance`='$distance' AND`id`= '$id'";
  
  $result = $conn->query($sql);
      return 1;
  
}
function adminpendingusers($conn)
{
  // $row=array();
  
  //$k=$_SESSION['RIDE']['USERNAME'];

  $sql="SELECT * FROM `tbl_user` WHERE `isblock`='0'";
  $result=$conn -> query($sql);
  //$dataa=mysqli_fetch_assoc($result);
  //print_r($dataa);      
     //       $row=array();
    //  // echo $_SESSION['RIDE']['USERNAME'];
        // $k=$_SESSION['RIDE']['USERNAME'];
      //  $fk="SELECT `user_id` FROM `tbl_user` WHERE `user_name`= '$k'";
   //       $result=$conn -> query($fk);
   //    $dataa=mysqli_fetch_assoc($result);
   // // print_r($dataa);
   // foreach ($dataa as $key) {
   //   // echo $dataa['user_id'];
   //   $foreignkey=$dataa['user_id'];
   //   // echo $foreignkey;
   //  } 

    //  $sql="SELECT * FROM  `tbl_ride` WHERE `status`= '2' OR `status`='1' OR `status`='0'";
    //  $result=$conn -> query($sql);
      // $result = mysqli_query($conn, $sql);
      while($data=mysqli_fetch_assoc($result))
      {
        $row[]=$data;
      }
      
     

      
return $row;

}
function admincancelusers($conn)
{
  // $row=array();
  
  //$k=$_SESSION['RIDE']['USERNAME'];

  $sql="SELECT * FROM `tbl_user` WHERE `isblock`='1'";
  $result=$conn -> query($sql);
  //$dataa=mysqli_fetch_assoc($result);
  //print_r($dataa);      
     //       $row=array();
    //  // echo $_SESSION['RIDE']['USERNAME'];
        // $k=$_SESSION['RIDE']['USERNAME'];
      //  $fk="SELECT `user_id` FROM `tbl_user` WHERE `user_name`= '$k'";
   //       $result=$conn -> query($fk);
   //    $dataa=mysqli_fetch_assoc($result);
   // // print_r($dataa);
   // foreach ($dataa as $key) {
   //   // echo $dataa['user_id'];
   //   $foreignkey=$dataa['user_id'];
   //   // echo $foreignkey;
   //  } 

    //  $sql="SELECT * FROM  `tbl_ride` WHERE `status`= '2' OR `status`='1' OR `status`='0'";
    //  $result=$conn -> query($sql);
      // $result = mysqli_query($conn, $sql);
      while($data=mysqli_fetch_assoc($result))
      {
        $row[]=$data;
      }
      
     

      
return $row;

}
function adminallusers($conn)
{
  // $row=array();
  
  //$k=$_SESSION['RIDE']['USERNAME'];

  $sql="SELECT * FROM `tbl_user` WHERE `is_admin`='0'";
  $result=$conn -> query($sql);
  //$dataa=mysqli_fetch_assoc($result);
  //print_r($dataa);      
     //       $row=array();
    //  // echo $_SESSION['RIDE']['USERNAME'];
        // $k=$_SESSION['RIDE']['USERNAME'];
      //  $fk="SELECT `user_id` FROM `tbl_user` WHERE `user_name`= '$k'";
   //       $result=$conn -> query($fk);
   //    $dataa=mysqli_fetch_assoc($result);
   // // print_r($dataa);
   // foreach ($dataa as $key) {
   //   // echo $dataa['user_id'];
   //   $foreignkey=$dataa['user_id'];
   //   // echo $foreignkey;
   //  } 

    //  $sql="SELECT * FROM  `tbl_ride` WHERE `status`= '2' OR `status`='1' OR `status`='0'";
    //  $result=$conn -> query($sql);
      // $result = mysqli_query($conn, $sql);
      while($data=mysqli_fetch_assoc($result))
      {
        $row[]=$data;
      }
      
     

      
return $row;

}
function invoice($id,$conn)
{
  // $row=array();
  
  //$k=$_SESSION['RIDE']['USERNAME'];

  $sql="SELECT * FROM `tbl_user`  WHERE `user_id`='$id'";
  $result=$conn -> query($sql);
  //$dataa=mysqli_fetch_assoc($result);
  //print_r($dataa);      
     //       $row=array();
    //  // echo $_SESSION['RIDE']['USERNAME'];
        // $k=$_SESSION['RIDE']['USERNAME'];
      //  $fk="SELECT `user_id` FROM `tbl_user` WHERE `user_name`= '$k'";
   //       $result=$conn -> query($fk);
   //    $dataa=mysqli_fetch_assoc($result);
   // // print_r($dataa);
   // foreach ($dataa as $key) {
   //   // echo $dataa['user_id'];
   //   $foreignkey=$dataa['user_id'];
   //   // echo $foreignkey;
   //  } 

    //  $sql="SELECT * FROM  `tbl_ride` WHERE `status`= '2' OR `status`='1' OR `status`='0'";
    //  $result=$conn -> query($sql);
      // $result = mysqli_query($conn, $sql);
      while($data=mysqli_fetch_assoc($result))
      {
        $row[]=$data;
      }
      
     

      
return $row;

}
function rideinvoice($id,$conn)
{
  // $row=array();
  
  //$k=$_SESSION['RIDE']['USERNAME'];

  $sql="SELECT * FROM `tbl_ride`  WHERE `customer_user_id`='$id'";
  $result=$conn -> query($sql);
  //$dataa=mysqli_fetch_assoc($result);
  //print_r($dataa);      
     //       $row=array();
    //  // echo $_SESSION['RIDE']['USERNAME'];
        // $k=$_SESSION['RIDE']['USERNAME'];
      //  $fk="SELECT `user_id` FROM `tbl_user` WHERE `user_name`= '$k'";
   //       $result=$conn -> query($fk);
   //    $dataa=mysqli_fetch_assoc($result);
   // // print_r($dataa);
   // foreach ($dataa as $key) {
   //   // echo $dataa['user_id'];
   //   $foreignkey=$dataa['user_id'];
   //   // echo $foreignkey;
   //  } 

    //  $sql="SELECT * FROM  `tbl_ride` WHERE `status`= '2' OR `status`='1' OR `status`='0'";
    //  $result=$conn -> query($sql);
      // $result = mysqli_query($conn, $sql);
      while($data=mysqli_fetch_assoc($result))
      {
        $row[]=$data;
      }
      
     

      
return $row;

}

function adminblockuser($id, $conn)
{
  //UPDATE table_name SET field1 = new-value1, field2 = new-value2
//[WHERE Clause]
  // $k1=$_SESSION['RIDE']['USERNAME'];
  // echo $idd;
  // $sql="SELECT `user_id` FROM `tbl_user` WHERE `user_id`= '$idd'";
  // $result=$conn -> query($sql);
  // $dataa=mysqli_fetch_assoc($result);
  //  foreach ($dataa as $key) {
      
  //     $myid=$dataa['user_id'];
      
  //   } 
  // $k1= $_SESSION['RIDE']['ID'];
  $sql="UPDATE `tbl_user` SET `isblock`= 1 WHERE `user_id`= '$id'";
  $result=$conn -> query($sql);
return $sql;
}


function adminunblockuser($id,$conn)
{
  //UPDATE table_name SET field1 = new-value1, field2 = new-value2
//[WHERE Clause]
  
  $sql="UPDATE `tbl_user` SET `isblock`= 0 WHERE `user_name`= '$id'";
  $result=$conn -> query($sql);
return $sql;
}

function allridessort($id,$conn)
{

if($id==1)
{
  $sql= "SELECT * FROM `tbl_ride` ORDER BY `tbl_ride`.`ride_date` DESC";
  $result=$conn -> query($sql);
  while($data=mysqli_fetch_assoc($result))
  {
    $row[]=$data;
  }
  return $row;
}
elseif ($id==2){

  $sql="SELECT * FROM `tbl_ride` ORDER BY CAST(`total_fare` as unsigned) ASC";
  $result=$conn -> query($sql);
  while($data=mysqli_fetch_assoc($result))
  {
    $row[]=$data;
  }
  return $row;
}
elseif($id==3){


$sql="SELECT * FROM `tbl_ride` WHERE ride_date > DATE_SUB(NOW(), INTERVAL 7 DAY)";
$result=$conn->query($sql);
while($data=mysqli_fetch_assoc($result))
{
  $row[]=$data;
}
return $row;

}
elseif($id==4){


$sql="SELECT * FROM `tbl_ride` WHERE ride_date > DATE_SUB(NOW(), INTERVAL 30 DAY)";
$result=$conn->query($sql);
while($data=mysqli_fetch_assoc($result))
{
  $row[]=$data;
}
return $row;

}
elseif ($id==5){

  $sql="SELECT * FROM `tbl_ride` ORDER BY CAST(`total_distance` as unsigned) ASC";
  $result=$conn -> query($sql);
  while($data=mysqli_fetch_assoc($result))
  {
    $row[]=$data;
  }
  return $row;
}
else
{
   $k=array();
     //       $row=array();
    //  // echo $_SESSION['RIDE']['USERNAME'];
                     if(isset($_SESSION['RIDE']['USERNAME'])){
                       $k=$_SESSION['RIDE']['USERNAME'];
        $fk="SELECT `user_id` FROM `tbl_user` WHERE `user_name`= '$k'";
                     }
        
   //       $result=$conn -> query($fk);
   //    $dataa=mysqli_fetch_assoc($result);
   // // print_r($dataa);
   // foreach ($dataa as $key) {
   //   // echo $dataa['user_id'];
   //   $foreignkey=$dataa['user_id'];
   //   // echo $foreignkey;
   //  } 

      $sql="SELECT * FROM  `tbl_ride` WHERE `status`= '2' OR `status`='1' OR `status`='0'";
      $result=$conn -> query($sql);
      // $result = mysqli_query($conn, $sql);
      while($data=mysqli_fetch_assoc($result))
      {
        $row[]=$data;
      }
      return $row;

}



}

function allpendingridessort($id,$conn)
{

if($id==1)
{
  $sql= "SELECT * FROM `tbl_ride` ORDER BY `tbl_ride`.`ride_date` DESC";
  $result=$conn -> query($sql);
  while($data=mysqli_fetch_assoc($result))
  {
    $row[]=$data;
  }
  return $row;
}
elseif ($id==2){

  $sql="SELECT * FROM `tbl_ride` ORDER BY CAST(`total_fare` as unsigned) ASC";
  $result=$conn -> query($sql);
  while($data=mysqli_fetch_assoc($result))
  {
    $row[]=$data;
  }
  return $row;
}
elseif($id==3){


$sql="SELECT * FROM `tbl_ride` WHERE ride_date > DATE_SUB(NOW(), INTERVAL 7 DAY)";
$result=$conn->query($sql);
while($data=mysqli_fetch_assoc($result))
{
  $row[]=$data;
}
return $row;

}
elseif($id==4){


$sql="SELECT * FROM `tbl_ride` WHERE ride_date > DATE_SUB(NOW(), INTERVAL 30 DAY)";
$result=$conn->query($sql);
while($data=mysqli_fetch_assoc($result))
{
  $row[]=$data;
}
return $row;

}
else
{
   
                   $k=array();
          $row=array();
      // echo $_SESSION['RIDE']['USERNAME'];
          if(isset($_SESSION['USERNAME']))
          {
        $k=$_SESSION['USERNAME'];

      

       $fk="SELECT `user_id` FROM `tbl_user` WHERE `user_name`= '$k'";
       // echo $fk;
         $result=$conn -> query($fk);
      $dataa=mysqli_fetch_assoc($result);
   // print_r($dataa);
   foreach ($dataa as $key) {
      // echo $dataa['user_id'];
      $foreignkey=$dataa['user_id'];
      // echo $foreignkey;
// echo $foreignkey;
    } 

      $sql="SELECT * FROM  `tbl_ride` WHERE `status`= '1' AND `customer_user_id`= '$foreignkey'";
      $result=$conn -> query($sql);
      // $result = mysqli_query($conn, $sql);
      while($data=mysqli_fetch_assoc($result))
      {
        $row[]=$data;
      }
    }
    
      return $row;
  
}



}
function allusersridessort($id,$conn)
{

if($id==1)
{
  $sql= "SELECT * FROM `tbl_ride` ORDER BY `tbl_ride`.`ride_date` DESC";
  $result=$conn -> query($sql);
  while($data=mysqli_fetch_assoc($result))
  {
    $row[]=$data;
  }
  return $row;
}
elseif ($id==2){

  $sql="SELECT * FROM `tbl_ride` ORDER BY CAST(`total_fare` as unsigned) ASC";
  $result=$conn -> query($sql);
  while($data=mysqli_fetch_assoc($result))
  {
    $row[]=$data;
  }
  return $row;
}
elseif($id==3){


$sql="SELECT * FROM `tbl_ride` WHERE ride_date > DATE_SUB(NOW(), INTERVAL 7 DAY)";
$result=$conn->query($sql);
while($data=mysqli_fetch_assoc($result))
{
  $row[]=$data;
}
return $row;

}
elseif($id==4){


$sql="SELECT * FROM `tbl_ride` WHERE ride_date > DATE_SUB(NOW(), INTERVAL 30 DAY)";
$result=$conn->query($sql);
while($data=mysqli_fetch_assoc($result))
{
  $row[]=$data;
}
return $row;

}
else
{
   
                   
                   $k=array();
          $row=array();
      // echo $_SESSION['RIDE']['USERNAME'];
        $k=$_SESSION['USERNAME'];
       $fk="SELECT `user_id` FROM `tbl_user` WHERE `user_name`= '$k'";
         $result=$conn -> query($fk);
      $dataa=mysqli_fetch_assoc($result);
   // print_r($dataa);
   foreach ($dataa as $key) {
      // echo $dataa['user_id'];
      $foreignkey=$dataa['user_id'];
      // echo $foreignkey;
    } 

      $sql="SELECT * FROM  `tbl_ride` WHERE   `customer_user_id`= '$foreignkey'";
      // echo $sql;
      $result=$conn -> query($sql);
      // $result = mysqli_query($conn, $sql);
      while($data=mysqli_fetch_assoc($result))
      {
        $row[]=$data;
      }
      return $row;
  

  
}
}
function completedusersridessort($id,$conn)
{

if($id==1)
{
  $k=array();
          $row=array();
       $_SESSION['USERNAME'];
        $k=$_SESSION['USERNAME'];
       $fk="SELECT `user_id` FROM `tbl_user` WHERE `user_name`= '$k'";
         $result=$conn -> query($fk);
      $dataa=mysqli_fetch_assoc($result);
   // print_r($dataa);
   foreach ($dataa as $key) {
      // echo $dataa['user_id'];
      $foreignkey=$dataa['user_id'];
      // echo $foreignkey;
    } 

    // $k=$_SESSION['USERNAME'];
  $sql= "SELECT * FROM `tbl_ride` WHERE `status`= '2' AND `customer_user_id`= '$foreignkey'   ORDER BY `ride_date` DESC ";
  $result=$conn->query($sql);
  while($data=mysqli_fetch_assoc($result))
  {
    $row[]=$data;
  }
  return $row;
}
elseif ($id==2){

        $k=array();
          $row=array();
 
        $k=$_SESSION['USERNAME'];
       $fk="SELECT `user_id` FROM `tbl_user` WHERE `user_name`= '$k'";
         $result=$conn -> query($fk);
      $dataa=mysqli_fetch_assoc($result);
   // print_r($dataa);
   foreach ($dataa as $key) {
      // echo $dataa['user_id'];
      $foreignkey=$dataa['user_id'];
      // echo $foreignkey;
    } 
  // $k=$_SESSION['USERNAME'];

  $sql="SELECT * FROM `tbl_ride` WHERE `status`= '2'AND `customer_user_id`= '$foreignkey'    ORDER BY CAST(`total_fare` as unsigned) ASC ";
  $result=$conn -> query($sql);
  while($data=mysqli_fetch_assoc($result))
  {
    $row[]=$data;
  }
  return $row;
}
elseif($id==3){
$k=array();
          $row=array();
       // $_SESSION['USERNAME'];
        $k=$_SESSION['USERNAME'];
       $fk="SELECT `user_id` FROM `tbl_user` WHERE `user_name`= '$k'";
         $result=$conn -> query($fk);
      $dataa=mysqli_fetch_assoc($result);
   // print_r($dataa);
   foreach ($dataa as $key) {
      // echo $dataa['user_id'];
      $foreignkey=$dataa['user_id'];
      // echo $foreignkey;
    } 

$sql="SELECT * FROM `tbl_ride` WHERE `status`= '2' AND `customer_user_id`= '$foreignkey'AND ride_date > DATE_SUB(NOW(), INTERVAL 7 DAY)";
$result=$conn->query($sql);
while($data=mysqli_fetch_assoc($result))
{
  $row[]=$data;
}
return $row;

}
elseif($id==4){
$k=array();
          $row=array();
       // $_SESSION['USERNAME'];
        $k=$_SESSION['USERNAME'];
       $fk="SELECT `user_id` FROM `tbl_user` WHERE `user_name`= '$k'";
         $result=$conn -> query($fk);
      $dataa=mysqli_fetch_assoc($result);
   // print_r($dataa);
   foreach ($dataa as $key) {
      // echo $dataa['user_id'];
      $foreignkey=$dataa['user_id'];
      // echo $foreignkey;
    } 

$sql="SELECT * FROM `tbl_ride` WHERE `status`= '2'AND`customer_user_id`= '$foreignkey'AND ride_date > DATE_SUB(NOW(), INTERVAL 30 DAY) ";
$result=$conn->query($sql);
while($data=mysqli_fetch_assoc($result))
{
  $row[]=$data;
}
return $row;

}
elseif($id==5){
 $k=array();
          $row=array();
 
        $k=$_SESSION['USERNAME'];
       $fk="SELECT `user_id` FROM `tbl_user` WHERE `user_name`= '$k'";
         $result=$conn -> query($fk);
      $dataa=mysqli_fetch_assoc($result);
   // print_r($dataa);
   foreach ($dataa as $key) {
      // echo $dataa['user_id'];
      $foreignkey=$dataa['user_id'];
      // echo $foreignkey;
    } 
  // $k=$_SESSION['USERNAME'];

  $sql="SELECT * FROM `tbl_ride` WHERE `status`= '2'AND `customer_user_id`= '$foreignkey'    ORDER BY CAST(`total_distance` as unsigned) DESC";
  $result=$conn -> query($sql);
  while($data=mysqli_fetch_assoc($result))
  {
    $row[]=$data;
  }
  return $row;
}

else
{
   
                   
         $k=array();
          $row=array();
       $_SESSION['USERNAME'];
        $k=$_SESSION['USERNAME'];
       $fk="SELECT `user_id` FROM `tbl_user` WHERE `user_name`= '$k'";
         $result=$conn -> query($fk);
      $dataa=mysqli_fetch_assoc($result);
   // print_r($dataa);
   foreach ($dataa as $key) {
      // echo $dataa['user_id'];
      $foreignkey=$dataa['user_id'];
      // echo $foreignkey;
    } 

      $sql="SELECT * FROM  `tbl_ride` WHERE `status`= '2' AND `customer_user_id`= '$foreignkey'";
      $result=$conn -> query($sql);
      // $result = mysqli_query($conn, $sql);
      while($data=mysqli_fetch_assoc($result))
      {
        $row[]=$data;
      }
      return $row;
  
  

  
}


}
function pendride($id,$conn)
{

if($id==1)
{
  $k=array();
          $row=array();
       $_SESSION['USERNAME'];
        $k=$_SESSION['USERNAME'];
       $fk="SELECT `user_id` FROM `tbl_user` WHERE `user_name`= '$k'";
         $result=$conn -> query($fk);
      $dataa=mysqli_fetch_assoc($result);
   // print_r($dataa);
   foreach ($dataa as $key) {
      // echo $dataa['user_id'];
      $foreignkey=$dataa['user_id'];
      // echo $foreignkey;
    } 

    // $k=$_SESSION['USERNAME'];
  $sql= "SELECT * FROM `tbl_ride` WHERE `status`= '1' AND `customer_user_id`= '$foreignkey'   ORDER BY `ride_date` DESC ";
  $result=$conn->query($sql);
  while($data=mysqli_fetch_assoc($result))
  {
    $row[]=$data;
  }
  return $row;
}
elseif ($id==2){

        $k=array();
          $row=array();
 
        $k=$_SESSION['USERNAME'];
       $fk="SELECT `user_id` FROM `tbl_user` WHERE `user_name`= '$k'";
         $result=$conn -> query($fk);
      $dataa=mysqli_fetch_assoc($result);
   // print_r($dataa);
   foreach ($dataa as $key) {
      // echo $dataa['user_id'];
      $foreignkey=$dataa['user_id'];
      // echo $foreignkey;
    } 
  // $k=$_SESSION['USERNAME'];

  $sql="SELECT * FROM `tbl_ride` WHERE `status`= '1'AND `customer_user_id`= '$foreignkey'    ORDER BY CAST(`total_fare` as unsigned) ASC ";
  $result=$conn -> query($sql);
  while($data=mysqli_fetch_assoc($result))
  {
    $row[]=$data;
  }
  return $row;
}
elseif ($id==3){

        $k=array();
          $row=array();
 
        $k=$_SESSION['USERNAME'];
       $fk="SELECT `user_id` FROM `tbl_user` WHERE `user_name`= '$k'";
         $result=$conn -> query($fk);
      $dataa=mysqli_fetch_assoc($result);
   // print_r($dataa);
   foreach ($dataa as $key) {
      // echo $dataa['user_id'];
      $foreignkey=$dataa['user_id'];
      // echo $foreignkey;
    } 
  // $k=$_SESSION['USERNAME'];

  $sql="SELECT * FROM `tbl_ride` WHERE `status`= '1'AND `customer_user_id`= '$foreignkey'    ORDER BY CAST(`total_fare` as unsigned) DESC";
  $result=$conn -> query($sql);
  while($data=mysqli_fetch_assoc($result))
  {
    $row[]=$data;
  }
  return $row;
}
elseif($id==4){
$k=array();
          $row=array();
       // $_SESSION['USERNAME'];
        $k=$_SESSION['USERNAME'];
       $fk="SELECT `user_id` FROM `tbl_user` WHERE `user_name`= '$k'";
         $result=$conn -> query($fk);
      $dataa=mysqli_fetch_assoc($result);
   // print_r($dataa);
   foreach ($dataa as $key) {
      // echo $dataa['user_id'];
      $foreignkey=$dataa['user_id'];
      // echo $foreignkey;
    } 

$sql="SELECT * FROM `tbl_ride` WHERE `status`= '1' AND `customer_user_id`= '$foreignkey'AND ride_date > DATE_SUB(NOW(), INTERVAL 7 DAY)";
$result=$conn->query($sql);
while($data=mysqli_fetch_assoc($result))
{
  $row[]=$data;
}
return $row;

}
elseif($id==5){
$k=array();
          $row=array();
       // $_SESSION['USERNAME'];
        $k=$_SESSION['USERNAME'];
       $fk="SELECT `user_id` FROM `tbl_user` WHERE `user_name`= '$k'";
         $result=$conn -> query($fk);
      $dataa=mysqli_fetch_assoc($result);
   // print_r($dataa);
   foreach ($dataa as $key) {
      // echo $dataa['user_id'];
      $foreignkey=$dataa['user_id'];
      // echo $foreignkey;
    } 

$sql="SELECT * FROM `tbl_ride` WHERE `status`= '1'AND`customer_user_id`= '$foreignkey'AND ride_date > DATE_SUB(NOW(), INTERVAL 30 DAY) ";
$result=$conn->query($sql);
while($data=mysqli_fetch_assoc($result))
{
  $row[]=$data;
}
return $row;

}
elseif ($id==6){

        $k=array();
          $row=array();
 
        $k=$_SESSION['USERNAME'];
       $fk="SELECT `user_id` FROM `tbl_user` WHERE `user_name`= '$k'";
         $result=$conn -> query($fk);
      $dataa=mysqli_fetch_assoc($result);
   // print_r($dataa);
   foreach ($dataa as $key) {
      // echo $dataa['user_id'];
      $foreignkey=$dataa['user_id'];
      // echo $foreignkey;
    } 
  // $k=$_SESSION['USERNAME'];

  $sql="SELECT * FROM `tbl_ride` WHERE `status`= '1'AND `customer_user_id`= '$foreignkey'    ORDER BY CAST(`total_distance` as unsigned) DESC";
  $result=$conn -> query($sql);
  while($data=mysqli_fetch_assoc($result))
  {
    $row[]=$data;
  }
  return $row;
}
else
{
   
                   
         $k=array();
          $row=array();
       $_SESSION['USERNAME'];
        $k=$_SESSION['USERNAME'];
       $fk="SELECT `user_id` FROM `tbl_user` WHERE `user_name`= '$k'";
         $result=$conn -> query($fk);
      $dataa=mysqli_fetch_assoc($result);
   // print_r($dataa);
   foreach ($dataa as $key) {
      // echo $dataa['user_id'];
      $foreignkey=$dataa['user_id'];
      // echo $foreignkey;
    } 

      $sql="SELECT * FROM  `tbl_ride` WHERE `status`= '1' AND `customer_user_id`= '$foreignkey'";
      $result=$conn -> query($sql);
      // $result = mysqli_query($conn, $sql);
      while($data=mysqli_fetch_assoc($result))
      {
        $row[]=$data;
      }
      return $row;
  
  

  
}


}
function allpendride($id,$conn)
{

if($id==1)
{
  $k=array();
          $row=array();
       $_SESSION['USERNAME'];
        $k=$_SESSION['USERNAME'];
       $fk="SELECT `user_id` FROM `tbl_user` WHERE `user_name`= '$k'";
         $result=$conn -> query($fk);
      $dataa=mysqli_fetch_assoc($result);
   // print_r($dataa);
   foreach ($dataa as $key) {
      // echo $dataa['user_id'];
      $foreignkey=$dataa['user_id'];
      // echo $foreignkey;
    } 

    // $k=$_SESSION['USERNAME'];
  $sql= "SELECT * FROM `tbl_ride` WHERE  `customer_user_id`= '$foreignkey'   ORDER BY `ride_date` DESC ";
  $result=$conn->query($sql);
  while($data=mysqli_fetch_assoc($result))
  {
    $row[]=$data;
  }
  return $row;
}
elseif ($id==2){

        $k=array();
          $row=array();
 
        $k=$_SESSION['USERNAME'];
       $fk="SELECT `user_id` FROM `tbl_user` WHERE `user_name`= '$k'";
         $result=$conn -> query($fk);
      $dataa=mysqli_fetch_assoc($result);
   // print_r($dataa);
   foreach ($dataa as $key) {
      // echo $dataa['user_id'];
      $foreignkey=$dataa['user_id'];
      // echo $foreignkey;
    } 
  // $k=$_SESSION['USERNAME'];

  $sql="SELECT * FROM `tbl_ride` WHERE  `customer_user_id`= '$foreignkey'    ORDER BY CAST(`total_fare` as unsigned) ASC ";
  $result=$conn -> query($sql);
  while($data=mysqli_fetch_assoc($result))
  {
    $row[]=$data;
  }
  return $row;
}
elseif($id==3){
$k=array();
          $row=array();
       // $_SESSION['USERNAME'];
        $k=$_SESSION['USERNAME'];
       $fk="SELECT `user_id` FROM `tbl_user` WHERE `user_name`= '$k'";
         $result=$conn -> query($fk);
      $dataa=mysqli_fetch_assoc($result);
   // print_r($dataa);
   foreach ($dataa as $key) {
      // echo $dataa['user_id'];
      $foreignkey=$dataa['user_id'];
      // echo $foreignkey;
    } 

$sql="SELECT * FROM `tbl_ride` WHERE `customer_user_id`= '$foreignkey'AND ride_date > DATE_SUB(NOW(), INTERVAL 7 DAY)";
$result=$conn->query($sql);
while($data=mysqli_fetch_assoc($result))
{
  $row[]=$data;
}
return $row;

}
elseif($id==4){
$k=array();
          $row=array();
       // $_SESSION['USERNAME'];
        $k=$_SESSION['USERNAME'];
       $fk="SELECT `user_id` FROM `tbl_user` WHERE `user_name`= '$k'";
         $result=$conn -> query($fk);
      $dataa=mysqli_fetch_assoc($result);
   // print_r($dataa);
   foreach ($dataa as $key) {
      // echo $dataa['user_id'];
      $foreignkey=$dataa['user_id'];
      // echo $foreignkey;
    } 

$sql="SELECT * FROM `tbl_ride` WHERE `customer_user_id`= '$foreignkey'AND ride_date > DATE_SUB(NOW(), INTERVAL 30 DAY) ";
$result=$conn->query($sql);
while($data=mysqli_fetch_assoc($result))
{
  $row[]=$data;
}
return $row;

}
elseif($id==5){

        $k=array();
          $row=array();
 
        $k=$_SESSION['USERNAME'];
       $fk="SELECT `user_id` FROM `tbl_user` WHERE `user_name`= '$k'";
         $result=$conn -> query($fk);
      $dataa=mysqli_fetch_assoc($result);
   // print_r($dataa);
   foreach ($dataa as $key) {
      // echo $dataa['user_id'];
      $foreignkey=$dataa['user_id'];
      // echo $foreignkey;
    } 
  // $k=$_SESSION['USERNAME'];

  $sql="SELECT * FROM `tbl_ride` WHERE  `customer_user_id`= '$foreignkey'    ORDER BY CAST(`total_distance` as unsigned) DESC";
  $result=$conn -> query($sql);
  while($data=mysqli_fetch_assoc($result))
  {
    $row[]=$data;
  }
  return $row;
}

else
{
   
                   
         $k=array();
          $row=array();
       $_SESSION['USERNAME'];
        $k=$_SESSION['USERNAME'];
       $fk="SELECT `user_id` FROM `tbl_user` WHERE `user_name`= '$k'";
         $result=$conn -> query($fk);
      $dataa=mysqli_fetch_assoc($result);
   // print_r($dataa);
   foreach ($dataa as $key) {
      // echo $dataa['user_id'];
      $foreignkey=$dataa['user_id'];
      // echo $foreignkey;
    } 

      $sql="SELECT * FROM  `tbl_ride` WHERE  `customer_user_id`= '$foreignkey'";
      $result=$conn -> query($sql);
      // $result = mysqli_query($conn, $sql);
      while($data=mysqli_fetch_assoc($result))
      {
        $row[]=$data;
      }
      return $row;
  
  

  
}


}
function cancelridee($id,$conn)
{

if($id==1)
{
  $k=array();
          $row=array();
       $_SESSION['USERNAME'];
        $k=$_SESSION['USERNAME'];
       $fk="SELECT `user_id` FROM `tbl_user` WHERE `user_name`= '$k'";
         $result=$conn -> query($fk);
      $dataa=mysqli_fetch_assoc($result);
   // print_r($dataa);
   foreach ($dataa as $key) {
      // echo $dataa['user_id'];
      $foreignkey=$dataa['user_id'];
      // echo $foreignkey;
    } 

    // $k=$_SESSION['USERNAME'];
  $sql= "SELECT * FROM `tbl_ride` WHERE `status`= '0' AND `customer_user_id`= '$foreignkey'   ORDER BY `ride_date` DESC ";
  $result=$conn->query($sql);
  while($data=mysqli_fetch_assoc($result))
  {
    $row[]=$data;
  }
  return $row;
}
elseif ($id==2){

        $k=array();
          $row=array();
 
        $k=$_SESSION['USERNAME'];
       $fk="SELECT `user_id` FROM `tbl_user` WHERE `user_name`= '$k'";
         $result=$conn -> query($fk);
      $dataa=mysqli_fetch_assoc($result);
   // print_r($dataa);
   foreach ($dataa as $key) {
      // echo $dataa['user_id'];
      $foreignkey=$dataa['user_id'];
      // echo $foreignkey;
    } 
  // $k=$_SESSION['USERNAME'];

  $sql="SELECT * FROM `tbl_ride` WHERE `status`= '0'AND `customer_user_id`= '$foreignkey'    ORDER BY CAST(`total_fare` as unsigned) ASC ";
  $result=$conn -> query($sql);
  while($data=mysqli_fetch_assoc($result))
  {
    $row[]=$data;
  }
  return $row;
}
elseif($id==3){
 $k=array();
          $row=array();
 
        $k=$_SESSION['USERNAME'];
       $fk="SELECT `user_id` FROM `tbl_user` WHERE `user_name`= '$k'";
         $result=$conn -> query($fk);
      $dataa=mysqli_fetch_assoc($result);
   // print_r($dataa);
   foreach ($dataa as $key) {
      // echo $dataa['user_id'];
      $foreignkey=$dataa['user_id'];
      // echo $foreignkey;
    } 
  // $k=$_SESSION['USERNAME'];

  $sql="SELECT * FROM `tbl_ride` WHERE `status`= '0'AND `customer_user_id`= '$foreignkey'    ORDER BY CAST(`total_distance` as unsigned) ASC ";
  $result=$conn -> query($sql);
  while($data=mysqli_fetch_assoc($result))
  {
    $row[]=$data;
  }
  return $row;

}

else
{
   
                   
         $k=array();
          $row=array();
       $_SESSION['USERNAME'];
        $k=$_SESSION['USERNAME'];
       $fk="SELECT `user_id` FROM `tbl_user` WHERE `user_name`= '$k'";
         $result=$conn -> query($fk);
      $dataa=mysqli_fetch_assoc($result);
   // print_r($dataa);
   foreach ($dataa as $key) {
      // echo $dataa['user_id'];
      $foreignkey=$dataa['user_id'];
      // echo $foreignkey;
    } 

      $sql="SELECT * FROM  `tbl_ride` WHERE `status`= '0' AND `customer_user_id`= '$foreignkey'";
      $result=$conn -> query($sql);
      // $result = mysqli_query($conn, $sql);
      while($data=mysqli_fetch_assoc($result))
      {
        $row[]=$data;
      }
      return $row;
  
  

  
}


}
function adminpendd($id,$conn)
{

if($id==1)
{
  $sql= "SELECT * FROM `tbl_ride` WHERE `status`= '1' ORDER BY `ride_date` DESC";
  $result=$conn -> query($sql);
  while($data=mysqli_fetch_assoc($result))
  {
    $row[]=$data;
  }
  return $row;
}
elseif ($id==2){

  $sql="SELECT * FROM `tbl_ride` WHERE `status`= '1' ORDER BY CAST(`total_fare` as unsigned) ASC";
  $result=$conn -> query($sql);
  while($data=mysqli_fetch_assoc($result))
  {
    $row[]=$data;
  }
  return $row;
}
elseif ($id==3){

  $sql="SELECT * FROM `tbl_ride` WHERE `status`= '1' ORDER BY CAST(`total_fare` as unsigned) DESC";
  $result=$conn -> query($sql);
  while($data=mysqli_fetch_assoc($result))
  {
    $row[]=$data;
  }
  return $row;
}
elseif($id==4){


$sql="SELECT * FROM `tbl_ride` WHERE `status`= '1'AND ride_date > DATE_SUB(NOW(), INTERVAL 7 DAY)";
$result=$conn->query($sql);
while($data=mysqli_fetch_assoc($result))
{
  $row[]=$data;
}
return $row;

}
elseif($id==5){


$sql="SELECT * FROM `tbl_ride` WHERE `status`= '1'AND ride_date > DATE_SUB(NOW(), INTERVAL 30 DAY)";
$result=$conn->query($sql);
while($data=mysqli_fetch_assoc($result))
{
  $row[]=$data;
}
return $row;

}
elseif($id==6){



  $sql="SELECT * FROM `tbl_ride` WHERE `status`= '1' ORDER BY CAST(`total_distance` as unsigned) ASC";
  $result=$conn -> query($sql);
  while($data=mysqli_fetch_assoc($result))
  {
    $row[]=$data;
  }
  return $row;
}



else
{
                    $k=array();
     //       $row=array();
    //  // echo $_SESSION['RIDE']['USERNAME'];
                    if(isset($_SESSION['RIDE']['USERNAME'])) {
                       $k=$_SESSION['RIDE']['USERNAME']; 
                       $fk="SELECT `user_id` FROM `tbl_user` WHERE  `status`= '1'AND `user_name`= '$k'";
                    }
        
        
   //       $result=$conn -> query($fk); 
   //    $dataa=mysqli_fetch_assoc($result);
   // // print_r($dataa);
   // foreach ($dataa as $key) {
   //   // echo $dataa['user_id'];
   //   $foreignkey=$dataa['user_id'];
   //   // echo $foreignkey;
   //  } 

      $sql="SELECT * FROM  `tbl_ride` WHERE `status`= '1'";
      $result=$conn -> query($sql);
      // $result = mysqli_query($conn, $sql);
      while($data=mysqli_fetch_assoc($result))
      {
        $row[]=$data;
      }
      return $row;

}



}
function admincompp($id,$conn)
{

if($id==1)
{
  $sql= "SELECT * FROM `tbl_ride` WHERE `status`= '2' ORDER BY `tbl_ride`.`ride_date` DESC";
  $result=$conn -> query($sql);
  while($data=mysqli_fetch_assoc($result))
  {
    $row[]=$data;
  }
  return $row;
}
elseif ($id==2){

  $sql="SELECT * FROM `tbl_ride` WHERE `status`= '2' ORDER BY CAST(`total_fare` as unsigned) ASC";
  $result=$conn -> query($sql);
  while($data=mysqli_fetch_assoc($result))
  {
    $row[]=$data;
  }
  return $row;
}
elseif($id==3){


$sql="SELECT * FROM `tbl_ride` WHERE `status`= '2' AND ride_date > DATE_SUB(NOW(), INTERVAL 7 DAY)";
$result=$conn->query($sql);
while($data=mysqli_fetch_assoc($result))
{
  $row[]=$data;
}
return $row;

}
elseif($id==4){


$sql="SELECT * FROM `tbl_ride` WHERE `status`= '2'AND ride_date > DATE_SUB(NOW(), INTERVAL 30 DAY)";
$result=$conn->query($sql);
while($data=mysqli_fetch_assoc($result))
{
  $row[]=$data;
}
return $row;

}
elseif ($id==5){

  $sql="SELECT * FROM `tbl_ride` WHERE `status`= '2' ORDER BY CAST(`total_distance` as unsigned) ASC";
  $result=$conn -> query($sql);
  while($data=mysqli_fetch_assoc($result))
  {
    $row[]=$data;
  }
  return $row;
}

else
{
                        $k=array();
     //       $row=array();
    //  // echo $_SESSION['RIDE']['USERNAME'];
                    if(isset($_SESSION['RIDE']['USERNAME']))
                    {
                     $k=$_SESSION['RIDE']['USERNAME'];
        $fk="SELECT `user_id` FROM `tbl_user` WHERE `user_name`= '$k'"; 
                    }
         
   //       $result=$conn -> query($fk);
   //    $dataa=mysqli_fetch_assoc($result);
   // // print_r($dataa);
   // foreach ($dataa as $key) {
   //   // echo $dataa['user_id'];
   //   $foreignkey=$dataa['user_id'];
   //   // echo $foreignkey;
   //  } 

      $sql="SELECT * FROM  `tbl_ride` WHERE `status`= '2'";
      $result=$conn -> query($sql);
      // $result = mysqli_query($conn, $sql);
      while($data=mysqli_fetch_assoc($result))
      {
        $row[]=$data;
      }
      return $row;

}



}
function adminaaal($id,$conn)
{

if($id==1)
{
  $sql= "SELECT * FROM `tbl_user` WHERE `is_admin`='0' ORDER BY `tbl_user`.`dateofsignup` DESC";
  $result=$conn -> query($sql);
  while($data=mysqli_fetch_assoc($result))
  {
    $row[]=$data;
  }
  return $row;
}
elseif ($id==2){

  $sql="SELECT * FROM `tbl_user` WHERE `is_admin`='0' ORDER BY `name` ASC";
  $result=$conn -> query($sql);
  while($data=mysqli_fetch_assoc($result))
  {
    $row[]=$data;
  }
  return $row;
}

else
{
  $sql="SELECT * FROM `tbl_user` WHERE `is_admin`='0'";
  $result=$conn -> query($sql);
  //$dataa=mysqli_fetch_assoc($result);
  //print_r($dataa);      
     //       $row=array();
    //  // echo $_SESSION['RIDE']['USERNAME'];
        // $k=$_SESSION['RIDE']['USERNAME'];
      //  $fk="SELECT `user_id` FROM `tbl_user` WHERE `user_name`= '$k'";
   //       $result=$conn -> query($fk);
   //    $dataa=mysqli_fetch_assoc($result);
   // // print_r($dataa);
   // foreach ($dataa as $key) {
   //   // echo $dataa['user_id'];
   //   $foreignkey=$dataa['user_id'];
   //   // echo $foreignkey;
   //  } 

    //  $sql="SELECT * FROM  `tbl_ride` WHERE `status`= '2' OR `status`='1' OR `status`='0'";
    //  $result=$conn -> query($sql);
      // $result = mysqli_query($conn, $sql);
      while($data=mysqli_fetch_assoc($result))
      {
        $row[]=$data;
      }
      
     

      
return $row;


}



}
function adminpenall($id,$conn)
{

if($id==1)
{
  $sql= "SELECT * FROM `tbl_user` WHERE `is_admin`='0'AND `isblock`='1' ORDER BY `tbl_user`.`dateofsignup` DESC";
  $result=$conn -> query($sql);
  while($data=mysqli_fetch_assoc($result))
  {
    $row[]=$data;
  }
  return $row;
}
elseif ($id==2){

  $sql="SELECT * FROM `tbl_user` WHERE `is_admin`='0' AND `isblock`='1' ORDER BY `name` ASC";
  $result=$conn -> query($sql);
  while($data=mysqli_fetch_assoc($result))
  {
    $row[]=$data;
  }
  return $row;
}

else
{
   $sql="SELECT * FROM `tbl_user` WHERE `isblock`='1'AND `is_admin`='0'";
  $result=$conn -> query($sql);
  //$dataa=mysqli_fetch_assoc($result);
  //print_r($dataa);      
     //       $row=array();
    //  // echo $_SESSION['RIDE']['USERNAME'];
        // $k=$_SESSION['RIDE']['USERNAME'];
      //  $fk="SELECT `user_id` FROM `tbl_user` WHERE `user_name`= '$k'";
   //       $result=$conn -> query($fk);
   //    $dataa=mysqli_fetch_assoc($result);
   // // print_r($dataa);
   // foreach ($dataa as $key) {
   //   // echo $dataa['user_id'];
   //   $foreignkey=$dataa['user_id'];
   //   // echo $foreignkey;
   //  } 

    //  $sql="SELECT * FROM  `tbl_ride` WHERE `status`= '2' OR `status`='1' OR `status`='0'";
    //  $result=$conn -> query($sql);
      // $result = mysqli_query($conn, $sql);
      while($data=mysqli_fetch_assoc($result))
      {
        $row[]=$data;
      }
      
     

      
return $row;

}



}
function admincanall($id,$conn)
{

if($id==1)
{
  $sql= "SELECT * FROM `tbl_user` WHERE `is_admin`='0'AND `isblock`='1' ORDER BY `tbl_user`.`dateofsignup` DESC";
  $result=$conn -> query($sql);
  while($data=mysqli_fetch_assoc($result))
  {
    $row[]=$data;
  }
  return $row;
}
elseif ($id==2){

  $sql="SELECT * FROM `tbl_user` WHERE `is_admin`='0' AND `isblock`='1' ORDER BY `name` ASC";
  $result=$conn -> query($sql);
  while($data=mysqli_fetch_assoc($result))
  {
    $row[]=$data;
  }
  return $row;
}

else
{
   $sql="SELECT * FROM `tbl_user` WHERE `isblock`='1'AND `is_admin`='0'";
  $result=$conn -> query($sql);
  //$dataa=mysqli_fetch_assoc($result);
  //print_r($dataa);      
     //       $row=array();
    //  // echo $_SESSION['RIDE']['USERNAME'];
        // $k=$_SESSION['RIDE']['USERNAME'];
      //  $fk="SELECT `user_id` FROM `tbl_user` WHERE `user_name`= '$k'";
   //       $result=$conn -> query($fk);
   //    $dataa=mysqli_fetch_assoc($result);
   // // print_r($dataa);
   // foreach ($dataa as $key) {
   //   // echo $dataa['user_id'];
   //   $foreignkey=$dataa['user_id'];
   //   // echo $foreignkey;
   //  } 

    //  $sql="SELECT * FROM  `tbl_ride` WHERE `status`= '2' OR `status`='1' OR `status`='0'";
    //  $result=$conn -> query($sql);
      // $result = mysqli_query($conn, $sql);
      while($data=mysqli_fetch_assoc($result))
      {
        $row[]=$data;
      }
      
     

      
return $row;

}



}
function deletepend($id,$conn)
{
  $sql= "UPDATE `tbl_ride` SET `status`= '0' WHERE `ride_id`= '$id'";
  $result=$conn -> query($sql);
   
}
function userinvoice($id,$conn)
{
  // $row=array();
  
  //$k=$_SESSION['RIDE']['USERNAME'];

  $sql="SELECT * FROM `tbl_ride` WHERE `ride_id`='$id'";
  $result=$conn -> query($sql);
  //$dataa=mysqli_fetch_assoc($result);
  //print_r($dataa);      
     //       $row=array();
    //  // echo $_SESSION['RIDE']['USERNAME'];
        // $k=$_SESSION['RIDE']['USERNAME'];
      //  $fk="SELECT `user_id` FROM `tbl_user` WHERE `user_name`= '$k'";
   //       $result=$conn -> query($fk);
   //    $dataa=mysqli_fetch_assoc($result);
   // // print_r($dataa);
   // foreach ($dataa as $key) {
   //   // echo $dataa['user_id'];
   //   $foreignkey=$dataa['user_id'];
   //   // echo $foreignkey;
   //  } 

    //  $sql="SELECT * FROM  `tbl_ride` WHERE `status`= '2' OR `status`='1' OR `status`='0'";
    //  $result=$conn -> query($sql);
      // $result = mysqli_query($conn, $sql);
      while($data=mysqli_fetch_assoc($result))
      {
        $row[]=$data;
      }
      
     

      
return $row;

}
}

?>
<!-- // AND `customer_user_id` = $kh['user_id']
//$fk1=mysqli_fetch_assoc($fk);
$kh[]=$fk1; -->



<!-- foreach ($row as $key) {
			//print_r ($key);
			foreach($key as $value){
				
			  if($value =='$oldpass' AND $value!='$newpassword')
			  {
				  $sql= "UPDATE `tbl_user` SET `password`= '$newpassword' WHERE `user_name`= 'rabbit'";
				  $result=$conn -> query($sql);
				  return 1 ;
			  }
			  else{
				  return 0;
			  } -->