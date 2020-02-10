<?php
	if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}
	
	function validate($input) {
		// TODO
	}
	
	function logout() {
		session_destroy();
		header("Location: index.php");
	}	
?>