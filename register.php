<?php
include('dbcontroller.php');

$required = array('userName', 'password');
$error_message='';
$pass_match ="";
$user_exists="";
$error_letter ="";
$success="";

$error = false;
foreach($required as $field) {
  if (empty($_POST[$field])) {
    $error = true;
  }
}
//Check if all required fields are poppulated
if ($error) {
	  $error_message='All fields are required';
    include('registration.php');
  	exit();
} 

//Check if passwords are matching
if($_POST['password'] != $_POST['confirm_password']){ 
	$pass_match='Passwords dont match';
	include('registration.php');
	exit();
}

//insert values
$id=$_POST['ID'];
$username=$_POST['userName'];
$password=$_POST['password'];
  

$sql = "select * from church_log_org where userName = '".$username."'";
$rs = mysqli_query($conn,$sql);
$numRows = mysqli_num_rows($rs);

if($numRows != 0){
  $user_exists="Username already exists";
  include('registration.php');
}else{
  $options = array("cost"=>4);
  $hashPassword = password_hash($password,PASSWORD_BCRYPT,$options);
  
  $sql = "insert into church_log_org (x_id, userName, password) value('".$id."', '".$username."','".$hashPassword."')";
  $result = mysqli_query($conn, $sql);
  if($result)
  {
    $success='Registration Successful';
    include('index.php');
  }
}
    
$conn->close();
?>