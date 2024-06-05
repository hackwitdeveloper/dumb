<?php

include('connect.php');

    $id  = $_POST['id'];
    $note  = $_POST['note'];
   

    $update_query = "UPDATE `customer` SET `note`='$note' WHERE id='$id' ";
  
      if (mysqli_query($connect,$update_query)) {
    
         echo "<script>window.alert('Updated Successfully!')</script>";         
         echo "<script>window.open('editcustomer.php?id=$id','_self')</script>";
     
 
    }
    else
    {
       echo mysqli_errno;
    }



 ?>