<?php
//$connect = mysqli_connect("localhost","root","","humb");
$connect = mysqli_connect("localhost","phpmyadmin","ubuntu1234","humb");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>