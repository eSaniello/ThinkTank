<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Think Tank</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
</head>
<body>
    
    <form method="post" action="game.php">
    <button type="submit" name="logout">Logout</button>
    </form>

    <?php
        if(isset($_SESSION["user_name"]))
            echo "<h1>Welcome to ThinkTank ". ucfirst($_SESSION['user_name']) . "</h1>";

        //logout
        if(isset($_POST["logout"])){
            session_abort();
            header("Location: index.php?logout");
        }
    ?>

    <h3>OPGELET! U moet een werkende internet verbinding hebben om door te gaan.</h3>

    <iframe width = "640" height = "480" frameborder = "0" scrolling = "no" src = "http://www.4j.com/embed/Mini-Scientist"></iframe>

</body>
</html>