<?php
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
     
</script>
</head>
<body>
    <?php include 'header.php'; ?><br/>
    <div class="container-fluid">
    <div class="row">
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
           <!--  <a class="carousel-control-prev" href="#demo" data-slide="prev"></a> -->
            <a class="carousel-control-next" href="#demo" data-slide="next"></a>
        </div>
        
    </div>
    <div class="col-md-3">
        <div class="container text-center">
            <h3 style="color:#003366"><i>Welcome to SK Cinemas</i></h3>
            <p><i>Experience the Cinema Here</i></p>
        </div>
        <br/>
        <div class="card" style="border:1px solid #003366">
            <div class="card-header">
                <h2 style="color:#003366" class="text-center"><i>Admin Login</i></h2>
            </div>
            <div class="card-body">
                    <form id="login-form">
              <div class="form-group">
                    <img src="images/user.png" class="input_img" />
                    <input type="text" name="username" class="form-fields" placeholder="Username" />
                </div>
                <br/>
                <div class="form-group">
                    <img src="images/password.png" class="input_img" />
                    <input type="password" name="password" class="form-fields" placeholder="Password" />
                </div><br/>

                <div class="form-group text-center">
                    <input type="submit" value="Login" class="login-btn btn" />
                </div><br/>
                <div id="error" class="text-center text-danger"></div>
                <br/>
                <div class="form-group text-center text-danger">
                   <b> Forgot Password?</b>
                </div>
                <br/>
                <div class="form-group text-center">
                    New User?<b class="text-success"><a href="#" style="text-decoration: none" data-toggle="modal" data-target="#myModal1">Sign Up</a></b>
                </div>
                </form>      
            </div>
        </div>
        <script src="js/jquery.min.js"></script>
        <script>
        $('input').focus(function()
        {
          $('#error').html('');
        });
        $('#login-form').submit(function(e)
        {
            e.preventDefault();
            $.ajax({
                url:"admin_auth.php",
                type:"POST",
                data:$('#login-form').serialize(),
                success:function(result){
                    var res=$.trim(result);
                    if(res=='Logined')
                    {
                      $('#login-form')[0].reset();
                      location.replace("admin_home.php");
                      
                    }
                    else{
                      $('#res').html('<b>'+res+'</b>');
                      
                    }
                    
                    
                }
            });
        });
        </script>
        </div>
    </div>
    </div>
    <br/>
    <?php include 'footer.php'; ?>
</body>
</html>
<?php
}
?>