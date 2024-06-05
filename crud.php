<?php

include('connect.php');
if(isset($_POST['enquiry']))
{

        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        $note = "";
       
        // Insert Data into MySQL DB

        $insert_query = "INSERT INTO `enquiry`(`name`, `phone`, `email`, `message`, `note`) VALUES ('$name','$phone','$email','$message','$note')";

        if(mysqli_query($connect,$insert_query)){

            echo "<script>window.alert('Message Send Successfully!')</script>";
            echo "<script>window.open('contact.php','_self')</script>";

        }else{
            //echo mysqli_error($connect);
        }

}

?>