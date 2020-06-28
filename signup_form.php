<div class="modal fade" id="myModal1" >
    <div class="modal-dialog" >
      <div class="modal-content" >
      
        
        <div class="modal-header">
          <h4 class="modal-title"><i style="color:#003366">Sign Up</i></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        <form id="signup-form">
        <div class="form-group">
                <img src="images/name.png" class="input_img" />
                <input type="text" name="name" class="form-fields" pattern="[A-Za-z. ]{4,30}" title="Name should be greater than 4 character and less than 30 characters" placeholder="Name" required/>
            </div>
            
            <br/>
            <div class="form-group">
                <img src="images/email.png" class="input_img" />
                <input type="email" name="email" class="form-fields" pattern="[a-z0-9._]+@{1}[a-z]+[.]{1}[a-z]{2,3}"  placeholder="Email" required/>
            </div><br/>
            <div class="form-group">
                <img src="images/password.png" class="input_img" />
                <input type="password" name="password" class="form-fields" pattern="[A-Za-z0-9@_.]{6,10}" title="Must contain one special letter, and at least 6 and not more than 10 characters" placeholder="Password" required/>
            </div><br/>
            <div class="form-group">
                <img src="images/mobile.png" class="input_img" />
                <input type="text" name="mobile_no" class="form-fields" pattern="[0-9]{10}" title="Invalid" placeholder="Mobile No" required/>
            </div><br/>
            <div class="form-group text-center text-danger">
               <i> <b>Note:</b>Your username is your Email ID.</i>
             </div>
             
            <div class="form-group text-center">
                <input type="submit" value="Sign up" id="signup-btn" class="login-btn btn" />
            </div>
            </form>
        
        </div>
      </div>
    </div>
  </div>
<script src="js/jquery.min.js"></script>
<script>
    $('#signup-form').submit(function(e)
    {
        e.preventDefault();
        $.ajax({
            url:"signup.php",
            type:"POST",
            data:$('#signup-form').serialize(),
            success:function(result){
                var res=$.trim(result);
                alert(res);
                $('#signup-form')[0].reset();
                location.reload();
            }
        });
    });
</script>
  
  
  