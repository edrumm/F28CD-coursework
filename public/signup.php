<?php

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
        </ul>
    </nav>
    <div class="content">
        <?php
            if (isset($_SESSION["username"])) {
                $_SESSION["errormsg"] = "Cannot create an acocunt: already signed in";
                header("Location: index.php");
                exit();
            }
        ?>
        <form action="../form-signup.php" method="post" name="signup">
            <!--TODO: Form-->
        </form>
    </div>
    <footer>
        <p>&copy; <span id="yr"></span> Ewan Drummond, Luke Douglas, Jack Tong</p>
        <p><a href="https://www.hw.ac.uk/" target="_blank">HWU</a> | <a href="https://github.com/edrumm/F28CD-coursework" target="_blank">GitHub</a></p>
    </footer>
</body>
</html>
