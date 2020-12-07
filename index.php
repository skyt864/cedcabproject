<?php
include('ride.php');
include('oops.php');
include('Dbconnection.php');
// require('logout.php');
// session_start();
$Dbcon = new DbConnection();



if(isset($_SESSION['RIDE'])){
  $pickup=$_SESSION['RIDE']['PICKUP'];
  $drop=$_SESSION['RIDE']['DROP'];
  // $_SESSION['RIDE']['IDD']=$_SESSION['IDD'];
 
  $originaldis=$_SESSION['RIDE']['ORIGINALDIS'];
  $fare=$_SESSION['RIDE']['FARE'];
  $cabtype=$_SESSION['RIDE']['CABTYPE'];
  $luggage=$_SESSION['RIDE']['LUGGAGE'];
 
}
// if(isset($_GET['id'])&& $_SESSION['LOGGEDIN']==false)
// {
//   echo '<script>alert("You need to login first")</script>';
// }
$ride1 = new Ridee(); 
if(isset($_GET['id']))
{
             
  $sql = $ride1 -> rideee($pickup,$drop,$originaldis,$luggage,$fare,$Dbcon-> conn); 

// echo $sql;
if(isset($_SESSION['LOGGEDIN'])==TRUE){
header("location:newuserpanel.php"); 

  }
  else
  {

    echo '<script>alert("you need to login before booking")</script>';
    header("location:login.php");
  }
}
?>
<html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
       <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"> 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="myphp.css">
        <title>Taxi Booking</title>
        <style>
        
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
  <a class="navbar-brand  text-white" href="#"><i class="fas fa-car"></i><span id="cedcab"> Ced Cab <span></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
<?php
      if(isset($_SESSION['USERNAME']))
      {
     echo '<li class="nav-item active">
        <a class="nav-link" href="newuserpanel.php">UserPanel<span class="sr-only">(current)</span></a>
      </li>';
    }
    else
    {
     echo '<li class="nav-item active">
        <a class="nav-link" href="index.php">Home<span class="sr-only">(current)</span></a>
      </li>'; 
    }
      ?>
      <?php 
      if(isset($_SESSION['USERNAME']))
      {
       echo '<li class="nav-item active">
        <a class="nav-link" href="#">WELCOME<span class="sr-only">(current)</span></a>
      </li>';
    }
    else
    {
      echo '<li class="nav-item active">
        <a class="nav-link" href="Register.php">REGISTER<span class="sr-only">(current)</span></a>
      </li>';
    }
    ?>
      <?php

      if(isset($_SESSION['USERNAME']))
      {
       echo '<li class="nav-item active">
        <a class="nav-link" href="logout.php">Logout<span class="sr-only">(current)</span></a>
      </li>';
        }
        else
        {
           echo '<li class="nav-item active">
                <a class="nav-link" href="login.php">Login<span class="sr-only">(current)</span></a>
              </li>';
        }
?>

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
        <div class="container-fluid">
            
            <div class="container ">
                <div class="heading text-center">
                    <h3 class="display-4">Book a City Taxi to your destination in town</h3>
                    <p id="para">Choose from a range of categories and prices</p>
                </div>
                <div class="row text-dark">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <span id="header">CITY TAXI</span>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Your everyday travel partner</h5>
                                <h6>AC Cabs for point to point travle</h6>
                                <form  id="formm">
                                    <div class="input-group mb-3 pickup">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01" >PICKUP</label>
                                        </div>
                                        <select class="form-control g" id="inputGroupSelect01" name="pickup" required>
                                            <!-- <option value="">Current Location</option> -->
                                           <?php
                                            if(isset($_SESSION['RIDE']))
                                            {
                                               echo'<option value="'.$_SESSION['RIDE']['PICKUP'].'">'.$_SESSION['RIDE']['PICKUP'].'</option>';
                                          }
                                        
                                            else
                                            echo '<option value="">Current Location</option>';
                                          {
                                             


                                           $User=new User();
                                          $Dbcon=new Dbconnection();
                                          $sql=$User->myroww($Dbcon->conn);
                                          foreach ($sql as $key => $value) {
                                            print_r('<option value="'.$value['name'].'">'.$value['name'].'</option>');
                                          } 
                                        }
                                            ?>
                                          
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group mb-3 drop">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text" for="inputGroupSelect01" >DROP</label>
                                            </div>
                                            <select class="form-control g" id="inputGroupSelect01" name="drop" required>
                                            <!-- <option value="">Current Location</option> -->
                                           <?php
                                            if(isset($_SESSION['RIDE']))
                                            {
                                               echo'<option value="'.$_SESSION['RIDE']['DROP'].'">'.$_SESSION['RIDE']['DROP'].'</option>';
                                          }
                                        
                                            else
                                            echo '<option value="">Current Location</option>';
                                          {
                                             


                                           $User=new User();
                                          $Dbcon=new Dbconnection();
                                          $sql=$User->myroww($Dbcon->conn);
                                          foreach ($sql as $key => $value) {
                                            print_r('<option value="'.$value['name'].'">'.$value['name'].'</option>');
                                          } 
                                        }
                                            ?>
                                          
                                        </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text" for="inputGroupSelect01">CAB TYPE</label>
                                            </div>
                                            <select class="form-control g" id="inputGroupSelect01" name="cabtype"required>
                                                <!-- <option value="">Drop down to select CAB Type</option> -->
                                                 <?php
                                            if(isset($_SESSION['RIDE']))
                                            {
                                               echo'<option value="'.$_SESSION['RIDE']['CABTYPE'].'">'.$_SESSION['RIDE']['CABTYPE'].'</option>';
                                          }
                                           else

                                            echo '<option value="">Drop down to select CAB Type</option>';
                                           {
                                              echo'<option value="CedMicro">CedMicro</option>
                                                <option value="CedMini">CedMini</option>
                                                <option value="CedRoyal">CedRoyal</option>
                                                <option value="CedSUV">CedSUV</option>';
                                              }
                                              ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="input-group mb-3 luggage">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing">
                                             

                                            LUGGAGE</span>
                                        </div>

                                        <input type="text" class="form-control" id="luggage" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="luggage" value=<?php if(isset($_SESSION['RIDE']))
                                               {
                                              echo $_SESSION['RIDE']['LUGGAGE'];
                                            }
                                              else
                                              {
                                                echo "";
                                              }


                                             ?>




                                        >

                                    </div>
                                    <button type="submit" id="calculatefare" class="btn btn- btn-block">Calculate Fare</button>
                                    
                                    <a href="index.php?id=bookid" name="bookid" id="bookid" class="btn btn- btn-block">Book Now</a>
                                     <!-- <button type="submit"  id ="bookid" name ="bookid" class="btn btn- btn-block">Book Now</button></form> -->
                                <div id="result" class="mt-5">
                                         <!-- <?php 
                                            //if(isset($_SESSION['RIDE']))
                                            {
                                              //print_r($_SESSION['RIDE']);
                                            }
                                          
                                         ?> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer -->
    <footer class="page-footer font-small blue bg-dark wdd">

 
   <div class="row text-center ">
                <div class="col-md-4 ">
                    <i class="fab fa-facebook text-white"></i>
                    <i class="fab fa-twitter-square text-white"></i>
                    <i class="fab fa-instagram-square text-white"></i>
                </div>
                <div class="col-md-4 mt-0">
                    <!-- div class="display-5 text-hotpink ">oslo</div> -->
                    <span class="text-decoration-none  m-1 text-white">©2020 ola</span>
                    <!-- <p><i class="fas fa-heart text-hotpink"></i>crafted lovingly with page cloud</p> -->
                </div>
                <div class="col-md-4">
                    <a href="#" class="text-decoration-none  m-1 text-white">FEATURES</a>
                    <a href="#" class="text-decoration-none   m-1 text-white">REVIEWS</a>
                    <a href="#" class="text-decoration-none   m-1 text-white">SIGN UP</a>
                </div>
            </div>
 
  <!-- Copyright -->

</footer>

<!-- Footer -->
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="h.js"></script>
    </body>
</html>

<?php if(isset($_SESSION['RIDE']))
                                               {
                                              echo $_SESSION['RIDE']['LUGGAGE'];
                                            }
                                              else
                                              {
                                                echo "";
                                              }


                                             ?>