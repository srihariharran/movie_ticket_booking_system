<?php
	if(isset($_SESSION['key']) && $_SESSION['key']==='Admin')
	{
	include 'db.php';
	$id=$_POST['id'];
	$sql="DELETE FROM booking_details WHERE id='$id'";
	if(mysqli_query($con,$sql))
	{
		echo "Ticket Cancelled Successfully";
	}
	else
	{
		echo mysqli_error($con);
	}
	mysqli_close($con);
	}
	else
	{
	    header("location:index.php");
	}
?>