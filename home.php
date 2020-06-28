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
    ?>
        <div class="container-fluid">
        <div class="row">
            <!-- Form to get Availability -->
            <div class="col-sm-4">
            <div class="card  alert-primary">
                <div class="card-header text-center">
                    <h3>Book Tickets</h3>
                </div>
                <div class="card-body">
                    <form id="movie_list" >
                       <div class="form-group">
                            <label>Select the Movie:</label>
                            <select name="movie_name" class="form-control">
                            <?php 
                                $sql="SELECT movie_name FROM movie_details";
                                if($res=mysqli_query($con,$sql))
                                {
                                    while($row=mysqli_fetch_array($res))
                                    {
                                        ?><option value="<?php echo $row['movie_name']; ?>"><?php echo $row['movie_name']; ?></option><?php
                                    }
                                }
                                else
                                {
                                    echo mysqli_error($con);
                                }
                            ?>
                            </select>
                       </div><br/>
                       <div class="form-group">
                            <label>Select the Date:</label>
                            <input type="date" name="date" class="form-control" id="date" />
                       </div><br/>
                       
                        <div class="form-group text-center">
                            <input type="submit" class="btn btn-primary" value="Get Show Time" />
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- To display the avaliabilty -->
            <div class="col-sm-8 text-center" >
                <div class="spinner-border text-primary" style="display: none"></div>
                <div id="movie_details">
                </div>
            </div>
    </div>
    </div>

        
    
    <br/>
    <!-- Footer -->
    <?php include 'footer.php'; ?>

<script>
//AJAX Call to get Avaliability
$('#movie_list').submit(function(e)
{
    e.preventDefault();
    $('.spinner-border').show();
    $.ajax({
        url:"movies.php",
        type:"POST",
        data:$('#movie_list').serialize(),
        success:function(result){
            $('#movie_details').html(result);
            $('.spinner-border').hide();
        }
    });
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