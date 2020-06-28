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
        //Storing Form values to variable
        $movie_name=$_POST['movie_name'];
        $screen=$_POST['screen'];
        $date=$_POST['date'];
        $show_time=$_POST['show_time'];
        $ticket_price=$_POST['ticket_price'];
    ?>
        
        <h2 class="text-center"><i>Select your Seat</i></h2>
        <div class="container">
            <div class="table-responsive">
                <table class="table">
                <!-- Printing Movie Details -->
                <tr><th>Movie Name</th><th>Screen</th><th>Show Time</th><th>Date</th><th>Amount</th></tr>
                <tr>
                    <td><?php echo $movie_name; ?></td>
                    <td><?php echo $screen; ?></td>
                    <td><?php echo $show_time; ?></td>
                    <td><?php echo $date; ?></td>
                    <td><?php echo $ticket_price; ?></td>
                </tr>
                </table>
            </div>
        <form method="POST" action="booking_confirmation.php" >
        <div class="row">
            <!-- Seat Selection -->
            <div class="col-sm-1"></div>
            
            <?php 
                $sql="SELECT seat_no FROM booking_details WHERE movie_name='$movie_name' AND screen='$screen' AND show_time='$show_time' AND date='$date' ORDER BY seat_no ASC";
                if($res=mysqli_query($con,$sql))
                {
                    if(mysqli_num_rows($res)==10)
                    {
                        ?>
                        <div class="col-sm-12 text-center"><i>Sorry! Tickets are sold out</i></div>
                        <?php
                    }
                    else
                    {
                        if($n=mysqli_num_rows($res)!=0)
                        {
                            $i=1;
                            $flag=0;
                            while($row=mysqli_fetch_array($res))
                            
                            {
                                
                                for($j=1;$j<=10;$j++)
                                {
                                    // echo $i;
                                    // echo $row['seat_no'];
                                    if($row['seat_no']==$i)
                                    {
                                        ?>
                                        <div class="col-sm-1"><div class="btn btn-danger"><?php echo $i; ?></div><br/></div>
                                        <?php
                                        $i++;
                                        $flag++;
                                        break;
                                    }
                                    else
                                    {
                                        ?>
                                       <div class="col-sm-1"> <div class="btn btn-success"><input type="radio" class="seats" name="seat_no" value="<?php echo $i; ?>" id="<?php echo 'seat'.$i; ?>"><br/><?php echo $i; ?></div><br/></div>
                                        <?php
                                    }
                                    $i++;
                                }
                            }
                                // echo $i;
                                if($flag==$n )
                                {
                                for(;$i<=10;$i++)
                                {
                                    ?>
                                       <div class="col-sm-1"> <div class="btn btn-success"><input type="radio" class="seats" name="seat_no" value="<?php echo $i; ?>" id="<?php echo 'seat'.$i; ?>"><br/><?php echo $i; ?></div><br/></div>
                                        <?php
                                }
                                }
                            
                        }
                        else
                        {
                             for($i=1;$i<=10;$i++)
                             {
                                 ?>

                                 <div class="col-sm-1">
                                 <div class="btn btn-success"><input type="radio" id="<?php echo 'seat'.$i; ?>" class="seats" name="seat_no" value="<?php echo $i; ?>"><br/><?php echo $i; ?></div><br/>
                                 </div>
                                 <?php
                            }

                        }
                        
                    }
                }
                else
                {
                    echo mysqli_error($con);
                }
            ?>
             <div class="col-sm-1"></div>               
            </div>
            <br/>
            <div class="text-center"><p class="btn-danger btn">Booked</p>&nbsp;<p class="btn-success  btn">Available</p></div>
            <br/>
            <div class="form-group text-center" id="divs">
                    <input type="hidden" name="movie_name" value="<?php echo $movie_name; ?>" />
                    <input type="hidden" name="screen" value="<?php echo $screen; ?>" />
                    <input type="hidden" name="date" value="<?php echo $date; ?>" />
                    <input type="hidden" name="show_time" value="<?php echo $show_time; ?>" />
                    <input type="hidden" name="ticket_price" value="<?php echo $ticket_price; ?>" />
                    <input type="submit" value="Book Now" class="btn btn-success">
                <div class="btn btn-danger" id="cancel">Cancel</div>
            </div>
            </form>
        </div>
        </div>
       
    </div>
    </div>
   
        
    
    <br/>
    <!-- Footer -->
    <?php include 'footer.php'; ?>

<script>
//Validating seat selection
$('#divs').hide();
$('.seats').click(function()
{
   
    $('#divs').show();
});
$('#cancel').click(function()
{
    location.replace("home.php");
});

</script>
</body>
</html>
<?php
}
else
{
    header("location:index.php");
}
?>