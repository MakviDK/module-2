<?php
	require_once('config.php');
	ob_start();
	session_start();
	if(!empty($_POST)) // så længe den ikke er tom skal den gøre dette
	{
		// herinde bliver først kaldt når der er sket noget med POST
		$db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);
		$username = $_POST['username'];
		$hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
		if ($stmt = $db->prepare("INSERT INTO users (username, password) VALUES (?, ?)")) {
			$stmt->bind_param("ss", $username, $hash); 	// Vi binder spørgsmålstegnene til variabler.
							     				 	// Det i den første, er data deklarationer - s betyder string, altså tekst
							      				 	// Hvad man ellers bruger i andre tilfælder er fx i for integer (tal)
			$stmt->execute();	// Query kører
			$stmt->close();		// Rydder op efter sig selv
		} else {die("Something went wrong");} 						// die gør at siden ikke fortsætter, men bare dræber sig selv
							   					 				// Grunden til vi bruger det hele i en if er at vi kan tjekke om det er gået i stykker på noget tidspunkt
	}
?>
REGISTER
<form action="" method="post">
	<label>Username: </label><input type="text" name="username" /><br />
	<label>Password: </label><input type="password" name="password" /><br/>
	<input type="submit" value="Submit" />
</form>
<a href="index.php">Home</a>