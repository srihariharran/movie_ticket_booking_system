<?php
	//DB Connect
	include 'db.php';
	//Storing form values in variable
	$name=$_POST['name'];
	$email=$_POST['email'];
	$password=md5($_POST['password']);
	$mobile=$_POST['mobile_no'];
	//Sql query to insert the user details
	$sql="INSERT INTO user VALUES('$name','$email','$password','$mobile')";
	if(mysqli_query($con,$sql))
	{
		echo "Account Created Successfully";
	}
	else
	{
		echo mysqli_error($con);
	}
	mysqli_close($con);
?>