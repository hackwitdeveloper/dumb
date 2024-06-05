<?php
session_start();

if (!isset($_SESSION['MPLuserid'])) {
    header("location:login.php");
} else {
    $category=$_SESSION['category'];
}
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
                       
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Blog List</h4>

                                    <div class="page-title-right">
                                        
                                    </div>

                                    

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

        
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Update Blog</h4>


                                        <?php
include('connect.php');

// Check if 'id' parameter exists in the URL
if(isset($_GET['forumid'])) {
    $forumid = $_GET['forumid'];

    $query = "SELECT * FROM forumlist WHERE forumid = '$forumid'";
    $run = mysqli_query($connect, $query);

    
    while ($row = mysqli_fetch_array($run)) {
        $status = $row['status'];
        
?>

                                        <form action="updateforum.php" method="POST">
                                            <div class="row mb-4">
                                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Title</label>
                                                <div class="col-sm-9">
                                                  <input type="text" class="form-control" name="forumname" value="<?php echo $row['forumname']; ?>" required>
                                                  <input type="hidden"  name="forumid" value="<?php echo $row['forumid']; ?>" readonly>
                                                </div>
                                            </div>
                                           
                                            <div class="row mb-4">
                                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Status</label>
                                                <div class="col-sm-9">
                                                    <select name="status"  class="form-control" id="">
                                                        <option  value="<?php echo $status; ?>"><?php echo $status; ?></option>
                                                        <?php if($status =="Active"){ ?>
                                                            <option  value="Deactivated">Deactivated</option>
                                                        <?php }else{ ?>
                                                            <option  value="Active">Active</option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            
                                           
                                            
                                            <div class="row justify-content-end">
                                                <div class="col-sm-9">
                                                            <div>
                                                        <button type="submit" name="submit" class="btn btn-primary w-md">Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        
                                    <?php } ?>
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->
                            </div>
                        </div> <!-- end row -->
                    </div>
                    <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                
                <!-- end modal -->

                <!-- subscribeModal -->
              
                <!-- end modal -->
<?php include('footer.php'); ?>
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
    
