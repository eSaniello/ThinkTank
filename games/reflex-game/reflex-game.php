<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Reflex Game</title>
  
  
  
      <link rel="stylesheet" href="reflex-style.css">
      <link rel="stylesheet" href="../../css/main.css">
      

      <script
        src="../../libs/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous">
      </script>

  
</head>

<body>

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
  <script src='../../libs/vue.min.js'></script>

  

    <script  src="light-reflex-game.js"></script>


</body>

</html>
