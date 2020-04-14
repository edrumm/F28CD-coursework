<?php
    include_once "../session.php";

    unset($_SESSION["form_error"]);

    if ($_POST["searchbar"] == "") {
        $_SESSION["form_error"] = "Please enter a search value";
        header("Location: index.php");
        exit();

    } else {
        echo "<h3>Showing results for: " . $_POST["searchbar"] . "</h3>";
        echo "<p>Not implemented yet!</p>";
    }

    // ...

?>