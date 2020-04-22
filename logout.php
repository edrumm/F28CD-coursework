<?php
    unset($_SESSION["username"]);
    session_destroy();
    header("Location: public/index.php");
?>