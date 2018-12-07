<?php
session_start();
include "../database/dbh.php";
?>

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>||ThinkTank|| Games</title>
  
    <link rel="stylesheet" href="../css/main.css">

  
</head>

<body>

<div class="topnav">
  <a class="active" href="">Menu</a>
  <a href=""><img id="logo" src="../img/logo.png" alt="Logo" /> <span>ThinkTank</span></a>
  <span id="date"><?php echo "Date: " .date("Y/m/d"); ?></span>
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

      <h1 style="font-size: 65px">Games</h1>
      <hr>

      <br><br>

      <div class='training_history'>
        <h1>Training History</h1>
        <hr><br>
        <h2>
          Games gespeeld:

          <?php
            $sql = "SELECT played FROM game_scores WHERE user_id='".$_SESSION['user_id']."'";
            $query = mysqli_query($connection, $sql);
            $result = mysqli_num_rows($query);
            echo $result
          ?>

        </h2>
        <hr>
      </div>

<br>

        <div class='games'>
            <div class="reflex">
              <a href="../games/reflex-game/reflex-game.php">
                <span>Light Reflex Game</span>
                <img src="../img/reflex.PNG" alt="Reflex.png">
              </a>
            </div>

            <div class="balloon">
              <a href="../games/math-game.php">
                <span>Balloon Math Game</span>
                <img src="../img/balloon.PNG" alt="Reflex.png">
              </a>
            </div>
        </div>
        <br>
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
