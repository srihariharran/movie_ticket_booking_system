<?php 
	
	include 'db.php';
	$username=$_POST['username'];
	$password=md5($_POST['password']);
	
	$sql="SELECT * FROM user WHERE email='$username' AND password='$password'";
	if($res=mysqli_query($con,$sql))
	{
		if(mysqli_num_rows($res)==1)
		{
			$row=mysqli_fetch_array($res);
			$_SESSION['email']=$row['email'];
			$_SESSION['name']=$row['name'];
			$_SESSION['key']='User';
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