
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

#grey_bar{
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

#profile_pic{
width: 100px;
border-radius: 50px;
border: solid 2px white;


}

#event_button{
float: right;
background-color: #405d9b;
border:none;
color:white;
padding: 4px;
font-size: 14px;
border-radius: 2px;
width:50px;
}

#members_img{

    width:75px;
margin: 8px;
display:inline-block;
border-radius: 50px;
border:solid 2px grey;
}


#members{

    display: inline-block;
    width:75px;
margin: 8px;

}

#event_bar{
    background-color: white;
    min-height: 400px;
    margin-top: 20px;
  color : #aaa;
   padding: 8px;
   text-align: center;
   font-size: 20px;
   color:#405d9b;


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
<div id="grey_bar">
<?php
    // Display logout link if the user is logged in
    if (isset($_SESSION["username"])) {
        echo "Welcome, " . $_SESSION["username"] . "! | <a href='login.php?logout=true'>Logout</a>";
    }
    ?>
    <div style="width:800px; margin:auto; font-size:30px;">
    My Profile &nbsp  &nbsp <input type="text" id="searchbox" placeholder=" Search for events">
<!--     <img src="selfie.jpg" style=" width: 30px; float:right; border-radius: 50px; border:solid 2px white;"> -->
   
  
</div>
</div><br>



<!-- cover area -->
<div style="width:800px; margin:auto;  min-height:400px;">





<!--These are the post a event box and see all events-->
<div style="display: flex;">
<!-- post a event area -->
  <div style="min-height: 400px; flex:3;  padding:20px;  background-color: grey;">
  <div style="border:solid thin #aaa; padding: 10px; background-color:white;">

<textarea placeholder="Post an event here!"></textarea><br>
<input id="event_button"  type="submit" value="Post">
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
  <div id="event_bar">
<div>
<img src="selfie.jpg" id="profile_pic"><br>
Dorina Habravan


</div>



</div>
</div>


</div>
</body>
    
</html>