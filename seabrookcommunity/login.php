<?php
session_start();

 include("classes/controller.php");
 include("classes/loginclass.php");

 $username ="";
 $password ="";

 //The REQUEST_METHOD cheks what is inside in POST php variable
if($_SERVER["REQUEST_METHOD"] == "POST"){

  $login = new Login();
  $result = $login->evaluate($_POST);
  //If the result is not empty,show the error
if($result != ""){

  echo "<div style='text-a;ogn:center; font-size:12px; color:white;background-color:grey;'>";
  echo "The following errors ocurred:<br>";
  echo $result;
  echo "</div>";
//If the login was successfully completed then redirect to the userdashboard page.
}else{
  header("Location: userdashboard.php");
  die;
}
$username = $_POST['username'];
$password = $_POST['password'];

}


?>
<!-- // Logout logic
if (isset($_GET["logout"])) {
    // Unset all session variables
    $_SESSION = array();

    // Destroy the session
    session_destroy();

    echo "You have been successfully logged out.";
}

// Login logic
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Establish a connection to the database
    $conn = new mysqli("localhost", "root", "", "seabrook_community");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve user details from the 'users' table
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Verify password
        if (password_verify($password, $row["password"])) {
            $_SESSION["username"] = $username; // Store username in session for future use
           /*  $_SESSION["userid"] = $userid; */
        } else {
            echo "Invalid password or username";
        }
    } else {
        echo "User not found";
    }

    // Close the database connection
    $conn->close();
}




?> -->

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
   <!--  <?php
    // Display logout link if the user is logged in
   /*  if (isset($_SESSION["username"])) {
        echo "Welcome, " . $_SESSION["username"] . "! | <a href='login.php?logout=true'>Logout</a>";
    } else { */
        // Display login form if the user is not logged in
    ?> -->

    <div id="divlogin">
    <h2>Log in to Seabrook Community Account:</h2>
    <form action="userdashboard.php" method="post"> 
         <input type="text" id="text" placeholder="Enter Your Username" value="<?php echo $username ?>" name="username"required><br><br>
         <input type="password" id="text" placeholder="Enter Your Password" value="<?php echo $username ?>" name="password" required><br><br><br>
        <input type="submit" id="button" value="Log in"><br><br>
        <!-- <a href='index.php?back=true'>Back</a> -->
        <input type="button" id="buttonBack" name="back" value="Back" onClick="window.location='index.php';">

    </div>
    </div>
    </form>
    </div>
    <?php
   

   /*  } */
    ?>
 
  

 <!--   <div class="footer">
  <p>Footer</p>
</div> -->
  
</body>
</html>
