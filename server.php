<?php
	if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}
	
	function validate($input) {
		if (strlen($input) > 20) {
		    return false;
        }

		$illegal_text = array(';', ':', '*', '&', '#', '(', ')', '=', '"', '--');

		foreach ($illegal_text as $character) {
		    if (strpos($input, $character) !== false) {
                $_SESSION["errormsg"] = "Username is > 20 characters or contains forbidden text";
		        return false;
            }
        }

		return true;
	}
?>