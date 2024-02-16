<?php  
session_start();
include("classes/loaderclass.php");

$login = new Login();
$user_data = $login->check_login($_SESSION['userid']);


//posting events starts here

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $event = new Event();
    $userid = $_SESSION['userid']; 
   
    $result = $event-> createEvent($userid, $_POST);
    if($result == ""){

        header("Location: single_event.php?eventid=$_GET[eventid]");
        die();

    }else{
    
        echo "<div style='text-align:center; font-size:12px; color:white;background-color:grey;'>";
        echo "The following errors ocurred:<br>";
        echo $result;
        echo "</div>";
    
    }

}


$event = new Event();
$ROW = false;

$ERROR = "";
if(isset($_GET['eventid'])){

    $ROW = $event->getSingleEvent($_GET['eventid']);

}else{
    $ERROR = "No event found!";

}

?>



<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>SeabrookCommunity | Search Title</title>
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
top:90%;
left:140%;
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
    <form method ="get"  action="search.php">
    <a href="userdashboard.php" style="color:white;"> My Profile</a> &nbsp  &nbsp <input type="text" id="searchbox" name="find" placeholder=" Search events by title!">
    </form>
<!--     <img src="selfie.jpg" style=" width: 30px; float:right; border-radius: 50px; border:solid 2px white;"> -->
  
  
</div>
</div><br>
<!-- cover area -->
<div style="display: flex;">
<div style="width:800px; margin:auto;  min-height:400px;">

<div style="min-height:400px; flex:2.5; padding: 20px; padding-right: 0px;">
  <div style="border:solid thin #aaa; padding: 10px; background-color:white;">


  <?php 
  
  $user = new User();
if(is_array($ROW)){
    $ROW_USER = $user->getUser($ROW['userid']);
    include("events.php");
}
  ?>


<div style="border:solid thin #aaa; padding: 10px; background-color:white;">
<!--   Posting an event
 -->
 <form method="post" action="userdashboard.php">
   <textarea name="event"  placeholder="Post a comment!" placeholder="Event Title"style="width: 250%;
    border:none;
    font-family: tahoma;
    font-size: 14px;
    height:60px;"
    ></textarea><br>
    <input type="hidden" name="parent" value="<?php echo $ROW['eventid']?>">
    <input id="event_button"  type="submit" value="Post a comment">
   
<br>
</form>
</div>
<?php 

$comments = $event->getComments($ROW['eventid']);

if(is_array($comments)){
    foreach($comments as $COMMENT){

    include("comment.php");
    
    
    
    }



}



?>



</div>
</div>
</div>
</body>
</html>
