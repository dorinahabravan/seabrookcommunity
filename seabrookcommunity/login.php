<?php
session_start();
ob_start();

print_r($_SESSION);
error_reporting(E_ALL);
ini_set('display_errors', 1);

include("classes/loaderclass.php");

 $username ="";
 $password ="";

 //The REQUEST_METHOD cheks what is inside in POST php variable
if($_SERVER["REQUEST_METHOD"] == "POST"){


  $login = new Login();
  $result = $login->evaluate($_POST);
  var_dump($result);
  //If the result is not empty,show the error
 if($result != ""){

  echo "<div style='text-align:center; font-size:12px; color:white;background-color:grey;'>";
  echo "The following errors ocurred:<br>";
  echo $result;
  echo "</div>";
//If the login was successfully completed then redirect to the userdashboard page.
}else{

  $username = $_POST['username'];
  $password = $_POST['password'];
  echo "Redirecting to userdashboard.php";
header("Location:userdashboard.php"); 
/* header("Location: https://www.example.com"); */
exit(); 
}  
 

}




ob_end_flush();

?> 

<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>SeabrookCommunity | Log in</title>
</head>
<body>
<div class="header">
  <h1 style="float:left">SEABROOCK</h1>
  <h4 style="float:left">Community</h4>
</div><br><br>
</body>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
  <div class="topnav">
  <a href="signup.php" style="float:left">Sign Up</a>
  <a href="index.php" style="float:left">About Us</a>
</div>
</div>
   <!--<?php
    // Display logout link if the user is logged in
   /*  if (isset($_SESSION["username"])) {
        echo "Welcome, " . $_SESSION["username"] . "! | <a href='login.php?logout=true'>Logout</a>";
    } else { */
        // Display login form if the user is not logged in
    ?> z-->
    <div id="divlogin">
    <h2>Log in to Seabrook Community Account:</h2>
    <form action="login.php" method="post"> 
         <input type="username" id="text" placeholder="Enter Your Username" value="<?php echo htmlspecialchars($username) ?>" name="username" required><br><br>
         <input type="password" id="text" placeholder="Enter Your Password" value="<?php echo htmlspecialchars($password) ?>" name="password" required><br><br><br>
        <input type="submit" id="button" value="Log in"><br><br>
        <!-- <a href='index.php?back=true'>Back</a> -->
        <input type="button" id="buttonBack" name="back" value="Back" onClick="window.location='index.php';">
    </form>
    </div>
 <!--   <div class="footer">
  <p>Footer</p>
</div> -->
  
</body>
</html>
