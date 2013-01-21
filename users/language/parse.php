<?php

foreach($constants as $key=>$value) {	
	if (isset($_GET['js'])) {
		echo 'var '.$key.' = "'.$value.'";'."\n";
	}
	else {
		define($key, $value);
	}
}

?>