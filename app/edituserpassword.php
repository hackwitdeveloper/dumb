<?php


include('connect.php');


	$userid=$_POST['userid'];
    $password  = $_POST['password'];
	 $confirmpassword  = $_POST['cpassword'];
	 $pass= md5($password);
		if($password==$confirmpassword){
    
	  $update_query = "UPDATE admin SET password ='$pass'  WHERE userid='$userid'";
  
      if (mysqli_query($connect,$update_query)) {
		  
		   echo "<script>alert('Password Changed Successfully.Please Log In!')</script>";
		 
echo "<script>window.open('viewuser.php?userid=$userid','_self')</script>";
     
    }
    else
    {
		 echo "<script>alert('Error! Please Try Later')</script>";
       echo "<script>window.open('viewuser.php?userid=$userid','_self')</script>";
    }
			
}
		else{
			 echo "<script>alert('Password Mismatch')</script>";
       echo "<script>window.open('viewuser.php?userid=$userid','_self')</script>";
		}
 
 ?>