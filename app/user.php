<?php
session_start();

if (!isset($_SESSION['MPLuserid'])) {
    
    header("location:login.php");
}
else{
    
    $category=$_SESSION['category'];
    
?>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title>HUMB</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Meiphor" name="description" />
        <meta content="Meiphor" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/onesm.png">

        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    <body data-sidebar="dark">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">

            
            <?php include('header.php'); ?>

            <!-- ========== Left Sidebar Start ========== -->
            <?php include('menu.php'); ?>
            <!-- Left Sidebar End -->

            

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">User List</h4>

                                    <div class="page-title-right">
                                        <a href="adduser.php">
                                            <button type="button" class="btn btn-primary waves-effect waves-light">Add User</button> 
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                       
                        <!-- end row -->

                      
                        <!-- end row -->

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">

                                        <div class="table-responsive">


                                            <table class="table align-middle table-nowrap mb-0">
                                                <thead class="table-light">
                                                    <tr>
                                                        
                                                        <th class="align-middle">#</th>
                                                        <th class="align-middle">UserID</th>
                                                        <th class="align-middle">Name</th>
                                                        <th class="align-middle">Phone</th>
                                                        <th class="align-middle">Email</th>
                                                        <th class="align-middle">Role</th>
                                                       
                                                        <th class="align-middle">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php
include('connect.php');

$select_query = "select * from admin order by id desc";

$run = mysqli_query($connect,$select_query);

$c=0;

while ($row = mysqli_fetch_array($run)) {

$c = $c+1;

?>
                                                    <tr>
                                                       
                                                       
                                                        <td><?php echo $c; ?></td>
                                                       <td>
                                                            <?php echo $row['userid']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row['name']; ?>
                                                        </td>
                                                        <td>
                                                             <?php echo $row['phone']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row['email']; ?>
                                                        </td>
                                                        <td>
                                                             <?php echo $row['role']; ?>
                                                        </td>
                                                          
                                                        <td>
                                                            
                                                             <a href="viewuser.php?userid=<?php echo $row['userid']; ?>"> <button type="button" class="btn btn-secondary waves-effect waves-light ">
                                                            <i class="mdi mdi-pencil"></i> 
                                                            </button></a>
                                                            <a href="deleteuser.php?userid=<?php echo $row['userid']; ?>" onclick="return confirm('Are you sure you want to delete this item?');" title="Delete"> <button type="button" class="btn btn-danger waves-effect waves-light ">
                                                            <i class="mdi mdi-delete"></i> 
                                                            </button></a>

                                                        </td>
                                                    </tr>
<?php } ?>
                                                   
                                                </tbody>
                                            </table>

                                        
                                        </div>
                                        <!-- end table-responsive -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                    </div>
                    <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                
                <!-- end modal -->

                <!-- subscribeModal -->
              
                <!-- end modal -->
<?php include('footer.php') ?>
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <!-- Right Sidebar -->
       
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
      
        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>

        <!-- apexcharts -->
        <script src="assets/libs/apexcharts/apexcharts.min.js"></script>

        <!-- dashboard init -->
        <script src="assets/js/pages/dashboard.init.js"></script>

        <!-- App js -->
        <script src="assets/js/app.js"></script>
    </body>

</html>
<?php } ?>