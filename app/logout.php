<?php
session_start();

unset($_SESSION['MPLuserid']);
unset($_SESSION['category']);
unset($_SESSION['name']);

session_destroy();

header("Location:login.php");

exit;

?>