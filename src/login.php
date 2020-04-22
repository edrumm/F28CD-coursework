<?php
    // credentials.php file hidden from GitHub for security purposes
    include_once "../config.php";
    include_once "../credentials.php";

    // MAIN CODE:
    // currently UN-TESTED

    if (isset($_SESSION["username"])) {
        header("Location: public_html/index.php");
        exit();
    }

    unset($_SESSION["error"]);
    $connection = new mysqli($host, $username, $password, $db);

    if ($connection->connect_error) {
        header("Location: public_html/index.php");
        die("Connection failed: " . $connection->connect_error);
    }

    $un = $_POST["username"];
    $pw = $_POST["pass"];
    $sql = "SELECT * FROM User WHERE username = ? ;";

    $stmt = $connection->prepare($sql);
    $stmt->bind_param("ss", $un, $pw);
    $stmt->execute();

    $res = $stmt->get_result();
    $fetched_arr = $res->fetch_array(MYSQLI_ASSOC);

    if ($res->num_rows == 0) {
        $_SESSION["errormsg"] = "The username you entered doesn't match any known account";

    } elseif (!password_verify($pw, $fetched_arr["password"])) {
        $_SESSION["errormsg"] = "The password is incorrect";
    }

    $stmt->close();
    $connection->close();

    if (!isset($_SESSION["errormsg"]))  {
        $_SESSION["username"] = $fetched_arr["username"];
        $res->free_result();
    }

    header("Location: public_html/index.php");
?>