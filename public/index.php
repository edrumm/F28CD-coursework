<?php
	include_once "../server.php";
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
    <!--
        TODO: merge html & style to this file from index-new.php
        TODO: test this
        <script type="text/javascript" src="js/carousel.js"></script>
    -->
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
    <div class="content">
        <?php
            if (isset($_SESSION["username"])) {
                echo "<p>Welcome, " . $_SESSION["username"] . "</p>";
            } else {
                echo "<p>Not logged in</p>";
            }
        ?>
        <div class="sidebar">
            <ul>
                <li>Java</li>
                <li>HTML</li>
                <li>JavaScript</li>
                <li>PHP</li>
                <li>Python</li>
            </ul>
        </div>
        <div class="main-content">

        </div>
    </div>
    <footer>
        <p>&copy; <span id="yr"></span> Ewan Drummond, Luke Douglas, Jack Tong</p>
        <p><a href="https://www.hw.ac.uk/" target="_blank">HWU</a> | <a href="https://github.com/edrumm/F28CD-coursework" target="_blank">GitHub</a></p>
    </footer>
</body>
</html>