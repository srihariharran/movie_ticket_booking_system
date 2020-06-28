<?php
	//DB Connect
	include 'db.php';
	//Checking for Session variable
	if(isset($_SESSION['key']) && $_SESSION['key']=='User')
  	{
	//Getting Form values and storing to variable
	$email=$_POST['email'];
	$old=$_POST['old'];
	//Encryting the Password
	$old=md5($old);
	$new=$_POST['new'];
	//Checking the old and new password values
	if($old == md5($new))
	{
		echo "Old & New Password are Same";
	}
	else
	{
	//Sql query to get the password form DB table
	$sql="SELECT password FROM user WHERE email='$email' AND password='$old'";
	if($res=mysqli_query($con,$sql))
	{
		if(mysqli_num_rows($res)==1)
		{
			$row=mysqli_fetch_array($res);
			$password=md5($new);
			//Sql query to update the password form DB table
			$sql1="UPDATE user SET password='$password' WHERE email='$email'";
			if(!mysqli_query($con,$sql1))
			{
				echo mysqli_error($con);
			}
			else
			{
				echo "Password Changed Successfully.";
				
			}
		}
		else
		{
				echo "Invalid Old Password";
		}
	}
	else
	{
		echo mysqli_error($con);
	}
	}
  }
  else
  {
      header("location:index.php");
  }
?>