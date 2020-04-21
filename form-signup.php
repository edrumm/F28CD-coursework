<?php
    include_once "session.php";
    include_once "credentials.php";


    /*if ($res->num_rows != 0) {
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
    }*/
?>