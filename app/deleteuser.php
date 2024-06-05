<?php
include('connect.php');


$userid = $_GET['userid'];


 $delete_query = "delete from user where userid='$userid' ";

     
      if (mysqli_query($connect,$delete_query)) {
		  
		 {

       		echo "<script>window.open('user.php','_self')</script>";
		}
} else {
    echo "Error: " . $delete_query . "<br>" . mysqli_error($connect);
}
	 ?>