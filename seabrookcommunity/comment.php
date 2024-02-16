<?php


?>
<!DOCTYPE html>
<html lang="en">
<html>
    <head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>SeabrookCommunity | Events</title>
    </head>
    <body>


<div id="event_bar" style="background-color: #eee;">



   <!--  Post 1 -->
 <div id="event">
<div>
<img src="user1.jpg" style="width: 65px; margin-right: 4px">
</div>
<div>
    <div style="font-weight : bold; color: #405d9b">
    <?php echo $ROW_USER['firstName'] . " " . $ROW_USER['lastName'];?></div><br>
    
    <div style="font-weight : bold; color: black; font-style: bold;"> 
    <?php 
    echo $COMMENT['title'];
    ?></div>

    <div style="font-weight :normal; color: black;">
    <?php 
    echo $COMMENT['event'];
    ?></div>
    <br><br>
    <?php 
    $likes = "";
    $likes = ($COMMENT['likes'] > 0) ? "(" .$COMMENT['likes']. ")" : "" ;
   
    ?>
    <a href="likes.php?type=event&eventid=<?php echo $COMMENT['eventid']?>">Like<?php echo $likes?></a>. 
    <a href="single_event.php?eventid=<?php echo $COMMENT['eventid'] ?>"></a> . <span style="color:#999"><?php echo $ROW['date']?>  
.
</span>
    <span style="color: #999; float:right">
<?php
$event = new Event();
if($event->myEvent($COMMENT['eventid'], $_SESSION['userid'])){
echo"
      <a href='edit.php?eventid=$COMMENT[eventid]'>
      Edit 
      </a>  .

      <a href='delete.php?eventid=$COMMENT[eventid]'>
      Delete
      </a>";  
    }
?>
</span>
</div>
</div>

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


</body>
</html>