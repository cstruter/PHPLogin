<?php

session_start();

// Language

define('LANGUAGE', 'en');

// Database settings

define('HOST', 'localhost');
define('USERNAME', 'root');
define('PASSWORD', '');
define('DATABASE', 'userDB');

// Physical Path
define('ABSPATH', dirname(__FILE__));

// Virtual Path
define('VIRPATH', '/Login');

require(ABSPATH.'/users/includes/Iuser.php');
require(ABSPATH.'/users/includes/authentication.php');
require(ABSPATH.'/data/user.php');
require(ABSPATH.'/users/language/'.LANGUAGE.'.php');

// Init the login system

$user = new user();
$authenticate = new Authenticate($user);
$authenticate->session('user');

?>