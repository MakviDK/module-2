<?php
	
require_once('user.php');

$db = Database::connect();

ob_start();
session_start();

$id = (int) $_GET['id'];
if (empty($_GET['id']) || User::DoesExist($id) == false) {
	echo "We don't take kindly to strangers around here.";
} else {


$data = User::retrieve($id);

	if(!empty($_POST))
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$email = $_POST['email'];
		if (!empty($username) && !empty($firstname) && !empty($lastname) && !empty($email))
		{
			$post = [
				'id' => $id,
				'username' => $username,
				'password' => $password,
				'firstname' => $firstname,
				'lastname' => $lastname,
				'email' => $email,
			];
			User::update($post);
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
				<label>Email: </label><input type="email" class="form-control" name="email" value="<?php echo(htmlspecialchars($data['email'])); ?>" />
			</div>
			<div class="form-group">
				<label>Username: </label><input type="text" class="form-control" name="username" value="<?php echo (htmlspecialchars($data['username'])); ?>" />
			</div>
			<div class="form-group">
				<label>Password: </label><input type="password" class="form-control" name="password" />
			</div>
			<div class="form-group">
				<label>First name: </label><input type="text" class="form-control" name="firstname" value="<?php echo (htmlspecialchars($data['firstname'])); ?>"/>
			</div>
			<div class="form-group">
				<label>Last name: </label><input type="text" class="form-control" name="lastname" value="<?php echo (htmlspecialchars($data['lastname'])); ?>"/>
			</div>
			<input type="submit" value="Update" class="btn btn-default" />
		</form>

	</div>
</div>
</body>
</html>
<?php
}
?>