<?php
include('dbcontroller.php');

$required = array('comment');
$error_message='';
$success_message='';
$system_error='';

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
    include('forumdetail.php');
  	exit();
} 


//insert values
$user=$_POST['user'];
$topic=$_POST['topic'];
$comment=$_POST['comment'];

    
    $sql = "insert profclub_forum_comments (user, topic, comment) value('".$user."', '".$topic."','".$comment."')";
    $result = mysqli_query($conn, $sql);
    if($result)
    { 
      $success_message='Your comment has been posted';
      //include('forumdetail.php');
      //echo "Comment was successfully submitted";
      header("location:myprof_forum.php");
    }

$conn->close();
?>