<?php
    include_once "../session.php";
    include_once "credentials.php";
    unset($_SESSION["form_error"]);
?>

<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale: 1.0">
    <meta name="author" content="Ewan Drummond, Luke Douglas, Jack Tong">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <!--CSS-->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!--JS-->
    <script type="text/javascript" src="js/master.js"></script>
    <script type="text/javascript" src="js/carousel.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.8.1/js/all.js"
            integrity="sha384-g5uSoOSBd7KkhAMlnQILrecXvzst9TdC09/VM+pjDTCM+1il8RHz5fKANTFFb+gQ"
            crossorigin="anonymous">
    </script>
    <title>F28CD Skills Exchange</title>
</head>
<body onresize="whenResized()">
    <nav id="navigation">
        <img src="img/logo_white.png" alt="S H A R E">
        <ul id="nav-list">
            <li id="drop-icon"><a href="javascript:toggleDropdown()">≡</a></li>
            <li>Login</li>
            <li>Register</li>
            <li id="nav-search">
                <form method="post" action="search.php" name="search-form">
                    <input type="text" name="searchbar" value="Search" autocomplete="off"
                           onfocus="searchbarValue(true)" onfocusout="searchbarValue(false)">
                    <?php
                    // add class / id & style
                    if (isset($_SESSION["form_error"])) {
                        echo "<p>" . $_SESSION["form_error"] . "</p>";
                    }
                    ?>
                </form>
            </li>
        </ul>
    </nav>
    <div class="content-auto">
        <?php
            if (isset($_SESSION["username"])) {
                echo "<p class='login'>Welcome, " . $_SESSION["username"] . "</p>";
            } else {
                echo "<p class='login'>Not logged in &nbsp; <i class=\"fas fa-user-times\"></i> &nbsp; <i class=\"fas fa-ellipsis-h\"></i></p>";
            }
        ?>

        <div class="search-result">
            <br>
            <?php
                if ($_POST["searchbar"] == "") {
                    $_SESSION["form_error"] = "Please enter a search value";
                    header("Location: index.php");
                    exit();

                } else {
                    echo "<h3>Showing results for: " . $_POST["searchbar"] . "</h3>";
                    echo "<hr><br>";
                    echo "<p>UNDER CONSTRUCTION</p>";
                }

                if (true) { exit(); }  // TEMPORARY to stop invalid DB connection while DB is not set up

                // -------------------------------------------------------------------------------------
                // TODO: Setup database
                // TODO: Multiple queries for each item: resource, user, lanagauge, etc...

                $connection = new mysqli($host, $username, $password, $db);

                if ($connection->connect_error) {
                    header("Location: public/index.php");
                    die("Connection failed: " . mysqli_connect_error());
                }

                $sql = "SELECT * FROM Resource WHERE Tag = ?;";
                $stmt = $connection->prepare($sql);
                $stmt->bind_param("s", $_POST["searchbar"]);
                $stmt->execute();

                $res =$stmt->get_result();
                $items = $res->fetch_array(MYSQLI_ASSOC);

                if ($res->num_rows == 0) {
                    echo "<h3>0 results found</h3>";
                } else {
                    // foreach in result, display
                    foreach ($items as $item) {
                        // print each as div
                    }
                }

                $stmt->close();
                $connection->close();
                $res->free_result();
            ?>

            <div class="search-item">
                <h1>JDK 14 Documentation</h1>
                <p>Oracle</p>
                <a href="https://docs.oracle.com/en/java/javase/14/">https://docs.oracle.com/en/java/javase/14/</a>
                <ul class="tags">
                    <li>java</li>
                    <li>jdk</li>
                </ul>
            </div>
            <br>
            <div class="search-item">
                <h1>Java Programming Tutorial 1 - Introduction to Java</h1>
                <p>Caleb Curry</p>
                <a href="https://www.youtube.com/watch?v=2dZiMBwX_5Q">https://www.youtube.com/watch?v=2dZiMBwX_5Q</a>
                <ul class="tags">
                    <li>java</li>
                    <li>tutorial</li>
                    <li>introduction</li>
                </ul>
            </div>
            <br>
            <div class="search-item">
                <h1>Caleb Curry</h1>
                <p>User</p>
                <a href="#">Profile</a>
                <ul class="tags">
                    <li>java</li>
                </ul>
            </div>
        </div>


    </div>
    <footer>
        <p>&copy; <span id="yr"></span> Ewan Drummond, Luke Douglas, Jack Tong</p>
        <p><a href="https://www.hw.ac.uk/" target="_blank">HWU</a> | <a href="https://github.com/edrumm/F28CD-coursework" target="_blank">GitHub</a></p>
    </footer>
</body>
</html>
