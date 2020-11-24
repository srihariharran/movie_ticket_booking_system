<?php
	//Connection to Database
	$con=mysqli_connect("host","user","password","dbname");
	if(!$con)
	{
		echo mysqli_error($con);
	}
?>


      
