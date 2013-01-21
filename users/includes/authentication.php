<?php
/*
	PHP Tutorial: Developing a Login – Part 1
	Copyright 2009 CS Truter
	Created by: Christoff Truter	
	Url: http://www.cstruter.com
	Email: christoff@cstruter.com
*/

class Authenticate
{
	private $errors = "";
	private $session = "";
	private $datasource;

	// Place a constraint that our datasource must conform to the Iuser interface
	public function __construct(Iuser $datasource)
	{
		$this->datasource = $datasource;
	}

	// Log user into the system	
	public function login($email, $password)
	{		
		$this->valid_email($email);
		$this->valid_password($password);
		
		if (empty($this->errors))
		{
			try
			{
				$details = $this->datasource->valid($email, $password);
				
				if (isset($details))
				{
					$_SESSION[$this->session] = $details;
					$this->redirect();
				}
				else {
					$this->errors = INVALID_USER_PASS;
				}
			}
			catch(Exception $ex)
			{
				$this->errors = $ex->getMessage();
			}
		}
	}

	// Name the session
	public function session($session)
	{
		$this->session = $session;
	}
	
	// Check if the user is currently logged in
	public function is_loggedin() {
		return isset($_SESSION[$this->session]);
	}	

	// Redirects the visitor to the login if they're not logged in
	public function secure()
	{
		if (!$this->is_loggedin())	{
			$this->redirect(VIRPATH.'/users/login.php?redirect='.urlencode($_SERVER['REQUEST_URI']));
		}
	}
	
	// Returns a string containing possible errors that happend during execution of the script 
	public function errors()
	{
		echo $this->errors;
	}
	
	// Returns the login status of the current user - like a "login view"
	public function status()
	{	
		if ($this->is_loggedin()) {
			echo LOGIN_TEXT.' '. $_SESSION[$this->session]['email'].'
					<a href="'.VIRPATH.'/users/logout.php">'.LOGOUT_CAPTION.'</a><br/>';
		}
		else {
			echo '<a href="'.VIRPATH.'/users/login.php">'.LOGIN_CAPTION.'</a><br/>';
		}
	}
	
	// Used for redirection in this script
	public function redirect($url = NULL)
	{
		if (isset($_GET['redirect'])) {
			header('Location: '.urldecode($_GET['redirect']));
		}
		else if (isset($url)) {
			header('Location: '.$url);
		}
		else {
			header('Location: '.VIRPATH.'/index.php');
		}
		die();
	}

	// Checks for a valid username
	private function valid_email($email)
	{
		if (empty($email)) {
			$this->errors.= COMPLETE_EMAIL.'<br/>';
		}
		else if (preg_match('/\w+([-+.\']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/', $email) == 0) {
			$this->errors.= INVALID_EMAIL.'<br/>';
		}
	}
	
	// Checks for a valid password
	private function valid_password($password)
	{
		if (empty($password)) {
			$this->errors.= COMPLETE_PASSWORD.'<br/>';
		}
	}
	
	// logs the user out
	public function logout() {
		unset($_SESSION[$this->session]);
	}
}

?>