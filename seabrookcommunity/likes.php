<?php  
session_start();
include("classes/loaderclass.php");

$login = new Login();
$user_data = $login->check_login($_SESSION['userid']);


if(isset($_SERVER['HTTP_REFERER'])){

 $return_to =$_SERVER['HTTP_REFERER'];
}else{
 $return_to ="userdashboard.php";

}

if(isset($_GET['type']) && isset($_GET['eventid'])){
    if(is_numeric($_GET['eventid'])){


        $allowed[] = 'event';
        $allowed[] = 'users';
        $allowed[] = 'comment';
if(in_array($_GET['type'], $allowed)){

    $event = new Event();
    $event->likeEvent($_GET['eventid'], $_GET['type'], $_SESSION['userid']);


}

}
    
    }




header("Location: ". $return_to);
die();
?>



