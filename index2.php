<?php	
	require('config.php');
	$authenticate->secure();
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
						Some funky information<br/>
						<a href="index.php"><?php echo HOME_CAPTION; ?></a>
					</td>
				</tr>
			</table>
	</body>
</html>