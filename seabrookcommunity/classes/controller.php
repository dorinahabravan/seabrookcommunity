<?php



//The configuration of the blueprint class for connecting with the database
class ControllerDatabase{
   /*  private $connection;
    private $lastError; */

private $host ="localhost";
private $username ="root";
private $password ="";
private $db ="seabrookcommunity";

function connect(){

    $conn = mysqli_connect($this->host, $this->username, $this->password, $this->db);
    //Exit the connection with the result
    return $conn;
    // Establish a connection to the database
/*     $conn = new mysqli("localhost", "root", "", "seabrook_community"); */

}

function read($sql){
    
    //Calling the connect function to connect to the database.
    $conn = $this->connect();
    $result = mysqli_query($conn, $sql);
    
    //Check if the result is true or false 
    if(is_array($result)){
    $row = $result[0];
   
    return false;
    
    }else{
        $data = array();
        while($row = mysqli_fetch_assoc($result)){
      //Data becomes in an array
          $data[] = $row;
        }

       /*  if ($result === false) {
            $this->lastError = $this->connection->error;
            error_log("Database query failed: " . $this->lastError);
        } */
    return $data;
    }


  

}


function save($sql){
    //Calling the connect function to connect to the database.
    $conn = $this->connect();
    $result = mysqli_query($conn, $sql);
    
    //Check if the result is true or false 
    if(!$result == false){
    
    return false;
    
    }else{
    return true;
    
    }


}


function delete($sql){
    //Calling the connect function to connect to the database.
    $conn = $this->connect();
    $result = mysqli_query($conn, $sql);
    
    //Check if the result is true or false 
    if(!$result == false){
    
    return false;
    
    }else{
    return true;
    
    }


}

}