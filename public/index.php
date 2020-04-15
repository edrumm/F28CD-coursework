<?php
	include_once "../session.php";
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
    <div class="content">
        <?php
            if (isset($_SESSION["username"])) {
                echo "<p class='login'>Welcome, " . $_SESSION["username"] . "</p>";
            } else {
                echo "<p class='login'>Not logged in &nbsp; <i class=\"fas fa-user-times\"></i> &nbsp; <i class=\"fas fa-ellipsis-h\"></i></p>";
            }
        ?>
        <div class="sidebar">
            <ul>
                <li><i class="fab fa-java"></i></li>
                <li><i class="fab fa-html5"></i></li>
                <li><i class="fab fa-js"></i></li>
                <li><i class="fab fa-php"></i></li>
                <li><i class="fab fa-python"></i></li>
            </ul>
        </div>
        <div class="main-content">
            <h1 style="text-align:center">Trending</h1>
            <div class="slideshow-container">

                <div class="mySlides fade">
                    <!--<div class="numbertext">1 / 3</div>-->
                    <iframe src="https://www.youtube.com/embed/hEgO047GxaQ" allowfullscreen></iframe>
                </div>

                <div class="mySlides fade">
                    <!--<div class="numbertext">2 / 3</div>-->
                    <iframe src="https://www.youtube.com/embed/2dZiMBwX_5Q" allowfullscreen></iframe>
                </div>

                <div class="mySlides fade">
                    <!--<div class="numbertext">3 / 3</div>-->
                    <iframe src="https://www.youtube.com/embed/qVU3V0A05k8" allowfullscreen></iframe>
                </div>

                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>

            </div>
            <br>

            <div style="text-align:center">
                <span class="dot" onclick="currentSlide(1)"></span>
                <span class="dot" onclick="currentSlide(2)"></span>
                <span class="dot" onclick="currentSlide(3)"></span>
            </div>

            <br>
            <p class="stats-bar"><br>#1 <i class="fas fa-chart-bar"></i> &emsp; 1,442 <i class="far fa-eye"></i> &emsp;
                180 <i class="far fa-thumbs-up"></i> &emsp; 29 <i class="far fa-thumbs-down"></i></p>

            <div class="mobile-languages">
                <br>
                <ul>
                    <li><i class="fab fa-java"></i></li>
                    <li><i class="fab fa-html5"></i></li>
                    <li><i class="fab fa-js"></i></li>
                    <li><i class="fab fa-php"></i></li>
                    <li><i class="fab fa-python"></i></li>
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