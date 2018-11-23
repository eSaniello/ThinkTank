<?php

include "../database/dbh.php";

if($_POST["data"]){
    $score = $_POST['data'];
    
    $sql = "INSERT INTO game_scores (game_title, score) VALUES ('Light-reflex-Game', '$score')";
    
    $query = mysqli_query($connection,$sql);

    if($query)
        echo " Score entered successfully!";
    else
        echo "Problem!";
}


?>