<?php

include('connect.php');

    $forumname  = $_POST['forumname'];
    $forumid  = $_POST['forumid'];
    $status  = $_POST['status'];
   

    $update_query = "UPDATE `forumlist` SET `forumname`='$forumname', `status`='$status' WHERE forumid='$forumid' ";
  
      if (mysqli_query($connect,$update_query)) {
    
         echo "<script>window.alert('Updated Successfully!')</script>";         
         echo "<script>window.open('forum.php','_self')</script>";
     
 
    }
    else
    {
       echo mysqli_errno;
    }



 ?>