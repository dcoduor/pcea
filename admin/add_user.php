<?php
include('dbcontroller.php');

$required = array('names', 'phone', 'status');
$error_msg='';
$success_msg='';

$error = false;
foreach($required as $field) {
  if (empty($_POST[$field])) {
    $error = true;
  }
}
//Check if all required fields are poppulated
if ($error) {
	$error_msg='All fields are required';
    include('new_user.php');
} 


//insert values
$names=$_POST['names'];
$phone=$_POST['phone'];
$rsn=$_POST['rsn'];
$status=$_POST['status'];
$email=$_POST['email'];
$user=$_POST['user'];
   
    $sql = "INSERT INTO members_org (names, status, rsn)
    VALUES ('".$names."', '".$status."', '".$rsn."');";
    $sql .= "INSERT INTO contacts_org (phone_number, email)
    VALUES ('".$phone."', '".$email."');";
    $sql .= "INSERT INTO church_org (admin)
    VALUES ('".$user."')";

    if ($conn->multi_query($sql) === TRUE) {
        $success_msg = "New user created successfully";
        include('new_user.php');
    } else {
        $error_msg = "Error: " . $sql . "<br>" . $conn->error;
        include('new_user.php');
    }

$conn->close();
?>