<?php
include('dbcontroller.php');

$error="";
$success="";

    $id=$_POST['id'];
	$district = $_POST['district'];
	$baptism_date = $_POST['baptism_date'];
	$baptism_place = $_POST['baptism_place'];
	$confirmation_date = $_POST['confirmation_date'];
	$confirmation_place = $_POST['confirmation_place'];
	$holycommunion = $_POST['holycommunion'];
	$freewill_contribution = $_POST['freewill_contribution'];
	

	$sql = "UPDATE church_org SET district='$district', baptism_date='$baptism_date', baptism_place='$baptism_place', confirmation_date='$confirmation_date', confirmation_place='$confirmation_place', holycommunion_last_attendance='$holycommunion', freewill_contribution='$freewill_contribution' WHERE id = '$id'";


	if (mysqli_query($conn, $sql)) {
        //echo "Record updated successfully";
        $success="Your contact information was successfully updated";
        include('profile.php');
    } else {
        $error="Error updating record: " . mysqli_error($conn);
        include('profile.php');
    }
    
    mysqli_close($conn);
?>