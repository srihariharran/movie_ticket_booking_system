<?php
	//Checking for session variable
	if(isset($_SESSION['key']) && $_SESSION['key']==='User')
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
	$email=$_SESSION['email'];
	//Sql query to get booking details
	$sql="SELECT * FROM booking_details WHERE user_email='$email' ORDER BY seat_no ASC";
	if($res=mysqli_query($con,$sql))
	{
		?><div class="container">
			<h2 class="text-center text-success">Booking History</h2>
            <div class="table-responsive">
                <table class="table">
                	<!-- Display the records -->
                <tr><th>Movie Name</th><th>Screen</th><th>Show Time</th><th>Date</th><th>Seat No</th><th>Amount</th><th></th></tr>
                <?php
                if(mysqli_num_rows($res)!=0)
                {
	                while($row=mysqli_fetch_array($res))
	                {
	                	?>
	                <tr>
	                    <td><?php echo $row['movie_name']; ?></td>
	                    <td><?php echo $row['screen']; ?></td>
	                    <td><?php echo $row['show_time']; ?></td>
	                    <td><?php echo $row['date']; ?></td>
	                    <td><?php echo $row['seat_no']; ?></td>
	                    <td><?php echo $row['ticket_price']; ?></td>
	                    <td>
	                    	<?php 
	                    	date_default_timezone_set('Asia/Kolkata');
	                    	$date=date("Y-m-d");
	                    	//echo $date;
	                    	$booked_date=$row['date'];
	                    	if($booked_date > $date)
	                    	{  

	                    	?>
	                    	<form method="POST" action="cancel_tickets.php" >
	                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
	                            <input type="submit" value="Cancel Ticket" class="btn btn-danger">
	                        </form>
	                        <?php
		                    }
		                    ?>
	                    </td>
	                </tr>
	                <?php
	            	}
	            }
	            else
	            {
	            	?>
	                <tr><td colspan="7"><center>No Records Found.</center></td></tr><?php
	            }
            	?>

                </table>
            </div>
        </div>

            <?php
	}
	else
	{
		echo mysqli_error($con);
	}
	mysqli_close($con);
	//Footer
	include 'footer.php';
	}
	else
	{
    	header("location:index.php");
	}
?>