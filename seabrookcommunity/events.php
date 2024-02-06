<?php
/* session_start();

// Logout logic
if (isset($_GET["logout"])) {
    // Unset all session variables
    $_SESSION = array();

    // Destroy the session
    session_destroy();

    echo "You have been successfully logged out.";
} */

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 /*    if (isset($_POST['Register'])){ */
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
      $sql = "INSERT INTO events (id, eventid, userid,  event, image,comments, likes,title, date) VALUES ('$id','$eventid','$userid', '$event','$image','$comments','$likes','$title', '$date')"; 
  /*     $sql = "INSERT INTO events (userid, eventid, event) VALUES('$userid',$eventid','$event')"; */
  

  
      if ($conn->query($sql) === TRUE) {
          echo "Event  registered successfully";
      } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
      }
      
  
      // Close the database connection
      $conn->close();
    }
/* } */

    //Posting starts here
if($_SERVER['REQUEST_METHOD'] == "POST"){


    



}
?>













<html>
    <head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>SeabrookCommunity | Log in</title>
    </head>
<div id="event_bar">
   <!--  Post 1 -->
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

 <!--  Post 2 -->
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
</div> -->

 <!--  Post 3 -->
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
 -->
</div>
</div>

</html>