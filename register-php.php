<?php
   if(isset($_POST["register"]))
   {
        include "dbh.php";
        $firstname = mysqli_real_escape_string($connection, $_POST["firstname"]);
        $lastname = mysqli_real_escape_string($connection, $_POST["lastname"]);
        $name = mysqli_real_escape_string($connection , $_POST["user_name"]);
        $pw = mysqli_real_escape_string($connection , $_POST["password"]);
        $pw01 = mysqli_real_escape_string($connection , $_POST["password01"]);

       if(empty($firstname) || empty($lastname) || empty($name) || empty($pw) || empty($pw01))
       {
           header("Location: register.php?register=empty&firstname=$firstname&lastname=$lastname&user_name=$name");
           exit();
       }
       else
       {
           if($pw != $pw01)
           {
                header("Location: register.php?register=verify&firstname=$firstname&lastname=$lastname&user_name=$name");
                exit();
           }
           elseif($pw == $pw01)
           {
                $pw_hash = password_hash($pw , PASSWORD_DEFAULT);
                $sql_query = "insert into login(firstname, lastname, user_name, password) values('$firstname', '$lastname', '$name' , '$pw_hash');";
                $result = mysqli_query($connection , $sql_query);
                header("Location: index.php?registration=succes");
                exit();
           }
       }

   }  
   else
   {
       header("location: register.php?error");
       exit();
   }