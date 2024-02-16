<?php
session_start();


include("classes/loaderclass.php");


/* include("events.php"); */
 
//check is user is logged in
if(isset($_SESSION['userid']) && is_numeric($_SESSION['userid'])){
  /*   $_SESSION['msg'] = "Log in first!"; */
    $userid = $_SESSION['userid'];
    $login = new Login();
    $result = $login->check_login($userid);
 

   if($login->check_login($userid)){


//retrieve the data
$user = new User();
$user_data = $user->get_data($userid);


if(!$user_data){
/* header("Location: login.php");
    die();  */ 
}else{
 header("Location: administrator.php");
 die();
}
} else{
header("Location: login.php");
die(); 

}

}


else {
    header("Location: login.php");
    exit(); 
}
   
 print_r($user_data);


//posting events starts here

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $event = new Event();
        $userid = $_SESSION['userid']; 
       
        $result = $event-> createEvent($userid, $_POST);
        if($result == ""){

            header("Location: userdashboard.php");
            die();
        
        
        
        }else{
        
            echo "<div style='text-align:center; font-size:12px; color:white;background-color:grey;'>";
            echo "The following errors ocurred:<br>";
            echo $result;
            echo "</div>";
        
        }

}

//retrieve events

$event = new Event();
$userid = $_SESSION['userid'];
$events = $event->getEvents($userid);





?>



<!DOCTYPE html>
<html lang="en">
    <head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- Include jQuery UI for the date picker -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <title>SeabrookCommunity | Log in</title>
    </head>
<body style="font-family: tahoma; background-color:#d0d8e4">

<!-- Date picker -->
<script>
        $(function() {
            // Use jQuery UI to initialize the date picker
            $("#datepicker").datepicker({
                dateFormat: "yy-mm-dd", // MySQL date format
                changeMonth: true,
                changeYear: true
            });
        });
    </script>
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
    <form method ="get"  action="search.php">
    My Profile &nbsp  &nbsp <input type="text" id="searchbox" name="find" placeholder=" Search events by title">
    </form>
    <a href="logout.php">
    <span style="font-size: 11px ; float:right;margin:10px;color: white">Log out</span>
    </a>
    <img src="selfie.jpg" style=" width: 30px; float:right; border-radius: 50px; border:solid 2px white;">
   
    
    </div>

    
 
</div>
</div><br>



<!-- cover area -->
<div style="width:800px; margin:auto;min-height: 400px;">
<div style="background-color: white; text-align: center; color: #405d9b">
 <img src="Workplace-Community.jpg" style="width: 100%;">
 <br>


 <div id="menu_buttons">Members</div>

</div>



<div style="min-height: 100px; flex:1">
<div id="members_bar">

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
 <form method="post" action="userdashboard.php">
    <textarea name="title" placeholder="Event Title"></textarea><br>
   <textarea name="event"  placeholder="Post an event here!" placeholder="Event Title"style="width: 250%;
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
<?php 

if($events){

    foreach ($events as $ROW){
    
        $user = new User();
     
        $ROW_USER = $user->getUser($ROW['userid']);
        include("events.php");

    }
    } 



?>
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






</div>
</div>


 <!--  see all events area -->
  <div style="min-height: 400px; flex:2; background-color:white">

<div style="max-height: 400px; width: 90%; margin:auto; text-align:center; padding : 14px; background-color: #f0f0f0; border-radius: 25px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1)">
<h3>Search events by date</h3>

<form action="search.php" method="get">
    <!-- <label for="datepicker">Select Date:</label> -->
    <input type="text" id="datepicker" name="find" placeholder="Search events by date"style="width: 100%; padding: 8px; margin-bottom: 10px;" required>
    <input type="submit" name="search" value="Search" style="padding: 10px; background-color: #405d9b; color: white; border: none; border-radius: 4px; cursor: pointer;">
</form>
</div><br><br><br>
  <div id="event">
<div>
<img src="user1.jpg" style="width: 65px; margin-right: 4px">
</div>
<div>
    <div style="font-weight : bold; color: #405d9b">
    <?php echo $ROW_USER['firstName'] . " " . $ROW_USER['lastName'];?></div>
    
    <div style="font-weight : bold; color: black; font-style: bold;"> 
<?php 
 echo $ROW['title'];
?></div>


    
<div style="font-weight :normal; color: black;">
<?php 
   echo $ROW['event'];
  ?></div>
    <br><br>

    <a href="">Like</a>. <a href="">Comment</a> . <span style="color:#999"><?php echo $ROW['date'];?></span>
</div>

</div>

    <!--   Post 2 -->
 <div id="event">
<div>
<img src="user3.jpg" style="width: 65px; margin-right: 4px">
</div>
<div>
    <div style="font-weight : bold; color: #405d9b">
    <?php echo $ROW_USER['firstName'] . " " . $ROW_USER['lastName'];?></div>
    
    <div style="font-weight : bold; color: black; font-style: bold;"> 
<?php 
 echo $ROW['title'];
?></div>


    
<div style="font-weight :normal; color: black;">
<?php 
   echo $ROW['event'];
  ?></div>
    <br><br>

    <a href="">Like</a>. <a href="">Comment</a> . <span style="color:#999"><?php echo $ROW['date'];?></span>
</div>

</div>
    
    <!--   Post 3 -->
<div id="event">
<div>
<img src="user5.jpg" style="width: 65px; margin-right: 4px">
</div>
<div>
    <div style="font-weight : bold; color: #405d9b">Iurie Coropceanu</div>
                Learn Programming Online
IUCOSOFT. <br>
Learning with passion. Programming for pleasure.<br>
All those wishing to register for IUCOSOFT courses are invited to create an account on the IUCOSOFT platform for courses: https://iucosoft.com/courses even if there is already an account on the website www.iucosoft.com.<br>
Starting from May 2024, you can access the IUCOSOFT platform for courses.
    <br><br>

    <a href="">Like</a>. <a href="">Comment</a> . <span style="color:#999">January 31 2024</span>
</div>
</div>



</div>


</body>
</html>