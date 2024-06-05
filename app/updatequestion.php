<?php

include('connect.php');

$qid = $_POST['qid'];
$question = $_POST['question'];
$user = $_POST['user'];
$email = $_POST['email'];

$update_query = "UPDATE `forum` SET `qid`='$qid', `question`='$question', `user`='$user', `email`='$email' WHERE qid='$qid'";

if (mysqli_query($connect, $update_query)) {
    echo "<script>window.alert('Updated Successfully!')</script>";         
    echo "<script>window.open('forum.php','_self')</script>";
} else {
    echo mysqli_error($connect); // Corrected to display the actual error message
}
?>
