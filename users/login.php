<?php	
	require('../config.php');
		
	if ($authenticate->is_loggedin()) {
		$authenticate->redirect();
	}
	else if (count($_POST) > 0) {
		$authenticate->login($_POST['email'], $_POST['password']);
	}
?>
<html>
	<head>
		<title></title>
		<link href="../styles/styles.css" type="text/css" rel="stylesheet" />
		<script type="text/javascript" src="language/<?php echo LANGUAGE;?>.php?js=1"></script>
		<script type="text/javascript" src="js/login.js"></script>
	</head>
	<body>
		<form method="POST" action="<?php echo $_SERVER['REQUEST_URI'] ?>" onsubmit="return valid_login(this)">
			<table>
				<tr>
					<td colspan="2" id="errors">					
						<?php					
							$authenticate->errors();
						?>					
					</td>
				</tr>
				<tr>
					<td>
						<?php
							echo EMAIL_CAPTION;
						?>
					</td>
					<td>
						<input type="text" name="email" value="<?php echo (isset($_POST['email']))? htmlentities($_POST['email']) : ''; ?>" />
					</td>
				</tr>
				<tr>
					<td>
						<?php
							echo PASSWORD_CAPTION;
						?>
					</td>
					<td>
						<input type="password" name="password" />
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<input type="submit" value="<?php echo LOGIN_CAPTION; ?>" />
					</td>
				</tr>
			</table>
		</form>
	</body>
</html>