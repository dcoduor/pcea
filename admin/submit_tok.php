<?php
include('dbcontroller.php');

$required = array('phone', 'mykey');
$error_message='';
$success_message='';

$error = false;
foreach($required as $field) {
  if (empty($_POST[$field])) {
    $error = true;
  }
}
//Check if all required fields are poppulated
if ($error) {
	$error_message='All fields are required';
    //echo $error_message;
   echo $error_message; 
    //include('comment.php');
    exit();
} 


//insert values
$id = $_POST["ID"];
$email=$_POST['email'];
$recipients = $_POST['phone'];
// And of course we want our recipients to know what we really do
$message = $_POST['mykey'];

    
    $sql = "insert credited_org (x_id, email, phone_number, tokken) value('".$id."', '".$email."','".$recipients."','".$message."')";
    $result = mysqli_query($conn, $sql);
    if($result)
    {
      $success_message = "User has been activated";
      include('members.php');
      //echo $success_message;
    }

$conn->close();
?>