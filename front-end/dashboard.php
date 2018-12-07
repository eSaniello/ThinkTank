<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>||ThinkTank|| Dashboard</title>
  
    <link rel="stylesheet" href="../css/main.css">

  
</head>

<body>

<div class="topnav">
  <a class="active" href="">Menu</a>
  <a href=""><img id="logo" src="../img/logo.png" alt="Logo" /> <span>ThinkTank</span></a>
    <form method="post" action="dashboard.php">
        <button type="submit" id="logout" name="logout">Logout</button>
    </form>
</div>
    
<div class="sidebar">
  <a href="dashboard.php"><i></i> Dashboard</a>
  <a href="games.php"><i></i> Games</a>
  <a href="leaderboard.php"><i></i> Ranglijst</a>
  <a href="over.html"><i></i> Over</a>
</div>

    <div class="main">

    <div class="container">
        <?php
            if(isset($_SESSION["user_name"]))
                echo "<h1 class='welkom'>Welkom, ". ucfirst($_SESSION['firstname']) ." ". ucfirst($_SESSION['lastname']) . "!</h1>";
                //ucfirst() is een functie waarmee je de eerste letter van een woord tot een hoofdletter maakt.
                
            //logout
            if(isset($_POST["logout"])){
                session_abort();
                header("Location: ../index.php?logout");
            }
        ?>
        
        <hr>

        <img class='brain_exercise' src="../img/brain-exercise.png" alt="Brain-exercise">

        <div class = "introtext">
        <h2> Wat is ThinkTank?</h2> <br>
        <hr>
        <p>ThinkTank is een online brain training programma. 
            We noemen het zelf “De sportschool voor je brein” waar je hersengymnastiek kunt doen.
            ThinkTank geeft je brein de stimulans die het nodig heeft om sterker te worden en vervolgens ook sterk te blijven. 
            De leuke brain games blijven je hersens uitdagen. <br>
            <b>Als je brein beter werkt functioneer je beter op je werk, maar ook tijdens je studie en in het dagelijks leven.</b> <br>

            Diverse onderzoeken tonen aan dat een fit en actief, regelmatig uitgedaagd brein je gezonder en succesvoller maakt. 
            Bovendien beschermd een fit en actief brein je tegen de eerste beginselen van geheugenverlies, dementie, 
            alzheimer en andere mentale problemen. Er zijn dan ook vele ouderen die hun hersenen kunnen trainen met de denkspelletjes 
            van ThinkTank.
        </p>
            <br><br>
        <h2>Dit train je met ThinkTank games</h2>
        <hr><br>
        <p>
            Met ThinkTank kun je door middel van het spelen van leuke en uitdagende breinspelletjes je hersenen trainen.
            10 minuten per dag onze brain gym games spelen helpt je:
            <br><br>
            <ul>
                <li>concentratie te trainen;</li>
                <li>geheugen te verbeteren;</li>
                <li>focus te vergoten;</li>
                <li>sneller en logischer na te denken;</li>
                <li>taalkennis te vergroten;</li>
                <li>sneller rekenen. </li>
            </ul>
        </p>

        </div>
        <br><br><br><br>
        <a href='games.php' class='start'><b>Start met trainen!</b></a>
        <br><br><br><br>
    </div>


</div>
        <div class = "footer">
            <footer>
                Shaniel Samadhan  &copy; <br><br>
                <a href="https://www.facebook.com/shaniel.samadhan" target="_blank"><img class='fb' src='../img/fb.png' alt="FB"></a>
                <a href="https://www.instagram.com/shaniel_samadhan" target="_blank"><img class='instagram' src='../img/instagram.png' alt="FB"></a>
            </footer>
        </div>

</body>

</html>
