<?php
include('dbcontroller.php');

$required = array('groupList', 'heading', 'topic');
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
$group=$_POST['groupList'];
$id=$_POST['ID'];
$heading=$_POST['heading'];
$topic=$_POST['topic'];

    
    $sql = "insert forum_topic (user, header, user_group, topic) value('".$id."', '".$heading."','".$group."' ,'".$topic."')";
    $result = mysqli_query($conn, $sql);
    if($result)
    {
      $success='Comment was successfully submitted';
      include('forum.php');
    }

$conn->close();
?>