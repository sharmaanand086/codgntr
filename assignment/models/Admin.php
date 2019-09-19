<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');	


class admin extends CI_Model 
 {      
        function create_pdf($htmlcontent,$for_upload=false,$new_file="saffmple.pdf",$title=null,$myans,$myassignmentname,$getusername){ 

            include(APPPATH."third_party/dompdf/autoload.inc.php");
            
            $dompdf=new Dompdf\Dompdf();
            
            $dompdf->load_html($this->make_pdf_fullhtml($htmlcontent,$title,$myans,$myassignmentname,$getusername));
            //and getting rend
            $dompdf->render(); 
            
            $file_to_save = $contid12;
            
            $upload_path = './uploads/sendpdf/'.$new_file.'_Assignment_'.$title.'.pdf';
            
            //save the pdf file on the server
            file_put_contents($upload_path, $dompdf->output());
            
            if($for_upload){
            file_put_contents($new_file.".pdf",$dompdf->output()); 
            }else{
            $dompdf->stream($new_file,array('Attachment'=>0)); 
             
            }
}
function myassignmentname($ass)
{
    $query=$this->db->query("SELECT  * FROM `2_assignment1` WHERE `aid`='$ass'");
                                  return $query->result();
    
}
function getusername($id)
{
    $query = $this->db->query("SELECT * FROM  `2_user` WHERE contactid = '$id'");
                                       return  $query->result();
    
}
function make_pdf_fullhtml($html_content,$title=null,$myans,$myassignmentname,$getusername){
/*
and i will create a view. i will load here

now i will send parameter contenet and if i want title also.
*/ 
 
return $this->load->view("admin/pdfview",array('html_content'=>$html_content,'title'=>$title,'myans'=>$myans,'myassignmentname'=>$myassignmentname,'getusername'=>$getusername),true);
// yes when load view i give 3th parameter is true. because i dont want load. i wanna only result of this view.

} 

     
              /*-----------------------------inert own msg ----------------------*/
              
              function setmsg($toid,$fromid,$msg){
                               
                                $this->db->query("INSERT INTO `ownchat` VALUES ('','$toid','$fromid','$msg','1')");
                                       // return  $query->result();
                           } 
                           
                           function  getallownchatmessages(){             

                   
                   $query = $this->db->query("SELECT * FROM `ownchat` ORDER BY id DESC ");
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
             
             
             function getallcountmsg($contactid){
                           $query=$this->db->query("SELECT * FROM `ownchat` WHERE `toid`='$contactid' AND `readmsg`='1' ");
                                  return $query->num_rows();
                                              }

              
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
               function getassignmentdetailss($id,$contid12){
                 $query=$this->db->query("SELECT  * FROM `2_assignment1` WHERE `aid`='$id'");
                                  return $query->result();
                           }             
              function getpdfquestion($id){
                 $query=$this->db->query("SELECT  * FROM `question` WHERE `aid`='$id'");
                                  return $query->result();
                           } 
                           function getpdfanswer($id,$contid12){
                 $query=$this->db->query("SELECT  * FROM `ans` WHERE `contactid `='$contid12' AND `assignmentno`='$id'");
                                  return $query->result();
                           } 
           /*--------------------------------Count for Notification ---------------*/
              function Count_message1($newid,$contid12){
                 $query=$this->db->query("SELECT  msg FROM `notificatioin_msg` WHERE `assid`='$newid' AND `$contid12`='1'");
                                  return $query->num_rows();
                           } 
              function Count_messagesssss1($newid,$contid12){
                 $query=$this->db->query("SELECT  msg FROM `notificatioin_msg12` WHERE `assid`='$newid' AND `$contid12`='1'");
                                  return $query->num_rows();
                           } 
             function Count_message123($newid,$contid12){
                 $this->db->query("UPDATE `notificatioin_msg` SET `$contid12`= '2' WHERE `assid`= '$newid'");
                                  
                           } 
               function getcheck()
  {
$query = $this->db->query("SELECT * FROM `checked_assignment`");
return  $query->result();
  }  
               function getsupercheck()
  {
$query = $this->db->query("SELECT * FROM `checked_assignment1`");
return  $query->result();
  }
  
             function Count_messagessss123($newid,$contid12){
                 $this->db->query("UPDATE `notificatioin_msg12` SET `$contid12`= '2' WHERE `assid`= '$newid'");
                                  
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
                 function getassignemntsnoss(){
                
                   $query = $this->db->query("SELECT * FROM `2_assignment1`");
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
       function  getallchatmessagesss($newid){             

                   
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
             
    function pdfquestion($ass)
    {
        
        $query=$this->db->query("SELECT  * FROM `question` WHERE `aid`='$ass'");
                                  return $query->result();
    }
    function pdfans($ass,$c)
    {
        
         $query=$this->db->query("SELECT  * FROM `ans` WHERE `contactid`='$c' AND `assignmentno`='$ass'");
                                  return $query->result();
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
	
	public function uploadAssignment1($ufile,$fname,$udate,$subdate,$cid,$description)
	{
		$assignment = $cid."_assignment1";
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
		//$query1 = $this->db->query("ALTER TABLE `$record` ADD `$aid1` INT( 11 ) NOT NULL DEFAULT  '0'");
		$result = $aid;
	        return $result;
	}
	
	/*-------------------------------Upload question into question table in database ---------------------*/
	
	public function uploadAssignmentquestion($aid_no,$qu,$row)
	{
	$assignment = "question";
		$question= $this->db->escape_str($row);
               

		$sp="a".$aid_no."".$qu;

		$query = $this->db->query("SHOW TABLE STATUS LIKE '$assignment'");
		foreach ($query->result() as $row)
		{
			$qid1= $row->Auto_increment;
		}
		
		
		$query = $this->db->query("INSERT INTO `question` VALUES ('','$aid_no','$qu','$question','$sp')");

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
                
                   $query = $this->db->query("SELECT * FROM `2_assignment`");
                  return $query->result();
            
       }
       public function getassignemntsss(){
                
                   $query = $this->db->query("SELECT * FROM `2_assignment1`");
                  return $query->result();
            
       }
       public function getquestion(){
                
                   $query = $this->db->query("SELECT * FROM `question`");
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
           
           function insert_message12221($message,$name,$assid,$contid12)
          {
            $this->msg =$message;
            $this->name=$name;
            $this->assid=$assid;
            $this-> time = time();  
            $this->db->insert('logs1', $this);
            //$this->db->query("INSERT INTO `notification_msg` VALUES ('$message','$assid')");
            //$this->db->insert('notification_msg',$this);
            $this->db->query("INSERT INTO `notificatioin_msg12` (msg,assid,`$contid12`) VALUES ('$message','$assid','2')");
           }
       function insert_message123($msg,$assid)
          {
            //$this->db->query("INSERT INTO `notificatioin_msg` (msg,assid) VALUES ('$msg','$assid')");
           }


 /*----------------------------Super Assignment------------------------------------------*/
    
    public function uploadAssignment12($ufile,$fname,$udate,$subdate,$cid,$description)
	{
		$assignment = $cid."_assignment1";
		//$record = $cid."_record";
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
		//$query1 = $this->db->query("ALTER TABLE `$record` ADD `$aid1` INT( 11 ) NOT NULL DEFAULT  '0'");
		$result = $aid;
	        return $result;
	}

  public function uploadAssignment23($ufile,$fname,$udate,$subdate,$cid,$description)
	{
		$assignment = $cid."_assignment1";
		//$record = $cid."_record";
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
		//$query1 = $this->db->query("ALTER TABLE `$record` ADD `$aid1` INT( 11 ) NOT NULL DEFAULT  '0'");
		$result = "Assignment Uploaded Successfully";
	        return $result;
	}
	
	
	 public function getassignemnts1(){
                
                   $query = $this->db->query("SELECT * FROM `2_assignment1` ORDER BY aid DESC");
                  return $query->result();
            
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



public function uuploadAssignment111($ufile,$fname,$udate,$subdate,$cid,$description,$id)
	{
		$assignment = $cid."_assignment1";
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
		$query = $this->db->query("UPDATE `2_assignment1` SET `file`='$ufile',`name`='$new_title',`discription`=' $new_name',`udate`='$udate',`subdate`='$subdate' WHERE `aid`='$id' ");
              //  $query = $this->db->query("INSERT INTO `$assignment` VALUES ($aid,'$ufile','$fname','$description','$udate','$subdate')");
	      //$query1 = $this->db->query("ALTER TABLE `$record` ADD `$aid1` INT( 11 ) NOT NULL DEFAULT  '0'");
		$result = "Assignment Uploaded Successfully";
	        return $result;
	}
	 public function uuploadAssignment121($fname,$udate,$subdate,$cid,$description,$id)
	{
		$assignment = $cid."_assignment1";
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
		$query = $this->db->query("UPDATE `2_assignment1` SET `name`='$new_title',`discription`=' $new_name',`udate`='$udate',`subdate`='$subdate' WHERE `aid`='$id' ");
              //  $query = $this->db->query("INSERT INTO `$assignment` VALUES ($aid,'$ufile','$fname','$description','$udate','$subdate')");
	      //$query1 = $this->db->query("ALTER TABLE `$record` ADD `$aid1` INT( 11 ) NOT NULL DEFAULT  '0'");
		$result = "Assignment Uploaded Successfully";
	        return $result;
	}
function getviewss1(){
              // $query = $this->db->query("SELECT  `contactid`,`sid`,`file`,`aid`,MAX( sid ) AS LastID FROM 2_submission GROUP BY  `contactid` ,  `aid` ");
$query = $this->db->query("SELECT * FROM `2_submission1` WHERE `sid` IN ( SELECT MAX( sid ) AS LastID FROM `2_submission1`  GROUP BY `contactid`,`aid`)");                                            
                                         return  $query->result();
                                   }
            function myanswers_question($contacts_id,$assignments_myid)
  {
$query = $this->db->query("SELECT * FROM `ans` WHERE contactid='$contacts_id' and assignmentno='$assignments_myid' ORDER BY id ASC");
return  $query->result();
//var_dump(result);
  }
     function my_question($assignments_myid)
  {
$query = $this->db->query("SELECT * FROM `question` WHERE aid='$assignments_myid' ORDER BY id ASC");
return  $query->result();
//var_dump(result);
  }                       
                                   
                                   
             function number_rows($toid, $assignment_myid)
{
 $query=$this->db->query("SELECT * FROM `checked_assignment` WHERE mycontact_id='$toid' AND myassign_id='$assignment_myid' ");
                         return  $query->num_rows();
}

   function insert_mymailstatus($toid, $assignment_myid,$msgstatus)
{
  //echo $msgstatus;
 $this->db->query("INSERT INTO `checked_assignment` VALUES ('','$toid','$assignment_myid','$msgstatus')");
                                       // return  $query->result();
}

  function update_mymailstatus($toid, $assignment_myid,$msgstatus)
{
  //echo $msgstatus;
 $this->db->query("UPDATE `checked_assignment` SET `check_status`='1' WHERE mycontact_id='$toid' AND myassign_id='$assignment_myid' ");
                                       // return  $query->result();
}
                                   
                                   function getmyassignment_name($assignment_myid){
                 $query=$this->db->query("SELECT  name FROM `2_assignment` WHERE `aid`='$assignment_myid'");
                                  return $query->result();
                           } 
                           
                           
                           function  emailid($id){             

                   
                   $user="2_user";
                                      $query = $this->db->query("SELECT username FROM  $user WHERE contactid = '$id'");
                                       return  $query->result();
                   
             }
             
              function insert_mymailstatusss($toid, $assignment_myid)
{
 $this->db->query("UPDATE `checked_assignment` SET `check_status`='0' WHERE mycontact_id='$toid' AND myassign_id='$assignment_myid' ");
                                       // return  $query->result();
}
     function my_name($assignments_myid)
  {
$query = $this->db->query("SELECT * FROM `2_user` WHERE contactid='$assignments_myid'");
return  $query->result();
//var_dump(result);
  }    
   function my_assignment_name($assignments_name){
                               $user="2_assignment1";
                               $query = $this->db->query("SELECT * FROM  $user WHERE aid='$assignments_name'");
                                        return  $query->result();
   }
   
    function number_superrows($toid, $assignment_myid)
{
 $query=$this->db->query("SELECT * FROM `checked_assignment1` WHERE mycontact_id='$toid' AND myassign_id='$assignment_myid' ");
                         return  $query->num_rows();
}
     function insert_supermymailstatus($toid, $assignment_myid,$msgstatus)
{
  //echo $msgstatus;
 $this->db->query("INSERT INTO `checked_assignment1` VALUES ('','$toid','$assignment_myid','$msgstatus')");
                                       // return  $query->result();
}
  function update_supermymailstatus($toid, $assignment_myid,$msgstatus)
{
  //echo $msgstatus;
 $this->db->query("UPDATE `checked_assignment1` SET `check_status`='1' WHERE mycontact_id='$toid' AND myassign_id='$assignment_myid' ");
                                       // return  $query->result();
}
function getmyassignment_supername($assignment_myid){
                 $query=$this->db->query("SELECT  name FROM `2_assignment1` WHERE `aid`='$assignment_myid'");
                                  return $query->result();
                           } 
  
function reanswerquestion($msg, $assno,$id,$qno)
{
    $this->db->query("UPDATE `ans` SET `answer`='$msg',`change_text`=1 WHERE `contactid`='$id' AND `assignmentno`='$assno' AND `question`='$qno' ");
    
}
                     
             
         }
   
    

?>