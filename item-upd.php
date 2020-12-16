<?php 
error_reporting(0);
include('top.php'); 
if(isset($_GET['update_id'])){
  $id=$_GET['update_id'];
  $query="SELECT * FROM item WHERE item_id =$id";
  $run = mysqli_query($conn,$query);
  $user =mysqli_fetch_assoc($run);
}
    if(isset($_POST['update']))
    {
        $item_name = $_POST['item_name'];
        $query="UPDATE item SET item_name='$item_name' WHERE item_id=$id";
        $run=mysqli_query($conn,$query);
        if($run)
        {
            $msg='<div class="alert alert-success alert-dismissible fade1 show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Item Update Success..!</strong>
          </div>';
             header('refresh:.5; url=item-list.php');
        }
        else
        {   
            $msg='<div class="alert alert-danger alert-dismissible fade1 show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Failed!</strong>
           </div>';
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <title>Sales List</title>
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

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Add Item </h4>
                                   
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title mb-4">Add Item</h4>

                                        <form class="parsley-examples" action="" method="post">
                                            <div class="form-group">
                                                <?php echo $msg; ?>
                                            </div>
                                            <div class="form-group">
                                                <label for="category">Item Name<span class="text-danger">*</span></label>
                                                <input type="text" name="item_name" parsley-trigger="change" required placeholder="Enter Item Name" class="form-control" value="<?php echo $user['item_name'];?>">
                                            </div>
                                            
                                            <div class="form-group text-right mb-0">
                                                <input class="btn btn-primary waves-effect waves-light mr-1" type="submit" name="update" value="Update">                                              
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                  </div>
                
                <?php include("include/footer.php"); ?>

            </div>

        </div>
        <?php include("include/js.php"); ?>
     
    </body>
</html>