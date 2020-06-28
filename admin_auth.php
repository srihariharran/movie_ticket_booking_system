<?php 
	//DB Connect
	include 'db.php';
	//Storing form values in variables
	$username=$_POST['username'];
	$password=$_POST['password'];
	//Encryting the password
	$password1=md5($password);
	//Sql query to get the records from Db table to validate user details
	$sql="SELECT * FROM admin_user WHERE username='$username' AND password='$password1'";
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