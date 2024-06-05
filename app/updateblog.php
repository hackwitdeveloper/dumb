<?php

include('connect.php');



    $id  = $_POST['id'];
    $blog_title  = $_POST['blog_title'];
    $author  = $_POST['author'];
    $blog_content  = $_POST['blog_content'];
    $link = $_POST['link'];

     // File upload handling
      $image_path = 'Photos/';

      $random_digit = rand(10,100);
 
      $upload_image_path = $image_path.$random_digit.($_FILES['image']['name']); //to upload image into server

      $image = $random_digit.($_FILES['image']['name']); //to save into db
 
     if(move_uploaded_file($_FILES['image']['tmp_name'], $upload_image_path)){

      $update_query = "UPDATE `blog` SET  `image`='$image' WHERE id='$id' ";
  
      if (mysqli_query($connect,$update_query)) {
      }

      }else{
            echo "Photo Upload Error!";
      }
   



    $update_query = "UPDATE `blog` SET `blog_title`='$blog_title', `author`='$author', `blog_content`='$blog_content' WHERE id='$id' ";
  
      if (mysqli_query($connect,$update_query)) {
    
         echo "<script>window.alert('Updated Successfully!')</script>";      
         echo "<script>window.open('viewblog.php?id=$id','_self')</script>";
      }
    else
    {
       echo mysqli_errno;
    }



 ?>