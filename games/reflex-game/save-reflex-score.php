<?php
session_start();

include "../../database/dbh.php";

if(isset($_SESSION["user_name"])){

    if($_POST["data"]){
        $score = $_POST['data'];
        
        $sql = "INSERT INTO game_scores (user_id, game_title, score) VALUES (" .$_SESSION['user_id']. ", 'Light-reflex-Game', '$score')";
        
        $query = mysqli_query($connection,$sql);

        if($query)
            echo " Score entered successfully!";
        else
            echo "Problem!";
    }

}

?>