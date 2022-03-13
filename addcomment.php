<?php
include('dbcontroller.php');

$required = array('heading', 'comment');
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
    
    include('comment.php');
    exit();
} 


//insert values
$uname=$_POST['uname'];
$heading=$_POST['heading'];
$comment=$_POST['comment'];

    
    $sql = "insert comment_org (user, heading, comment) value('".$uname."', '".$heading."','".$comment."')";
    $result = mysqli_query($conn, $sql);
    if($result)
    {
      $success_message = "Your comment has been posted";
      include('comment.php');
    }

$conn->close();
?>