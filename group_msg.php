<?php
include('dbcontroller.php');

$required = array('topic', 'team');
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
    
    include('myadmin.php');
  	exit();
} 


//insert values
$topic=$_POST['topic'];
$team=$_POST['team'];

    
    $sql = "insert group_msg_org (message, team) value('".$topic."', '".$team."')";
    $result = mysqli_query($conn, $sql);
    if($result)
    {
      $success_msg='Message was successfully submitted';
      include('myadmin.php');

    }else{
      $error_msg='Error posting message';
      include('myadmin.php');
    }

$conn->close();
?>