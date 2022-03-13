<?php
include('dbcontroller.php');

$error="";
$success="";

    $id=$_POST['id'];
    $marital_status=$_POST['marital'];
	$dob=$_POST['dob'];
	$occupation=$_POST['job'];
	$idnumber=$_POST['idnumber'];
	$marital_date=$_POST['maritaldate'];
	$marital_place=$_POST['place'];
	$employer=$_POST['employer'];
	

	$sql = "UPDATE members_org SET marital_status='$marital_status', dob='$dob', occupation='$occupation', id_number='$idnumber', marital_date='$marital_date', marital_place='$marital_place', employer='$employer' WHERE id = '$id'";
	
    if (mysqli_query($conn, $sql)) {
        //echo "Record updated successfully";
        $success="Your personal information was successfully updated";
        include('profile.php');
    } else {
        $error="Error updating record: " . mysqli_error($conn);
        include('profile.php');
    }
    
    mysqli_close($conn);
?>