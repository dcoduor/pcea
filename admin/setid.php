<?php
include('dbcontroller.php');

    $id = $_POST["user"];
    $status=$_POST['alias'];
	//$email=$_POST['email'];
	//$mykey=$_POST['mykey'];

$sql = "UPDATE church_log_org SET alias='$status' WHERE x_id = '$id'";

if (mysqli_query($conn, $sql)) {
    $success = "New Super Admin Created";
    include('members.php');
} else {
    $error = "Error updating record: " . mysqli_error($conn);
    include('members.php');
}

mysqli_close($conn);
?>