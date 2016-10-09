<?php
	
require_once('database.php');
require_once('user.php');

$db = Database::connect();

ob_start();
session_start();

	if(!empty($_POST))
	{
		$username = $_POST['username'];
		//$hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
		$password = $_POST['password'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$email = $_POST['email'];
		if (!empty($username) && !empty($password) && !empty($firstname) && !empty($lastname) && !empty($email))
		{
			if (!User::isNameTaken($username)) {
				User::create($username, $password, $email, $firstname, $lastname);
				header('Location: index.php');
			} else {
				echo "Be original nigga";
			}

		} else {
			echo "Fields have to uhm... have stuff in them";
		}

	}
//echo '<pre>'; print_r($data); echo '</pre>';

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- Bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<!-- Bootstrap End -->

	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="container" style="padding-top: 50px;">
	<h1>Such USER many wow</h1>
	<div class="row">
		<a href="index.php">Home</a>
		<form action="" method="post">
			<div class="form-group">
				<label>Email: </label><input type="email" class="form-control" name="email" />
			</div>
			<div class="form-group">
				<label>Username: </label><input type="text" class="form-control" name="username" />
			</div>
			<div class="form-group">
				<label>Password: </label><input type="password" class="form-control" name="password" />
			</div>
			<div class="form-group">
				<label>Firstname: </label><input type="text" class="form-control" name="firstname" />
			</div>
			<div class="form-group">
				<label>Lastname: </label><input type="text" class="form-control" name="lastname" />
			</div>
			<input type="submit" value="Create" class="btn btn-default" />
		</form>

	</div>
</div>
</body>
</html>