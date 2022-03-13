<?php
include('dbcontroller.php');

$error="";
$success="";

$id=$_POST['id'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$residence = $_POST['residence'];
$street = $_POST['street'];
$plot_number = $_POST['plot_number'];
$postal = $_POST['postal'];
	

$sql = "UPDATE contacts_org SET phone_number='$phone', email='$email', residence='$residence', street='$street', plot_number='$plot_number', postal_address='$postal' WHERE id = '$id'";	
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