<?php
include('dbcontroller.php');

$error_message='';
$success_message='';
$user_exists='';



//insert values
$user=$_POST['user'];
$team=$_POST['groupList'];

$sql = "select * from cluster_org where user = '".$user."' or church_group='".$team."'";
$rs = mysqli_query($conn,$sql);
$numRows = mysqli_num_rows($rs);

if($numRows != 0){
    $user_exists="User is already an admin or the group already has an admin";
    include('members.php');
}else{    
    $sql = "insert cluster_org (user, church_group) value('".$user."', '".$team."')";
    $result = mysqli_query($conn, $sql);
    if($result)
    {
      $success_message = "You have successfully added a user to your group";
      include('members.php');
    }
}

$conn->close();
?>