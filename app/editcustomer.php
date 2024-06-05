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
                       
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">View Customer</h4>

                                    <div class="page-title-right">
                                       

                                        

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

        
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-body">
                                       


             <?php
include('connect.php');
$id = $_GET['id'];
$query = "select * from customer where id = '$id'";


$run = mysqli_query($connect,$query);
$c=0;
while ($row=mysqli_fetch_array($run)) {
    $c=$c+1;
   ?>

                                        <form action="updatecustomer.php" method="POST">
                                            
                                           
                                            <div class="row mb-4">
                                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Name</label>
                                                <div class="col-sm-9">
                                                  <input type="text" class="form-control" name="name" value="<?php echo $row['name']; ?>" readonly>
                                                  <input type="hidden"  name="id" value="<?php echo $row['id']; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Phone</label>
                                                <div class="col-sm-9">
                                                  <input type="number" class="form-control" name="phone" value="<?php echo $row['phone']; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Email</label>
                                                <div class="col-sm-9">
                                                  <input type="email" class="form-control" name="email" value="<?php echo $row['email']; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Interest</label>
                                                <div class="col-sm-9">
                                                  <input type="text" class="form-control" name="interest" value="<?php echo $row['interest']; ?>" readonly>
                                                </div>
                                            </div>
                                           
                                            <div class="row mb-4">
                                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Note</label>
                                                <div class="col-sm-9">
                                                  <input type="text" class="form-control" name="note" value="<?php echo $row['note']; ?>" required>
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
                           
                               <!-- end card -->
                            
                        </div> <!-- end row -->
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