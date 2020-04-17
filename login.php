<?php
    // credentials.php file hidden from GitHub for security purposes
    include_once "session.php";
    include_once "credentials.php";

    // VALIDATION:
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


    // MAIN CODE:
    // currently UN-TESTED

    if (isset($_SESSION["username"]) || !validate($_POST["username"])) {
        header("Location: public/index.php");
        exit();
    }

    unset($_SESSION["error"]);
    $connection = new mysqli($host, $username, $password, $db);

    if ($connection->connect_error) {
        header("Location: public/index.php");
        die("Connection failed: " . mysqli_connect_error());
    }

    $un = $_POST["username"];
    $pw = $_POST["pass"];
    $sql = "SELECT * FROM User WHERE username = ? ;";

    $stmt = $connection->prepare($sql);
    $stmt->bind_param("ss", $un, $pw);
    $stmt->execute();

    $res = $stmt->get_result();

    if ($_POST["login"]) {
        $fetched_arr = $res->fetch_array(MYSQLI_ASSOC);

        if ($res->num_rows == 0) {
            $_SESSION["errormsg"] = "The username you entered doesn't match any known account";

        } elseif (!password_verify($pw, $fetched_arr["password"])) {
            $_SESSION["errormsg"] = "The password is incorrect";
        }

        $stmt->close();

    } elseif ($_POST["signup"]) {
        if ($res->num_rows != 0) {
            $_SESSION["errormsg"] = "This account already exists! Try logging in instead";

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
        }

        $stmt->close();
    }

    $connection->close();

    if (!isset($_SESSION["errormsg"]))  {
        $_SESSION["username"] = $fetched_arr["username"];
        $res->free_result();
    }

    header("Location: public/index.php");
?>