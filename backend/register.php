<?php
   if(isset($_POST["register"]))
   {
        include "../database/dbh.php";
        $firstname = mysqli_real_escape_string($connection, $_POST["firstname"]);
        $lastname = mysqli_real_escape_string($connection, $_POST["lastname"]);
        $name = mysqli_real_escape_string($connection , $_POST["user_name"]);
        $pw = mysqli_real_escape_string($connection , $_POST["password"]);
        $pw01 = mysqli_real_escape_string($connection , $_POST["password01"]);

       if(empty($firstname) || empty($lastname) || empty($name) || empty($pw) || empty($pw01))
       {
           header("Location: ../index.php?register=empty");
           exit();
       }
       else
       {
           if($pw != $pw01)
           {
                header("Location: ../index.php?register=verify");
                exit();
           }
           elseif($pw == $pw01)
           {
               $sql = "SELECT * from login where user_name = '$name'";
               $query = mysqli_query($connection, $sql); 
               $row = mysqli_fetch_array($query);
               if($row['user_name'] == null){
                $pw_hash = password_hash($pw , PASSWORD_DEFAULT);
                $sql_query = "INSERT into login(firstname, lastname, user_name, password) values('$firstname', '$lastname', '$name' , '$pw_hash');";
                $result = mysqli_query($connection , $sql_query);
                header("Location: ../index.php?registration=succes");
                exit();
               }
               else{
                   header("Location: ../index.php?register=exists");
                   exit();
               }
           }
       }

   }  
   else
   {
       header("location: ../index.php?error");
       exit();
   }