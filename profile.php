<?php include('top.php'); 
$query="Select * from admin";
$run=mysqli_query($conn,$query);
$user=mysqli_fetch_assoc($run);
?>
<?php
    if(isset($_POST['update']))
      {
        $username = $_POST['username'];  
        $password = $_POST['password'];    
        $name = $_POST['name'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $query = "UPDATE admin SET username='$username',password='$password',name='$name',email='$email',mobile='$mobile' ";
        $run   = mysqli_query($conn,$query);
        if($run)
        {
             echo "<script>alert('Profile Update Success...');</script>";
            header('refresh:.5; url=profile.php');
        }
        else
        {  
            echo "<script>alert('Failed...');</script>";
        }
      }
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <title>Item List</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Responsive bootstrap 4 admin template" name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <?php include("include/css.php"); ?>
    </head>

    <body>
        <div id="wrapper">

            <?php include("include/header.php"); ?>
            <?php include("include/left-sidebar.php"); ?>
           
            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">

                        

                        <div class="row mt-4">
                            <div class="col-sm-12">
                                <div class="card p-0">
                                    <div class="card-body p-0">
                                        <ul class=" nav nav-tabs tabs-bordered nav-justified">
                                            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#aboutme">Profile Display</a></li>
                                             <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#edit-profile">Profile Update</a></li>
                                           
                                        </ul>

                                        <div class="tab-content m-0 p-4">

                                            <div id="aboutme" class="tab-pane active">
                                                <div class="profile-desk">
                                                    <h5 class="mt-4">Profile Display</h5>
                                                    <table class="table table-condensed mb-0">
                                                        <tbody>
                                                                <tr>
                                                                    <th scope="row">Name</th>
                                                                    <td>
                                                                        <a href="#" class="ng-binding">
                                                                            <?php echo $user['name'];?>
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">Username</th>
                                                                    <td>
                                                                        <a href="#" class="ng-binding">
                                                                           <?php echo ucwords($user['username']); ?>
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">Email</th>
                                                                    <td>
                                                                        <a href="#" class="ng-binding">
                                                                            <?php echo $user['email'];?>
                                                                        </a>
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <th scope="row">Mobile</th>
                                                                    <td class="ng-binding"><?php echo $user['mobile'];?></td>
                                                                </tr>
                                                                
                                                                
                                                            </tbody>
                                                        </table>
                                                    </div> <!-- end profile-desk -->
                                                </div> <!-- about-me -->

                                                

                                                <!-- settings -->
                                                <div id="edit-profile" class="tab-pane">
                                                    <div class="user-profile-content">
                                                        <form method="post">
                                                            <div class="form-group">
                                                                <label for="username">Username:</label>
                                                                <input type="text" name="username" value="<?php echo $user['username']; ?>" id="FullName" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="password">Password</label>
                                                                <input type="password" placeholder="Change Password" id="password" name="password" class="form-control" value="<?php echo $user['password']; ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="name">Name</label>
                                                                <input type="text" value="<?php echo $user['name']; ?>" name="name" id="name" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="email">Email</label>
                                                                <input type="email" name="email" value="<?php echo $user['email']; ?>" id="email" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="mobile">Mobile</label>
                                                                <input type="number"  id="mobile" name="mobile" value="<?php echo $user['mobile']; ?>" class="form-control">
                                                            </div>
                                                           
                                                            <input type="submit" name="update" class="btn btn-primary" value="Update">  
                                                        </form>
                                                    </div>
                                                </div>

                                                
                                            </div>

                                        </div> 
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
        </div>
        <?php include("include/js.php"); ?>
     
    </body>
</html>