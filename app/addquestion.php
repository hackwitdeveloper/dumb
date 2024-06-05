<?php
session_start();
// Establilshing Connection into MYSQL!
include('connect.php');
if(isset($_POST['addquestion']))
{
        
        $idname = "Forum";
        $select_query = "select * from idcodes where idname = '$idname'";

        $run = mysqli_query($connect,$select_query);

        while ($row = mysqli_fetch_array($run)) {
            $idcode = $row['idcode'];
            $codes = $row['codes'];
        }

        $codes = $codes+1;
        if($codes<10){
            $qid = $idcode."00".$codes;
        }else if($codes<100){
            $qid = $idcode."0".$codes;
        }else{
           $qid = $idcode.$codes; 
        }

        $question = $_POST['question'];
        $forumid = $_POST['forumid'];
        $forumtype = $_POST['forumtype'];
        date_default_timezone_set('Australia/Sydney');
        $date_time = date('d/m/Y - H:i:s');
        $user =  $_SESSION['name'];
        $email = $_SESSION['MPLuserid'];
        
        
      
       
        // Insert Data into MySQL DB

        $insert_query = "INSERT INTO `forum`(`forumid`, `forumtype`, `qid`, `question`, `date_time`, `user`, `email`, `ans`) VALUES  ('$forumid','$forumtype','$qid','$question','$date_time','$user','$email','0')";

        if(mysqli_query($connect,$insert_query)){

            $update_query="UPDATE idcodes SET codes = $codes WHERE idname = '$idname'";

            if(mysqli_query($connect,$update_query)){

                 echo "<script>window.open('viewforum.php?forumid=$forumid&forumname=$forumtype','_self')</script>";
            }

            else{
                echo mysqli_error($connect);
            }    

        }else{
            echo mysqli_error($connect);
        }

}

?>