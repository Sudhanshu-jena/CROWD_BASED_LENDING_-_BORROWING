<?php
	session_start();
	include_once("dbconfig/config.php")
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Validated Login Form</title>
	<link rel="stylesheet" href="css/login.css">

</head>
<body>
	<div class="container" style="background-image:url('img/formsbg.jpg');">
		<h1 class="label">LOGIN</h1>
		<form class="login_form" action="loginform.php" method="post" name="form" >
			<div class="font"></div>
			<label><b>Student ID</b></label>
				<input type="text" placeholder="Enter User ID" name="User_ID" required>
				<label><b>Password</b></label>
				<input type="password" placeholder="Enter Password" name="password" required>
				<button class="login_button" name="login" type="submit">Login</button></br>
			<a class="link" target="_blank">Not already a member?</a>
			<a href="register.php"><button class="signup" type="button">Sign up</button></a>
		</form>

		
		<?php
			if(isset($_POST['login']))
			{
				$conn = config::conectphp();
				@$User_ID=$_POST['User_ID'];
				@$password=$_POST['password'];

				$query = "select * from signup where User_ID='$User_ID' and password='$password' ";
				//echo $query;
				$stmt = $conn->prepare($query);
  				$stmt->execute();
				//echo mysql_num_rows($query_run);
				if($stmt)
				{
					if($stmt->rowCount() >0)
					{
					
					$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  					
					
					$_SESSION['User_ID'] = $User_ID;
					$_SESSION['password'] = $password;
					
					header( "Location: homepage.html");
					}
					else
					{
						echo '<script type="text/javascript">alert("No such User exists. Invalid Credentials")</script>';
					}
				}
				else
				{
					echo '<script type="text/javascript">alert("Database Error")</script>';
				}
			}
			else
			{
			}
		?>
	</div>	

	
</body>
</html>