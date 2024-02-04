<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
    
    
    <title>Seabrook Community</title>
</head>
<body>
<!-- <style>
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

/* Style the top navigation bar */
.topnav {
  overflow: hidden;
  background-color: #333;
}

/* Style the topnav links */
.topnav a {
  float:right;
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
</style> -->
</head>
<body style="background-color:#d0d8e4">

<!-- <div id="header">
<!--   <h1 style="float:left; color:#d0d8e4; position:relative;top:-70px; right: 50px;">SEABROOCK</h1>
  <h4 style="float:left; color:#d0d8e4; position:relative;top:-50px; right: 50px;">Community</h4> -->
<!-- </div><br><br> --> 


<div class="topnav">
  <a href="signup.php" style="float:right">Sign Up</a>
  <a href="login.php">My Account</a>
  <a href="index.php" style="float:left; color:white">SEABROOCK Community
</a>
</div>
  <!--   <h1>Welcome to the  Seabrock Community Login System! -->
    
   


    <!-- <div class="row"> -->
  <div class="leftcolumn">
    <div class="card" style="background-color:#d0d8e4" >
    <img id="community_img" src="Workplace-Community.jpg">
    <div id="centered">
  Welcome to Seabroock<br>
    </div>
    <div id="centered_bottom"> Connect, Share & Engage</div>
    <div id="centered_description">At Seabrook, we celebrate togetherness. Engage in a calendar brimming with community events – from lively festivals to intimate gatherings. Seabrook is more than a place to live; it's a vibrant community where neighbors become friends, and every day is an opportunity to connect.

<div id="members_button">
    <div class="popup">
    <input id="click_link" type="button" value="SEE MEMBERS"  onclick="myFunction()">
  <span class="popuptext" id="myPopup">Register an account with us to create an event and to see all members.
  <a href="signup.php" style="color:white">Click here!</a>
  </span>
  
</div>


</div>
<!-- <div id="event_button"> -->
<div class="popup_event" >
    <input id="click_link_event" type="button" value="CREATE AN EVENT" style="position: absolute;
    left: 250%;
   bottom: -64px;
width: 140px;
height: 40px;
border-radius: 10px;
font-weight: bold;
border: none;
background-color:rgb(59, 89, 152);
color: white;
padding: 5px;
  " onclick="myFunction()">
  <!-- <span class="popuptext" id="myPopup_event"> -->
  <a href="signup.php" style="color:white"></a>
  </span>
</div>
    </div>
    
 <!--      <div><img id="community_img"></div><br> -->
      <!-- <p>Some text..</p>
      <p>Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p> -->
    </div>
   <!--  <div class="card" style="background-color:#d0d8e4"> -->
     <!--  <h2>TITLE HEADING</h2>
      <h5>Title description, Sep 2, 2017</h5> -->
<!--       <div class="fakeimg" style="height:200px;">Image</div> -->
<!--       <div><img id="community_img" src="Global_community_grey.jpg" style="height: 485px;  opacity: 0.7; border-radius: 10px;"></div><br> -->
      <!-- <p>Some text..</p>
      <p>Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p> -->
    </div>
  </div>
  <script>
// When the user clicks on div, open the popup
function myFunction() {
  var popup = document.getElementById("myPopup");
  popup.classList.toggle("show");
}

</script>
  <!-- <div class="rightcolumn">
    <div class="card">
      <h2>About Me</h2>
      <div class="fakeimg" style="height:100px;">Image</div>
      <p>Some text about me in culpa qui officia deserunt mollit anim..</p>
    </div> -->
  
    <div class="card" style="height: 820px;padding: 12px;
     width: 100%">
    
      <h3>Popular Post</h3>

<!-- Posted events -->
<!-- <div id="event_bar"> -->
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


<!-- Ad block -->
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<ins class="adsbygoogle"
style="display:inline-block;width:728px;height:90px"
data-ad-client="ca-pub-1234567890123456"
data-ad-slot="1234567890"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
<!-- End of Ad block -->






    
   <!--  <div class="card">
      <h3>Follow Me</h3>
      <p>Some text..</p>
    </div> -->
  </div>
</div>









<!-- <div class="footer">
  <p>Footer</p>
</div> -->
</body>
</html>