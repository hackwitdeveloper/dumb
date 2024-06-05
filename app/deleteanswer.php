<?php
include('connect.php');

$qid = $_GET['qid'];
$id = $_GET['id'];

$delete_query = "delete from form_answer where id='$id' ";
     
if (mysqli_query($connect,$delete_query)) {

   
	echo "<script>window.open('viewtipoc.php?qid=$qid','_self')</script>";
       
		
}else{
    
    echo "Error: " . $delete_query . "<br>" . mysqli_error($connect);
}
?>