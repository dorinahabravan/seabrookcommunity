<?php


session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1); 

include("classes/controller.php");
include("classes/loginclass.php");

if(isset($_SESSION['userid']) && is_numeric($_SESSION['userid'])){
    $id = $_SESSION['userid'];
    $login = new Login();
    $result = $login->check_login($id);
 

   if($result){


//retrieve the data
echo "Everything is fine!";
}else{
header("Location : login.php");
die;
}
}else{
    header("Location : login.php");
die;




}





/* 
ini_set('display_errors', 1);
error_reporting(E_ALL); */

/* // Check if the user is logged in
if (!isset($_SESSION["username"])) {
    header("Location: login.php"); // Redirect to the login page if not logged in
    exit();
} */



// Logout logic
/* if (isset($_GET["logout"])) {
    // Unset all session variables
    $_SESSION = array();

    // Destroy the session
    session_destroy();

    echo "You have been successfully logged out.";
} */

/* // Login logic
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
 */
     //Data in the array
   /*  while($row = mysqli_fetch_array($result)){
        echo "<pre>";
        print_r($row);
        echo "</pre>";
    
    } */

    /* if ($result->num_rows > 0) {
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
} */


/*if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $eventid = $_POST["eventid"];
    $userid = $_POST["userid"]; 
    $title = $_POST["title"];
    $date = $_POST["date"];
    $event = $_POST["event"];
    $image = $_POST["image"];
    $comments = $_POST['comments'];
    $likes = $_POST['likes'];
   
  
      // Establish a connection to the database
      $conn = new mysqli("localhost", "root", "", "seabrook_community");
  
      // Check connection
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }
  
       // Insert  details into the 'events' table
      $sql = "INSERT INTO events (id, eventid, title, date, event, image,comments, likes) VALUES ('$id','$eventid','$title', '$date','$event','$image','$comments','$likes')"; 
       $sql = "INSERT INTO events (userid, eventid, event) VALUES('$userid',$eventid','$event')"; 
      if ($conn->query($sql) === TRUE) {
          echo "Event  registered successfully";
      } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
      }
  
      // Close the database connection
      $conn->close();
    }

//Posting starts here
if($_SERVER['REQUEST_METHOD'] == "POST"){

    $event = new Event();




}*/

?>

<html>
    <head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>SeabrookCommunity | Log in</title>
    </head>

<body style="font-family: tahoma; background-color:#d0d8e4">
<br>
<!-- grey top bar -->
<div id="grey_bar">
<!-- <?php
    // Display logout link if the user is logged in
    /* if (isset($_SESSION["username"])) {
        echo "Welcome, " . $_SESSION["username"] . "! | <a href='login.php?logout=true'>Logout</a>";
    } */
    ?> -->
    <div style="width:800px; margin:auto; font-size:30px;">
    My Profile &nbsp  &nbsp <input type="text" id="searchbox" placeholder=" Search for events">
    <!-- <img src="selfie.jpg" style=" width: 30px; float:right; border-radius: 50px; border:solid 2px white;"> -->
</div>
</div><br>



<!-- cover area -->
<div style="width:800px; margin:auto;min-height: 400px;">
<div style="background-color: white; text-align: center; color: #405d9b">
 <img src="Workplace-Community.jpg" style="width: 100%;">
 <br>
 <div id="menu_buttons">Timeline</div>
 <div id="menu_buttons">About</div>
 <div id="menu_buttons">Events</div>
 <div id="menu_buttons">Settings</div>
</div>



<div style="min-height: 100px; flex:1">
<div id="members_bar">
Members<br>
<!-- The first user -->
<div id="members">
    <div><img id="members_img" src="user1.jpg"></div>
    <br>
Bogdan Coropceanu
</div>
<!-- The second user -->
<div id="members">
    <div><img id="members_img" src="user2.jpg"></div>
    <br>
Rustam Habravan
</div>

<!-- The third user -->
<div id="members">
    <div><img id="members_img" src="user3.jpg"></div>
    <br>
Valentina Habravan
</div>

<!-- The fourth user -->
<div id="members">
    <div><img id="members_img" src="user4.jpg"></div>
    <br>
Denis Puscas
</div>

<!-- The fifth user -->
<div id="members">
    <div><img id="members_img" src="user5.jpg"></div>
    <br>
Iurie Coropceanu
</div>


<!-- The sixth user -->
<div id="members">
    <div><img id="members_img" src="user6.jpg"></div>
    <br>
Liliana Mitul
</div>

<!-- The seventh user -->
<div id="members">
    <div><img id="members_img" src="user7.jpg"></div>
    <br>
Natalia Borga
</div>

<!-- The seventh user -->
<div id="members">
    <div><img id="members_img" src="user8.jpg"></div>
    <br>
Maxim Cojocari
</div>
</div>
</div>


<!--These are the post a event box and see all events-->
<div style="display: flex;">
<!-- post a event area -->
  <div style="min-height: 400px; flex:3;  padding:20px;  background-color: grey;">
  <div style="border:solid thin #aaa; padding: 10px; background-color:white;">
<!--   Posting an event
 -->
 <form method="post">
   <textarea name="event"  placeholder="Post an event here!"style="width: 250%;
    border:none;
    font-family: tahoma;
    font-size: 14px;
    height:60px;"
    ></textarea><br>
    <input id="event_button"  type="submit" value="Create an event">
   
<br>
</form>
</div>
   
<!-- Posted events -->
<div id="event_bar">
  <!--   Post 1 -->
<!-- <div id="event">
<div>
<img src="user1.jpg" style="width: 65px; margin-right: 4px">
</div>
<div>
    <div style="font-weight : bold; color: #405d9b">Bogdan Coropceanu</div>
    Today is the final for Australian Open Tennis Tour. We are all gathering in the Greenwich Park to watch it.
     Who wants to join us?
    <br><br>

    <a href="">Like</a>. <a href="">Comment</a> . <span style="color:#999">January 31 2024</span>
</div>

</div> -->

 <!--   Post 2 -->
 <!-- <div id="event">
<div>
<img src="user3.jpg" style="width: 65px; margin-right: 4px">
</div>
<div>
    <div style="font-weight : bold; color: #405d9b">Valentina Habravan</div>
    Today is the final for Australian Open Tennis Tour. We are all gathering in the Greenwich Park to watch it.
     Who wants to join us?
    <br><br>

    <a href="">Like</a>. <a href="">Comment</a> . <span style="color:#999">January 31 2024</span>
</div>
</div>
 -->

<!--   Post 3 -->
<!-- <div id="event">
<div>
<img src="user5.jpg" style="width: 65px; margin-right: 4px">
</div>
<div>
    <div style="font-weight : bold; color: #405d9b">Iurie Coropceanu</div>
                Learn Programming Online
IUCOSOFT. <br>
Learning with passion. Programming for pleasure.<br>
All those wishing to register for IUCOSOFT courses are invited to create an account on the IUCOSOFT platform for courses:  https://iucosoft.com/courses , even if there is already an account on the website www.iucosoft.com.<br>
Starting from May 2024, you can access the IUCOSOFT platform for courses.
    <br><br>

    <a href="">Like</a>. <a href="">Comment</a> . <span style="color:#999">January 31 2024</span>
</div>
</div>

</div>
</div> -->
<?php
/* for($i == 0; $i < 10; $i++){


} */
include("events.php");


?>
</div>



 <!--  see all events area -->
  <div style="min-height: 400px; flex:2; background-color:#405d9b"></div>
</div>
</div>
</body>
</html>