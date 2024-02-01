
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




<html>
    <head>
<title></title>



    </head>
<style type="text/css">

#blue_bar{
height: 80px;
background-color: dimgrey ;
color:whitesmoke;
}
 #searchbox{
width: 400px;
height:25px;
border-radius: 5px;
border:none;
padding: 4px;
font-size:14px;
background-image:url(search.png);
background-repeat: no-repeat;
background-position: right;

 }
#menu_buttons{
width: 100px;
display: inline-block;
margin: 2px;

}

textarea{
    width: 100%;
    border:none;
    font-family: tahoma;
    font-size: 14px;
    height:60px;
}

#event_button{
float: right;
background-color: #405d9b;
border:none;
color:white;
padding: 4px;
font-size: 14px;
border-radius: 2px;
width:110px;
}

#members_img{

    width:75px;
margin: 8px;
display:inline-block;
border-radius: 50px;
border:solid 2px grey;
}

#members_bar{
    background-color: white;
    min-height: 100px;
    margin-top: 20px;
    color: #aaa;
    padding: 8px;
    margin-bottom: 20px;

}
#members{

    display: inline-block;
    width:75px;
margin: 8px;

}

#event_bar{
    margin-top: 20px;
    background-color: white;
   padding: 10px;
}

#event{
padding: 4px;
font-size: 13px;
display:flex;
margin-bottom: 20px;


}


</style>

<body style="font-family: tahoma; background-color:#d0d8e4;" >

<br>
<!-- grey top bar -->
<div id="blue_bar">
<?php
    // Display logout link if the user is logged in
    if (isset($_SESSION["username"])) {
        echo "Welcome, " . $_SESSION["username"] . "! | <a href='login.php?logout=true'>Logout</a>";
    }
    ?>
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

<textarea placeholder="Post an event here!"></textarea><br>
<input id="event_button"  type="submit" value="Create an event">
<br>
</div>
   
<!-- Posted events -->
<div id="event_bar">
  <!--   Post 1 -->
<div id="event">
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

</div>

 <!--   Post 2 -->
 <div id="event">
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



</div>



</div> 
 <!--  see all events area -->
  <div style="min-height: 400px; flex:2; background-color:#405d9b"></div>
</div>


</div>


</body>
    
</html>