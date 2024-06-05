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
                    <?php 
                    
                    if(isset($_GET['qid'])){

                        $qid = $_GET['qid'];

                        include('connect.php');

$select_query = "select * from forum where qid = '$qid' ";

$run = mysqli_query($connect,$select_query);

while ($row = mysqli_fetch_array($run)) {

    $question = $row['question'];
    $forumname = $row['forumtype'];
    $forumid = $row['forumid'];

}
                         
                    
                    ?>
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18"> <a href="viewforum.php?forumid=<?php echo $forumid; ?>&forumname=<?php echo $forumname; ?>"><?php echo $forumname; ?></a> <br><br> Q: <?php echo $question; ?></h4>

                                    <div class="page-title-right">
                                        
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                    >Start Answer</button>   

                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">New Answer</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="post" action="addanswer.php">
                                                                <div class="mb-3">
                                                                    <label  class="col-form-label">Answer</label>
                                                                    <textarea name="answer" id="answer" rows="6" cols="35" required="" ></textarea>
                                                                    <input type="hidden" name="qid" class="form-control"  value="<?php echo $qid;  ?>">
                                                                </div>
                                                                
                                                               
                                                                
                                                            
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" name="addanswer" class="btn btn-primary">Submit Answer</button>
                                                        </div>
                                                        </form>
                                                        <script src = "ckeditor/ckeditor.js"></script>
                                        <script>
                                            CKEDITOR.replace('answer');
                                        </script>
                                                        
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
                                                        <th class="align-middle">Date</th>
                                                        <th class="align-middle">User</th>
                                                        <th class="align-middle">Email</th>
                                                        <th class="align-middle">Replies</th>
                                                        <th class="align-middle">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php

$select_query = "select * from form_answer where qid = '$qid' order by id desc";

$run = mysqli_query($connect,$select_query);

$c=0;

while ($row = mysqli_fetch_array($run)) {

$c = $c+1;


?>
                                                    <tr>
                                                       
                                                       
                                                        <td><?php echo $c; ?></td>
                                                        <td>
                                                            <?php echo $row['date_time']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row['user']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row['email']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row['answer']; ?>
                                                        </td>
                                                       
                                                        <td>
                                                         
                                                        <a href="editanswer.php?qid=<?php echo $row['qid']; ?>&id=<?php echo $row['id']; ?>"  title="Edit"> <button type="button" class="btn btn-danger waves-effect waves-light ">
                                                            <i class="mdi mdi-pencil"></i> 
                                                            </button></a>
                                                            <a href="deleteanswer.php?qid=<?php echo $row['qid']; ?>&id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this item?');" title="Delete"> <button type="button" class="btn btn-danger waves-effect waves-light ">
                                                            <i class="mdi mdi-delete"></i> 
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


                    <?php } ?>
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