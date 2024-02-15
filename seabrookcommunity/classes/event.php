<?php  

class Event{

    private $error = "";

    public function createEvent($userid, $data){
    
    if(!empty($data['event'])){
    
    $event = addslashes($data['event']);
    $eventid = $this->create_eventid(); 
    $title = addslashes($data['title']);
    $date = addslashes($data['date']);
/*   $eventid = addslashes($data['eventid']); */

    $sql = "INSERT INTO events (userid, eventid, event, title,date) VALUES ('$userid','$eventid','$event','$title', '$date')";
    $DB = new ControllerDatabase();
    $DB ->save ($sql);
    
    }else{
    
        $this->error .="Please type something to post!<br>";
    
    }
    return $this->error;
    }


    public function getEvents($userid){
    
        $sql ="SELECT * FROM  events WHERE userid = '$userid' ORDER BY userid DESC LIMIT 10";
        $DB = new ControllerDatabase();
        $result = $DB->read($sql);
       

        if($result){
        
            return $result;
        
        
        }else{
         return false;
        
        
        }
    
    }


    public function getSingleEvent($eventid){
    if (!is_numeric($eventid)){
    return false;
    
    }
        $sql ="SELECT * FROM  events WHERE eventid ='$eventid' LIMIT 1";
      $DB = new ControllerDatabase(); 
         $result = $DB->read($sql); 
       

        if($result){
        
            return $result[0];
        
        
        }else{
         return false;
        
        
        }

    }
//This function will check if the user has authorization to delete the event and 
//an then the event it will be deleted.
public function deleteEvent($eventid){

      
        if (!is_numeric($eventid)){
        return false;
        
        }
         $sql ="DELETE FROM  events WHERE eventid = '$eventid' LIMIT 1";
          $DB = new ControllerDatabase(); 
          $DB->delete($sql); 
           
  
    
        }

//This function will check if the user owns the event and then delete it.
        public function myEvent($eventid, $userid){
            if (!is_numeric($eventid)){
            return false;
            
            } $sql ="SELECT * FROM  events WHERE eventid ='$eventid' LIMIT 1";
              $DB = new ControllerDatabase(); 
              $result = $DB->read($sql); 
         
               if(is_array($result)){
              
            if($result[0]['userid'] == $userid){
            
            return true;
            
            }
            
            }
      
        return false;
            }
    
            public function editEvent($data){
    
                if(!empty($data['event'])){

                $event = "";

                if(isset($data['event'])){
                
                $event = addslashes($data['event']);
                }

               $eventid = addslashes($data['eventid']);
           
            
                $sql ="UPDATE events SET event = '$event' WHERE eventid = '$eventid' LIMIT 1";
                $DB = new ControllerDatabase();
                $DB ->save ($sql);
                
                }else{
                
                    $this->error .="Please type something to post!<br>";
                
                }
                return $this->error;
                }
            
        public function likeEvent($id,  $type, $userid){
            if($type == "event"){
            

            //save likes
           
            $sql="SELECT likes FROM likes  WHERE type = 'event' && contentid= '$id'  LIMIT 1";
            $DB = new ControllerDatabase();
            $result =  $DB->read($sql);
            if(is_array($result)){

                //converting back json to an array with data from the database
                $likes = json_decode($result[0]['likes'],true);


                if (is_array($likes)) {
              $user_ids = array_column($likes, "userid");

                }else{
                    $user_ids = [];
                }

                if(!in_array($userid, $user_ids)){

                $arr["userid"] = $userid;
                $arr["date"] =date("Y-m-d H:i:s");


                //Json converts data from an array to a string
                $likes[] =$arr;
                $likes_string = json_encode($likes);
                $sql="UPDATE likes SET likes = '$likes_string' WHERE type ='event' && contentid= '$id'  LIMIT 1";
                $DB = new ControllerDatabase();
                $DB->save($sql);


                //increments the events table
               $sql="UPDATE events SET likes = likes + 1 WHERE eventid = '$id'  LIMIT 1";
               $DB = new ControllerDatabase();
               $DB->save($sql);
            
                }else{
                //Unlike the event if already liked once.
                
                $key =  array_search($userid, $user_ids);
                unset($likes[$key]);

                $likes_string = json_encode($likes);
                $sql="UPDATE likes SET likes = '$likes_string' WHERE type ='event' && contentid= '$id'  LIMIT 1";
                $DB = new ControllerDatabase();
                $DB->save($sql);

                //Decrement likes
                $sql="UPDATE events SET likes = likes - 1 WHERE eventid = '$id'  LIMIT 1";
                $DB = new ControllerDatabase();
                $DB->save($sql);
            


                }
            
            }else{

                $arr["userid"] = $userid;
                $arr["date"] =date("Y-m-d H:i:s");

                $arr2[]=$arr;


                //Json converts data from an array to a string
                $likes = json_encode($arr2);

                $sql="INSERT INTO likes (type, contentid, likes) VALUES ('$type', '$id', '$likes')";
                $DB = new ControllerDatabase();
                $DB->save($sql);

                //increments the events table
                $sql="UPDATE events SET likes = likes + 1 WHERE eventid = '$id'  LIMIT 1";
                $DB = new ControllerDatabase();
                $DB->save($sql);
            
            
            }

            }

        }


//Function created by php to generate an eventid
private function  create_eventid()
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