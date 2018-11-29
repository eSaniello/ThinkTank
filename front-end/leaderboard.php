<?php
include "../database/dbh.php";

$sql = "SELECT * from game_scores";
$sql_uname = "SELECT * from login where  user_id = '4'";

$query = mysqli_query($connection, $sql);

$query_uname = mysqli_query($connection, $sql_uname);

while($row = mysqli_fetch_array($query)){
    while( $row_uname = mysqli_fetch_array($query_uname)){
        echo $row_uname['firstname'] . "  ";
        echo $row["game_title"] ."  ";
        echo $row['score'] ." <br>";
    }
}

?>