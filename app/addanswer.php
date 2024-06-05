<?php
session_start();
// Establilshing Connection into MYSQL!
include('connect.php');
if(isset($_POST['addanswer']))
{
        
       
        $qid = $_POST['qid'];
        $answer = $_POST['answer'];
        date_default_timezone_set('Australia/Sydney');
        $date_time = date('d/m/Y - H:i:s');
        $user =  $_SESSION['name'];
        $email = $_SESSION['MPLuserid'];
        
        
      
       
        // Insert Data into MySQL DB

        $insert_query = "INSERT INTO `form_answer`(`qid`, `answer`, `user`, `email`, `date_time`) VALUES  ('$qid','$answer','$user','$email','$date_time')";

        if(mysqli_query($connect,$insert_query)){

           

                 echo "<script>window.open('viewtipoc.php?qid=$qid','_self')</script>";
              

        }else{
            echo mysqli_error($connect);
        }

}

?>