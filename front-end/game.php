<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>ThinkTank</title>
  
    <link rel="stylesheet" href="../css/main.css">

  
</head>

<body>

    <form method="post" action="game.php">
    <button type="submit" name="logout">Logout</button>
    </form>

    <?php
        if(isset($_SESSION["user_name"]))
            echo "<h1>Welcome to ThinkTank ". ucfirst($_SESSION['firstname']) ." ". ucfirst($_SESSION['lastname']) . " a.k.a " . ucfirst($_SESSION['user_name']) . "</h1>";
            //ucfirst() is een functie waarmee je de eerste letter van een woord tot een hoofdletter maakt.
            
        //logout
        if(isset($_POST["logout"])){
            session_abort();
            header("Location: ../index.php?logout");
        }
    ?>

    <h3>OPGELET! U moet een werkende internet verbinding hebben om door te gaan.</h3>

    <br>
    <h2>Games moeten hier komen</h2>


<a href="leaderboard.php">Leaderboard</a>
<br>    
<a href="../games/reflex-game/reflex-game.php">Reflex Game</a>
<br>    
<a href="../games//math-game/math-game.php">Math Game</a>

</body>

</html>
