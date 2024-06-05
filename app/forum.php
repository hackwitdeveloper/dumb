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

         <!-- DataTables -->
         <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

        <!-- Responsive datatable examples -->
        <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />     

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
                                    <h4 class="mb-sm-0 font-size-18">Forum List</h4>

                                    <div class="page-title-right">
                                        
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                    >Create New Forum</button>   

                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">New Forum</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="post" action="forum.php">
                                                                <div class="mb-3">
                                                                    <label  class="col-form-label">Forum Name</label>
                                                                    <input type="text" name="forumname" class="form-control" placeholder="Forum Name" required >
                                                                </div>
                                                                
                                                               
                                                                
                                                            
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" name="addforum" class="btn btn-primary">Create Forum</button>
                                                        </div>
                                                        </form>

                                                        <?php
// Establilshing Connection into MYSQL!
include('connect.php');
if(isset($_POST['addforum']))
{
        
        $idname = "ForumName";
        $select_query = "select * from idcodes where idname = '$idname'";

        $run = mysqli_query($connect,$select_query);

        while ($row = mysqli_fetch_array($run)) {
            $idcode = $row['idcode'];
            $codes = $row['codes'];
        }

        $codes = $codes+1;
        if($codes<10){
            $forumid = $idcode."00".$codes;
        }else if($codes<100){
            $forumid = $idcode."0".$codes;
        }else{
           $forumid = $idcode.$codes; 
        }

        $forumname = $_POST['forumname'];
        $count = 0;
        $status = "Active";
      
       
        // Insert Data into MySQL DB

        $insert_query = "INSERT INTO `forumlist`(`forumid`, `forumname`, `count`, `status`) VALUES    ('$forumid','$forumname','$count','$status')";

        if(mysqli_query($connect,$insert_query)){

            $update_query="UPDATE idcodes SET codes = $codes WHERE idname = '$idname'";

            if(mysqli_query($connect,$update_query)){

                 echo "<script>window.open('forum.php','_self')</script>";
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
                                                </div>
                                            </div>
                                        </div>



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


                                        <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                                                <thead class="table-light">
                                                    <tr>
                                                        
                                                        <th class="align-middle">#</th>
                                                        <th class="align-middle">Forum</th>
                                                        <th class="align-middle">Topics</th>
                                                        <th class="align-middle">Status</th>
                                                        <th class="align-middle">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php
include('connect.php');

$select_query = "select * from forumlist order by id desc";

$run = mysqli_query($connect,$select_query);

$c=0;

while ($row = mysqli_fetch_array($run)) {

$c = $c+1;

$forumid = $row['forumid'];

$select_query1 = "select * from forum where forumid='$forumid' ";

$run1 = mysqli_query($connect,$select_query1);

$cc=0;

while ($row1 = mysqli_fetch_array($run1)) {
    $cc= $cc + 1;
}


?>
                                                    <tr>
                                                       
                                                       
                                                        <td><?php echo $c; ?></td>
                                                        <td>
                                                            <?php echo $row['forumname']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $cc; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row['status']; ?>
                                                        </td>
                                                       
                                                        <td>
                                                            
                                                            <a href="viewforum.php?forumid=<?php echo $row['forumid']; ?>&forumname=<?php echo $row['forumname']; ?>"> <button type="button" class="btn btn-secondary waves-effect waves-light ">
                                                            <i class="mdi mdi-eye"></i> 
                                                            </button></a>  
                                                            <a href="editforum.php?forumid=<?php echo $row['forumid']; ?>"> <button type="button" class="btn btn-secondary waves-effect waves-light ">
                                                            <i class="mdi mdi-pencil"></i> 
                                                            </button></a>
                                                    
                                                            

                                                        </td>
                                                      
                                                    </tr>
<?php 


} ?>
                                                   
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

        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>

        <!-- Required datatable js -->
        <script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <!-- Buttons examples -->
        <script src="assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
        <script src="assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
        <script src="assets/libs/jszip/jszip.min.js"></script>
        <script src="assets/libs/pdfmake/build/pdfmake.min.js"></script>
        <script src="assets/libs/pdfmake/build/vfs_fonts.js"></script>
        <script src="assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
        <script src="assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
        <script src="assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
        
        <!-- Responsive examples -->
        <script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

        <!-- Datatable init js -->
        <script src="assets/js/pages/datatables.init.js"></script>    

        <script src="assets/js/app.js"></script>
    </body>

</html>
<?php } ?>