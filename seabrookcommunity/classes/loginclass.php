<?php


class Login{
  


private $error ="";

 
 function evaluate($data){
    // $data is the same as $_POST variable which holds all the information

  $username = $data['username'];
  $password = $data['password'];
 /*  $password = password_hash($data["password"], PASSWORD_DEFAULT); */

   $sql = "SELECT * FROM users WHERE username = '$username' LIMIT 1 ";
       /* $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Verify password
        if (password_verify($password, $row["password"])) {
            $_SESSION["username"] = $username; // Store username in session for future use
           /*  $_SESSION["userid"] = $userid; */
        /* } else {
            echo "Invalid password or username";
        }
    } else {
        echo "User not found";
    }

    // Close the database connection
    $conn->close(); */ 

       $DB = new ControllerDatabase();
       $result = $DB ->read($sql);


     if($result){
        $row = $result[0];


        if(password_verify($password, $row['password'])){
            //create session data
           /* $_SESSION['username'] = $row['username']; */ // Store username in session for future use
           $_SESSION['userid'] = $row['userid'];
         
           $_SESSION['username'] = $row['username'];
           header('location:userdasboard.php?user=' . $_SESSION['userid']);
        
        }else{
        $this->error .="Wrong password!<br>";
        
        }

    }else{
    
    $this->error .= "No such username was found<br>";
    
    }
    
    return $this->error;
    
    }
    
//Check if the user is logged in
    public function check_login($userid){

        $sql = "SELECT userid FROM users WHERE userid = 'userid' LIMIT 1 ";
        $DB = new ControllerDatabase();
        $result = $DB ->read($sql);

if($result){
    return true;




}
return false;
    
    
    
    }
}






