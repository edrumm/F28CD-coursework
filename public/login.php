<?php
    include_once "../server.php";
    include_once "../credentials.php";

    // currently UN-TESTED

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
    $sql = "SELECT * FROM User WHERE username = ? ;";

    $stmt = $connection->prepare($sql);
    $stmt->bind_param("ss", $usernameInput, $passInput);
    $stmt->execute();

    $res = $stmt->get_result();

    if ($_POST["login"]) {
        $res_arr = $res->fetch_array(MYSQLI_ASSOC);

        if ($res->num_rows == 0) {
            $_SESSION["errormsg"] = "The username you entered doesn't match any known account";

        } elseif (!password_verify($passInput, $res_arr["password"])) {
            $_SESSION["errormsg"] = "The password is incorrect";
        }

        $stmt->close();

    } elseif ($_POST["signup"]) {
        if ($res->num_rows != 0) {
            $_SESSION["errormsg"] = "This account already exists! Try logging in instead";

        } else {
            $hashed = password_hash($passInput, PASSWORD_DEFAULT);
            $sql = "INSERT INTO User (username, password) VALUES (?, ?);";

            $stmt = $connection->prepare($sql);
            $stmt->bind_param("ss", $usernameInput, $hashed);
            $stmt->execute();

            $res = $stmt->get_result();

            if (!$stmt->prepare($sql)) {
                $_SESSION["errormsg"] = mysqli_error($connection);
            }
        }

        $stmt->close();
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