<?php 

session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//read from database
			$query = "select * from users where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: Show_User.php");
						die;
					}
				}
			}
			
			echo "wrong username or password!";
		}else
		{
			echo "enter username or password!";
		}
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>User Login</title>	
	<link rel="stylesheet" href="style.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Art Store</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="artist_login.php"><span class="glyphicon glyphicon-user"></span> SignIn as Artist </a></li>
      <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</nav>
<div class="container">
		<img src="download.jfif"/>
			<form method="post">
			<lable><h2 style="color:White;">User Login</h2></lable>
				<div class="form-input">
					
					<input type="text" name="user_name" placeholder="Enter the User Name"/>	
				</div>
				<div class="form-input">
					<input type="password" name="password" placeholder="password"/>
				</div>
				<input type="submit" type="submit" value="LOGIN" id="button" class="btn-login"/>

				<h3><a href="signup.php" style="color:white;">Click to Signup</a><h3><br><br>
			</form>
</div>
</body>
</html>