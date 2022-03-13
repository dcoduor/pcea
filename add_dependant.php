<?php
include('dbcontroller.php');

$error_message='';
$success_message='';
$user_exists='';
$required = array('names', 'dob', 'baptism');

$error = false;
foreach($required as $field) {
  if (empty($_POST[$field])) {
    $error = true;
  }
}
//Check if all required fields are poppulated
if ($error) {
	$error_message='All fields are required';
    
    include('dependants.php');
  	exit();
} 

//insert values
$id=$_POST['user'];
$names=$_POST['names'];
$dob=$_POST['dob'];
$baptism=$_POST['baptism'];

  
    $sql = "insert dependants_org (my_id, names, dob, baptism) value('".$id."', '".$names."', '".$dob."', '".$baptism."')";
    $result = mysqli_query($conn, $sql);
    if($result)
    {
      $success_message = "You have successfully added a new dependant";
      include('dependants.php');
    }

$conn->close();
?>