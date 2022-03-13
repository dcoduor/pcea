<?php
include('dbcontroller.php');

$required = array('names', 'email','phone','uname','password');
$error_message='';

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
  	exit();
} 

//Check if passwords are matching
if($_POST['password'] != $_POST['confirm_password']){ 
	$error_message='Passwords dont match';
	//echo "Passwords should be same";
	echo $error_message;
	exit();
}

//insert values
$fullname=$_POST['names'];
$username=$_POST['uname'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$password=$_POST['password'];

/*$sql = "INSERT INTO registered_users (full_name, user_name, email, password)
VALUES ('$fname', '$uname', '$email', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "New user created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}*/
    $options = array("cost"=>4);
    $hashPassword = password_hash($password,PASSWORD_BCRYPT,$options);
    
    $sql = "insert into sys_admin_org (full_name, email, phone_number, user_name, password) 
            value('".$fullname."','".$email."','".$phone."' ,'".$username."','".$hashPassword."')";
    $result = mysqli_query($conn, $sql);
    if($result)
    {
      echo "Registration successfully";
    }

$conn->close();
?>