<!DOCTYPE html>
<?php
if(!isset($_SERVER['HTTP_REFERER'])){
    // redirect them to your desired location
    header('location:login.php');
    exit;
}
session_start();
include('Dbconnection.php');
include('ride.php');

$Dbcon = new Dbconnection();
 $ride1 = new Ridee(); 
 ?>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
        <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
	<title>Document</title>
  <style type="text/css">
    .card {
    height: 198px;
    color: white;
    font-size: 61px;
    text-align: center;
}

  </style>
</head>
<body>

<!-- <?php 

//if(isset($SESSION['LOGGEDIN'])== false) 

{

  //      	echo "<h1>Please Login to continue</h1>";
    //    	echo '<a href="index.php">Click here to redirect</a>';
        }
//else
{?> -->

 <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
  <a class="navbar-brand  text-white" href="#"><i class="fas fa-car"></i><span id="cedcab"> Ced Cab <span></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
       <li class="nav-item active">
        <a class="nav-link" href="logout.php">logout<span class="sr-only">(current)</span></a>

      </li>
     
    
      <li class="nav-item">
        <a class="nav-link" href="#"></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Contact Us
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">call us</a>
          <a class="dropdown-item" href="#">complain us</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">HIRE CAR</a>
        </div>
      </li>
</nav>
	
        <section>
        	<div class="row">
        		<!-- sidenav -->
        		<div class="col-md-3  mt-2"  >

        			<div class="row ">
  <div class="col-12">
    <div class="list-group" id="list-tab" role="tablist">
	    <a class="list-group-item list-group-item-action  bg-success" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">hi <?php
         if(isset($_SESSION['USERNAME']))
         {
         	echo $_SESSION['USERNAME'];
         }
	    ?></a>
	     
     
	   
	    <a class="list-group-item list-group-item-action bg-success" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Rides</a>
	   
	   
	   
	    <a class="list-group-item list-group-item-action bg-success" id="list-settings-list" data-toggle="list" href="#list-account" role="tab" aria-controls="settings">Account </a>
    </div>
  </div>
  <div class="col-12">
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list"></div>
        <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
      	    <ul class="list-group" style="">
				<li class="list-group-item bg-dark text-white"><a href="pendingrides.php">Pending Rides</a></li>
				<li class="list-group-item bg-dark text-white"><a href="completedrides.php">Completed Rides</a></li>
				<li class="list-group-item bg-dark text-white"><a href="userallrides.php">All Rides</a></li>
				<li class="list-group-item bg-dark text-white"><a href="usercancelrides.php">Cancel Rides</a></li>
            </ul>
        </div>
       







       
        <div class="tab-pane fade" id="list-account" role="tabpanel" aria-labelledby="list-account-list">
        	<ul class="list-group" style="">
        		<li class="list-group-item bg-dark text-white"><a href="changepassword.php">Change Password</a></li>
            <li class="list-group-item bg-dark text-white"><a href= userupdateinfo.php>UpdateInfo</a></li>
        
				<!-- <li class="list-group-item bg-dark text-white"><a href= >Check how mch you have spend</a></li> -->
				
				
            </ul>
        </div>
    </div>
  </div>
</div>
        			<!-- <div class="row">
        				<div class="col-md-12"></div>
        			</div> -->
        			<!-- <div class="row">
        				<div class="col-md-12"> -->
        					<!-- <ul class="list-group" style="">
							    <li class="list-group-item bg-success"><a href="adminpanel.php" class=" text-dark">Home</a></li>
							    <li class="list-group-item bg-success">Users</li>
							    <li class="list-group-item bg-success">Rides</li>
							    <li class="list-group-item bg-success">Location</li>
							    <li class="list-group-item bg-success">Account </li>
                            </ul> -->
                        <!-- </div>
                    </div>   -->      
                    <!-- <div class="row">
        				<div class="col-md-12"></div>
        			</div> -->
        		</div>
        		<!-- //sidenav -->
        		<!-- tiles -->
        		<div class="col-md-9 mt-2">
        			<div class="row">
        				<div class="col-md-4 mt-4">
        					<div class="card" style="width: 18rem;">
								<div class="card-body bg-danger">
								    <h5 class="card-title"><a href="pendingrides.php">No of Pending Rides</a></h5>
									<p class="card-text"><?php 
									
									
									$sr=1;
									$sql=$ride1->usercountrides($Dbcon-> conn);
									// print_r($sql)
									foreach ($sql as $key) {
										//print_r ($key);
										foreach($key as $value){
											
										  echo  $value;
									}
								}
							
					                 ?>
									 </p>
								    <!-- <a href="adminpanel.php?id=booki" class="btn btn-primary">click here</a> -->
								</div>
                            </div>
        				</div>
        				<div class="col-md-4 mt-4">
        					<div class="card" style="width: 18rem;">
								<div class="card-body bg-warning">
								    <h5 class="card-title"><a href="usercancelrides.php">No of Cancelled Rides</a></h5>
								    <p class="card-text">
									<?php 
									
									
									$sr=1;
									$sql=$ride1->usercountrides2($Dbcon-> conn);
									// print_r($sql)
									foreach ($sql as $key) {
										//print_r ($key);
										foreach($key as $value){
											
										  echo  $value;
									}
								}
							
					                 ?>
									</p>
								    <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
								</div>
                            </div>
        				</div>
        				<div class="col-md-4 mt-4">
        					<div class="card" style="width: 18rem;">
								<div class="card-body bg-success">
								    <h5 class="card-title"><a href="completedrides.php">No of Completed Rides</a></h5>
								    <p class="card-text">
									<?php 
									
									
									$sr=1;
									$sql=$ride1->usercountrides3($Dbcon-> conn);
									// print_r($sql)
									foreach ($sql as $key) {
										//print_r ($key);
										foreach($key as $value){
											
										  echo  $value;
									}
								}
							
					                 ?></p>
								    <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
								</div>
                            </div>
        				</div>
        			</div>
        			<div class="row">
        				<div class="col-md-4 mt-4">
        					<div class="card" style="width: 18rem;">
								<div class="card-body bg-danger">
								    <h5 class="card-title"><a href="userallrides.php">YOUR TOTAL RIDES</a></h5>
								    <p class="card-text">
									<?php 
									
									
									$sr=1;
									$sql=$ride1->usercountrides5($Dbcon-> conn);
									// print_r($sql)
									foreach ($sql as $key) {
										//print_r ($key);
										foreach($key as $value){
											
										  echo  $value;
									}
								}
							
					                 ?></p>
								    <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
								</div>
                            </div>
        				</div>
        				
        				
        			<div class="row">
        				<div class="col-md-6 mt-4">
        					<div class="card" style="width: 18rem;">
								<div class="card-body bg-danger">
								    <h5 class="card-title"><a href="#">Total expenditure</a></h5>
								    <p class="card-text">
									<?php 
									
									
									$sr=1;
									$sql=$ride1->userexpenditure($Dbcon-> conn);
									// print_r($sql)
									foreach ($sql as $key) {
										//print_r ($key);
										foreach($key as $value){
											
										  echo   '<p style="font-size:50px">Rs.'.$value.'</p>';
									}
								}
							
					                 ?></p>
								    <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
								</div>
                            </div>
        				</div>
        				
        				 
        			</div>
        		</div>
        		<!-- //tiles -->
        </section>
        <!-- //main-content -->
        <!-- Footer -->
        <!-- <footer class="p-3 bg-dark container-fluid"> -->
            <div class="row text-center ">
                <!-- <div class="col-md-4 ">
                    <i class="fab fa-facebook text-white"></i>
                    <i class="fab fa-twitter-square text-white"></i>
                    <i class="fab fa-instagram-square text-white"></i>
                </div> -->
               <!--  <div class="col mt-0">
                    <span class="">&copy;2020 ola</span>
                </div> -->
                <!-- <div class="col-md-4">
                    <a href="#" class="text-decoration-none  m-1 text-white">FEATURES</a>
                    <a href="#" class="text-decoration-none   m-1 text-white">REVIEWS</a>
                    <a href="#" class="text-decoration-none   m-1 text-white">SIGN UP</a>
                </div>
            </div>
        </footer>
      
 jQuery CDN -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        <!-- My Script -->
        <script src="js.js"></script>
     <!--  <?php  }?> -->

</body>
<?php
include('footer2.php');
?>
</html>
