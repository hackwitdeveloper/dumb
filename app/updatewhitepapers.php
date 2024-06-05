<?php

include('connect.php');



    $id  = $_POST['id'];
    $title  = $_POST['title'];
    $author  = $_POST['author'];
    $content  = $_POST['content'];

     // File upload handling
      $image_path = 'Photos/';

      $random_digit = rand(10,100);
 
      $upload_image_path = $image_path.$random_digit.($_FILES['image']['name']); //to upload image into server

      $image = $random_digit.($_FILES['image']['name']); //to save into db
 
     if(move_uploaded_file($_FILES['image']['tmp_name'], $upload_image_path)){

      $update_query = "UPDATE `whitepaper` SET  `image`='$image' WHERE id='$id' ";
  
      if (mysqli_query($connect,$update_query)) {
      }

      }else{
            echo "Photo Upload Error!";
      }
   



    $update_query = "UPDATE `whitepaper` SET `title`='$title', `author`='$author', `content`='$content' WHERE id='$id' ";
  
      if (mysqli_query($connect,$update_query)) {
    
         echo "<script>window.alert('Updated Successfully!')</script>";      
         echo "<script>window.open('viewwhitepapers.php?id=$id','_self')</script>";
      }
    else
    {
       echo mysqli_errno;
    }



 ?>