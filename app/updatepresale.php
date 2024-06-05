<?php

include('connect.php');

    $id  = $_POST['id'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phonenumber = $_POST['phonenumber'];
    $country_residence = $_POST['country_residence'];
    $nationality = $_POST['nationality'];
    $intended_contribution_amount = $_POST['intended_contribution_amount'];
    $contribution_preference = $_POST['contribution_preference'];
    $wallet_address = $_POST['wallet_address'];
    $note  = $_POST['note'];
   

    $update_query = "UPDATE `presale` SET `fullname`='$fullname',`email`='$email',`phonenumber`='$phonenumber',`country_residence`='$country_residence',`nationality`='$nationality',`intended_contribution_amount`='$intended_contribution_amount',`contribution_preference`='$contribution_preference',`wallet_address`='$wallet_address',`note`='$note' WHERE id='$id' ";
  
      if (mysqli_query($connect,$update_query)) {
    
         echo "<script>window.alert('Updated Successfully!')</script>";         
         echo "<script>window.open('editpresale.php?id=$id','_self')</script>";
     
    }
    else
    {
       echo mysqli_errno;
    }



 ?>