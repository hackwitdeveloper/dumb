<?php

include('connect.php');
if(isset($_POST['answerbtn']))
{
        $user = $_POST['user'];
        $qid = $_POST['qid'];
        $email = $_POST['email'];
        $answer = $_POST['answer'];
        date_default_timezone_set('Australia/Sydney');
        $date = date('d/m/Y - H:i:s');


        $ans_query = "select * from form_answer where qid ='$qid' order by id ASC";

        $run1 = mysqli_query($connect,$ans_query);
        $c = 0;
        while ($row1 = mysqli_fetch_array($run1)) {
            $c= $c+1;
        }
       
        // Insert Data into MySQL DB
    
        $insert_query = "INSERT INTO `form_answer`(`qid`, `answer`, `user`, `email`, `date_time`) VALUES('$qid','$answer','$user','$email','$date')";

        if(mysqli_query($connect,$insert_query)){

            $update_query="UPDATE forum SET ans = '$c' WHERE qid = '$qid'";

            if(mysqli_query($connect,$update_query)){
                
                echo $c;

            echo "<script>window.alert('Your Answer Updated successfully!')</script>";
            echo "<script>window.open('viewanswers.php?qid=$qid','_self')</script>";
            }
        }else{
            echo "<script>window.alert('Error!')</script>";
        }

}                                   


?>