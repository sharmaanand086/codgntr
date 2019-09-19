<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');	
require(APPPATH."third_party/infusionsoft/isdk.php");
require(APPPATH."third_party/infusionsoft/class.phpmailer.php");

class user extends CI_Model 
 {                  
                        /*-----------------------------------check and insert seen tooltip next---------------*/
                         function updatetooltip($id){

                  $this->db->query("UPDATE `2_user` SET `sttooltip3`='2' WHERE `contactid`='$id'"); 
                                                                              }
                          
                             function nexttooltipmodal($id){

                  $this->db->query("UPDATE `2_user` SET `sttooltip3`='1' WHERE `contactid`='$id'"); 
                                                                              }
                         function gettooltip3($contactid){

                $query=  $this->db->query("SELECT `sttooltip3` FROM `2_user` WHERE `contactid`='$contactid'"); 
                          return $query->result();
                                                                              }
                       /*-----------------------------------check and insert seen tooltip---------------*/
                    function changetooltip($id){

                  $this->db->query("UPDATE `2_user` SET `sttooltip`='1' WHERE `contactid`='$id'"); 
                                                                              }
                    function changetooltip1($id){

                  $this->db->query("UPDATE `2_user` SET `sttooltip1`='1' WHERE `contactid`='$id'"); 
                                                                              }
                     function changetooltip2($id){

                  $this->db->query("UPDATE `2_user` SET `sttooltip2`='1' WHERE `contactid`='$id'"); 
                                                                              }
                    function gettooltip($contactid){

                $query=  $this->db->query("SELECT `sttooltip` FROM `2_user` WHERE `contactid`='$contactid'"); 
                          return $query->result();
                                                                              }
                    function gettooltip1($contactid){

                $query=  $this->db->query("SELECT `sttooltip1` FROM `2_user` WHERE `contactid`='$contactid'"); 
                          return $query->result();
                                                                              }
                    function gettooltip2($contactid){

                $query=  $this->db->query("SELECT `sttooltip2` FROM `2_user` WHERE `contactid`='$contactid'"); 
                          return $query->result();
                                                                              }
                     /*----------------------------------getno ofoverdue assignments--------------*/
                      function getnewoverdueassignment($contactid){
                                        $query=$this->db->query("SELECT * FROM `submitted`  WHERE `contact_id`='$contactid' AND `overdue`='1'");
                                        return $query->result();
                                                                  }
        
                     
                     /*-----------------------------------Update seen assignements---------------*/
                    function updateseenassignment($contactid,$totalassignment){

                  $this->db->query("UPDATE `assignment_notification` SET  `seenassg` =  '$totalassignment' WHERE contactid ='$contactid'"); 
                                                                              }
                   /*-----------------------------------get the no of seen assignment by the particular user---------------*/
                     function getseenassignment($contactid){
                                   $query=$this->db->query("SELECT * FROM `assignment_notification`  WHERE `contactid`='$contactid'");
                                          return $query->row()->seenassg;
                                                          }
                   /*-----------------------------------get view for assignment-----------------*/
              function getviewss($contactid){
$query = $this->db->query("SELECT * FROM `2_submission`WHERE `sid` IN ( SELECT MAX( sid ) AS LastID FROM `2_submission` WHERE `contactid`='$contactid' GROUP BY `contactid`,`aid`)");
//$query = $this->db->query("SELECT  `contactid`,`sid`,`file`,`aid`,MAX( sid ) AS LastID FROM 2_submission   GROUP BY  `contactid`,`aid` ");
                                         return  $query->result();
                                   }
                /*--------------------------------getallsubmitted assignment-------------------------*/
                function getallsubmitedassignment($contactid){
                           $query=$this->db->query("SELECT * FROM `2_submission`  WHERE `contactid`='$contactid'");
                                   return $query->result();
                  
                               
                                              }
                /*--------------------------------getnoofbatch-------------------------*/
                function getassigmentsubdate($assignmentno,$contactid){
                           $query=$this->db->query("SELECT * FROM `locked` WHERE  `assignment_no`='$assignmentno' and contact_id='$contactid'");
                                  
                                   return $query->row()->subdate;
                                              }
              /*--------------------------------getnoofbatch-------------------------*/
                function getnoofbatch($contactid){
                           $query=$this->db->query("SELECT * FROM `submitted` WHERE `contact_id`='$contactid' ");
                                  return $query->num_rows();
                                              }
              /*--------------------------------Count for Notification ---------------*/
              function Count_message1($newid,$contid12){
                 $query=$this->db->query("SELECT  msg FROM `notificatioin_msg` WHERE `assid`='$newid' AND `$contid12`='1'");
                                  return $query->num_rows();
                           } 
              /*--------------------------------End Count for Notification ---------------*/
               function  addforchat($contactid){
                                $query=$this->db->query("SELECT $contactid FROM  `notificatioin_msg`");
                          
                                $rr=$query->num_rows();
                             
                              
                               // if($rr==0){
                                 $this->db->query("ALTER TABLE `notificatioin_msg` ADD `$contactid` INT NOT NULL DEFAULT '1' ");  
                                    //    }else{
                                 //  $this->db->query("ALTER TABLE `notificatioin_msg` ADD `$contactid` INT NOT NULL DEFAULT '1' "); 
                                       // }
                                                }
                                            
                function addfornotification($contactid){
                                  $this->db->query("INSERT INTO `assignment_notification`(`contactid`, `seenassg`) VALUES (`$contactid`,'0')");
                }
                   
             /*--------------------------------count of complete assignment for particular user-----------*/
              function getcounttooltip($contactid){
                                             $user="2_user";
                                             $query = $this->db->query("SELECT * FROM `submitted` WHERE contact_id ='$contactid' and status='1' ");
                                             return $query->num_rows();
                                          
                                        } 
            /*--------------------------------update first user logout-----------*/
              function updatefirsttime($contactid){
                                             $user="2_user";
                                             $query = $this->db->query("UPDATE `2_user` SET  `ftime` =  '1' WHERE contactid ='$contactid'");
                                              
                                          
                                        }
             
	    /*--------------------------------getfirst time usrer -----------------*/
            function getfirsttime($contactid){
                                               $user="2_user";
                                               $query = $this->db->query("SELECT ftime FROM `$user` WHERE contactid='$contactid'");
                                               return $query->row()->ftime;
                                               //return $query->result();
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
	    /*--------------------------------getUpdate for Notification---------------*/
              function Update_message1($newid,$contid12){
                 $this->db->query("UPDATE `notificatioin_msg` SET `$contid12` =2 WHERE `assid` = '$newid'");
                           }  
                     
      

       /* This is for login smb newgetuser */ 	
	function newgetUser($username, $password)
           {
               
		    $user="2_user";
                    $query = $this->db->query("SELECT * FROM  $user WHERE username = '$username' and password = '$password'");
                    if($query->num_rows()){
                                             return $query->row()->contactid;
                                          }else{
                                             return FALSE;   
                                               }
                  
          }
         /*This is for retriving neame of user */
               function getname($id){
                                      $user="2_user";
                                      $query = $this->db->query("SELECT name FROM  $user WHERE contactid = '$id'");
                                       return  $query->result();
                                }
         function getnameofuser($contactid){
                                      $user="2_user";
                                      $query = $this->db->query("SELECT name FROM  $user WHERE contactid = '$contactid'");
                                       return  $query->result();
                                }
        /* This is for Retriving all assignments */
         function getAssignment()
           {
                                                      
                $query = $this->db->query("SELECT * FROM  2_assignment");

                 return $query->result();
           }
        /* this is to get no of assignment added by admin */
         function getnoofAssignment(){
                                                      
                $query = $this->db->query("SELECT * FROM  2_assignment");

                 return $query->num_rows();
           }

        /* this is to get no of assignment added by admin */
         function getnoofAssignment1(){
                                                      
                $query = $this->db->query("SELECT * FROM  2_assignment");

                 return $query->result();
           }
 
        /* this is to get all the over due assignment for particular user */
           function getoverdueassignment($ccid)
           {
 
             
               $query = $this->db->query("SELECT assignment_no, overdue FROM  `submitted` WHERE contact_id =  '$ccid'");

               return $query->result();
           }
         
           
	/* check whether email exist or not*/
            function checkemail($username)
           {
               
		    $user="2_user";
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
                   $user="2_user";
                   $query = $this->db->query("SELECT password FROM  $user WHERE username = '$username'");
                   if($query->num_rows()){
                                                 return $query->row()->password;
                                          }else{
                                                 return FALSE;   
                                               }
           }
       /* upadate password of the user */
          function updatepassword($ccid,$password)
           {
                   $user="2_user";
                   $query = $this->db->query("SELECT * FROM  $user WHERE contactid = '$ccid'");
                     if($query->num_rows()){
                                                  $data = array('password' => $password);
                                                  $this->db->where('contactid',$ccid);
                                                  $this->db->update('2_user', $data);
                                                  return true;
                                               
                                            }else{
                                            
                                                  return FALSE;   
                                            
                                            }
                  
                  
           }

        function checkold($ccid,$oldpass)
           {
                   $user="2_user";
                   $query = $this->db->query("SELECT * FROM  $user WHERE password = '$oldpass'");
                     if($query->num_rows()){
                                                  
                                                  return true;
                                               
                                            }else{
                                            
                                                  return FALSE;   
                                            
                                            }
                  
                  
           }

      /* uploading  form submition */
      
         function  uploadSubmit($assignmentno,$filename,$checkover)
                  {
                         //echo "this is called";
                        $contactid = $_SESSION['contid'];
		        $assignment =$assignmentno ;
		        //$record ="2_record";
		       // $submission ="2_submission";
		        $assignmentno1=$assignmentno+1;
		        $update = date('Y:m:d');
		      $NewDate=Date('Y:m:d', strtotime("+14 days"));
					$lockeDate=Date('Y:m:d', strtotime("+7 days"));
		      $aid1 = "a".$assignmentno;

		         
		     $query1 = $this->db->query("INSERT INTO `2_submission` VALUES ('','$contactid','$assignmentno','$filename','$update')");
             
		     $query2 = $this->db->query("update `2_record` set `$aid1` = '$contactid' WHERE `contactid` = '$contactid'"); 
                     $query3 = $this->db->query("SELECT * FROM `submitted` WHERE contact_id = '$contactid' and assignment_no = '$assignmentno' ");
                     $query4 = $this->db->query("SELECT * FROM `submitted`");
                    
                   
		        //$row=num_row($query3);
		        
		        $row=$query3->num_rows();

		      

                        if($row>0){
                                     
                   $this->db->query("update `submitted` set `status` = '1' WHERE `contact_id` = '$contactid' and `assignment_no`='$assignmentno'");  
                                 
                                 }else{

                                  $this->db->query("INSERT INTO `submitted` VALUES ('','$contactid','$assignmentno','1','')");
                                  $abbc=$assignmentno+1;
                                  //$this->db->query("INSERT INTO `locked` VALUES ('','$contactid','$abbc','$NewDate','$lockeDate')");
                                   //$this->db->query("INSERT INTO `subdate` VALUES ('','$abbc','$contactid','$NewDate')");
                                 }
		  
             if($checkover==1){
                       $this->db->query("UPDATE `submitted` SET `overdue`='1' WHERE `assignment_no`='$assignmentno' AND `contact_id`='$contactid' ");
                                 }


                        if( $query1){

                                    return true;

                              }else{
                               
                                   return false;
                              }
                       // $result = "Assignment Solution Submitted successfully";
		    
                        
                  }

          /* Upload Overdue assignments */

                 function  overdueSubmit($assignmentno,$filename)
                  {
                         echo "this is called";
                        $contactid = $_SESSION['contid'];
		        $assignment =$assignmentno ;
		        //$record ="2_record";
		       // $submission ="2_submission";
		         
		        $update = date('Y:m:d');
		
		      $aid1 = "a".$assignmentno;
		         
		     $query1 = $this->db->query("INSERT INTO `2_submission` VALUES ('','$contactid','$assignmentno','$filename','$update')");
		     $query2 = $this->db->query("update `2_record` set `$aid1` = '$contactid' WHERE `contactid` = '$contactid'"); 
                     $query3 = $this->db->query("SELECT * FROM `submitted` WHERE contact_id = '$contactid' and assignment_no = '$assignmentno' ");
                 //  print_r($query3); exit;
		        //$row=num_row($query3);
		        
		        $row=$query3->num_rows();
		         //var_dump($row);
                        if($row>0){
                                     
                   $this->db->query("update `submitted` set `overdue` = '1' WHERE `contact_id` = '$contactid' and `assignment_no`='$assignmentno'");  
                   $this->db->query("update `submitted` set `status` = '1' WHERE `contact_id` = '$contactid' and `assignment_no`='$assignmentno'");               
                                 }else{

                                  $this->db->query("INSERT INTO `submitted` VALUES ('','$contactid','$assignmentno',' 1','1')");
$abbc=$assignmentno+1;
                                  $NewDate=Date('Y:m:d', strtotime("+10 days"));
                                  $this->db->query("INSERT INTO `locked` VALUES ('','$contactid','$abbc','$NewDate','$lockeDate')");
                                  //$this->db->query("INSERT INTO `subdate` VALUES ('','$abbc','$contactid','$NewDate')");

                                 }
		  
                        if( $query1){

                                    return true;

                              }else{
                               
                                   return false;
                              }
                       // $result = "Assignment Solution Submitted successfully";
		    
                        
                  }
               
         /* upload edit assignments   */

           function  edituploadSubmit($assignmentno,$filename)
                  {
                         //echo "this is called";
                         //echo $filename;
                        $contactid = $_SESSION['contid'];
		        $assignment =$assignmentno ;
		        //$record ="2_record";
		       // $submission ="2_submission";
		      
		        $update = date('Y:m:d');
		
		        $aid1 = "a".$assignmentno;
		         
		        $query1 = $this->db->query("INSERT INTO `2_submission` VALUES ('','$contactid','$assignmentno','$filename','$update')");
		        $query2 = $this->db->query("update `2_record` set `$aid1` = '$contactid' WHERE `contactid` = '$contactid'"); 
                        $query3 = $this->db->query("SELECT * FROM `submitted` WHERE contact_id = '$contactid' and assignment_no = '$assignmentno' "); 
		        //$row=num_row($query3);
		        
		        $row=$query3->num_rows();
		        
                        if($row>0){
                                     
                   $this->db->query("update `submitted` set `status` = '1' WHERE `contact_id` = '$contactid' and `assignment_no`='$assignmentno'");  
                                 
                                 }else{

                                  $this->db->query("INSERT INTO `submitted` VALUES ('','$contactid','$assignmentno','1')");
$abbc=$assignmentno+1;
                                  $NewDate=Date('Y:m:d', strtotime("+10 days"));
                                  //$this->db->query("INSERT INTO `locked` VALUES ('','$contactid','$abbc','$NewDate','$lockeDate')");
                                  //$this->db->query("INSERT INTO `subdate` VALUES ('','$abbc','$contactid','$NewDate')");

                                 }
		  
                        if( $query1){

                                    return true;

                              }else{
                               
                                   return false;
                              }
                       // $result = "Assignment Solution Submitted successfully";
		    
                        
                  }
        
       
          /* get overdue assignment*/
              function getoverdue($contactid)
               {
                 
                 // $query=$this->db->query("SELECT * FROM  `2_assignment` WHERE subdate < NOW( );");
    $query=$this->db->query("SELECT * FROM  `locked` WHERE subdate < NOW( ) and contact_id='$contactid' and assignment_no NOT IN (SELECT assignment_no FROM  `submitted` WHERE STATUS =1
    AND contact_id =$contactid);");
                  return $query->result();
               }

           /* get overdue assignment*/
              function getnoofoverdue($contactid)
               {
                 
                 // $query=$this->db->query("SELECT * FROM  `2_assignment` WHERE subdate < NOW( );");
    $query=$this->db->query("SELECT * FROM  `locked` WHERE subdate < NOW( ) and contact_id='$contactid' and assignment_no NOT IN (SELECT assignment_no FROM  `submitted` WHERE STATUS =1
    AND contact_id =$contactid);");
                  return $query->num_rows();
               }
   

        /* get the complete  records */

             function getrecords($contactid)
             {
                 $query=$this->db->query("SELECT * FROM  `2_record` WHERE contactid =  '$contactid'");
                  return $query->result();
             }
         
       /* get the submitted assignments*/
           function getsubmitted($contactid)
          {
                   $query=$this->db->query("SELECT * FROM  `submitted` WHERE contact_id =  '$contactid'  ");
                   return $query->result(); 
          }
        
       /* get the profile of user*/
            function getprofile($contactid)
          {
                   $query=$this->db->query("SELECT * FROM  `2_user` WHERE contactid =  '$contactid'  ");
                   return $query->result(); 
          }
      /* get the Number of assignment*/
         
       function gettotalassignment()
         {
              $query=$this->db->query("SELECT * FROM  `2_assignment`");
              $row=$query->num_rows();
              return  $row;
         }

     /* get total complete assignment */
         
       function gettotalcompleteassignment($contactid)
         {
              $query=$this->db->query("SELECT * FROM  `submitted` where contact_id =  '$contactid' and status=1");
              $row=$query->num_rows();
              return  $row;
         }
    
       /* get registration date of the user */
         function getregistration($contactid)
         {
                  
             $query=$this->db->query("SELECT registrationdate FROM  `2_user` where contactid =  '$contactid'");
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
            //$this->db->query("INSERT INTO notificatioin_msg (msg,assid) VALUES('$message','$assid')");
            $this->db->query("INSERT INTO notificatioin_msg (msg,assid) VALUES('$message','$assid')");
            $this->db->query("UPDATE `notificatioin_msg` SET `$contid12`='2' WHERE msg='$message'");
            
           }
        /*--------------------------------insert data for Notification application----------*/
       function insert_message123($message,$assid,$contid12)
          {
            
           // $this->db->query("INSERT INTO notificatioin_msg (msg,assid) VALUES('$message','$assid')");
           // $this->db->query("UPDATE `notificatioin_msg` SET `$contid12`='2' WHERE msg='$message'");
            
           }

      /*-------------------------------new data-----------------------------------------*/

     function updatenofi($contactid,$toid){
                                   $this->db->query("UPDATE `ownchat` SET `readmsg`='2' where `toid`='$toid' AND `fromid`='$contactid'");
                                          
                                                          }
    function getnoofbatch1($contactid){
                           $query=$this->db->query("SELECT * FROM `submitted1` WHERE `contact_id`='$contactid' ");
                                  return $query->num_rows();
                                              } 
    function getallcountmsg($contactid){
                           $query=$this->db->query("SELECT * FROM `ownchat` WHERE `fromid`='$contactid' AND `readmsg`='1' ");
                                  return $query->num_rows();
                                              }
     function  getallownchatmessages($id){             

                   
                   $query = $this->db->query("SELECT * FROM `ownchat` where toid='$id' OR fromid='$id' ORDER BY id DESC ");
                   //update
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

   function insert_message_own($msg,$fromid,$readmsg,$toid){
                               
                                $this->db->query("INSERT INTO `ownchat` VALUES ('','$toid','$fromid','$msg','$readmsg')");
                                       // return  $query->result();
                           } 

   function getlocked($contactid)
          {
                   $query=$this->db->query("SELECT * FROM  `locked` WHERE contact_id =  '$contactid'  ");
                   return $query->result(); 
          }

    function urgent_locked($contactid){
                                        $NewDate=Date('Y:m:d', strtotime("+2 days")); 
                                         $query3 = $this->db->query("SELECT * FROM `locked` WHERE subdate='$NewDate' and contact_id='$contactid'");
                                         $result=$query3->result();
                                               return $result;
                                            
                                        }
   function getcounit1($contactid){
                                             $user="2_user";
                                             $query = $this->db->query("SELECT * FROM `2_submission` WHERE contactid='$contactid'");
                                             return $query->num_rows();
                                          
                                        }
   function getcounit($assignmentno,$contactid){
                                             $user="2_user";
                                             $query = $this->db->query("SELECT * FROM `2_submission` WHERE contactid='$contactid' and aid='$assignmentno' ");
                                             return $query->num_rows();
                                          
                                        }
    function getnoofAssignmentss12(){
                                                      
                $query = $this->db->query("SELECT * FROM  2_assignment1 ORDER BY aid ASC;");

                 return $query->num_rows();
           }
     function getAssignment32()
           {
                                                      
                $query = $this->db->query("SELECT * FROM  2_assignment1 ORDER BY aid ASC;");

                 return $query->result();
           }
  function getlocked32($contactid)
          {
                   $query=$this->db->query("SELECT * FROM  `locked1` WHERE contact_id =  '$contactid'  ");
                   return $query->result(); 
          }
          
          
  function getoverdue32($contactid)
               {
                 
                 // $query=$this->db->query("SELECT * FROM  `2_assignment` WHERE subdate < NOW( );");
    $query=$this->db->query("SELECT * FROM  `locked1` WHERE subdate < NOW( ) and contact_id='$contactid' and assignment_no NOT IN (SELECT assignment_no FROM  `submitted1` WHERE STATUS =1
    AND contact_id =$contactid);");
                  return $query->result();
               }
               
  function getsubmitted32($contactid)
          {
                   $query=$this->db->query("SELECT * FROM  `submitted1` WHERE contact_id =  '$contactid'  ");
                   return $query->result(); 
          }
  function getnewoverdueassignment32($contactid){
                                        $query=$this->db->query("SELECT * FROM `submitted1`  WHERE `contact_id`='$contactid' AND `overdue`='1'");
                                        return $query->result();
                                                                  }
function getnoofAssignment122(){
                                                      
                $query = $this->db->query("SELECT * FROM  2_assignment1 ORDER BY aid ASC;");

                 return $query->result();
           }
   function getquestion()
                  {
                    $query = $this->db->query("SELECT * FROM `question` ");

                    return $query->result();

                  }        
    function getanswer($contactid)
                  {
                    $query = $this->db->query("SELECT * FROM `ans` WHERE contactid ='$contactid' ");

                    return $query->result();

                  }
     function insert_msg($contid12,$questionno,$assignmentno,$message){

                  $this->db->query("INSERT INTO `ans`(`id`, `contactid`, `question`, `assignmentno`, `answer`,`change_text`) VALUES ('','$contid12','$questionno','$assignmentno','$message','')"); 
                                                                              }
    function update_msg($contid12,$questionno,$assignmentno,$message){

        $this->db->query("UPDATE `ans` SET  `answer` =  '$message' WHERE contactid ='$contid12' AND question='$questionno' AND assignmentno='$assignmentno'"); 
                                                              }
    function numberq($contid12,$questionno,$assignmentno)
                  {
                    $query = $this->db->query("SELECT * FROM `ans` WHERE contactid='$contid12' AND assignmentno='$assignmentno' AND question='$questionno'");

                    return $query->num_rows();

                  }
     function submit_id($contid12,$id){
         $filename='';
                        $NewDate=Date('Y:m:d', strtotime("+20 days"));
                      $lockeDate=Date('Y:m:d', strtotime("+10 days"));
                          $abbc=$id+1;
                          $this->db->query("INSERT INTO `submitted1` VALUES ('','$contid12','$id','1','')");
                          $this->db->query("INSERT INTO `locked1` VALUES ('','$contid12','$abbc','$NewDate','$lockeDate')");
                          
                           $this->db->query("INSERT INTO `2_submission1` VALUES ('','$contid12','$id','$filename','$NewDate')");
                          
                                                                              }
                        function over_submit_id($contid12,$id){
                          $NewDate=Date('Y:m:d', strtotime("+20 days"));
                      $lockeDate=Date('Y:m:d', strtotime("+10 days"));
                          $abbc=$id+1;
                          $this->db->query("INSERT INTO `submitted1` VALUES ('','$contid12','$id','1','1')");
                          $this->db->query("INSERT INTO `locked1` VALUES ('','$contid12','$abbc','$NewDate','$lockeDate')");
                          $this->db->query("INSERT INTO `2_submission1` VALUES ('','$contid12','$id','$filename','$NewDate')");
                                                                              }              
     function number_row($contid12,$id)
                  {
                    $query = $this->db->query("SELECT * FROM `submitted1` WHERE contact_id='$contid12' AND assignment_no='$id' ");

                    return $query->num_rows();

                  }
     function dateofsub($contid12,$id)
                  {
                    $query = $this->db->query("SELECT * FROM `locked1` WHERE contact_id='$contid12' AND assignment_no='$id' ");

                    return $query->result();

                  }
     function super_insert_message12($message,$name,$assid,$contid12)
          {
            $this->msg =$message;
            $this->name=$name;
            $this->assid=$assid;
            $this-> time = time();  
            $this->db->insert('logs1', $this);
            //$this->db->query("INSERT INTO notificatioin_msg (msg,assid) VALUES('$message','$assid')");
            $this->db->query("INSERT INTO notificatioin_msg12 (msg,assid) VALUES('$message','$assid')");
            $this->db->query("UPDATE `notificatioin_msg12` SET `$contid12`='2' WHERE msg='$message'");
            
           }
      function  getallsuperchatmessages($newid){             

                   
                   $query = $this->db->query("SELECT * FROM `logs1` WHERE assid='$newid' ORDER BY id DESC ");
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
    function Count_messages1($newid,$contid12){
                 $query=$this->db->query("SELECT  msg FROM `notificatioin_msg12` WHERE `assid`='$newid' AND `$contid12`='1'");
                                  return $query->num_rows();
                           }
                           
    function newinsertdata($abcds,$i,$a,$assignmentno,$contid12)
    {
        $new_name = $this->db->escape_str($abcds);
        $this->db->query("INSERT INTO `ans`(`id`, `contactid`, `question`, `assignmentno`, `answer`, `change_text`) VALUES ('','$contid12','$a','$assignmentno','$new_name','0')");
    }
    
    function counterdata($contid12,$id)
    {
         $query=$this->db->query("SELECT  * FROM `ans` WHERE `contactid`='$contid12' AND `assignmentno`='$id'");
                                  return $query->num_rows();
    }
    function newupdatedata($textbox,$i,$a,$assignmentno,$contid12)
    {
        $new_name = $this->db->escape_str($textbox);
         $this->db->query("UPDATE `ans` SET  `answer` =  '$new_name' WHERE contactid ='$contid12' AND question='$a' AND assignmentno='$assignmentno'");
    }
    function submittednew($contid12,$assignmentno)
    {
        $filename='';
        $NewDate=Date('Y:m:d', strtotime("+20 days"));
        $this->db->query("INSERT INTO `submitted1` VALUES ('','$contid12','$assignmentno','1','')");
        $this->db->query("INSERT INTO `2_submission1` VALUES ('','$contid12','$assignmentno','$filename','$NewDate')");
    }
    function submittednews($contid12,$assignmentno)
    {
        $filename='';
        $NewDate=Date('Y:m:d', strtotime("+20 days"));
        $this->db->query("INSERT INTO `submitted1` VALUES ('','$contid12','$assignmentno','1','1')");
        $this->db->query("INSERT INTO `2_submission1` VALUES ('','$contid12','$assignmentno','$filename','$NewDate')");
    }
   function counterquestiondata($assignmentno)
    {
        
       $query = $this->db->query("SELECT  * FROM `question` WHERE `aid`='$assignmentno'");
        $result=$query->result();
                   return $result;
    }
     function submittedcount($contid12,$id)
    {
        $query=$this->db->query("SELECT  * FROM `submitted1` WHERE `contact_id`='$contid12' AND `assignment_no`='$id'");
                                  return $query->num_rows();
        
    }
    function getassigmentsubsuperdate($assignmentno,$contactid){
                           $query=$this->db->query("SELECT * FROM `locked1` WHERE  `assignment_no`='$assignmentno' and contact_id='$contactid'");
                                  
                                   return $query->row()->subdate;
                                              }
    /* uploading Super form submition */
      
         function  uploadsuperSubmit($assignmentno,$filename,$checkover)
                  {
                         //echo "this is called";
                        $contactid = $_SESSION['contid'];
		        $assignment =$assignmentno ;
		        //$record ="2_record";
		       // $submission ="2_submission";
		        $assignmentno1=$assignmentno+1;
		        $update = date('Y:m:d');
		      $NewDate=Date('Y:m:d', strtotime("+14 days"));
					$lockeDate=Date('Y:m:d', strtotime("+7 days"));
		      $aid1 = "a".$assignmentno;

		         
		     $query1 = $this->db->query("INSERT INTO `2_submission1` VALUES ('','$contactid','$assignmentno','$filename','$update')");
             
		     //$query2 = $this->db->query("update `2_record` set `$aid1` = '$contactid' WHERE `contactid` = '$contactid'"); 
                     $query3 = $this->db->query("SELECT * FROM `submitted1` WHERE contact_id = '$contactid' and assignment_no = '$assignmentno' ");
                     $query4 = $this->db->query("SELECT * FROM `submitted1`");
                    
                   
		        //$row=num_row($query3);
		        
		        $row=$query3->num_rows();

		      

                        if($row>0){
                                     
                   $this->db->query("update `submitted1` set `status` = '1' WHERE `contact_id` = '$contactid' and `assignment_no`='$assignmentno'");  
                                 
                                 }else{

                                  $this->db->query("INSERT INTO `submitted1` VALUES ('','$contactid','$assignmentno','1','')");
                                  $abbc=$assignmentno+1;
                                  //$this->db->query("INSERT INTO `locked` VALUES ('','$contactid','$abbc','$NewDate','$lockeDate')");
                                   //$this->db->query("INSERT INTO `subdate` VALUES ('','$abbc','$contactid','$NewDate')");
                                 }
		  
             if($checkover==1){
                       $this->db->query("UPDATE `submitted1` SET `overdue`='1' WHERE `assignment_no`='$assignmentno' AND `contact_id`='$contactid' ");
                                 }


                        if( $query1){

                                    return true;

                              }else{
                               
                                   return false;
                              }
                       // $result = "Assignment Solution Submitted successfully";
		    
                        
                  }
                  
     function subqtitle()
    {
        $query=$this->db->query("SELECT  * FROM `subtitle`");
                                  return $query->result();
    }
    function subquestion()
    {
        $query=$this->db->query("SELECT  * FROM `subquestion`");
                                  return $query->result();
    }
    function subans($contactid)
    {
        $query=$this->db->query("SELECT  * FROM `squesans` WHERE contactid='$contactid'");
                                  return $query->result();
    }
    function countersdata($contid12,$id)
    {
        $query=$this->db->query("SELECT  * FROM `squesans` WHERE `contactid`='$contid12'");
                                  return $query->num_rows();
    }
    function newupdatedatas($textbox,$i,$a,$assignmentno,$contid12)
    {
        $new_name = $this->db->escape_str($textbox);
         $this->db->query("UPDATE `squesans` SET `answer`='$new_name' WHERE `contactid`='$contid12' AND `mqid`='$i' AND `sqid`='$a'");
    }
    function newinsertdatas($abcds,$i,$a,$assignmentno,$contid12)
    {
        $new_name = $this->db->escape_str($abcds);
        $this->db->query("INSERT INTO `squesans`(`id`, `contactid`, `mqid`, `sqid`, `answer`) VALUES ('','$contid12','$i','$a','$new_name')");
    }
   
 }