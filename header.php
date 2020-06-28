<div id="mySidenav" class="sidenav">
            <button class="closebtn btn"  onclick="closeNav()">&times;</button>
            <?php
            if(isset($_SESSION['name']) && isset($_SESSION['key']) && $_SESSION['key']==='Admin')
            {
                ?>
                <a href="admin_home.php"><i class="fa fa-home"></i>&nbsp;Home</a>
                <a href="add_movie_form.php"><i class="fa fa-plus"></i>&nbsp;Add Movie</a>
                <!-- <a href="new_user_form.php"><i class="fa fa-sign-in"></i>&nbsp;Create New User</a> -->
                <a href="logout.php"><i class="fa fa-sign-out"></i>&nbsp;Logout</a>
                <?php
            }
            else if(isset($_SESSION['name']) && isset($_SESSION['key']) && $_SESSION['key']==='User')
            {
                ?>
                <a href="home.php"><i class="fa fa-home"></i>&nbsp;Book Tickets</a>
                <a href="booking_history.php"><i class="fa fa-window-maximize"></i>&nbsp;Booking History</a>
                <a href="#" data-toggle="modal" data-target="#change_password"><i class="fa fa-edit"></i>&nbsp;Change Password</a>
                <a href="logout.php"><i class="fa fa-sign-out"></i>&nbsp;Logout</a>
                <?php
            }
            else
            {
                ?>
                <a href="index.php"><i class="fa fa-home"></i>&nbsp;Home</a>
                <a href="now_showing_movies.php" ><i class="fa fa-desktop"></i>&nbsp;Now Showing</a>
                <a href="admin_login.php" ><i class="fa fa-sign-in"></i>&nbsp;Admin Login</a>
                <?php
            }
            ?>
</div>
<div class="sticky-top">
<nav class="navbar navbar-dark" >
    <div class="text-left"><img src="images/logo.png" width="40px">&nbsp;<i>SK Cinemas</i></div>
    <div class="login">
        <a  onclick="openNav()" style="cursor:pointer;"><img src="images/menu.png" width="50px"></a>
    </div>
</nav>
</div>
<?php
    if(isset($_SESSION['name']) && isset($_SESSION['key']) && $_SESSION['key']==='Admin')
    {
        ?>
        <div class="alert alert-primary text-center">
           <i class="fa fa-user"></i> <?php echo "Welcome,".$_SESSION['name']; ?>
        </div>
        <?php
    }
    else if(isset($_SESSION['name']) && isset($_SESSION['key']) && $_SESSION['key']==='User')
    {
        ?>
        <div class="alert alert-primary text-center">
           <i class="fa fa-user"></i> <?php echo "Welcome,".$_SESSION['name']; ?>
        </div>
        <?php
    }
?>
<div class="modal" id="change_password">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Change Password</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form id="change_password_form">
          <div class="form-group">
            
            <input type="text" name="email" class="form-control" value="<?php if(isset($_SESSION['email'])) echo $_SESSION['email']; ?>" placeholder="Username" readonly>
            
          </div><br/>
          <div class="form-group">
            <label>Enter the Old Password:</label>
            <input type="password" name="old" class="form-control" placeholder="Old Password" required>
          </div><br/>
          <div class="form-group">
            <label>Enter the New Password:</label>
            <input type="password" name="new" class="form-control" placeholder="New Password" required>
          </div><br/>
          <div class="form-group" style="text-align: center">
            <input type="submit" value="Change Password" id="submit" class="btn login-btn" >
          </div>
        </form>
      </div>

      

    </div>
  </div>
</div>

<script type="text/javascript">
$('#change_password_form').submit(function(e)
{
    e.preventDefault();
    $.ajax({
        url:"changepassword.php",
        type:"POST",
        data:$('#change_password_form').serialize(),
        success:function(result){
            var res=$.trim(result);

            alert(res);
            if(res=="Password Changed Successfully.")
            {
                $('#change_password_form')[0].reset();
                
            }
        }
    });
});
</script>
<script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
    }
    
    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }
</script>