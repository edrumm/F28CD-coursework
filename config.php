<?php
	if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}

    // ENABLE PHP DEBUG: will remove later

    if (!ini_get('display_errors')) {
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
    }
?>