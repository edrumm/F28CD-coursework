<html>
    <body>
        <?php
            include_once "../credentials.php";
            session_start();

            $server = "localhost";
            $database = "";

            $connection = new mysqli($server, $username, $password);

            if ($connection->connect_error) {
                die("Error: " . $connection->connect_error);
            }

            // ...

            $connection->close();
        ?>
    </body>
</html>
