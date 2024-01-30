<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $id = $_POST["id"];
  $firstName = $_POST["firstName"];
  $lastName = $_POST["lastName"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $confirmPassword = password_hash($_POST["confirmPassword"], PASSWORD_DEFAULT);
    $phoneNumber = $_POST["phoneNumber"];

    // Establish a connection to the database
    $conn = new mysqli("localhost", "root", "", "seabrook_community");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert user details into the 'users' table
    $sql = "INSERT INTO users (id, firstName, lastName, email, username, password, confirmPassword,phoneNumber) VALUES ('$id','$firstName','$lastName','$email', '$username','$password','$confirmPassword','$phoneNumber')";

    if ($conn->query($sql) === TRUE) {
        echo "User registered successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();

}
?>

<!DOCTYPE html>
<html lang="en">
<head>

        <body>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SeabrookCommunity | Signup</title>
</head>
<body>
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

/* Style the footer */
.footer {
  background-color: #f1f1f1;
  padding: 10px;
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
    <title>Sign Up</title>
</head>
<body>

<style>   
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
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box}


#divSignup{
  background-color:whitesmoke ; 
  width:600px;
   height: 200px;
  margin:auto;
  margin-top: 50px;
  padding: 10px;
  padding-top: 30px;
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
   margin: auto;
    text-align: center;
}


/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for all buttons */
button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 20%;
  opacity: 0.9;
}

button:hover {
  opacity:1;
}

/* Extra styles for the cancel button */
.cancelbtn {
  padding: 14px 20px;
  background-color: #f44336;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn, .signup {
  float: left;
  width: 50%;
}

/* Add padding to container elements */
.container {
  padding: 16px;
}

/* Clear floats */
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 50px) {
  .cancelbtn, .signup {
     width: 100%;
  }
}
</style>
<!-- <body>
    <h2>Sign Up</h2>
    <form action="signup.php" method="post">
        Username: <input type="text" name="username" required><br>
        Password: <input type="password" name="password" required><br>
        <input type="submit" value="Sign Up">
        <a href="login.php">Login</a>
    </form>
</body>
</html> -->

<div class="topnav">
  <a href="#"></a>
  <a href="#"></a>
  <a href="#"></a>
</div>
<div id="divSignup" >
        <form action="signup.php" method="post">
  <div class="container" >
    <h1 style=" width:600px;
   height: 200px; margin:5px 0 22px 0;">Sign Up</h1><br><br>
   <!--  <p>Please fill in this form to create an account.</p><br><br> -->
  
    <label for="firstName"><b>First Name</b></label>
    <input type="text" placeholder="First Name" name="firstName" required>

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