<?php  
	if (isset($_POST['submit'])) {

		include('dbcontroller.php');
		
		session_start();

		$phone=$_POST['phone'];
		$pin=$_POST['pin'];
		$message="";
		$check="";
		$_SESSION['message'] = "";

		$_SESSION['activate_user']=$pin;
		$_SESSION['Error'] = "You left one or more of the required fields.";

		/*if(!(isset($_POST['test']))){
			$check="Please agree to the terms and conditions";
			include('confirmpin.php'); 
			exit();
		}*/
			
		$sql= "SELECT * FROM credited_org WHERE phone_number='$phone' and tokken='$pin'";

		$query = mysqli_query($conn, $sql);

 		if (mysqli_num_rows($query) != 0){
 				echo "<script language='javascript' type='text/javascript'> location.href='registration.php' </script>";	
  			}

  		else{			
				$message="Invalid email or activation pin";
				include('confirmpin.php');   				
		}
	}
?>