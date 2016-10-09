<?php

require_once('database.php');

class User {

	static public function isNameTaken($name)
	{
		$db = Database::connect();
		$taken = true;
		$username = strtolower($name);

		if ($stmt = $db->prepare("SELECT * FROM users WHERE username = ?")) {
			$stmt->bind_param("s", $username);
			$stmt->execute();
			$stmt->store_result();
			$stmt->fetch();
				if ($stmt->num_rows >= 1)
					$taken = true;
				else 
					$taken = false;
			$stmt->free_result();
			$stmt->close();
		}

		return $taken;
	}

	static public function DoesExist($id)
	{
		$db = Database::connect();
		$taken = true;

		if ($stmt = $db->prepare("SELECT * FROM users WHERE id = ?")) {
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$stmt->store_result();
			$stmt->fetch();
				if ($stmt->num_rows >= 1)
					$taken = true;
				else 
					$taken = false;
			$stmt->free_result();
			$stmt->close();
		}
		return $taken;
	}

	static public function create($username, $password, $email, $firstname, $lastname)
	{
		$db = Database::connect();	
		$username = strtolower($username);
		$hash = password_hash($password, PASSWORD_DEFAULT);

		if ($stmt = $db->prepare("INSERT INTO users (username, password, firstname, lastname, email, date_created) VALUES (?, ?, ?, ?, ?, NOW())")) {
			$stmt->bind_param("sssss", $username, $hash, $firstname, $lastname, $email);
			$stmt->execute();
			$stmt->close();	
		} else {die("Something went wrong");} 
	}

	static public function retrieve($id)
	{
		$db = Database::connect();
		$data = [];

		if ($stmt = $db->prepare("SELECT username, password, firstname, lastname, email, date_created FROM users WHERE id = ? LIMIT 1")) {
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$stmt->bind_result($data['username'], $data['password'], $data['firstname'], $data['lastname'], $data['email'], $data['date_created']);
			$stmt->fetch();
			$stmt->close();
		}
		return $data;
	}

	static public function update($data)
	{
		$db = Database::connect();

		if (empty($data['password']))
			$sql = "UPDATE users SET username = ?, firstname = ?, lastname = ?, email = ? WHERE id = ?";
		else {
			$password = password_hash($data['password'], PASSWORD_DEFAULT);
			$sql = "UPDATE users SET username = ?, firstname = ?, lastname = ?, email = ?, password = ? WHERE id = ?";
		}

		if ($stmt = $db->prepare($sql)) {
			if(empty($data['password']))
				$stmt->bind_param("ssssi", $data['username'], $data['firstname'], $data['lastname'], $data['email'], $data['id']);
			else
				$stmt->bind_param("sssssi", $data['username'], $data['firstname'], $data['lastname'], $data['email'], $password, $data['id']);
			
			$stmt->execute();
			$stmt->close();
		}
		
	}

	static public function delete($id)
	{
		$db = Database::connect();
		$stmt = $db->prepare("DELETE FROM users WHERE id = ?");
		$stmt->bind_param("i", $id);
		$stmt->execute();
		$stmt->close();
	}

}

?>