<?php
	session_start();
	include_once("dbconfig/config.php");
	
?>
<!DOCTYPE html>
<html>
<head>
<title>Project World Sign Up</title>

<link rel="stylesheet" href="css/register.css">
</head>
<body >

<section>
<div id="main-wrapper" style="background-image:url('img/formsbg.jpg');">
	<center><h2>Sign Up Form</h2></center>
		<form action="register.php" method="post">
			<div class="imgcontainer">
				<img src="img/avatar.png" alt="Avatar" class="avatar">
			</div>
			<div class="inner_container">
			<label><b>User ID</b></label>
				<input type="text" placeholder="User ID" name="User_ID" required>
			<label><b>Email</b></label>
			<input type="email" placeholder="Email" name="Email"><br><br>
				<label><b>Password</b></label>
				<input type="password" placeholder="Enter Password" name="password" required>
				<label><b>Confirm Password</b></label>
				<input type="password" placeholder="Enter Password" name="cpassword" required>	

				<button name="register" class="sign_up_btn" type="submit">Sign Up</button>
				
				
				
				
				<a href="loginform.php"><button type="button" class="back_btn"><< Back to Login</button></a>
			</div>
		</form>
		
		<?php
			if(isset($_POST['register']))
			{
				$conn = config::conectphp();
				$User_ID=$_POST['User_ID'];
				$Email=$_POST['Email'];
				$password=$_POST['password'];
				$cpassword=$_POST['cpassword'];
				
				
				
				
				if($password==$cpassword)
				{
					$query = "select * from signup where User_ID='$User_ID'";
					//echo $query;
					$stmt = $conn->prepare($query);
  					$stmt->execute();
				
				//echo mysql_num_rows($query_run);
				if($stmt)
					{
						if($stmt->rowCount() > 0)
						{
							echo '<script type="text/javascript">alert("This Username Already exists.. Please try another username!")</script>';
						}
						else
						{
							$query = "insert into signup (User_ID, Email, password)
							 VALUES(:User_ID, :Email, :password)";
							$stmt = $conn->prepare($query);
  							$stmt->execute(['User_ID'=>$User_ID, 'Email'=>$Email, 'password'=>$password]);
							
							if($stmt)
							{
								echo '<script type="text/javascript">alert("User Registered.. Welcome")</script>';
								$_SESSION['User_ID'] = $User_ID;
								$_SESSION['Email']=$Email;
								$_SESSION['password'] = $password;
								
								
							}
							else
							{
								echo '<p class="bg-danger msg-block">Registration Unsuccessful due to server error. Please try later</p>';
							}
						}
					}
					else
					{
						echo '<script type="text/javascript">alert("DB error")</script>';
					}
				}
				else
				{
					echo '<script type="text/javascript">alert("Password and Confirm Password do not match")</script>';
				}
				
			}
			else
			{
			}
		?>
	</div>
	
	
	


	</section>		
	
</body>
</html>