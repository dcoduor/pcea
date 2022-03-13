<?php
include('dbcontroller.php');

$required = array('group');
$error_message='';
$success_message='';
$group_exists='';

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
    
    include('groups.php');
    exit();
} 


//insert values
$uname=$_POST['uname'];
$group=$_POST['group'];

$search = "select * from groups_org where user = '".$uname."' and church_group='".$group."'";
$rs = mysqli_query($conn,$search);
$numRows = mysqli_num_rows($rs);

if($numRows != 0){
    $group_exists="you are already in this group";
    include('groups.php');
}else{   
    $sql = "insert groups_org (user, church_group) value('".$uname."', '".$group."')";
    $result = mysqli_query($conn, $sql);
    if($result)
    {
      $success_message = "You have successfully joined the group";
      include('groups.php');
    }
}

$conn->close();
?>