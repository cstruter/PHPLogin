<?php

class user implements Iuser
{
	private function connect()
	{
		$mysqli = @new mysqli(HOST, USERNAME, PASSWORD, DATABASE);	
		if (mysqli_connect_errno())	{
			throw new Exception(mysqli_connect_error());
		}
		return $mysqli;
	}
	
	public function valid($email, $password)
	{
		$db = $this->connect();	

		$email = $db->real_escape_string($email);
		$password = $db->real_escape_string($password);
		$result = $db->query("SELECT userID, email
									FROM users
									WHERE email = lower('$email')
									AND pass = md5('$password')");	
		$row = $result->fetch_assoc();
		$result->close();
		$db->close();
		return $row;
	}
}

?>