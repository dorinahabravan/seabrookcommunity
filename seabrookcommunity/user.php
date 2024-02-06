<?php
class User{
public function get_data($username){
$query = "SELECT * FROM users WHERE username = '$username' limit 1";
/* $result = $query->read($query); */
if($query){
$row = $query[0];
return $row;


}else{
return false;

}




}





}

