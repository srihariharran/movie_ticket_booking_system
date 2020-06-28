<?php
	//Checking for session variable
	if(isset($_SESSION['key']) && $_SESSION['key']==='Admin')
    {
    ?>
    <!DOCTYPE html>
	<html>
	<head>
	    <title>Book Tickets</title>
	    <!--Including Bootstrap Files,Jquery and Stylesheet -->
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <link rel="stylesheet" href="css/bootstrap.min.css">
	    <script src="js/jquery.min.js"></script>
	    <script src="js/popper.min.js"></script>
	    <script src="js/bootstrap.min.js"></script>
	    <link rel="stylesheet" type="text/css" href="css/home.css">
	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body>
    <?php
    //Header
    include 'header.php';
    //DB Connect
	include 'db.php';
	?><div class="container">
			<h2 class="text-center text-success">Screen Details</h2>
            <div class="table-responsive">
                <table class="table">
                	<!-- Display the records -->
                <tr><th>Screen</th><th>Show Time</th><th>No of Seat Booked</th><th>Total Amount</th><th></th></tr>
                <?php
	//Sql query to get booking details
    $date=date("Y-m-d");
    $screen=array("Screen A","Screen B","Screen C","Screen D");
    $show_time=array("10 AM","1 PM","4 PM","7 PM");
    //echo $show_time[0];
    for($i=0;$i<4;$i++)
    {
   		for($j=0;$j<4;$j++)
   		{
   			$screen1=$screen[$i];
   			$time=$show_time[$j];
			$sql="SELECT * FROM booking_details WHERE screen='$screen1' AND show_time='$time' AND date='$date'" ;
			
			if($res=mysqli_query($con,$sql))
			{
		                if(mysqli_num_rows($res)!=0)
		                {
		                	
			                $row=mysqli_fetch_array($res);
			                	?>
			                <tr>
			                    
			                    <td><?php echo $row['screen']; ?></td>
			                    <td><?php echo $row['show_time']; ?></td>
			                    <td><?php echo mysqli_num_rows($res); ?></td>
			                    <td><?php echo mysqli_num_rows($res)*$row['ticket_price']; ?></td>
			                    
			                </tr>
			                <?php
			            	
			            }
			            
			}
			else
			{
				echo mysqli_error($con);
			}
		}
	}
	?>

        </table>
    </div>
</div>
<?php
	mysqli_close($con);
	//Footer
	include 'footer.php';
	}
	else
	{
    	header("location:index.php");
	}
?>