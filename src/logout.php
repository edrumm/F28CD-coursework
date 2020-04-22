<?php
    unset($_SESSION["username"]);
    session_destroy();
    header("Location: public_html/index.php");
?>