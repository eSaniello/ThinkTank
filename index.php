<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>||ThinkTank|| Login & Signup</title>
  
  
  
      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>
  

  <div class="container">

  <img id='logo' src="img/logo.png" alt="Logo">
  <h1 id="titel">ThinkTank</h1>

  <div class="box"></div>
  <div class="container-forms">
    <div class="container-info">
      <div class="info-item">
        <div class="table">
          <div class="table-cell">
            <p>
              Al een account?
            </p>
            <div class="btn">
              Log in
            </div>
          </div>
        </div>
      </div>
      <div class="info-item">
        <div class="table">
          <div class="table-cell">
            <p>
              Geen account? 
            </p>
            <div class="btn">
              Registreer
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container-form">
      <div class="form-item log-in">
        <div class="table">
          <div class="table-cell">
            <form method="POST" action="backend/login.php">
              <input name="user_name" placeholder="Username" type="text" />
              <input name="password" placeholder="Password" type="Password" />
              <input type='submit' name="login" value="Inloggen" class="btn" />
            </form>
          </div>
        </div>
      </div>
      <div class="form-item sign-up">
        <div class="table">
          <div class="table-cell">
            <form method="POST" action="backend/register.php">
              <input name="firstname" placeholder="Firstname" type="text" />
              <input name="lastname" placeholder="Lastname" type="text" />
              <input name="user_name" placeholder="Username" type="text" />
              <input name="password" placeholder="Password" type="Password" />
              <input name="password01" placeholder="Verify Password" type="Password" />
              <input type="submit" name="register" value="Registreren" class="btn">
            </form>
        </div>
      </div>
    </div>
  </div>
</div>
  <script src='libs/jquery-3.3.1.min.js'></script>
  <script  src="js/index.js"></script>

<?php
error_reporting(E_ERROR | E_PARSE);

if(!isset($_GET["login"]) && !isset($_GET["register"]))
{
  exit();
}
else
{
     $formCheck = $_GET["login"];
     $formCheck1 = $_GET["register"];

    if($formCheck == "empty" || $formCheck1 == "empty")
    {
        //javascript pop up
        echo "<script> alert('Form is empty! Please fill in all fields!'); </script>";
        exit();
    }
    elseif($formCheck == "failed"){
        //javascript pop up
        echo "<script> alert('Login failed. Please type in correct username and password.'); </script>";
        exit();
    }
    elseif($formCheck1 == "verify")
    {
        //javascript pop up
        echo "<script> alert('Passwords must be the same!'); </script>";
        exit();
    }
    elseif($formCheck1 == "exists"){
       //javascript pop up
       echo "<script> alert('User already exists!'); </script>";
       exit();
    }
    elseif($formCheck == "succes")
    {
        header("Location: dashboard.php?login=succes");
        exit();
    }
}
?>


</body>

</html>
