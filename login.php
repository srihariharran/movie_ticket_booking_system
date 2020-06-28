<div class="card" style="border:1px solid #003366">
            <div class="card-header">
                <h2 style="color:#003366" class="text-center"><i>Login</i></h2>
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
                   <b data-toggle="modal" data-target="#forgot_password" style="cursor: pointer;">Forgot Password?</b>
                </div>
                <br/>
                <div class="form-group text-center">
                    New User?<b class="text-success"><a href="#" style="text-decoration: none" data-toggle="modal" data-target="#myModal1">Sign Up</a></b>
                </div>
                </form>      
            </div>
</div>
<div class="modal" id="forgot_password">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Forgot Password</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
       <form id="forgot_password_form" >
            <div class="form-group">
                <img src="images/email.png" class="input_img" />
                <input type="email" name="email" class="form-fields" placeholder="Enter the Email ID" />
            </div><br/>
            <div class="form-group" style="text-align: center">
                <input type="submit" value="Get Password" name="submit" class="btn login-btn" >
                
            </div>
        </form>
      </div>

      

    </div>
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
        url:"auth.php",
        type:"POST",
        data:$('#login-form').serialize(),
        success:function(result){
            var res=$.trim(result);
            if(res=='Logined')
            {
              $('#login-form')[0].reset();
              location.replace("home.php");
              
            }
            else{
              $('#error').html('<b>'+res+'</b>');
              
            }
            
            
        }
    });
});
$('#forgot_password_form').submit(function(e)
{
    e.preventDefault();
    $.ajax({
        url:"forgotpassword.php",
        type:"POST",
        data:$('#forgot_password_form').serialize(),
        success:function(result){
            var res=$.trim(result);
            alert(res);
        }
    });
});
</script>
<?php include 'signup_form.php'; ?>
