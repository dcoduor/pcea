<?php
include('dbcontroller.php');
$exit_success='';
$exit_error='';
$id=$_POST['user'];

$sql = "DELETE FROM profile_org WHERE user='$id'";

if (mysqli_query($conn, $sql)) {
    $exit_success="Profile picture deleted";
    include('profile.php');
} else {
    $exit_error= "Error deleting record: " . mysqli_error($conn);
    include('profile.php');
}

mysqli_close($conn);
?>