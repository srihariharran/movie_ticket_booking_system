<?php
	if(isset($_POST['mail']))
	{
	$mail=$_POST['mail'];
	include 'db.php';
	$sql="SELECT * FROM user WHERE email='$mail'";
	if($res=mysqli_query($con,$sql))
	{
		if(mysqli_num_rows($res)==1)
		{
			$row=mysqli_fetch_array($res);
			$alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890@!#$%^&*';
		    $pass =array();
		    $alphaLength = strlen($alphabet) - 1; 
		    for ($i = 0; $i < 8; $i++) {
		        $n = rand(0, $alphaLength);
		        $pass[]= $alphabet[$n];
		    }
		    $reset=implode($pass);
		    $password=md5($reset);
		    $sql1="UPDATE user SET password='$password' WHERE email='$email'";
			if(!mysqli_query($con,$sql1))
			{
				echo mysqli_error($con);
			}
			else
			{
				$to = $email;
				$subject = "Skcinemas Account Password";
				$headers = "Reply-To: <hypertexttechies2020@gmail.com>\r\n";
				$headers .= "Return-Path:<hypertexttechies2020@gmail.com>\r\n";
				$headers .= "From:<hypertexttechies2020@gmail.com>\r\n";
				$headers .= "Organization: KEC\r\n";
				$headers .= "MIME-Version: 1.0\r\n";
				$headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
				$headers .= "X-Priority: 3\r\n";
				$headers .= "X-Mailer: PHP". phpversion() ."\r\n";
				$message="Hi ".$row['name'].",\r\nYour SK Cinemas Account Password is ".$reset."\r\nYou can Login using Your Email id and this Password.";
				 $message.="\r\n";
				$message.="Thank You!";
				mail($to,$subject,$message,$headers);
				?>

				<script>
				alert("Password Sent to Your E-mail ID.");
				location.replace("index.php");
				</script>
				<?php
					
			}
		}
		else
		{
			?>
			<script>
				alert("Invalid Email/Username");
				location.replace("index.php");
			</script>
			<?php
		}
	}
	
	
	}
	else
	{
		
		header("location:index.php");
	}
   ?>