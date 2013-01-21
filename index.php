<?php	
	require('config.php');	
?>
<html>
	<head>
		<title></title>
		<link href="styles/styles.css" type="text/css" rel="stylesheet" />		
	</head>
	<body>
			<table>
				<tr>
					<td>					
						<?php $authenticate->status() ?>
						<a href="index2.php">Auth Page</a>												
					</td>
				</tr>
			</table>
	</body>
</html>