<?php

require_once('oops.php');
include('header.php');
include ('Dbconnection.php');
// include('footer.php');
if(isset($_POST['submit'])){
  $username =$_POST['user_name'];
  $password = $_POST['password'];
  $repassword =$_POST['repassword'];
  
  $name=$_POST['name'];
  // $cookie_name=$username;
  $mobile=$_POST['mobile'];
  $User = new User();
  $Dbcon=new Dbconnection();
  $sql=$User->Register($username,$password,$repassword,$name,$mobile,$Dbcon->conn);
  echo "successful registration";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="mycsss.css">
	<style >
		html,body{
			background-image: url('https://cms-web.olacabs.com/00000000383.jpg');
		}
		body {
  margin: 0;
  padding: 0;
  background-color: #17a2b8;
  height: 100vh;
 
}
#login .container #login-row #login-column #login-box {
  margin-top: 20px;
  max-width: 600px;
  height: 550px;
  border: 1px solid #fff;

  /*background-color: #EAEAEA;*/
}
#login .container #login-row #login-column #login-box #login-form {
  padding: 20px;
}
#login .container #login-row #login-column #login-box #login-form #register-link {
  margin-top: -85px;
}
	</style>
</head>
<body>
    <div id="login">
        <!-- <h3 class="text-center text-white pt-5">Signup form</h3> -->
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="" method="post">
                            <h3 class="text-center text-warning">Signup</h3>
                            <div class="form-group">
                                <label for="username" class="text-warning">Username:</label><br>
                                <input type="text" name="user_name" id="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="username" class="text-warning">name:</label><br>
                                <input type="text" name="name" id="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-warning">Password:</label><br>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-warning">Re-Password:</label><br>
                                <input type="password" name="repassword" type="password" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-warning">Mobile:</label><br>
                                <input type="text" name="mobile" maxlength="10" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                               <!--  <label for="remember-me" class="text-info"><span>Remember me</span> <span><input id="remember-me" name="remember-me" type="checkbox"></span></label><br> -->
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="submit">
                            </div>
                            <div id="register-link" class="text-right">
                            </br>
                                <a href="login.php" class="text-success bg-white">Login here</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php 

include('footer2.php');
?>
</body>

</html>