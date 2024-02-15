<?php
session_start();

include("classes/loaderclass.php");


if(isset($_SESSION['userid']) && is_numeric($_SESSION['userid'])){

$userid = $_SESSION['userid'];
$login = new Login();
$user_data = $login->check_login($_SESSION['userid']);


$Event = new Event();
$ERROR = "";


//If eventid is set
if(isset($_GET['eventid'])){

  
  $ROW = $Event->getSingleEvent($_GET['eventid']);

  //If is not false it will return the row
  if(!$ROW){


    $ERROR = "No such event was found!";
}else{
    if($ROW['userid'] != $_SESSION['userid']){

        $ERROR = "Access denied! You can not delete this file!";
    
    
    }



}

}else{

    $ERROR = "No such event was found!";
}

}

//If something was posted
if($_SERVER['REQUEST_METHOD'] == "POST"){

    $Event->editEvent($_POST);
    header("Location:userdashboard.php");
    die();
  


}
?>




<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>SeabrookCommunity | Delete</title>
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
    My Profile &nbsp  &nbsp <input type="text" id="searchbox" placeholder=" Search for events">
<!--     <img src="selfie.jpg" style=" width: 30px; float:right; border-radius: 50px; border:solid 2px white;"> -->
  
  
</div>
</div><br>

<div style="display: flex;">

<!-- cover area -->
<div style="width:800px; margin:auto;  min-height:400px;">


  <div style="border:solid thin #aaa; padding: 10px; background-color:white;">

<form method="post" enctype="multipart/form-data">
<?php 

   if($ERROR != ""){
    echo $ERROR;

}else{

    echo "Are you sure you want to edit this event??<br><br>";
    echo '<textarea name="event"  placeholder="Post an event here!"style="width: 250%;
    border:none;
    font-family: tahoma;
    font-size: 14px;
    height:60px;"
    >' .$ROW['event'].'</textarea><br>
    
    <br>';
  


   echo "<input type='hidden' name='eventid' value='$ROW[eventid]'>";
   echo "<input id='event_button'  type='submit' value='Save'>";

}
?>
   
   <br>
</form>
</div>
   


</div>
</div>
</div>
</body>
    
</html>