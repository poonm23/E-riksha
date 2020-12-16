<?php
session_start();
error_reporting(0);
include("include/db.php");
if(isset($_POST['login']))
{      
      $myusername = mysqli_real_escape_string($conn,$_POST['username']);
      $mypassword = mysqli_real_escape_string($conn,$_POST['password']); 
      
      $sql = "SELECT * FROM admin WHERE username = '$myusername' and password = '$mypassword' ";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $count = mysqli_num_rows($result);
      if($count == 1) {
         $_SESSION['login_user'] = $myusername;
         header("location: dashboard.php");
      }else {
         $error = "Your Username And  Password is invalid";
      }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <title>E- Rickshaw Admin Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="" name="description" />
        <meta content="" name="ajeet kumar" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-stylesheet" />
    </head>
    <body class="authentication-page">
        <div class="account-pages my-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card mt-4">
                            <div class="card-header bg-primary">
                                <h4 class="text-white text-center mb-0 mt-0">Admin Login</h4>
                            </div>
                            <div class="card-body">
                                <form action="#" class="p-2" method="post">
                                    <div style = "font-size:13px; font-weight: bold; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
                                    <div class="form-group mb-3">
                                        <label for="username">Username :</label>
                                        <input class="form-control" type="text" id="username" name="username" required="" placeholder="Enter Your Username">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="password">Password :</label>
                                        <input class="form-control" type="password" name="password" required="" id="password" placeholder="Enter your password">
                                    </div>

                                    <div class="form-group mb-4">
                                        <div class="checkbox checkbox-success">
                                            <input id="remember" type="checkbox" >
                                            <label for="remember">
                                                Remember me
                                            </label>
                                            <a href="pages-recoverpw.html" class="text-muted float-right">Forgot your password?</a>
                                        </div>
                                    </div>
                                    <div class="form-group row text-center mt-4 mb-4">
                                        <div class="col-12">
                                            <input class="btn btn-md btn-block btn-primary waves-effect waves-light" type="submit" name="login" value="Login">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
        <script src="assets/js/vendor.min.js"></script>
        <script src="assets/js/app.min.js"></script>
    </body>
</html>