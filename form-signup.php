<?php
    include_once "config.php";
    include_once "credentials.php";
    unset($_SESSION["form_error"]);


    // VALIDATION FUNCTIONS:

    function username_valid($un) {
        return (strlen($un) < 20 && $un != "");
    }

    function password_valid($pw) {
        return (preg_match('/[A-Za-z].*[0-9]|[0-9].*[A-Za-z]/', $pw) && strlen($pw) > 7 && strlen($pw) < 17);
    }

    function check_required() {
        $required = array("firstname", "surname", "email", "username", "password", "re-password");

        foreach ($required as $field) {

            if (empty($_POST[$field])) {
                return false;
            }

            trim($_POST[$field]);
        }
        return true;
    }


    // BEGIN CHECKS:

    if (!check_required()) {
        $_SESSION["form_error"] = "1 or more required fields missing";

    } elseif ($_POST["password"] != $_POST["re-password"]) {
        $_SESSION["form_error"] = "The passwords entered do not match";

    } elseif ($_POST["languages"] == "none") {
        $_SESSION["form_error"] = "Please choose a language";

    } elseif (!username_valid($_POST["username"])) {
        $_SESSION["form_error"] = "Username must be between 5 and 20 characters";

    } elseif (!password_valid($_POST["password"])) {
        $_SESSION["form_error"] = "Password should be 8 - 16 characters and contain at least 1 number";
    }

    if (isset($_SESSION["form_error"])) {
        header("Location: public/signup.php");
        exit();
    }


    // CONNECT - checks OK:

    $connection = new mysqli($host, $username, $password, $db);

    if ($connection->connect_error) {
        header("Location: public/signup.php");
        die("Connection failed: " . $connection->connect_error);
    }

    $sql = "INSERT INTO User (firstname, surname, email, username, password, languages, education) VALUES (?, ?, ?, ?, ?, ?, ?);";
    $stmt = $connection->prepare($sql);

    $hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $stmt->bind_param(
        $_POST["firstname"],
        $_POST["surname"],
        $_POST["email"],
        $_POST["username"],
        $hash,
        $_POST["languages"],
        $_POST["education"]);
    $stmt->execute();

    // ...

    $stmt->close();
    $connection->close();
?>