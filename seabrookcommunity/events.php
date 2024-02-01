
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
    $sql = "INSERT INTO events (id, eventid, userid, title, date, event, image,comments, likes) VALUES ('$id','$eventid','$userid','$title', '$date','$event','$image','$comments','$likes')"; 
/*     $sql = "INSERT INTO events (userid, eventid, event) VALUES('$userid',$eventid','$event')"; */
    if ($conn->query($sql) === TRUE) {
        echo "Event  registered successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();

}
?>
<html>
<form method="post" action="userdashboard.php">
   <textarea name="event"  placeholder="Post an event here!"></textarea><br>
   <input id="event_button"  type="submit" value="Create an event">

 
</form>
<br>
</form>

</html>