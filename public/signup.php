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
            <table class="signup">
                <tr>
                    <td><label>First Name: </label></td>
                    <td><input type="text" name="firstname"></td>
                    <td><label>Last Name: </label></td>
                    <td><input type="text" name="surname"></td>
                </tr>
                <tr>
                    <td><label>E-mail: </label></td>
                    <td><input type="text" name="email"></td>
                    <td><label>Username: </label></td>
                    <td><input type="text" name="username"></td>
                </tr>
                <tr>
                    <td><label>Password: </label></td>
                    <td><input type="text" name="password"></td>
                    <td><label>Re-enter Password: </label></td>
                    <td><input type="text" name="re-password"></td>
                </tr>
                <tr>
                    <td><label>Select your language: </label></td>
                    <td>
                        <select name="languages">
                            <option value="none">-</option>
                            <option value="c-cpp">C / C++</option>
                            <option value="csharp">C#</option>
                            <option value="go">Go</option>
                            <option value="haskell">Haskell</option>
                            <option value="java">Java</option>
                            <option value="js">JavaScript</option>
                            <option value="kotlin">Kotlin</option>
                            <option value="obj-c">Objective-C</option>
                            <option value="php">PHP</option>
                            <option value="python">Python</option>
                            <option value="sql">SQL</option>
                            <option value="swift">Swift</option>
                            <option value="ts">TypeScript</option>
                            <option value="other">Other (Please specify)</option>
                        </select>
                    </td>
                    <td><label>Education: </label></td>
                    <td><input type="text" name="education"></td>
                </tr>
                <tr>
                    <td><input type="submit" value="Register" name=""></td>
                </tr>
            </table>
        </form>
    </div>
    <footer>
        <p>&copy; <span id="yr"></span> Ewan Drummond, Luke Douglas, Jack Tong</p>
        <p><a href="https://www.hw.ac.uk/" target="_blank">HWU</a> | <a href="https://github.com/edrumm/F28CD-coursework" target="_blank">GitHub</a></p>
    </footer>
</body>
</html>
