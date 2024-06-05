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
        <meta content="Hackwit Technologies" name="author" />
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
                                    <h4 class="mb-sm-0 font-size-18">Add User</h4>

                                    

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                       
                        <!-- end row -->

                      
                        <!-- end row -->

                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-body">
                                       

                                        <form method="post" action="adduser.php" >
                                              
                                             
                                            <div class="row mb-4">
                                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Name</label>
                                                <div class="col-sm-9">
                                                  <input type="text" class="form-control" id="horizontal-firstname-input" placeholder=" Name " name="name" required>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="horizontal-email-input" class="col-sm-3 col-form-label">Phone</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="horizontal-email-input" placeholder="Phone Number" name="phone" required>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="horizontal-password-input" class="col-sm-3 col-form-label">Email</label>
                                                <div class="col-sm-9">
                                                  <input type="text" class="form-control" id="horizontal-password-input" placeholder="Email ID" name="email" required>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="horizontal-password-input" class="col-sm-3 col-form-label">Password</label>
                                                <div class="col-sm-9">
                                                  <input type="text" class="form-control" id="horizontal-password-input" placeholder="Password" name="password" required>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="horizontal-password-input" class="col-sm-3 col-form-label">Role</label>
                                                <div class="col-sm-9">
                                                  <select class="form-control" name="role" required>
                                                      <option value="User" >User</option>
                                                      <option value="Admin" >Admin</option>
                                                  </select>
                                                </div>
                                            </div>
                                          
                                          

                                            <div class="row justify-content-end">
                                                <div class="col-sm-9">

                                                    

                                                    <div>
                                                        <button type="submit" name="adduser" class="btn btn-primary w-md">Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>

<?php
// Establilshing Connection into MYSQL!
include('connect.php');
if(isset($_POST['adduser']))
{
        
        $idname = "Admin";
        $select_query = "select * from idcodes where idname = '$idname'";

        $run = mysqli_query($connect,$select_query);

        while ($row = mysqli_fetch_array($run)) {
            $idcode = $row['idcode'];
            $codes = $row['codes'];
        }

        $codes = $codes+1;
        if($codes<10){
            $userid = $idcode."00".$codes;
        }else if($codes<100){
            $userid = $idcode."0".$codes;
        }else{
           $userid = $idcode.$codes; 
        }

        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $role = $_POST['role'];
        $password = $_POST['password'];
        $password = md5($password);
        $permission = "on";
       
        // Insert Data into MySQL DB

        $insert_query = "INSERT INTO `admin`(`userid`, `name`, `phone`, `email`, `password`, `role`, `permission`) VALUES   ('$userid','$name','$phone','$email','$password','$role','$permission')";

        if(mysqli_query($connect,$insert_query)){

            $update_query="UPDATE idcodes SET codes = $codes WHERE idname = '$idname'";

            if(mysqli_query($connect,$update_query)){

                 echo "<script>window.open('user.php','_self')</script>";
            }

            else{
                echo mysqli_error($connect);
            }    

        }else{
            echo mysqli_error($connect);
        }

}

?>
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->
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