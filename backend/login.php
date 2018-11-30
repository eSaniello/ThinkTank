<?php
    session_start();
?>
<?php
   if(isset($_POST["register"]))
   {
        header("Location: ../front-end/register.php");
   }  
   elseif(isset($_POST["login"]))
   {
       include "../database/dbh.php";
       $name = mysqli_real_escape_string($connection , $_POST["user_name"]);
       $pw = mysqli_real_escape_string($connection , $_POST["password"]);

       if(empty($name) || empty($pw))
       {
           header("Location: ../index.php?login=empty");
           exit();
       }
       else
       {
            $sql = "SELECT * from login where `user_name`='$name';";
            $query = mysqli_query($connection , $sql);
            $row = mysqli_fetch_array($query);

            $pw_verify = password_verify($pw , $row['password']);

            if($row["user_name"] == $name && $pw_verify == true)
            {
                //login succesfull
                $_SESSION["user_id"] = $row["user_id"];
                $_SESSION['user_name'] = $name;
                $_SESSION['firstname'] = $row["firstname"];
                $_SESSION['lastname'] = $row["lastname"];
                header("Location: ../front-end/game.php?login=succes");
                exit();
            }
            else
            {
                header("Location: ../index.php?login=failed");
                exit();
            }
       }
   }
   else
   {
       header("location: ../index.php?error");
       exit();
   }
?>