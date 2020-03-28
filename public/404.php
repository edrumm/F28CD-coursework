<?php
    include_once "../server.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale: 1.0">
    <meta name="author" content="Ewan Drummond, Luke Douglas, Jack Tong">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>404</title>
</head>
<body>
    <nav>
        <a href="index.php"><img src="img/logo_white.png" alt="S H A R E"></a>
    </nav>
    <div class="content">
        <?php
            if (isset($_SESSION["username"])) {
                echo "<p>Welcome, " . $_SESSION["username"] . "</p>";
            } else {
                echo "<p>Not logged in</p>";
            }
        ?>
        <p>This page is not available</p>
    </div>
    <footer>
        <p>Footer text</p>
    </footer>
</body>
</html>