<?php
include('dbcontroller.php');

$error_message='';
$success_message='';
$user_exists='';
$required = array('social');

$error = false;
foreach($required as $field) {
  if (empty($_POST[$field])) {
    $error = true;
  }
}
//Check if all required fields are poppulated
if ($error) {
	$error_message='All fields are required';
    
    include('add_group.php');
  	exit();
} 

//insert values
$social=$_POST['social'];

$sql = "select * from social_groups_org where social_groups = '".$social."'";
$rs = mysqli_query($conn,$sql);
$numRows = mysqli_num_rows($rs);

if($numRows != 0){
    $user_exists="Group already exists!!";
    include('add_group.php');
}else{    
    $sql = "insert social_groups_org (social_groups) value('".$social."')";
    $result = mysqli_query($conn, $sql);
    if($result)
    {
      $success_message = "You have successfully added a new group";
      include('add_group.php');
    }
}

$conn->close();
?>