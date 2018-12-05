<?php
session_start();

include "../../database/dbh.php";

if(isset($_SESSION["user_name"])){

    if($_POST["data"]){
        $score = $_POST['data'];
        
        $sql_select = "SELECT * FROM game_scores WHERE user_id =". $_SESSION['user_id'];
        $query_select = mysqli_query($connection, $sql_select);
        $result_select = mysqli_fetch_array($query_select);

        if($result_select['score'] != null){

            if($score > $result_select['score']){
                $sql_update = "UPDATE game_scores SET score ='$score' WHERE user_id=". $_SESSION['user_id'];
                $query_update = mysqli_query($connection,$sql_update);
                echo "Score updated succesfully!";
            }

        }
        else{
            $sql_insert = "INSERT INTO game_scores (user_id, game_title, score) VALUES (" .$_SESSION['user_id']. ", 'Balloon-math-Game', '$score')";
            $query_insert = mysqli_query($connection,$sql_insert);
            echo  "Score entered successfully!";
        }
        
    }
}
?>