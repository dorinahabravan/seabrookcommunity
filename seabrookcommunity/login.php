<?php
session_start();

// Logout logic
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
        } else {
            echo "Invalid password or username";
        }
    } else {
        echo "User not found";
    }

    // Close the database connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

        
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SeabrookCommunity | Log in</title>
</head>
<style>
body {
  margin: 0;
}

/* Style the header */
.header {
  background-color: #f1f1f1;
  padding: 70px;
  text-align: center;
}
/* Style the top navigation bar */
.topnav {
  overflow: hidden;
  background-color: #333;
}

/* Style the topnav links */
.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

/* Change color on hover */
.topnav a:hover {
  background-color: #ddd;
  color: black;
}
/*Style the login div*/
#divlogin{
  background-color:whitesmoke ; 
  width:600px;
   height: 300px;
  margin:auto;
  margin-top: 50px;
  padding: 10px;
  padding-top: 50px;
  text-align: center;
}
div.form
{
    display: block;
    text-align: center;
}
form
{
    display: inline-block;
    margin-left: auto;
    margin-right: auto;
    text-align: center;
}
#text{
  height: 40px;
  width:300px;
  border-radius: 4px;
  border:solid 1px #ccc;
  padding: 4px;
  font-size: 14px;
}
/*style the login button*/
#button{
width: 100px;
height: 40px;
border-radius: 2px;
font-weight: bold;
border: none;
background-color:rgb(59, 89, 152);
color: white;
padding: 4px;
}

#buttonBack{
  width: 100px;
height: 40px;
border-radius: 2px;
font-weight: bold;
border: none;
background-color:rgb(59, 89, 152);
color: white;
padding: 4px;
}


/* Style the footer */
.footer {
  background-color: #f1f1f1;
  padding: 20px;
  text-align: center;
}
</style>
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
  <a href="#"></a>
  <a href="#"></a>
  <a href="#"></a>
</div>
   
    

    <?php
    // Display logout link if the user is logged in
    if (isset($_SESSION["username"])) {
        echo "Welcome, " . $_SESSION["username"] . "! | <a href='login.php?logout=true'>Logout</a>";
    } else {
        // Display login form if the user is not logged in
    ?>
    <div id="divlogin">
    <h2>Log in to Seabrook Community Account:</h2>
    <form action="login.php" method="post"> 
         <input type="text" id="text" placeholder="Enter Your Username" name="username"required><br><br>
         <input type="password" id="text" placeholder="Enter Your Password"name="password" required><br><br>
        <input type="submit" id="button" value="Log in"><br><br>
        <!-- <a href='index.php?back=true'>Back</a> -->
        <input type="button" id="buttonBack" name="back" value="Back" onClick="window.location='index.php';">

    </div>
    </div>
    </form>
    </div>
    <?php
   

    }
    ?>
 <!--   <div class="footer">
  <p>Footer</p>
</div> -->
  
</body>
</html>
