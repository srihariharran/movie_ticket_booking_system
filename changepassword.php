<?php
	include 'db.php';
	
	if(isset($_SESSION['key']) && $_SESSION['key']=='User')
  	{
	
	$email=$_POST['email'];
	$old=$_POST['old'];
	$old=md5($old);
	$new=$_POST['new'];
	if($old == md5($new))
	{
		
		echo "Old & New Password are Same";
		
		
	}
	else
	{
	$sql="SELECT password FROM user WHERE email='$email' AND password='$old'";
	if($res=mysqli_query($con,$sql))
	{
		if(mysqli_num_rows($res)==1)
		{
			$row=mysqli_fetch_array($res);
			
			
			$password=md5($new);
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