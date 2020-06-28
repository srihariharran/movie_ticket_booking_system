<?php 
	//DB Connect
	include 'db.php';
	//Storing form values in varialbe
	$username=$_POST['username'];
	$password=md5($_POST['password']);
	//Sql query to get user details
	$sql="SELECT * FROM user WHERE email='$username' AND password='$password'";
	if($res=mysqli_query($con,$sql))
	{
		if(mysqli_num_rows($res)==1)
		{
			$row=mysqli_fetch_array($res);
			//Creating and assigning session variable
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