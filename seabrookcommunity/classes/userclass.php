<?php



class User{

public function get_data($userid){


  $sql = "SELECT * FROM users WHERE userid ='$userid' LIMIT 1";
  $DB = new ControllerDatabase();
  $result = $DB->read($sql);

   if(is_array($result)){

$row = $result[0];
/* return $row; */


}else{
return false;

}


}

public function getUser($userid){

  $sql ="SELECT * FROM users WHERE userid = $userid LIMIT 10 ";
  $DB = new ControllerDatabase();
  $result = $DB->read($sql);

if($result){
return $result[0];


}else{

return false;
}


}

}



