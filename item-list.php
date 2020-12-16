<?php include('top.php'); 
######Delete####
if(isset($_GET['delete_id']))
{
    $id=$_GET['delete_id'];
    $query="Delete from item where item_id='$id'";
    $run=mysqli_query($conn,$query);
   if($run)
    {   echo "<script>alert('Item Delete Successfully');</script>";
        header('refresh:.5; url=item-list.php');
    }else
    {
        echo "<script>alert('Failed');</script>";
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

                        
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body table-responsive">
                                        <h4 class="m-t-0 header-title mb-4"><b>Item List</b></h4>

                                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                                            <thead>
                                                 <tr>
                                                    <th>Id</th>
                                                    <th>Item Name</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                               <?php
                                                    $query="Select * from item";
                                                        $run=mysqli_query($conn,$query);
                                                      while($user=mysqli_fetch_assoc($run))
                                                      {
                                                    ?>
                                                <tr>
                                                    <td><?php echo $user['item_id'];?></td>
                                                    <td><?php echo $user['item_name'];?></td>
                                                    
                                                    <td>
                                                        <!--<a class="btn btn-info btn-xs" onClick="return confirm('Are you sure you want to view details patient ?')" href="patient-view.php?update_id=<?php // echo $user['pesent_id']; ?>"><i class="fas fa-eye"></i></a>-->

                                                    <a class="btn btn-info btn-xs" onClick="return confirm('Are you sure you want to update item?')" href="item-upd.php?update_id=<?php echo $user['item_id']; ?>"><i class="fas fa-edit"></i></a>
                                                    
                                                    <a class="btn btn-danger btn-xs" onClick="return confirm('Are you sure you want to delete item ?')" href="item-list.php?delete_id=<?php echo $user['item_id']; ?>"><i class="fas fa-trash"></i></a></td>
                                                </tr>
                                                <?php } ?>
                                              
                                            </tbody>
                                        </table>
                                    </div>
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