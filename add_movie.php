<?php
	
	if(isset($_SESSION['key']) && $_SESSION['key']==='Admin')
    {
	include 'db.php';
	date_default_timezone_set('Asia/Kolkata');
	$current_date=date("Y-m-d");
    $date_val=date("Y-m-d",strtotime($current_date . " + 3 day"));
	$movie_name=$_POST['movie_name'];
	$screen=$_POST['screen'];
	$date=$_POST['date'];
	$time=$_POST['time'];
	$price=$_POST['price'];
	$file=$_FILES['poster']['name'];
	$file_type=$_FILES['poster']['type'];
	$file_size = $_FILES['poster']['size'];
	$file_name=$_FILES['poster']['tmp_name'];
	$extensions=array("jpeg","jpg","png");
	$n=0;
	if($date>=$current_date)
	{
		if($date<=$date_val)
		{
			if($file_size<=2097152)
			{
				$poster = addslashes(file_get_contents($file_name)); 
				foreach ($time as $show_time) {
					$sql="INSERT INTO movie_details (`movie_name`,`screen`,`date`,`show_timings`,`poster`,`ticket_price`) VALUES ('$movie_name','$screen','$date','$show_time','$poster','$price')";
					if(mysqli_query($con,$sql))
					{
						$n++;
					}
					else
					{
						echo mysqli_error($con);
					}
				}
				if($n==count($time))
				{
					?>
		    	<script>
		    		alert("Movie Added SuccessFully");
		    		location.replace("add_movie_form.php");
		    	</script>
		    	<?php
				}
		    	
		    }
		    else
		    {
		    	?>
		    	<script>
		    		alert("Invalid Poster Format or Poster size is greater than 2MB,Poster Should be in jpg,jpeg or png format");
		    		location.replace("add_movie_form.php");
		    	</script>
		    	<?php
		    }
		}
		else
		{
			?>
		    	<script>
		    		alert("Invalid Date,You can add movies only for next 3 days");
		    		location.replace("add_movie_form.php");
		    	</script>
		    	<?php
		}
	}
	else
		{
			?>
		    	<script>
		    		alert("Invalid Date");
		    		location.replace("add_movie_form.php");
		    	</script>
		    	<?php
		}
	mysqli_close($con);
	}
	else
	{
    	header("location:index.php");
	}
?>