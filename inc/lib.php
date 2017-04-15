<?php 
	
	function redirect($location) {
		header("Location: ".$location);
	}

	function is_post($var) {
		return isset($_POST[$var]);
	}

	function post($var) {
		return $_POST[$var];
	}
?>