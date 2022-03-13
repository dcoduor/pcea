<?php
include('dbcontroller.php');

$error_message='';
$success_message='';
$user_exists='';



//insert values
$user=$_POST['user'];
$team=$_POST['team'];

$sql = "select * from groups_org where user = '".$user."' and church_group='".$team."'";
$rs = mysqli_query($conn,$sql);
$numRows = mysqli_num_rows($rs);

if($numRows != 0){
    $user_exists="User already belongs to this group exists";
    include('adduser.php');
}else{    
    $sql = "insert groups_org (user, church_group) value('".$user."', '".$team."')";
    $result = mysqli_query($conn, $sql);
    if($result)
    {
      $success_message = "You have successfully added a user to your group";
      include('adduser.php');
    }
}

$conn->close();
?>