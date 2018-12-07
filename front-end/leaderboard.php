

<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>||ThinkTank|| Leaderboard</title>
  
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
    
    <h1 style="font-size:50px">Ranglijst</h1>
    <hr>
    <br>

    <?php
    include "../database/dbh.php";

    $sql = "SELECT login.firstname, game_scores.game_title, score FROM game_scores INNER JOIN login ON game_scores.user_id=login.user_id order by score desc";

    $query = mysqli_query($connection, $sql);

    echo "<table border='1' class='db_table'>"; // start a table tag in the HTML
    echo "<tr><th>Firstname</th><th>Game</th><th>Score</th></tr>";
    while( $row = mysqli_fetch_array($query)){   //Creates a loop to loop through results
    echo "<tr><td class='db_td'>" . ucfirst($row['firstname']) . "</td><td class='db_td'>" . $row['game_title'] . "</td><td class='db_td'>" .$row['score']. "</td></tr>";  //$row['index'] the index here is a field name
    }

    echo "</table>";

    ?>
    </div>
<br>
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
