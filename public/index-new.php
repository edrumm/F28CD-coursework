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
    <script type="text/javascript" src="js/carousel.js"></script>
    <title>F28CD Skills Exchange</title>

    <style>
        * {box-sizing: border-box}
        body {font-family: Verdana, sans-serif; margin:0}
        .mySlides {display: none}
        img {vertical-align: middle;}

        /* Slideshow container */
        .slideshow-container {
            max-width: 558px;
            position: relative;
            margin: auto;
        }

        /* Next & previous buttons */
        .prev, .next {
            cursor: pointer;
            position: absolute;
            top: 50%;
            width: auto;
            padding: 16px;
            margin-top: -22px;
            color: white;
            font-weight: bold;
            font-size: 18px;
            transition: 0.6s ease;
            border-radius: 0 3px 3px 0;
            user-select: none;
        }

        /* Position the "next button" to the right */
        .next {
            right: 0;
            border-radius: 3px 0 0 3px;
        }

        /* On hover, add a black background color with a little bit see-through */
        .prev:hover, .next:hover {
            background-color: rgba(0,0,0,0.8);
        }

        /* Caption text */
        .text {
            color: #f2f2f2;
            font-size: 15px;
            padding: 8px 12px;
            position: absolute;
            bottom: 8px;
            width: 100%;
            text-align: center;
        }

        /* Number text (1/3 etc) */
        .numbertext {
            color: #f2f2f2;
            font-size: 12px;
            padding: 8px 12px;
            position: absolute;
            top: 0;
        }

        /* The dots/bullets/indicators */
        .dot {
            cursor: pointer;
            height: 15px;
            width: 15px;
            margin: 0 2px;
            background-color: #bbb;
            border-radius: 50%;
            display: inline-block;
            transition: background-color 0.6s ease;
        }

        .active, .dot:hover {
            background-color: #717171;
        }

        /* Fading animation */
        .fade {
            -webkit-animation-name: fade;
            -webkit-animation-duration: 1.5s;
            animation-name: fade;
            animation-duration: 1.5s;
        }

        @-webkit-keyframes fade {
            from {opacity: .4}
            to {opacity: 1}
        }

        @keyframes fade {
            from {opacity: .4}
            to {opacity: 1}
        }

        /* On smaller screens, decrease text size */
        @media only screen and (max-width: 300px) {
            .prev, .next,.text {font-size: 11px}
        }

        .sidenav {
            width: 12.5%;
            position: fixed;
            z-index: 1;
            top: 125px;
            left: 10px;
            background-color: #708090;
            overflow-x: hidden;
            padding: 8px 0;
        }

        .sidenav a {
            padding: 25px 8px 25px 16px;
            text-decoration: none;
            font-size: 25px;
            color: #FFFFFF;
            display: block;
        }

        .sidenav a:hover {
            color: #064579;
        }

    </style>

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

            <!--<div class="sidebar">
                <ul>
                    <li>Java</li>
                    <li>HTML</li>
                    <li>JavaScript</li>
                    <li>PHP</li>
                    <li>Python</li>
                </ul>
            </div>-->
            <div class="sidenav">
                <a href="#java">Java</a>
                <a href="#html">HTML</a>
                <a href="#javascript">Javascript</a>
                <a href="#php">PHP</a>
                <a href="#python">Python</a>
            </div>

            <h1 style="text-align:center">Trending</h1>
            <div class="slideshow-container">

                <div class="mySlides fade">
                    <!--<div class="numbertext">1 / 3</div>-->
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/hEgO047GxaQ" allowfullscreen></iframe>
                </div>

                <div class="mySlides fade">
                    <!--<div class="numbertext">2 / 3</div>-->
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/2dZiMBwX_5Q" allowfullscreen></iframe>
                </div>

                <div class="mySlides fade">
                    <!--<div class="numbertext">3 / 3</div>-->
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/qVU3V0A05k8" allowfullscreen></iframe>
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

        </div>

    <script>
        var slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("dot");
            if (n > slides.length) {slideIndex = 1}
            if (n < 1) {slideIndex = slides.length}
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex-1].style.display = "block";
            dots[slideIndex-1].className += " active";
        }


    </script>

    <footer>
        <p>&copy; <span id="yr"></span> Ewan Drummond, Luke Douglas, Jack Tong</p>
        <p><a href="https://www.hw.ac.uk/" target="_blank">HWU</a> | <a href="https://github.com/edrumm/F28CD-coursework" target="_blank">GitHub</a></p>
    </footer>
</body>
</html>