<?php
include('connect.php');

$id = $_GET['id'];

$delete_query = "delete from enquiry where id='$id' ";
     
if (mysqli_query($connect,$delete_query)) {

	echo "<script>window.open('enquires.php','_self')</script>";
		
}else{
    
    echo "Error: " . $delete_query . "<br>" . mysqli_error($connect);
}
?>