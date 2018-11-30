<?php
include "../database/dbh.php";

$sql = "SELECT login.firstname, game_scores.game_title, game_scores.score FROM game_scores INNER JOIN login ON game_scores.user_id=login.user_id";

$query = mysqli_query($connection, $sql);

while( $row = mysqli_fetch_array($query)){
    echo ucfirst($row['firstname'] . "  "); //ucfirst() is een functie waarmee je de eerste letter van een woord tot een hoofdletter maakt.
    echo $row["game_title"] ."  ";
    echo $row['score'] ." <br>";
}

?>