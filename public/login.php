<?php
    include_once "../server.php";
    include_once "../credentials.php";

    if (isset($_SESSION["username"])) {
        header("Location: index.php");
        exit();
    }

    if (!validate($_POST["username"])) {
        $_SESSION["errormsg"] = "Username is > 20 characters or contains forbidden text";
        header("Location: index.php");
        exit();
    }

    unset($_SESSION["error"]);
    $connection = new mysqli($host, $username, $password, $db);

    if (mysqli_connect_error()) {
        header("Location: index.php");
        die("Connection failed: " . mysqli_connect_error());
    }

    $usernameInput = $_POST["username"];
    $passInput = $_POST["pass"];

    $sql = "SELECT * FROM User WHERE username = '$usernameInput';";

    if ($_POST["login"]) {
        $res = $connection->query($sql);
        $res_arr = $res->fetch_array(MYSQLI_ASSOC);

        if ($res->num_rows == 0) {
            $_SESSION["errormsg"] = "The username you entered doesn't match any known account";

        } elseif (!password_verify($passInput, $res_arr["password"])) {
            $_SESSION["errormsg"] = "The password is incorrect";
        }

    } elseif ($_POST["signup"]) {
        $res = $connection->query($sql);

        if ($res->num_rows != 0) {
            $_SESSION["errormsg"] = "This account already exists! Try logging in instead";

        } else {
            $hashed = password_hash($passInput, PASSWORD_DEFAULT);
            $sql = "INSERT INTO User (username, password) VALUES ('$usernameInput', '$hashed');";

            if (!$connection->query($sql)) {
                $_SESSION["errormsg"] = mysqli_error($connection);
            }
        }
    }

    $connection->close();

    if (isset($_SESSION["errormsg"])) {
        header("Location: index.php");
        exit();
    }

    $_SESSION["username"] = $res_arr["username"];
    $res->free_result();

    header("Location: index.php");
?>