<?php 
    //Checking for session variable
    if(isset($_SESSION['key']) && $_SESSION['key']==='User')
    {
        //DB Connect
        include 'db.php';
        //Getting Current Date
        date_default_timezone_set('Asia/Kolkata');
        $current_date=date("Y-m-d");
        
        //Storing form values in variable
        $movie_name=$_POST['movie_name'];
        $date=$_POST['date'];
        //Data Validation
        if($date>=$current_date)
        {
            
                //Sql query to get the movie details
                $sql="SELECT movie_name,screen,show_timings,ticket_price FROM movie_details WHERE date='$date' AND movie_name='$movie_name'";
                if($res=mysqli_query($con,$sql))
                {
                    if(mysqli_num_rows($res)!=0)
                    {
                        ?><h2 class="text-center"><i>Show Timings</i></h2>
                        <div class="table-responsive">
                        <table class="table">
                        <tr><th>Movie Name</th><th>Screen</th><th>Show Time</th><th>Amount</th><th></th></tr>
                        <?php
                        //Printing values from DB table
                        while($row=mysqli_fetch_array($res))
                        {
                            ?>
                            <tr><td><?php echo $row['movie_name']; ?></td>
                                <td><?php echo $row['screen']; ?></td>
                                <td><?php echo $row['show_timings']; ?></td>
                                <td><?php echo $row['ticket_price']; ?></td>
                                <td>
                                    <form method="POST" action="book_tickets.php" >
                                        <input type="hidden" name="movie_name" value="<?php echo $row['movie_name']; ?>" />
                                        <input type="hidden" name="screen" value="<?php echo $row['screen']; ?>" />
                                        <input type="hidden" name="date" value="<?php echo $date; ?>" />
                                        <input type="hidden" name="show_time" value="<?php echo $row['show_timings']; ?>" />
                                        <input type="hidden" name="ticket_price" value="<?php echo $row['ticket_price']; ?>" />
                                        <input type="submit" value="Book Now" class="btn btn-success">
                                    </form>
                                </td>
                            </tr>
                            <?php

                        }
                        ?></table></div><?php
                    }
                    else
                    {
                        ?><div class="text-center"><i>No Movies Running on this Day</i></div><?php
                    }

                }
                else
                {
                    echo mysqli_error($con);
                }
            
        }
        else
            {
                ?>
                <script>
                    alert("Invalid Date");
                    location.replace("home.php");
                </script>
                <?php
            }
    }
    else
    {
        header("location:index.php");
    }