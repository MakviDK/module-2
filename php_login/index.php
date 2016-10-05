<?php
	require_once('config.php'); // så der bliver sørget for at lige meget hvor megt du graver ned så laoder den kun en gang
	$db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);
	ob_start();
	session_start();

	if(!empty($_POST))
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
		if ($stmt = $db->prepare("SELECT id, password FROM users WHERE username = ? LIMIT 1")) {
			$stmt->bind_param("s", $username);
			$stmt->execute();
			$stmt->bind_result($id, $hash);
			$stmt->store_result();
			$stmt->fetch();
				if ($stmt->num_rows == 1 && password_verify($password, $hash)) {
					$_SESSION['id'] = $id;
					$_SESSION['username'] = $username;
				} else {
					echo "Invalid Credentials";
				}
			$stmt->free_result();
			$stmt->close();
		} else {die("Something went wrong");}
	}
	if(!empty($_SESSION['id']) && !empty($_SESSION['username']))
	{
?>
Yaaaay, you're inside! <!-- Som man siger -->
<a href="logout.php">Log out</a>
<?php
	} else {
?>

<form action="" method="post"><!-- login form, brugernavn og kodeord. POST bruger fordi data ikke skal være synligt. GET kan man bruge i søge maskiner etc, fordi så kan man altid genbruge linket. action="" er tom, så den går til samme side man er på.  -->
	<label>Username: </label><input type="text" name="username" /><br />
	<label>Password: </label><input type="password" name="password" /><br/>
	<input type="submit" value="Submit" />
</form>
<a href="register.php">Register</a>
<?php
	}
?>