<?php
include('connect.php');

$qid = $_GET['qid'];
$forumid = $_GET['forumid'];
$forumname = $_GET['forumname'];

$delete_query = "delete from forum where qid='$qid' ";
     
if (mysqli_query($connect,$delete_query)) {

    $delete_query1 = "delete from form_answer where qid='$qid' ";
     
        if (mysqli_query($connect,$delete_query1)) {
	        echo "<script>window.open('viewforum.php?forumid=$forumid&forumname=$forumname','_self')</script>";
        }else{
            echo "Error: " . $delete_query . "<br>" . mysqli_error($connect);
        }
		
}else{
    
    echo "Error: " . $delete_query . "<br>" . mysqli_error($connect);
}
?>