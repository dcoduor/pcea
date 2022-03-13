<?php  
	if (isset($_POST['submit'])) {

		include('dbcontroller.php');
		
		session_start();

		$username=$_POST['username'];
		$password=$_POST['password'];
		$message="Invalid username or password";
		$_SESSION['message'] = "";

		$_SESSION['login_user']=$username;
		$_SESSION['Error'] = "You left one or more of the required fields.";

		/*$query = mysql_query("SELECT * FROM registered_users WHERE user_name='$username' and password='$password'");

 		if (mysql_num_rows($query) != 0)
			{

 				echo "<script language='javascript' type='text/javascript'> location.href='profile.php' </script>";	
  			}

  		else
  			{
				echo $message;
   				
		}*/
		$sql = "select * from church_log_org where userName = '".$username."' and alias = 'admin'";
		$rs = mysqli_query($conn,$sql);
		$numRows = mysqli_num_rows($rs);
	
		if($numRows  == 1){
			$row = mysqli_fetch_assoc($rs);
			if(password_verify($password,$row['password'])){
				echo "<script language='javascript' type='text/javascript'> location.href='dashboard.php' </script>";	
			}
			else{
				echo "Wrong Password";
			}
		}
		else{
			echo "No User found";
		}
	}
?>