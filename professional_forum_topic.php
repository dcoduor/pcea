<?php
include('dbcontroller.php');

$required = array('heading', 'topic');
$error_message='';
$success='';

$error = false;
foreach($required as $field) {
  if (empty($_POST[$field])) {
    $error = true;
  }
}
//Check if all required fields are poppulated
if ($error) {
	$error_message='All fields are required';
    echo $error_message;
    include('forum.php');
  	exit();
} 


//insert values
$id=$_POST['ID'];
$heading=$_POST['heading'];
$topic=$_POST['topic'];

    
    $sql = "insert profclub_forum_topic (user, header, topic) value('".$id."', '".$heading."','".$topic."')";
    $result = mysqli_query($conn, $sql);
    if($result)
    {
      $success='Comment was successfully submitted';
      include('professional_forum.php');
    }

$conn->close();
?>