<?php
	
	if(isset($_SESSION['key']) && $_SESSION['key']==='User')
    {
    ?>
    <!DOCTYPE html>
	<html>
	<head>
	    <title>Book Tickets</title>
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
    include 'header.php';
	include 'db.php';
	$movie_name=$_POST['movie_name'];
	$screen=$_POST['screen'];
	$date=$_POST['date'];
	$show_time=$_POST['show_time'];
	$ticket_price=$_POST['ticket_price'];
	$seat_no=$_POST['seat_no'];
	$email=$_SESSION['email'];
	$sql="INSERT INTO booking_details (`movie_name`,`screen`,`date`,`show_time`,`seat_no`,`ticket_price`,`user_email`) VALUES ('$movie_name','$screen','$date','$show_time',$seat_no,'$ticket_price','$email')";
	if(mysqli_query($con,$sql))
	{
		?><div class="container">
			<h2 class="text-center text-success">Your Ticket has been booked Successfully</h2>
            <div class="table-responsive">
                <table class="table">
                <tr><th>Movie Name</th><th>Screen</th><th>Show Time</th><th>Date</th><th>Seat No</th><th>Amount</th></tr>
                <tr>
                    <td><?php echo $movie_name; ?></td>
                    <td><?php echo $screen; ?></td>
                    <td><?php echo $show_time; ?></td>
                    <td><?php echo $date; ?></td>
                    <td><?php echo $seat_no; ?></td>
                    <td><?php echo $ticket_price; ?></td>
                </tr>
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
	include 'footer.php'; 
	}
	else
	{
    	header("location:index.php");
	}
?>