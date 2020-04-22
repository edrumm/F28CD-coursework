<?php
    include_once "../config.php";
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
                        unset($_SESSION["form_error"]);
                    }
                    ?>
                </form>
            </li>
        </ul>
    </nav>
    <div class="content">
        <?php
        if (isset($_SESSION["username"])) {
            echo "<p class='login'>Welcome, " . $_SESSION["username"] . "</p>";
        } else {
            echo "<p class='login'>Not logged in &nbsp; <i class=\"fas fa-user-times\"></i> &nbsp; <i class=\"fas fa-ellipsis-h\"></i></p>";
        }
        ?>

        <div class="sidebar-user">
            <ul>
                <li id="user"><i class="fas fa-user-circle"></i></li>
                <li>Elon Musk</li>
                <li id="username">em103</li>
                <li><br></li>
                <li id="user-options">Contact User <i class="far fa-envelope"></i></li>
                <li id="user-options" style="color: #FC979D;">Report User <i class="fas fa-ban"></i></li>
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
