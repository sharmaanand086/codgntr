<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');	


class admin extends CI_Model 
 {      
              
               /*--------------------------------Get the no of users ---------------*/
                 function gettotalass(){
                               $user="2_assignment";
                               $query = $this->db->query("SELECT * FROM  $user");
                                        return  $query->result();
                           } 

              /*--------------------------------Get the no of users ---------------*/
                 function getnnoofuser(){
                               $user="2_user";
                               $query = $this->db->query("SELECT * FROM  $user");
                                        return  $query->num_rows();
                           } 
             /*--------------------------------Get details of assignments ---------------*/
              function getassignmentdetails($id,$contid12){
                 $query=$this->db->query("SELECT  * FROM `2_assignment` WHERE `aid`='$id'");
                                  return $query->result();
                           } 
           /*--------------------------------Count for Notification ---------------*/
              function Count_message1($newid,$contid12){
                 $query=$this->db->query("SELECT  msg FROM `notificatioin_msg` WHERE `assid`='$newid' AND `$contid12`='1'");
                                  return $query->num_rows();
                           } 
             function Count_message123($newid,$contid12){
                 $this->db->query("UPDATE `notificatioin_msg` SET `$contid12`= '2' WHERE `assid`= '$newid'");
                                  
                           } 
           /*--------------------------------getnoofbatch-------------------------*/
             function getnoofbatch($contactid){
                           $query=$this->db->query("SELECT * FROM `submitted` WHERE `contact_id`='$contactid' ");
                                  return $query->num_rows();
                                              }
           /*--------------------------------This is for getting no of assignment-------------------------------------*/
               function getassignemntsno(){
                
                   $query = $this->db->query("SELECT * FROM `2_assignment`");
                   return $query->num_rows();
            
                }

          /*---------------------------------This is for status of assignment submitted for admin panel---------------*/
            function getviewss(){
              // $query = $this->db->query("SELECT  `contactid`,`sid`,`file`,`aid`,MAX( sid ) AS LastID FROM 2_submission GROUP BY  `contactid` ,  `aid` ");
$query = $this->db->query("SELECT * FROM `2_submission`WHERE `sid` IN ( SELECT MAX( sid ) AS LastID FROM `2_submission`  GROUP BY `contactid`,`aid`)");                                            
                                         return  $query->result();
                                   }
          /*---------------------------------This is for status of assignment submitted for admin panel---------------*/
            function getuserstatus(){
                                         $query = $this->db->query("SELECT * FROM  `submitted`");
                                         return  $query->result();
                                   }
         /*---------------------------------This is for search of admin -------------------------------------*/
            function getmessagesearch($message)
                                     {
                                 $query = $this->db->query("SELECT * FROM 2_user WHERE name LIKE '%".$message."%'");
                                    //return $query->num_rows();
                                        return  $query->result();
                                     }
         /*---------------------------------This is for all user from user panel-------------------------------------*/
          function getusers(){
                               $user="2_user";
                               $query = $this->db->query("SELECT * FROM  $user");
                                        return  $query->result();
                              }
         /*----------------------------------- This is for login smb newgetuser---------------------------------------- */ 	
	function newgetUser($username, $password)
           {
                    
		    $user="admin";
                    $query = $this->db->query("SELECT * FROM  $user WHERE username = '$username' and password = '$password'");
                  
                    if($query->num_rows()){
                                             return $query->row()->contactid;
                                          }else{
                                             return FALSE;   
                                               }
                  
          }
         /*-----------------------------------Public function Get Name-----------------------------------------------*/
          function getname($id){
                                      $user="admin";
                                      $query = $this->db->query("SELECT name FROM  $user WHERE contactid = '$id'");
                                       return  $query->result();
                                }
         
	/*---------------------------------- check whether email exist or not----------------------------------------*/
            function checkemail($username)
           {
               
		    $user="admin";
                    $query = $this->db->query("SELECT * FROM  $user WHERE username = '$username'");
                    if($query->num_rows()){
                                             return $query->num_rows();
                                          }else{
                                             return FALSE;   
                                               }
                  
          }

        /* get password for existing email */
          function getpassword($username)
           {
                   $user="admin";
                   $query = $this->db->query("SELECT password FROM  $user WHERE username = '$username'");
                   if($query->num_rows()){
                                             return $query->row()->password;
                                          }else{
                                             return FALSE;   
                                               }
           }
       
         /*--------------------------------getallmessage for chat---------------*/
  function  getallchatmessages($newid){             

                   
                   $query = $this->db->query("SELECT * FROM `logs` WHERE assid='$newid' ORDER BY id DESC ");
                   //$query = $this->db->get('logs');
                  // foreach($query->result() as $row)
                      // {
                         //echo $row->message;
                         //return $query->result();        
                     //  }
                  // var_dump($query->result());exit;
                   $result=$query->result();
                   return $result;
             }
       /*------------------------------ upadate password of the user------------------------------------- */
          function updatepassword($ccid,$password)
           {
                   $user="admin";
                   $query = $this->db->query("SELECT * FROM  $user WHERE contactid = '$ccid'");
                     if($query->num_rows()){
                                                  $data = array('password' => $password);
                                                  $this->db->where('contactid',$ccid);
                                                  $this->db->update('admin', $data);
                                               return true;
                                               
                                            }else{
                                            
                                             return FALSE;   
                                            
                                            }
                  
                  
           }
        /*--------------------------------upload assignment in to database table---------------------*/
           
       public function uploadAssignment($ufile,$fname,$udate,$subdate,$cid,$description)
	{
		$assignment = $cid."_assignment";
		$record = $cid."_record";
		$user = $cid."_user";
		//var_dump($subdate);exit;
		$update = date_format(date_create($udate), 'd-m-Y');
                $new_name = $this->db->escape_str($description);
                $new_title = $this->db->escape_str($fname);

		//$ldate = date_format(date_create($subdate), 'd-m-Y');
               // var_dump($update);var_dump($update);exit;
		$query = $this->db->query("SHOW TABLE STATUS LIKE '$assignment'");
		foreach ($query->result() as $row)
		{
			$aid = $row->Auto_increment;
		}
		$aid1 = "a".$aid;
		$query = $this->db->query("INSERT INTO `$assignment` VALUES ($aid,'$ufile','$new_title','$new_name','$udate','$subdate')");
              //  $query = $this->db->query("INSERT INTO `$assignment` VALUES ($aid,'$ufile','$fname','$description','$udate','$subdate')");
		$query1 = $this->db->query("ALTER TABLE `$record` ADD `$aid1` INT( 11 ) NOT NULL DEFAULT  '0'");
		$result = "Assignment Uploaded Successfully";
	        return $result;
	}
         /*--------------------------------upload assignment in to database table---------------------*/
           
       public function uuploadAssignment($ufile,$fname,$udate,$subdate,$cid,$description,$id)
	{
		$assignment = $cid."_assignment";
		$record = $cid."_record";
		$user = $cid."_user";
		//var_dump($subdate);exit;
		$update = date_format(date_create($udate), 'd-m-Y');
                $new_name = $this->db->escape_str($description);
                $new_title = $this->db->escape_str($fname);

                
		//$ldate = date_format(date_create($subdate), 'd-m-Y');
               // var_dump($update);var_dump($update);exit;
		$query = $this->db->query("SHOW TABLE STATUS LIKE '$assignment'");
		foreach ($query->result() as $row)
		{
			$aid = $row->Auto_increment;
		}
		$aid1 = "a".$aid;
		$query = $this->db->query("UPDATE `2_assignment` SET `file`='$ufile',`name`='$new_title',`discription`=' $new_name',`udate`='$udate',`subdate`='$subdate' WHERE `aid`='$id' ");
              //  $query = $this->db->query("INSERT INTO `$assignment` VALUES ($aid,'$ufile','$fname','$description','$udate','$subdate')");
	      //$query1 = $this->db->query("ALTER TABLE `$record` ADD `$aid1` INT( 11 ) NOT NULL DEFAULT  '0'");
		$result = "Assignment Uploaded Successfully";
	        return $result;
	}
	 public function uuploadAssignment12($fname,$udate,$subdate,$cid,$description,$id)
	{
		$assignment = $cid."_assignment";
		$record = $cid."_record";
		$user = $cid."_user";
		//var_dump($subdate);exit;
		$update = date_format(date_create($udate), 'd-m-Y');
                $new_name = $this->db->escape_str($description);
                $new_title = $this->db->escape_str($fname);

                
		//$ldate = date_format(date_create($subdate), 'd-m-Y');
               // var_dump($update);var_dump($update);exit;
		$query = $this->db->query("SHOW TABLE STATUS LIKE '$assignment'");
		foreach ($query->result() as $row)
		{
			$aid = $row->Auto_increment;
		}
		$aid1 = "a".$aid;
		$query = $this->db->query("UPDATE `2_assignment` SET `name`='$new_title',`discription`=' $new_name',`udate`='$udate',`subdate`='$subdate' WHERE `aid`='$id' ");
              //  $query = $this->db->query("INSERT INTO `$assignment` VALUES ($aid,'$ufile','$fname','$description','$udate','$subdate')");
	      //$query1 = $this->db->query("ALTER TABLE `$record` ADD `$aid1` INT( 11 ) NOT NULL DEFAULT  '0'");
		$result = "Assignment Uploaded Successfully";
	        return $result;
	}

      /*--------------------------------getassignment from admin in data base---------------------*/

      public function getassignemnts(){
                
                   $query = $this->db->query("SELECT * FROM `2_assignment` ORDER BY aid DESC");
                  return $query->result();
            
       }
     /*--------------------------------get Logs from admin---------------------*/
       public function getlogs(){
                  $query = $this->db->query("SELECT * FROM `logs`");
                  return $query->result();       
              }
     /*--------------------------------insert data for chat application----------*/
       function insert_message12($message,$name,$assid,$contid12)
          {
            $this->msg =$message;
            $this->name=$name;
            $this->assid=$assid;
            $this-> time = time();  
            $this->db->insert('logs', $this);
            //$this->db->query("INSERT INTO `notification_msg` VALUES ('$message','$assid')");
            //$this->db->insert('notification_msg',$this);
            $this->db->query("INSERT INTO `notificatioin_msg` (msg,assid,`$contid12`) VALUES ('$message','$assid','2')");
           }
       function insert_message123($msg,$assid)
          {
            //$this->db->query("INSERT INTO `notificatioin_msg` (msg,assid) VALUES ('$msg','$assid')");
           }


/*------------------------------own chat -------------------------*/
function getallcountmsg($contactid){
                           $query=$this->db->query("SELECT * FROM `ownchat` WHERE `toid`='$contactid' AND `readmsg`='1' ");
                                  return $query->num_rows();
                                              }


 function  getpartiownchatmessages($id,$contid12){             

                   $this->db->query("UPDATE `ownchat` SET `readmsg`='2' where `toid`='$id' AND `fromid`='$contid12'");
                   $query = $this->db->query("SELECT * FROM `ownchat` where toid='$id' OR fromid='$id' ORDER BY id DESC");
                   
                   $result=$query->result();
                   return $result;
                   
             }
             
function  getnamechatmessages($id){             

                   
                   $user="2_user";
                                      $query = $this->db->query("SELECT name FROM  $user WHERE contactid = '$id'");
                                       return  $query->result();
                   
             }

 function setmsg($toid,$fromid,$msg){
                               
                                $this->db->query("INSERT INTO `ownchat` VALUES ('','$toid','$fromid','$msg','1')");
                                       // return  $query->result();
                           } 
                           
/*----------------------super assignment models----------------------*/                           
                           
 public function getassignemnts1(){
                
                   $query = $this->db->query("SELECT * FROM `2_assignment1` ORDER BY aid DESC");
                  return $query->result();
            
       }
function getviewss1(){
              // $query = $this->db->query("SELECT  `contactid`,`sid`,`file`,`aid`,MAX( sid ) AS LastID FROM 2_submission GROUP BY  `contactid` ,  `aid` ");
$query = $this->db->query("SELECT * FROM `2_submission1` WHERE `sid` IN ( SELECT MAX( sid ) AS LastID FROM `2_submission1`  GROUP BY `contactid`,`aid`)");                                            
                                         return  $query->result();
                                   }
function gettotalass1(){
                               $user="2_assignment1";
                               $query = $this->db->query("SELECT * FROM  $user");
                                        return  $query->result();
                           } 
function getuserstatus1(){
                                         $query = $this->db->query("SELECT * FROM  `submitted1`");
                                         return  $query->result();
                                   }
                                   

/*----------------------super assignment models----------------------*/
                           

         }
         

             
             
             
    

?>