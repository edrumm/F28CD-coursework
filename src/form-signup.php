<?php
    include_once "../config.php";
    include_once "../credentials.php";

    unset($_SESSION["errormsg"]);
    $required = array("firstname", "surname", "email", "username", "password", "re-password");

    // BEGIN CHECKS:

    foreach ($required as $field) {
        if ($_POST[$field] == "") {
            $_SESSION["errormsg"] = "1 or more required fields missing";
            header("Location: public_html/signup.php");
            exit();
        }
    }

    if ($_POST["password"] != $_POST["re-password"]) {
        $_SESSION["errormsg"] = "The passwords entered do not match";
        header("Location: public_html/signup.php");
        exit();

    } elseif ($_POST["languages"] == "none") {
        $_SESSION["errormsg"] = "Please choose a language";
        header("Location: public_html/signup.php");
        exit();
    }

    // CONNECT - CHECKS OK:

    $connection = new mysqli($host, $username, $password, $db);

    if ($connection->connect_error) {
        header("Location: public_html/signup.php");
        die("Connection failed: " . $connection->connect_error);
    }

    $sql = "INSERT INTO User (firstname, surname, email, username, pass, lang, education) VALUES (?, ?, ?, ?, ?, ?, ?);";
    $stmt = $connection->prepare($sql);

    $hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $stmt->bind_param($_POST["firstname"],
        $_POST["surname"],
        $_POST["email"],
        $_POST["username"],
        $hash,
        $_POST["language"],
        $_POST["education"]);
    $stmt->execute();

    /*if ($res->num_rows != 0) {
        $_SESSION["errormsg"] = "This account already exists! Try logging in instead";
        // header location login page . php etc...

    } else {
        $hashed_pw = password_hash($pw, PASSWORD_DEFAULT);
        $sql = "INSERT INTO User (username, password) VALUES (?, ?);";

        $stmt = $connection->prepare($sql);
        $stmt->bind_param("ss", $un, $hashed_pw);
        $stmt->execute();

        $res = $stmt->get_result();

        if (!$stmt->prepare($sql)) {
            $_SESSION["errormsg"] = mysqli_error($connection);
            // die() ?
        }
    }*/

    echo $_POST["languages"];

    $stmt->close();
    $connection->close();
?>