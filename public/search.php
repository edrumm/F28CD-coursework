<?php
    include_once "../server.php";

    $search = $_POST["searchbar"];

    if ($search == "Search" || $search == '') {
        echo "<p>Error!</p>";

        // TODO

        /*
        header("Location: index.php");
        exit();
        */

    } else {
        echo "<p>OK!</p>";

        // TODO
    }
?>