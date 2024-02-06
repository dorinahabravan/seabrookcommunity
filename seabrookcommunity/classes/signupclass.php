<?php
class Signup{


    private $error ="";

 public function evaluate($data){

//The loop goes for each item in the array one at a time 
//and shows the data as a key and value.
foreach ($data as $key => $value) {
    //The condition checks if the value is empty
    //Concatinate the error with a string
    if(empty($value)){
        $this->error = $this->error . $key . " is empty!<br>";
    
    
    
    }
    if($key == "email"){
    //regular expression to check the format of the email address.
        if(!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$value)){
        $this-> error = $this->error  . "Invalid email address!<br>";
        }
    }


}
if($this->error == ""){

// Result with no error
$this->create_user($data);
}else{

return $this->error;

}

}

public function create_user($data){
    // $data is the same as $_POST variable which holds all the information
  $firstName = ucfirst($data["firstName"]);
  $lastName = ucfirst($data["lastName"]);
  $email = $data["email"];
  $username = $data["username"];
  $password = password_hash($data["password"], PASSWORD_DEFAULT);
  $confirmPassword = password_hash($data["confirmPassword"], PASSWORD_DEFAULT);
  $phoneNumber = $data["phoneNumber"];

  //Calling the method that generate a random userid
  $userid = $this->create_userid();


     //I wrote the query without the id and it solved the 
    //Warning: Undefined array key "id" in C:\xampp\htdocs\seabrookcommunity\
       $sql = "INSERT INTO users (userid, firstName, lastName, email, username, password, confirmPassword,phoneNumber) VALUES ('$userid','$firstName','$lastName','$email', '$username','$password','$confirmPassword','$phoneNumber')";

       $DB = new ControllerDatabase();
       $DB ->save($sql);
     

}
//Function created by php to generate an userid
 private function  create_userid()
{
    $length = rand(4, 19);
    $number ="";
    for ($i=0; $i < $length; $i++) { 
        $new_random = rand(0,9);
        $number = $number . $new_random;

      
    }
return $number;







}



}



