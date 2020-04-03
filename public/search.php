<?php
    include_once "../server.php";

    $search = $_POST["searchbar"];

    if ($search == "") {
        header("Location: index.php");
        exit();
    }
?>