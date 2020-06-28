<?php 
	
	include 'db.php';
	$un=$_POST['username'];
	$pass=$_POST['password'];
	$pass1=md5($pass);
	$sql="SELECT * FROM admin_user WHERE username='$un' AND password='$pass1'";
	if($res=mysqli_query($con,$sql))
	{
		if(mysqli_num_rows($res)==1)
		{
			$row=mysqli_fetch_array($res);
			
			$_SESSION['name']=$row['name'];
			$_SESSION['key']='Admin';
			echo "Logined";
		}
		else
		{
			echo "Invalid Credentials";
		}
	}
	else
	{
		echo mysqli_error($con);
	}
	mysqli_close($con);
 ?>