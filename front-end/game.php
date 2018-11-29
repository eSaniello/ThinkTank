<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>ThinkTank</title>
  
  
  
      <link rel="stylesheet" href="reflex-style.css">
      <link rel="stylesheet" href="../css/main.css">
      

      <script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous">
      </script>

  
</head>

<body>

    <form method="post" action="game.php">
    <button type="submit" name="logout">Logout</button>
    </form>

    <?php
        if(isset($_SESSION["user_name"]))
            echo "<h1>Welcome to ThinkTank ". ucfirst($_SESSION['firstname']) ." ". ucfirst($_SESSION['lastname']) . " a.k.a " . ucfirst($_SESSION['user_name']) . "</h1>";

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


  <div id="game">
  <div class="circle-container">
  <div v-for="light in lights" :key="light.key" class="light" :class="{lit: light.key == lit, target: light.key == 0}"></div>
  </div>
  <div class="messages">
    <div>{{messages.endGame}}</div>
    <div>{{messages.controls}}</div>
    <div id="score">Score: {{messages.scoreText}}</div>
    <div>Tries left: {{messages.triesLeft}}</div>
  </div>
</div>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.3/vue.min.js'></script>

  

    <script  src="light-reflex-game.js"></script>


</body>

</html>
