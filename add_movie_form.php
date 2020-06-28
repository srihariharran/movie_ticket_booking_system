<?php
if(isset($_SESSION['key']) && $_SESSION['key']==='Admin')
{
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Movie</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/home.css">
    <!-- <link rel="stylesheet" type="text/css" href="css/login.css"> -->
    <script src="js/font.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<?php include 'header.php';  ?><br/>
    <div class="d-flex justify-content-center ">
        <div class="card  alert-primary">
            <div class="card-header text-center">
                <h3>Add Movie</h3>
            </div>
            <div class="card-body">
                <form id="login" method="POST" action="add_movie.php" enctype='multipart/form-data'>
                   <div class="form-group">
                        <label>Enter the Movie Name:</label>
                        <input type="text" name="movie_name" class="form-control" placeholder="Movie Name" required />
                   </div><br/>
                   <div class="form-group">
                        <label>Select the Screen:</label>
                        <select name="screen" class="form-control">
                            
                            <option value="Screen A">Screen A</option>
                            <option value="Screen B">Screen B</option>
                            <option value="Screen C">Screen C</option>
                            <option value="Screen D">Screen D</option>
                        </select>
                   </div><br/>
                   <div class="form-group">
                        <label>Select the Date:</label>
                        <input type="date" name="date" class="form-control" id="date" required />
                   </div><br/>
                   <div class="form-group">
                        <label>Select the Show Timings:</label>
                        <div class="form-check">
                          <label class="form-check-label" for="check1">
                            <input type="checkbox" class="form-check-input" id="time1" name="time[]" value="10 AM" checked>10 AM
                          </label>
                        </div>
                        <div class="form-check">
                          <label class="form-check-label" for="check2">
                            <input type="checkbox" class="form-check-input" id="time2" name="time[]" value="1 PM" checked>1 PM
                          </label>
                        </div>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="time3" name="time[]" value="4 PM" checked>4 PM
                          </label>
                        </div>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="time4" name="time[]" value="7 PM" checked>7 PM
                          </label>
                        </div>
                    </div><br/>
                    <div class="form-group">
                        <label>Upload the Movie Poster:</label>
                        <input type="file" class="form-control" name="poster" required />
                    </div><br/>
                    <div class="form-group">
                        <label>Ticket Price:</label>
                        <input type="text" class="form-control" name="price" required />
                    </div>
                    <br/>
                    <div class="form-group text-center">
                        <input type="submit" class="btn btn-primary" value="Add Movie" />
                    </div>
                </form>
            </div>
        </div>
    </div>
    <br/>
    <br/>
   
	<?php include 'footer.php'; ?>
</body>
</html>
<?php
}
else
{
    header("location:index.php");
}
?>