<?php
	require_once ("user.php");

	if (!empty($_GET['id'])) {
		$id = (int) $_GET['id'];
		User::delete($id);
		header('Location: index.php');
	} else {
		echo "you don't belong here";
	}

?>