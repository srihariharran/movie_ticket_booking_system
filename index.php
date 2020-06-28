<?php
//Checking for session variable is set or not
if(isset($_SESSION['key']) && $_SESSION['key']==='Admin')
{
    header("location:admin_home.php");
}
if(isset($_SESSION['key']) && $_SESSION['key']==='User')
{
    header("location:home.php");
}
else
{
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
    <!--Including Bootstrap Files,Jquery and Stylesheet -->
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/home.css">
    <script src="js/font.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     
</script>
</head>
<body>
    <!--Including Header -->
	<?php include 'header.php'; ?><br/>
    <div class="container-fluid">
    <div class="row">
    <!-- Carousel -->
	<div class="col-md-9">
		<div id="demo" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img src="images/car1.jpg" />
                </div>
                <div class="carousel-item">
                <img src="images/car2.jpg" />
                </div>
                <div class="carousel-item">
                <img src="images/car3.jpg" />
                </div>
                <div class="carousel-item">
                <img src="images/car4.jpg" />
                </div>
                <div class="carousel-item">
                <img src="images/car5.jpg" />
                </div>
            </div>
			<a class="carousel-control-next" href="#demo" data-slide="next"></a>
        </div>
        
	</div>
    <!-- Welcome Text -->
    <div class="col-md-3">
        <div class="container text-center">
            <h3 style="color:#003366"><i>Welcome to SK Cinemas</i></h3>
            <p><i>Experience the Cinema Here</i></p>
        </div>
        <br/>
        <!-- Including Login Form -->
        <div id="res"><?php include 'login.php'; ?></div>

    </div>
    </div>
    </div>
    <br/>
    <!-- Including Footer -->
	<?php include 'footer.php'; ?>
</body>
</html>
<?php
}
?>