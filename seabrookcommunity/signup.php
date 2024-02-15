<?php
session_start();
include("classes/loaderclass.php");
 //The REQUEST_METHOD cheks what is inside in POST php variable
if($_SERVER["REQUEST_METHOD"] == "POST"){

  $signup = new Signup();
  $result = $signup ->evaluate($_POST);
  //If the result is not empty,show the error
if($result != ""){

  echo "<div style='text-a;ogn:center; font-size:12px; color:white;background-color:grey;'>";
  echo "The following errors ocurred:<br>";
  echo $result;
  echo "</div>";
//If the signup was successfully completed then redirect to the login page.
}else{
  header("Location: login.php");
  die;
}


}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>SeabrookCommunity | Signup</title>
</head>


<body>
<div class="header">
  <h1 style="float:left">SEABROOCK</h1>
  <h4 style="float:left">Community</h4>
</div><br><br>
</body>
    <title>Sign Up</title>
</head>

<body>
<div class="topnav">
  <a href="login.php">My Account</a>
  <a href="index.php" style="float:left">About Us</a>
</div>
<div id="divSignup">
<!--   The signup form -->
        <form action="signup.php" method="post">
  <div class="container" >
    <h1 style=" width:600px;
   height: 200px; margin:5px 0 22px 0;">Sign Up</h1><br><br>
   <!--  <p>Please fill in this form to create an account.</p><br><br> -->

    <label for="firstName"><b>First Name</b></label>
    
    <input type="text" placeholder="First Name"  name="firstName" required>

    <label for="lastName"><b>Last Name</b></label>
    <input type="text" placeholder="Last Name" name="lastName" required>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Email" name="email" required>

    <label for="username"><b>Set Your Username</b></label>
    <input type="text" placeholder="username" name="username" required>

    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>
    <label for="confirmPassword"><b>Confirm Password</b></label>
    <input type="password" placeholder="Confirm Password" name="confirmPassword" required>

    <label for="phoneNumber"><b>Phone Number</b></label>
    <input type="text" placeholder="Phone Number" name="phoneNumber" required>


    <label>
      <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
    </label>

    <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

    <div class="clearfix">
    <button type="button" name="back" value="back" onClick="window.location='index.php';">Back</button>
      <button type="button" class="cancelbtn" name="cancel" value="cancel" onClick="window.location='index.php';">Cancel</button>


     
      <!-- <input type="submit" value="Login"> -->
      <button type="submit" value="Sign Up">Sign Up</button>
    </div>
  </div>
</form>
<div class="footer">
  <p>Footer</p>
</div>
</div>
</body>
</html>