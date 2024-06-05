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
                                    <h4 class="mb-sm-0 font-size-18">Add New blog</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                       
                        <!-- end row -->

                      
                        <!-- end row -->

                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                       

                                    <form method="post" action="addblog.php" enctype="multipart/form-data">
                                            <div class="row mb-4">
                                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Title</label>
                                                <div class="col-sm-9">
                                                  <input type="text" class="form-control" id="horizontal-firstname-input" placeholder=" Title " name="blog_title" required>
                                                </div>
                                            </div>
                                           
                                            <div class="row mb-4">
                                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Author</label>
                                                <div class="col-sm-9">
                                                  <input type="text" class="form-control" id="horizontal-firstname-input" placeholder=" Author " name="author" required>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Blog Content</label>
                                                <div class="col-sm-9">
                                                   <textarea name="blog_content" id="blog_content" rows="6" cols="35" required="" ></textarea>
</div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="horizontal-password-input" class="col-sm-3 col-form-label">Image</label>
                                                <div class="col-sm-9">
                                                  <input type="file" class="form-control" id="horizontal-password-input"  accept=".jpg,.png,.pdf" placeholder="Blog Image" name="image"  required>
                                                </div>
                                            </div>
                                          
                                            
                                            <div class="row justify-content-end">
                                                <div class="col-sm-9">
                                                    <div>
                                                        <button type="submit" name="addblog" class="btn btn-primary w-md">Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <script src = "ckeditor/ckeditor.js"></script>
                                        <script>
                                            CKEDITOR.replace('blog_content');
                                        </script>

<?php
include('connect.php');
if(isset($_POST['addblog']))
{
    echo "Test";
        
        // $idname = "Admin";
        // $select_query = "select * from blog where id = '$id'";

        // $run = mysqli_query($connect,$select_query);

        // while ($row = mysqli_fetch_array($run)) {
        //     $idcode = $row['idcode'];
        //     $codes = $row['codes'];
        // }

        // $codes = $codes+1;
        // if($codes<10){
        //     $userid = $idcode."00".$codes;
        // }else if($codes<100){
        //     $userid = $idcode."0".$codes;
        // }else{
        //    $userid = $idcode.$codes; 
        // }

        $blog_title = $_POST['blog_title'];
        $author = $_POST['author'];
        date_default_timezone_set('Australia/Sydney');
        $date_time = date('d M Y');
        $note="";
        $blog_content = $_POST['blog_content'];
        $image = $_POST['image'];
       
        echo "Test";

         //Image Upload into Server

         $image_path = 'Photos/';
         $random_digit = rand(10,100);
 
         $upload_image_path = $image_path.$random_digit.($_FILES['image']['name']); //to upload image into server
         
         $image = $random_digit.($_FILES['image']['name']); //to save into db
 
         if(move_uploaded_file($_FILES['image']['tmp_name'], $upload_image_path)){
 
             echo "Success";
         }else{
             echo "Photo Upload Error!";
         }

       
        // Insert Data into MySQL DB

        $insert_query = "INSERT INTO `blog`(`blog_title`, `author`, `blog_content`, `image`, `date_time`, `note`) VALUES  ('$blog_title','$author','$blog_content','$image','$date_time','$note')";

        if(mysqli_query($connect,$insert_query)){

            echo "<script>window.alert('Thank you for submitting!')</script>";
            echo "<script>window.open('blog.php','_self')</script>";
              

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