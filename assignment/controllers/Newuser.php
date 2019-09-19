<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class newuser extends CI_Controller 
{
     /* ------------this is cunstruct----------*/
      public function __construct() 
	     {
		parent::__construct();
		$this->load->model('user');
	  $ch = curl_init();
	    }
      
      public function index()
             {
                $this->load->view('newlogin');
               // $this->load->view('maintainence');
             }
             
              public function index1()
             {
                $this->load->view('maintainence');
             }
             public function tandc()
             {
                $this->load->view('terms');
             }

 public function super_assignment()
             {
$contactid=$_SESSION["contid"];
 $seenassign=$this->user->getseenassignment($contactid);
                  $totalassignment=$this->user->getnoofAssignment();
$batchno1=$this->user->getnoofbatch1($contactid);
                  $batchno2=$this->user->getnoofbatch($contactid);
                  $batchno=$batchno1+$batchno2;
$noofnewassignemts= $totalassignment-$seenassign;
                $this->load->view('super',['noofnewassignemts'=>$noofnewassignemts,'batchno'=>$batchno]);
             }
       
 public function first_time()
             {
                $contactid=$_SESSION["contid"];
                $this->user->addforchat($contactid);                                     
                $this->user->updatefirsttime($contactid);

             }
/*-------------------------------------This is for tooltip next-------------------------------------------*/

          public function nexttooltip(){
            if($this->session->userdata('contid'))
                {
                      $id=$_SESSION["contid"];
                   //var_dump($id);
                    $this->user->nexttooltipmodal($id);
                     
                 }else{
                       
                          $this->logout();
                    }   
                 }
           
          public function nexttooltip12(){
            if($this->session->userdata('contid'))
                {
                      $id=$_SESSION["contid"];
                   //var_dump($id);
                    $this->user->updatetooltip($id);
                     
                 }else{
                       
                          $this->logout();
                    }   
                 }

/*-------------------------------------This is for tooltip-------------------------------------------*/
         public function comchangetooltip(){
 if($this->session->userdata('contid'))
                {
                  $id=$_SESSION["contid"];
                   //var_dump($id);
                    $this->user->changetooltip($id);
                     
                 }else{
                       
                          $this->logout();
                    }   
                     }
 public function comchangetooltip1(){
 if($this->session->userdata('contid'))
                {
                  $id=$_SESSION["contid"];
                   var_dump($id);
                    $this->user->changetooltip1($id);
                     
                 }else{
                       
                          $this->logout();
                    }   
                     } 
public function comchangetooltip2(){
 if($this->session->userdata('contid'))
                {
                  $id=$_SESSION["contid"];
                   //var_dump($id);
                    $this->user->changetooltip2($id);
                     
                 }else{
                       
                          $this->logout();
                    }   
                     }
        


   /*-------------------------------------This is for chat application-------------------------------------------*/
         public function chat(){
               if($this->session->userdata('contid'))
                {
                     $message = $_POST['msg'];
                     $contid12=$_SESSION["contid"];
                     $this->user->insert_message12($_POST['msg'],$_POST['name'],$_POST['id'],$contid12);
                     //$this->user->insert_message123($_POST['msg'],$_POST['id'],$contid12);
                    
                    }else{
                       
                          $this->logout();
                    }   
                    
                           
               }
         public function chat_message(){
              if($this->session->userdata('contid'))
                {
                         $newid=$_POST['id'];
                        $allmessage=$this->user->getallchatmessages($newid);
                        $id=$_SESSION["contid"];
                        $uname=$_POST['name'];
                        //$name=$this->admin->getname($id);
                         foreach($allmessage as $row){
                                         $name=$row->name;
                                      if($uname==$name){
                              
echo "<li class='col-md-12 wrapp-comments'>  <div class='col-md-2 post-info'><h1 style='color:#d3b730'>".$row->name."</h1></div><div class='col-md-9 entry-content'><p>".$row->msg. "</p></div></li>";

                               
                                          }else{
                                          echo "<li class='col-md-12 wrapp-comments'><div class='col-md-2 post-info'><h1>".$row->name."</h1></div><div class='col-md-9 entry-content'><p>".$row->msg. "</p></div></li>";
                                      }
                                       
                                  }
                        
                       }else{
                       
                          $this->logout();
                    }   
                    
               }
     /*--------------this is for Notification Message----------*/

         public function  Notification_message(){

if($this->session->userdata('contid'))
                {

                         $newid=$_POST['id'];
                         $contid12=$_SESSION["contid"];
                         $this->user->Update_message1($newid,$contid12);
                 }else{
                       
                          $this->logout();
                    }  
                       
  }
     /*--------------this is for Notification Message----------*/

         public function  Notification_Count(){

                   if($this->session->userdata('contid'))
                {

                         $newid=$_POST['id'];
                         $contid12=$_SESSION["contid"];
                         $counter=$this->user->Count_message1($newid,$contid12);
                         
                          echo "$counter";

 }else{
                       
                          $this->logout();
                    }  
                        
                         }

     /*--------------this is for urgent complete and overdue----------*/
           
         
           
         public function complete()
           {
                if($this->session->userdata('contid'))
                {  
                  $contactid= $_SESSION['contid'];
                  $assignment=$this->user->getAssignment();
                  $records=$this->user->getrecords($contactid);
                  $complete=$this->user->getsubmitted($contactid);
                  $overdue=$this->user->getoverdueassignment($contactid);
                  $submitted=$this->user->getviewss($contactid);
                  $noofassignment=$this->user->getcounttooltip($contactid);
                  $nnoofassignment=$this->user->getnoofAssignment();
                  $nnoofassignment1=$this->user->getnoofAssignment1();
                  $name=$this->user->getname($contactid);
                  $seenassign=$this->user->getseenassignment($contactid);
                  $totalassignment=$this->user->getnoofAssignment();
                  $checktooltip=$this->user->gettooltip($contactid);
                   $checktooltip1=$this->user->gettooltip1($contactid);
                   $checktooltip2=$this->user->gettooltip2($contactid);
                  $noofnewassignemts= $totalassignment-$seenassign;
                  $this->user->updateseenassignment($contactid,$totalassignment);
                  $filesize=0;
                  $assignmentno=0;
                  $batchno1=$this->user->getnoofbatch1($contactid);
                  $batchno2=$this->user->getnoofbatch($contactid);
                  $batchno=$batchno1+$batchno2;
 $this->load->view('complete',['assignment'=>$assignment,'records'=>$records,'complete'=>$complete,'filesize'=>$filesize,'assignmentno'=>$assignmentno,'overdue'=>$overdue,'name'=>$name,'noofassignment'=> $noofassignment,'batchno'=>$batchno,'submitted'=>$submitted,'nnoofassignment'=>$nnoofassignment,'noofnewassignemts'=>$noofnewassignemts,'nnoofassignment1'=>$nnoofassignment1,'checktooltip'=>$checktooltip,'checktooltip1'=>$checktooltip1,'checktooltip2'=>$checktooltip2]);
               }else{
                       
                          $this->logout();
                    }
           }

          public function urgent()
           {
                if($this->session->userdata('contid'))
                {  
                  $contactid=$_SESSION['contid'];
                  $assignment=$this->user->getAssignment();
                  $complete=$this->user->getsubmitted($contactid);
                  $noofassignment=$this->user->getnoofAssignment();
                  $batchno1=$this->user->getnoofbatch1($contactid);
                  $batchno2=$this->user->getnoofbatch($contactid);
                  $batchno=$batchno1+$batchno2;
                  $seenassign=$this->user->getseenassignment($contactid);
                  $totalassignment=$this->user->getnoofAssignment();
                  $noofnewassignemts= $totalassignment-$seenassign;
                  $locked=$this->user->getlocked($contactid);
                   $urgent_locked=$this->user->urgent_locked($contactid);
                  $this->user->updateseenassignment($contactid,$totalassignment);
                  $this->load->view('urgent',['assignment'=>$assignment,'complete'=>$complete,'noofassignment'=>$noofassignment,'batchno'=>$batchno,'locked'=>$locked,'noofnewassignemts'=>$noofnewassignemts,'urgent_locked'=>$urgent_locked]);
                 }else{
                       
                         $this->logout();
                    } 
           }
  
         public function overdue()
          {
               if($this->session->userdata('contid'))
                {  
                  $contactid= $_SESSION['contid'];
                  $assignment=$this->user->getAssignment();
                  $records=$this->user->getrecords($contactid);
                  $overdue=$this->user->getoverdue($contactid);
                  $noofoverdue=$this->user->getnoofoverdue($contactid);
                  $complete=$this->user->getsubmitted($contactid);
                   $batchno1=$this->user->getnoofbatch1($contactid);
                  $batchno2=$this->user->getnoofbatch($contactid);
                  $batchno=$batchno1+$batchno2;
                  $seenassign=$this->user->getseenassignment($contactid);
                  $totalassignment=$this->user->getnoofAssignment();
                  $noofnewassignemts= $totalassignment-$seenassign;
                  $this->user->updateseenassignment($contactid,$totalassignment);
                  $this->load->view('overdue',['assignment'=>$assignment,'records'=>$records,'complete'=>$complete,'overdue'=>$overdue,'noofoverdue'=>$noofoverdue,'batchno'=> $batchno,'noofnewassignemts'=>$noofnewassignemts]);
                }else{
                       
                         $this->logout();
                    } 
          }
          
  
     /* ------------this is login page.----------*/
        public function login()
          {
                  $username=$this->input->post('email');
                  $password=$this->input->post('password');
                    //  var_dump($username);
                  $this->form_validation->set_rules('email', 'UserName', 'trim|required');
                  $this->form_validation->set_rules('password', 'Password', 'trim|required');  
                  $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');  
                 
 if ($this->form_validation->run())
                {
                  $output=$this->user->newgetUser($username, $password);
                  $Emailoutput=$this->user->checkemail($username);
               
                     if( $output>0){
                       
                   $fisttime=$this->user->getfirsttime($output);
                  
                  $noofassignment=$this->user->getcounttooltip($output);
                  $sessiondata = array('contid' =>$output,'firsttime'=>$fisttime);
                  $this->session->set_userdata($sessiondata); 
                  $contactid=$_SESSION['contid'];
                  
                  $batchno=$this->user->getnoofbatch($contactid);
                                  
                                  if($fisttime==0){
                                      //var_dump($fisttime);
                                     //echo "this is called ";exit;
                                       //$this->user->addforchat($contactid);
                                     
                                       $this->user->updatefirsttime($contactid);
                                       $seenassign=$this->user->getseenassignment($contactid);
                                       $totalassignment=$this->user->getnoofAssignment();
                                       $noofnewassignemts= $totalassignment-$seenassign;
                                       $this->user->updateseenassignment($contactid,$totalassignment);
                                       $this->load->view('dashboard',['batchno'=>$batchno,'noofnewassignemts'=>$noofnewassignemts]); 
                                       }else{
                                      // $this->load->view('maintainence');
                                         $this->assignments();
                                       }
                                   
                                  }else{
                                           if($Emailoutput>0){
                                                               $this->session->set_flashdata('usermsg', 'Invalid username and password!');
                                                               $this->load->view('newlogin'); 
                                                             }else{
                                                                   $this->session->set_flashdata('usermsg', 'Email Id does not exist !');
                                                                   $this->load->view('newlogin'); 
                                                             }
                                       
                                        
                                  }
                       
                 }else{
                        $this->session->set_flashdata('usermsg', '');
                        $this->load->view('newlogin'); 
                    }
                  
                 
                
           }
            
            // public function getsession($session)
            // {
                
            //     $sessiondata = array('contid' =>$session);
            //       $this->session->set_userdata($sessiondata);
            //     $this->assignments();
            //     // var_dump($_SESSION['contid']);
            // }
        /*-----------------------this is assignments ---------------------*/
         public function assignments()
         {

              if($this->session->userdata('contid'))
                {  
                    // var_dump($_SESSION['contid']);
             $contactid= $_SESSION['contid'];
             $assignment=$this->user->getAssignment();
             $noofassignment=$this->user->getnoofAssignment();
             $batchno2=$this->user->getnoofbatch1($contactid);
                  $batchno1=$this->user->getnoofbatch($contactid);
                  $batchno=$batchno1+$batchno2;
                  
             $assignmentno=0;$filesize=0;
             $complete=$this->user->getsubmitted($contactid);
             $locked=$this->user->getlocked($contactid);
             $seenassign=$this->user->getseenassignment($contactid);
             $totalassignment=$this->user->getnoofAssignment();
             $overdue=$this->user->getnewoverdueassignment($contactid);
             $overdue_new=$this->user->getoverdue($contactid);
             $counit=$this->user->getcounit1($contactid);
             $name=$this->user->getname($contactid);
            $checktooltip1=$this->user->gettooltip1($contactid);
                  $checktooltip2=$this->user->gettooltip2($contactid);
              $checktooltip3=$this->user->gettooltip3($contactid);
             $nnoofassignment1=$this->user->getnoofAssignment1();
             $noofnewassignemts= $totalassignment-$seenassign;
             $this->user->updateseenassignment($contactid,$totalassignment);
             $this->load->view('latest',['assignment'=>$assignment,'assignmentno'=>$assignmentno,'filesize'=>$filesize,'noofassignment'=>$noofassignment,'batchno'=>$batchno,'complete'=>$complete,'noofnewassignemts'=>$noofnewassignemts,'overdue'=>$overdue,'counit'=>$counit,'batchno1'=>$batchno1,'locked'=>$locked,'overdue_new'=>$overdue_new,'name'=>$name,'nnoofassignment1'=>$nnoofassignment1,'checktooltip1'=>$checktooltip1,'checktooltip2'=>$checktooltip2,'checktooltip3'=>$checktooltip3]);
              }
              else{
                       
                         $this->logout();                   
                  } 
     
         }
       
         public function assignmnets($assignmentno,$filesize)
          {
               if($this->session->userdata('contid'))
                { 
               $assignment=$this->user->getAssignment();
               $contactid= $_SESSION['contid'];
               $noofassignment=$this->user->getnoofAssignment();
                $batchno2=$this->user->getnoofbatch1($contactid);
                  $batchno1=$this->user->getnoofbatch($contactid);
                  $batchno=$batchno1+$batchno2;
                  $locked=$this->user->getlocked($contactid);
                 $counit=$this->user->getcounit($assignmentno,$contactid);
               $complete=$this->user->getsubmitted($contactid);
               $overdue=$this->user->getnewoverdueassignment($contactid);
               $overdue_new=$this->user->getoverdue($contactid);
               $seenassign=$this->user->getseenassignment($contactid);
               $totalassignment=$this->user->getnoofAssignment();
               $name=$this->user->getname($contactid);
               $checktooltip1=$this->user->gettooltip1($contactid);
                  $checktooltip2=$this->user->gettooltip2($contactid);
                 $checktooltip3=$this->user->gettooltip3($contactid);
               $nnoofassignment1=$this->user->getnoofAssignment1();
               $noofnewassignemts= $totalassignment-$seenassign;
               $this->user->updateseenassignment($contactid,$totalassignment);
               $this->load->view('latest',['assignment'=>$assignment,'assignmentno'=>$assignmentno,'filesize'=>$filesize,'noofassignment'=>$noofassignment,'batchno'=> $batchno,'complete'=>$complete,'noofnewassignemts'=>$noofnewassignemts,'counit'=>$counit,'locked'=>$locked,'overdue'=>$overdue,'batchno1'=>$batchno1,'overdue_new'=>$overdue_new,'name'=>$name,'nnoofassignment1'=>$nnoofassignment1,'checktooltip1'=>$checktooltip1,'checktooltip2'=>$checktooltip2,'checktooltip3'=>$checktooltip3]);
                }else{
                       
                         $this->logout();
                    } 
               
          }

        public function editassignments($assignmentno,$filesize)
           {
                if($this->session->userdata('contid'))
                {    
                  $contactid= $_SESSION['contid'];
                  $assignment=$this->user->getAssignment();
                  $records=$this->user->getrecords($contactid);
                  $complete=$this->user->getsubmitted($contactid);
                  $overdue=$this->user->getoverdueassignment($contactid);
                  $noofassignment=$this->user->getcounttooltip($contactid);
                  $nnoofassignment=$this->user->getnoofAssignment();
                  $nnoofassignment1=$this->user->getnoofAssignment1();
                  $batchno1=$this->user->getnoofbatch1($contactid);
                  $batchno2=$this->user->getnoofbatch($contactid);
                  $batchno=$batchno1+$batchno2;
                  $submitted=$this->user->getviewss($contactid);
                  $name=$this->user->getname($contactid);
                  $checktooltip=$this->user->gettooltip($contactid);
                  $checktooltip1=$this->user->gettooltip1($contactid);
                  $checktooltip2=$this->user->gettooltip2($contactid);
                  $seenassign=$this->user->getseenassignment($contactid);
                  $totalassignment=$this->user->getnoofAssignment();
                  $noofnewassignemts= $totalassignment-$seenassign;
                  $this->user->updateseenassignment($contactid,$totalassignment);
$this->load->view('complete',['assignment'=>$assignment,'records'=>$records,'complete'=>$complete,'assignmentno'=>$assignmentno,'filesize'=>$filesize,'overdue'=>$overdue,'name'=>$name,'noofassignment'=>$noofassignment,'batchno'=>$batchno,'submitted'=>$submitted,'nnoofassignment'=>$nnoofassignment,'noofnewassignemts'=> $noofnewassignemts,'checktooltip'=>$checktooltip,'checktooltip1'=>$checktooltip1,'checktooltip2'=>$checktooltip2,'nnoofassignment1'=>$nnoofassignment1]);
                  }else{
                       
                          $this->logout();
                    } 
               
                   
           }

          public function overdueassignments($assignmentno,$filesize)
          {
               if($this->session->userdata('contid'))
                {  
                  $contactid= $_SESSION['contid'];
                  $assignment=$this->user->getAssignment();
                  $records=$this->user->getrecords($contactid);
                  $overdue=$this->user->getoverdue($contactid);
                  $noofoverdue=$this->user->getnoofoverdue($contactid);
                  $complete=$this->user->getsubmitted($contactid);
                  $batchno1=$this->user->getnoofbatch1($contactid);
                  $batchno2=$this->user->getnoofbatch($contactid);
                  $batchno=$batchno1+$batchno2;
                  $seenassign=$this->user->getseenassignment($contactid);
                  $totalassignment=$this->user->getnoofAssignment();
                  $noofnewassignemts= $totalassignment-$seenassign;
                  $this->user->updateseenassignment($contactid,$totalassignment);
                  $this->load->view('overdue',['assignment'=>$assignment,'records'=>$records,'complete'=>$complete,'overdue'=>$overdue,'assignmentno'=>$assignmentno,'filesize'=>$filesize,'noofoverdue'=>$noofoverdue,'batchno'=>$batchno,'noofnewassignemts'=>$noofnewassignemts]);
               }else{
                       
                          $this->logout();
                    } 
          }
       
         
          /*-------------------------this is upload assignment-------------------------------------------*/
             public function uploadsolution($assignmentno){
                 
                      if($this->session->userdata('contid'))
                           {  
                                $contactid= $_SESSION['contid'];
                                $asssubdate=$this->user->getassigmentsubdate($assignmentno,$contactid);
                                $date=date("Y-m-d");
                                if($date>$asssubdate){
                                      //echo "condition satisfied!!!!";
                                       $checkover=1;
                                    }else{
                                         $checkover=0;
                                    }
                               
                                $temp = explode(".",$_FILES["solutionfile"]["name"]);
                                $table="2_submission";
				$extension = end($temp);
				
                                $file = $_FILES['solutionfile'];
                                $filesize=$file['size'];
                                
                                $chtokb=1048576;
                                
                                
                                $upload_path = "./uploads/".$table.'/';
                                $nameofuser=$this->user->getnameofuser($contactid);
                                $nameof;
                                
                                foreach($nameofuser as $rowname)
                                {
                                $nameof=$rowname->name;
                                }
                                //var_dump($nameofuser);
                                $filename = $nameof."_"."".$assignmentno.".".$extension;
				if(!empty($_FILES["solutionfile"]["name"]))
				{
					if($extension=="docx" || $extension=="doc" || $extension=="pdf" || $extension=="jpg" || $extension=="gif")
					{
						if ( $file['size'] > 5242880 || $file['error'] != 0) // 5 mb
						{
							$fileUploadSuccess = false;
//$this->load->view('upload', array('error' => 'File Size Greater than 5MB or Less Than 1KB','aid'=>$aid,'status'=>$status));
                                               $contactid=$_SESSION['contid']; 
                                                $errore="file is greater than 5 mb";                                                                                         
                                                $batchno=$this->user->getnoofbatch($contactid);
                                                 $seenassign=$this->user->getseenassignment($contactid);
                                                $totalassignment=$this->user->getnoofAssignment();
                                                $noofnewassignemts= $totalassignment-$seenassign;
                                                $this->user->updateseenassignment($contactid,$totalassignment);
              $this->load->view('fileuploaderrore',['batchno'=>$batchno,'errore'=>$errore,'noofnewassignemts'=>$noofnewassignemts]);
							    // echo "file is greater than 5 mb";
						}
						else
						{
							if(move_uploaded_file( $file['tmp_name'],$upload_path.$filename ))
							{
								$result = $this->user->uploadSubmit($assignmentno,$filename,$checkover);
                                                                  
					
                                          
								 if($result){
                                                                                $err=true;
								                //echo "file uploaded sucessully!";
                                                                             $rtt="speaktofortune.com/assignment/uploads/2_submission/".$nameof."_"."".$assignmentno.".".$extension;
$rtt1="http://speaktofortune.com/assignment/newadmin";
								                $this->load->library('email');

$this->email->initialize(array(
  'protocol' => 'smtp',
  'smtp_host' => 'mail.arfeenkhan.com',
  'smtp_user' => 'arfeenkhan@arfeenkhan.com',
  'smtp_pass' => 'rNX7zSKSCnev',
  'smtp_port' => 26,
  'crlf' => "\r\n",
  'newline' => "\r\n"
));

$this->email->from('Arfeenkhan@arfeenkhan.com', 'Arfeen Khan');
$this->email->to('stf@arfeenkhan.com');
//$this->email->to('bhaveshgurav515@gmail.com');
//$this->email->cc('another@another-example.com');
//$this->email->bcc('them@their-example.com');
$this->email->subject('Assignment ');
$message = "<p>".$nameof." has completed Speak to Fortune Assignment and the Assignment No is ".$assignmentno."</p>";
$message .= "<p>Please Click the below Link to Download ".$nameof." Doc File</p>";
$message .= "<p><a href='".$rtt."' style='font-weight:bold;'>Click Here to Download</a></p>";

$message .="<h4><a href='".$rtt1."'>Click Here to Login for Speak to Fortune</a></h4>";
                         $this->email->message($message);
                         $this->email->set_mailtype('html');
$this->email->send();

echo $this->email->print_debugger();

								                 $this->assignmnets($assignmentno,$filesize);
                                                                                    
                                                                            }else{
								               
                                                                                 $err=false;
                                                                                 echo "file upload errore";
								              }
							
							}
							else
							{
				      //$this->load->view('upload', array('error' => 'Problem Occur While Submitting Solution','aid'=>$aid,'status'=>$status)); 
								    echo "problem while uploading files";
							}
						}
					}
					else
					{
						//$this->load->view('upload', array('error' => $extension.' Extension Not Allowed','aid'=>$aid,'status'=>$status)); 
						//echo " only docx doc and pdf are allowed";
                                                            $contactid=$_SESSION['contid']; 
                                                $errore="only docx doc and pdf are allowed";                                                                                         
                                                $batchno=$this->user->getnoofbatch($contactid);
                                                $seenassign=$this->user->getseenassignment($contactid);
                                                $totalassignment=$this->user->getnoofAssignment();
                                                $noofnewassignemts= $totalassignment-$seenassign;
                                                $this->user->updateseenassignment($contactid,$totalassignment);
                          $this->load->view('fileuploaderrore',['batchno'=>$batchno,'errore'=>$errore,'noofnewassignemts'=>$noofnewassignemts]);                                             
					}
				}
				else
				{
					//$this->load->view('editsolution', array('error' =>' Solution file not selected','aid'=>$aid,));
					  echo "file is note selected";
				}
                            }else{
                       
                         $this->logout();
                    } 
                
              }
             
         /*------------------------- This is for Edit  assignment -------------------------------------------*/
         
                 public function editsolution($assignmentno){
                                                 
                          if($this->session->userdata('contid'))
                           {  
                                $contactid= $_SESSION['contid'];
                                $temp = explode(".",$_FILES["solutionfile"]["name"]);
                                $table="2_submission";
				$extension = end($temp);
				//$filename = $contactid."_"."Solution_".$aid.".".$extension;
                                $file = $_FILES['solutionfile'];
                                $filesize=$file['size'];
                                $chtokb=1048576;
                                // echo ($filesize/$chtokb);
                                
                                $upload_path = "./uploads/".$table.'/';
                                
                                $nameofuser1=$this->user->getnameofuser($contactid);
                                $nameof1;
                                
                                foreach($nameofuser1 as $rowname1)
                                {
                                $nameof1=$rowname1->name;
                                }
                                //var_dump(nameofuser1);
                                $filename = $nameof1."_"."".$assignmentno.".".$extension;
                                 
				if(!empty($_FILES["solutionfile"]["name"]))
				{
					if($extension=="docx" || $extension=="doc" || $extension=="pdf" || $extension=="jpg" || $extension=="gif")
					{
						if ( $file['size'] > 5242880 || $file['error'] != 0) // 5 mb
						{
							$fileUploadSuccess = false;
							
							     //echo "file is greater than 5 mb";
                                                                 $contactid=$_SESSION['contid']; 
                                                $errore="file is greater than 5 mb";                                                                                         
                                                $batchno=$this->user->getnoofbatch($contactid);
                                                $seenassign=$this->user->getseenassignment($contactid);
                                                $totalassignment=$this->user->getnoofAssignment();
                                                $noofnewassignemts= $totalassignment-$seenassign;
                                                $this->user->updateseenassignment($contactid,$totalassignment);
                       $this->load->view('fileuploaderrore',['batchno'=>$batchno,'errore'=>$errore,'noofnewassignemts'=>$noofnewassignemts]);  
						}
						else
						{
							if(move_uploaded_file( $file['tmp_name'],$upload_path.$filename ))
							{
								$result = $this->user->edituploadSubmit($assignmentno,$filename);
					  
					  
                                          
								 if($result){
                                                                                $err=true;
								                 
								                $this->editassignments($assignmentno,$filesize);
                                                                                    
                                                                            }else{
								               
                                                                                 $err=false;
                                                                                
								              }
							
							}
							else
							{
				      
							}
						}
					}
					else
					{
						
                                                                                                                                                                                         $contactid=$_SESSION['contid']; 
                                                $errore="only docx doc and pdf are allowed";                                                                                         
                                                $batchno=$this->user->getnoofbatch($contactid);
                                                 $seenassign=$this->user->getseenassignment($contactid);
                                                $totalassignment=$this->user->getnoofAssignment();
                                                $noofnewassignemts= $totalassignment-$seenassign;
                                                $this->user->updateseenassignment($contactid,$totalassignment);
                        $this->load->view('fileuploaderrore',['batchno'=>$batchno,'errore'=>$errore,'noofnewassignemts'=> $noofnewassignemts]); 
					}
				}
				else
				{
					
				}
                   }else{
                       
                          $this->logout();
                    } 
                
              }
            
         /*--------------------------This is for overdue-------------------------------------------*/
                    public function overduesolution($assignmentno){
                      if($this->session->userdata('contid'))
                           {  
              
                                $contactid= $_SESSION['contid'];
                                $temp = explode(".",$_FILES["solutionfile"]["name"]);
                                $table="2_submission";
				$extension = end($temp);
				//$filename = $contactid."_"."Solution_".$aid.".".$extension;
                                $file = $_FILES['solutionfile'];
                                $filesize=$file['size'];
                                $chtokb=1048576;
                                 //echo ($filesize/$chtokb);
                                
                                $upload_path = "./uploads/".$table.'/';
                                
                                $filename = $contactid."_"."Solution_".$assignmentno.".".$extension;
				if(!empty($_FILES["solutionfile"]["name"]))
				{
					if($extension=="docx" || $extension=="doc" || $extension=="pdf" || $extension=="jpg" || $extension=="gif")
					{
						if ( $file['size'] > 5242880 || $file['error'] != 0) // 5 mb
						{
							$fileUploadSuccess = false;
							//$this->load->view('upload', array('error' => 'File Size Greater than 5MB or Less Than 1KB','aid'=>$aid,'status'=>$status));
							     //echo "file is greater than 5 mb";
                                                                      $contactid=$_SESSION['contid']; 
                                                $errore="file is greater than 5 mb";                                                                                         
                                                $batchno=$this->user->getnoofbatch($contactid);
                                                $seenassign=$this->user->getseenassignment($contactid);
                                                $totalassignment=$this->user->getnoofAssignment();
                                                $noofnewassignemts= $totalassignment-$seenassign;
                                                $this->user->updateseenassignment($contactid,$totalassignment);
                            $this->load->view('fileuploaderrore',['batchno'=>$batchno,'errore'=>$errore,'noofnewassignemts'=>$noofnewassignemts]);                                                           
						}
						else
						{
							if(move_uploaded_file( $file['tmp_name'],$upload_path.$filename ))
							{
								$result = $this->user->overdueSubmit($assignmentno,$filename);
					  
								 if($result){
                                                                                $err=true;
								                //echo "file uploaded sucessully!";
                                                                                 
								                 $this->overdueassignments($assignmentno,$filesize);
                                                                                    
                                                                            }else{
								               
                                                                                 $err=false;
                                                                                 echo "file upload errore";
								              }
							
							}
							else
							{
				      //$this->load->view('upload', array('error' => 'Problem Occur While Submitting Solution','aid'=>$aid,'status'=>$status)); 
								    echo "problem while uploading files";
							}
						}
					}
					else
					{
						//$this->load->view('upload', array('error' => $extension.' Extension Not Allowed','aid'=>$aid,'status'=>$status)); 
						echo " only docx doc and pdf are allowed";
                                                $contactid=$_SESSION['contid']; 
                                                $errore="only docx doc and pdf are allowed";                                                                                         
                                                $batchno=$this->user->getnoofbatch($contactid);
                                                $seenassign=$this->user->getseenassignment($contactid);
                                                $totalassignment=$this->user->getnoofAssignment();
                                                $noofnewassignemts= $totalassignment-$seenassign;
                                                $this->user->updateseenassignment($contactid,$totalassignment);
                     $this->load->view('fileuploaderrore',['batchno'=>$batchno,'errore'=>$errore,'noofnewassignemts'=>$noofnewassignemts]);   
					}
				}
				else
				{
					//$this->load->view('editsolution', array('error' =>' Solution file not selected','aid'=>$aid,));
					  echo "file is note selected";
				}
                        }else{
                       
                          $this->logout();
                    } 
              }
                


         /*--------------------------This is for forgetpassword-------------------------------------------*/
           public function forgot()
               {
                    $this->load->view('forgotpass');
                   
               }
            public function Recovery()
               {
                   $username=$this->input->post('email');
                   //var_dump($username);exit;
                   $this->form_validation->set_rules('email', 'email', 'trim|required');
                   $this->form_validation->set_error_delimiters('<div class="text-danger1" style="color:red">', '</div>'); 
                   if ($this->form_validation->run())
                   {                        
                       $output=$this->user->checkemail($username);
                       $password=$this->user->getpassword($username);
                      
                        
                      if($output){
                                     $secretid=$this->user->newgetUser($username, $password);
                                      $temp_pass = md5(uniqid());
                                         
                                      $this->load->library('email', array('mailtype'=>'html'));
                                    
                                      $this->email->from('arfeenkhan@arfeenkhan.com',"arfeenkhan.com");
                                      $this->email->to($this->input->post('email'));
                                      $this->email->subject("Reset your Password");

                         $message = "<p>This email has been sent as a request to reset  password</p>";
                         $message .= "<p><a href='".base_url()."newuser/resetpassword/$secretid'>Click here </a>if you want to reset your password,
                                     if not, then ignore</p>";
                         $this->email->message($message);
                          
                            if($this->email->send()){
                                                      $this->load->view('link_sent');
                
                                                  }else{
                                                     echo "email was not sent, please contact your administrator";
                                                     }         
                
                             }else{
                                        $this->session->set_flashdata('emailmsg', 'Email id does not exist');
                                        $this->load->view('forgotpass');
                                      }
                                   


                   }else{
                            $this->session->set_flashdata('emailmsg', '');
                            $this->load->view('forgotpass'); 
                        }

 
                     
               }

            
              public function resetpassword($secretid){
                                               
                                                   
                                                    $this->load->view('reset_password',['userid'=>$secretid]);
                                               
                                               
                                                      }
                                             
             
               
              public function updatepass($ccid){


                     $password=$this->input->post('newpassword');
                     $confirmpassword=$this->input->post('confirmpassword');
                     
                   
                      
                     
                     $this->form_validation->set_rules('newpassword', 'Password', 'trim|required');
               
                     $this->form_validation->set_rules('confirmpassword', 'Confirm password', 'trim|required|matches[newpassword]'); 
 
                     $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');  
                   
                  if($this->form_validation->run()){
                                       
                                          
                                        $checkupate=$this->user->updatepassword($ccid, $password);
                                         if( $checkupate){
                                                      $this->load->view('password_update');
                                             }else{
                                                     $this->resetpassword($ccid);
                                                           
                                                  }
                                          
                              }else{
                                        
                                          $this->resetpassword($ccid);
                                          $this->session->set_flashdata('resetpassmsg', '');
                                  }
                   
                      }
         /*---------------------------This is for Myprofile------------*/

           public function myprofile(){
                               if($this->session->userdata('contid'))
                               {  
                                         $contactid= $_SESSION['contid'];
                                         $userdetail=$this->user->getprofile($contactid);
                                         $totalassignment=$this->user->gettotalassignment();
                                         $tcassignment=$this->user->gettotalcompleteassignment($contactid);
                                         $pending=$totalassignment- $tcassignment;
                                         $regdate=$this->user->getregistration($contactid);
                                         $batchno1=$this->user->getnoofbatch1($contactid);
                  $batchno2=$this->user->getnoofbatch($contactid);
                  $batchno=$batchno1+$batchno2;
                                        // var_dump($regdate);exit;
                                       $seenassign=$this->user->getseenassignment($contactid);
                                       $totalassignment=$this->user->getnoofAssignment();
                                       $noofnewassignemts= $totalassignment-$seenassign;
                                       $this->user->updateseenassignment($contactid,$totalassignment);
$this->load->view('myprofile',['userdetail'=>$userdetail,'totalassignment'=>$totalassignment,'tcassignment'=> $tcassignment,'pending'=>$pending,'regdate'=> $regdate,'batchno'=>$batchno,'noofnewassignemts'=>$noofnewassignemts]);
                                }else{   
						            $this->logout();
						    
						   }
                    
                                       }

         /*---------------------------This is for Myprofile------------*/

           public function myprofilechangepass(){

                             if($this->session->userdata('contid'))
                               { 
                                                   $contactid= $_SESSION['contid'];
                                                   $oldpass=$this->input->post('pass');
                                                   $password=$this->input->post('pass1');
                                                   $cpassword=$this->input->post('pass2');
                                                   
                                     $this->form_validation->set_rules('pass', 'old Passessword', 'trim|required');
                                     $this->form_validation->set_rules('pass1', 'new Passessword', 'trim|required');
                                     $this->form_validation->set_rules('pass2', 'Confirm password', 'trim|required|matches[pass1]'); 
                                     
                                   
                                       	
                                         if($this->form_validation->run()){
                                                                             //updatepassword($ccid,$password)
                                                                              
                                                                             $checkchange=$this->user->updatepassword($contactid,$password);
                                                                              if( $checkchange){
                                                                              
                                                                                     $this->myprofile();
                                                                                     
                                                                               }else{
                                                                               
                                                                               }
                                                                               
                                                                            
                                                                          }else{  
                                                                          
                                                                              echo "form validation failed !!!!!!!";
                                                                          }
                                            }else{   
						           $this->logout();
						    
						   }
                                  
                                              
                                                }
    


                          public function checkpass() {
            
            $contactid= $_SESSION['contid'];
            $oldpass=$this->input->post('old');
             $password=$this->input->post('nwch');
            $cpassword=$this->input->post('nwchv');
            
            $checkchange=$this->user->checkold($contactid,$oldpass);
            //echo $checkchange; 
            if($oldpass=='' && $password=='' && $cpassword=='')
            {
                echo 5;
            }
            else{
            if($checkchange==1)
            {
                if($password=='' && $cpassword=='')
                {
                    echo 2;
                }
                
                if($password==''){
                echo 6;
                }
                if($cpassword==''){
                echo 7;
                }
                else {
                    
                    if($password != $cpassword)
                {
                    echo 4;
                }
                    
                else {
                    echo 3;
                    $checkchange=$this->user->updatepassword($contactid,$password);
                }
                    
                }
                    
                
            }
            else{
                echo 1;
            }
            }
                                                }
      
      

        /*-----------------------------This is for Logout-------------- */
          public function logout()
           {    
                  $this->session->unset_userdata('contid');
                  $this->load->view('newlogin');
           }
           
           
           
       /*--------------------------own chat ---------------------------*/
       
       public function own_chat()
             {
              if($this->session->userdata('contid'))
                {
                  $contactid=$_SESSION["contid"];
                  $toid=661;
                   //var_dump($id);
                     $seenassign=$this->user->getseenassignment($contactid);
                  $totalassignment=$this->user->getnoofAssignment();
                  $updatenofi=$this->user->updatenofi($contactid,$toid);
                  $noofnewassignemts= $totalassignment-$seenassign;
                  $batchno1=$this->user->getnoofbatch1($contactid);
                  $batchno2=$this->user->getnoofbatch($contactid);
                  $batchno=$batchno1+$batchno2;
                  $totalmsg=$this->user->getallcountmsg($contactid);
                     $this->load->view('own_chat',['noofnewassignemts'=>$noofnewassignemts,'batchno'=>$batchno,'totalmsg'=>$totalmsg]);
                 }else{
                       
                          $this->logout();
                    }     
             }

     
             
public function getallcountmsg()
             {
              if($this->session->userdata('contid'))
                {
                  $contactid=$_SESSION["contid"];
                   
                     $totalmsg=$this->user->getallcountmsg($contactid);
                     echo $totalmsg; 
                     
                 }else{
                       
                          $this->logout();
                    }     
             }
             
public function  show_own_msg(){

                          if($this->session->userdata('contid')){
                           //$newid=$_POST['id'];
                           $id=$_SESSION["contid"];
                        $allmessage=$this->user->getallownchatmessages($id);
                        
                        $uname=$_POST['name'];
                        $aname;
                        $name=$this->user->getname($id);
                                             
                         foreach($allmessage as $row){
                                  foreach($name as $row1){
                                         $name2=$row1->name;
                                         $toid=$row->toid;
                                         //var_dump($toid);
                                    if($id==$toid){
                                echo "<div class='chatme'><div class='chat_head'><p class='names_user'>".$row1->name.":</p></div>
<div class='chat_content'><p class='user_content'>".$row->msg."</p></div></div>";
                                          }else{
                                          
                                echo "<div class='chatme'><div class='chat_head'><p class='names_user' style='color:#000;'>Arfeen Khan:</p></div>
<div class='chat_content'><p class='user_content'>".$row->msg."<p></div></div>";
                                      }
                                     }  
                                  }
                         //var_dump($allmessage);
                         //echo(json_encode($this->admin->getallchatmessages()));

                          }else{
                       
                          $this->logout();
                    }   
               }
               
               
public function ownchatinsert(){

                       if($this->session->userdata('contid')){
                     $message = $_POST['msg'];
                     $fromid = $_POST['fromid'];
                     $contid12=$_SESSION["contid"];
                     $readmsg=1;
                     
                     //var_dump($fromid);
                     //var_dump($message);
                     
                     $this->user->insert_message_own($_POST['msg'],$_POST['fromid'],$readmsg,$contid12);
                     
                     }else{
                       
                          $this->logout();
                    }   
                    
                           
               }
               
               
/*--------------------------------------suoer assignment --------------------------------*/

public function super_assign()
             {
                 $contactid=$_SESSION["contid"];
                 $assignmentno=0;$filesize=0;
                  $seenassign=$this->user->getseenassignment($contactid);
                  $totalassignment=$this->user->getnoofAssignment();
                  //$updatenofi=$this->user->updatenofi($contactid,$toid);
                  $noofnewassignemts= $totalassignment-$seenassign;
                  $batchno1=$this->user->getnoofbatch1($contactid);
                  $batchno2=$this->user->getnoofbatch($contactid);
                  $batchno=$batchno1+$batchno2;
                  $totalassignmentss=$this->user->getnoofAssignmentss12();
                  $assignment=$this->user->getAssignment32();
                   $locked=$this->user->getlocked32($contactid);
                   $name=$this->user->getname($contactid);
                   $overdue_new=$this->user->getoverdue32($contactid);
                    $complete=$this->user->getsubmitted32($contactid);
                    $overdue=$this->user->getnewoverdueassignment32($contactid);
                    $nnoofassignment1=$this->user->getnoofAssignment122();
                    $question = $this->user->getquestion();
                    $subqtitle=$this->user->subqtitle();
                    $subquestion = $this->user->subquestion();
                    $subans=$this->user->subans($contactid);
            $answer= $this->user->getanswer($contactid);
                  
                 $this->load->view('super_assign.php',['assignment'=>$assignment,'subans'=>$subans,'subqtitle'=>$subqtitle,'subquestion'=>$subquestion,'question'=>$question,'nnoofassignment1'=>$nnoofassignment1,'answer'=>$answer,'locked'=>$locked,'name'=>$name,'complete'=>$complete,'overdue_new'=>$overdue_new,'overdue'=>$overdue,'assignmentno'=>$assignmentno,'noofnewassignemts'=>$noofnewassignemts,'totalassignmentss'=>$totalassignmentss,'batchno'=>$batchno,'batchno1'=>$batchno1,'filesize'=>$filesize]);
             }
             
             public function super_assigns($assignmentno,$filesize)
             {
                 $contactid=$_SESSION["contid"];
                 
                  $seenassign=$this->user->getseenassignment($contactid);
                  $totalassignment=$this->user->getnoofAssignment();
                  //$updatenofi=$this->user->updatenofi($contactid,$toid);
                  $noofnewassignemts= $totalassignment-$seenassign;
                  $batchno1=$this->user->getnoofbatch1($contactid);
                  $batchno2=$this->user->getnoofbatch($contactid);
                  $batchno=$batchno1+$batchno2;
                  $totalassignmentss=$this->user->getnoofAssignmentss12();
                  $assignment=$this->user->getAssignment32();
                   $locked=$this->user->getlocked32($contactid);
                   $name=$this->user->getname($contactid);
                   $overdue_new=$this->user->getoverdue32($contactid);
                    $complete=$this->user->getsubmitted32($contactid);
                    $overdue=$this->user->getnewoverdueassignment32($contactid);
                    $nnoofassignment1=$this->user->getnoofAssignment122();
                    $question = $this->user->getquestion();
                    $subqtitle=$this->user->subqtitle();
                    $subquestion = $this->user->subquestion();
                    $subans=$this->user->subans($contactid);
            $answer= $this->user->getanswer($contactid);
                  
                 $this->load->view('super_assign.php',['assignment'=>$assignment,'subans'=>$subans,'subqtitle'=>$subqtitle,'subquestion'=>$subquestion,'question'=>$question,'nnoofassignment1'=>$nnoofassignment1,'answer'=>$answer,'locked'=>$locked,'name'=>$name,'complete'=>$complete,'overdue_new'=>$overdue_new,'overdue'=>$overdue,'assignmentno'=>$assignmentno,'noofnewassignemts'=>$noofnewassignemts,'totalassignmentss'=>$totalassignmentss,'batchno'=>$batchno,'batchno1'=>$batchno1,'filesize'=>$filesize]);
             }
             
     public function setansdata()
           {    
                 $message = $_POST['msg'];
                     $assignmentno = $_POST['asno'];
                     $questionno = $_POST['qno'];
                     $contid12=$_SESSION["contid"];
                     $numberque=$this->user->numberq($contid12,$questionno,$assignmentno);
                     //echo $numberque;
                     if($numberque==0)
                     {
                  $this->user->insert_msg($contid12,$questionno,$assignmentno,$message);
                     }
                   else{

                   }
                $this->user->update_msg($contid12,$questionno,$assignmentno,$message);
                     
           }
    public function setsubmit()
           {    
                 $id = $_POST['id'];
                      $contid12=$_SESSION["contid"];
                      $number=$this->user->number_row($contid12,$id);
                      //var_dump($number) ;
                      $date=date("Y-m-d");
                      //echo $date;
                      $dateofsub=$this->user->dateofsub($contid12,$id);
                      foreach ($dateofsub as $key) {
                        //echo $key->subdate;
                        if($number==0)
                      {
                        //$this->user->submit_id($contid12,$id);
                        if($date < $key->subdate )
                        {
                          $this->user->submit_id($contid12,$id);

                        }else{
                         $this->user->over_submit_id($contid12,$id);

                        }
                      }

                       
                        
                      }
                      
                     
           }
    public function superchat(){
               if($this->session->userdata('contid'))
                {
                     $message = $_POST['msg'];
                     $contid12=$_SESSION["contid"];
                     $this->user->super_insert_message12($_POST['msg'],$_POST['name'],$_POST['id'],$contid12);
                     //$this->user->insert_message123($_POST['msg'],$_POST['id'],$contid12);
                    
                    }else{
                       
                          $this->logout();
                    }   
                    
                           
               }
   public function  super_chat_message(){
              if($this->session->userdata('contid'))
                {
                         $newid=$_POST['id'];
                        $allmessage=$this->user->getallsuperchatmessages($newid);
                        $id=$_SESSION["contid"];
                        $uname=$_POST['name'];
                        //$name=$this->admin->getname($id);
                         foreach($allmessage as $row){
                                         $name=$row->name;
                                      if($uname==$name){
                              
echo "<li class='col-md-12 wrapp-comments'>  <div class='col-md-2 post-info' style='width: 12%;'><h1 style='color:#d3b730'>".$row->name."</h1></div><div class='col-md-9 entry-content' style='width: 85%;'><p>".$row->msg. "</p></div></li>";

                               
                                          }else{
                                          echo "<li class='col-md-12 wrapp-comments'><div class='col-md-2 post-info' style='width: 12%;'><h1>".$row->name."</h1></div><div class='col-md-9 entry-content' style='width: 85%;'><p>".$row->msg. "</p></div></li>";
                                      }
                                       
                                  }
                        
                       }else{
                       
                          $this->logout();
                    }   
                    
               }
               
     public function  Notification_Counts(){

                   if($this->session->userdata('contid'))
                {

                         $newid=$_POST['id'];
                         $contid12=$_SESSION["contid"];
                         $counter=$this->user->Count_messages1($newid,$contid12);
                         
                          echo "$counter";

 }else{
                       
                          $this->logout();
                    }  
                        
                         }
                         
        public function newinsertdata($id)
        {
            
            
            $contid12=$_SESSION["contid"];
            
            $counterdata=$this->user->counterdata($contid12,$id);
            $countersdata=$this->user->countersdata($contid12,$id);
            
             $submittedcount=$this->user->submittedcount($contid12,$id);
            
            //var_dump($countersdata);
            
            if($id==1)
            {
                
                if($counterdata==0 && $countersdata==0){
                $assignmentno=$id;
              // $abcds=$_POST['abc'];
              $i=35;
              $a=0;
              $c='a';
              
               foreach($_POST['abc1'] as $textbox){
                   $i++;
                   $a++;
               $counter=$this->user->newinsertdata($textbox,$i,$a,$assignmentno,$contid12);
               
               }
               foreach($_POST['abc3'] as $textbox1){
                   $i++;
                   $newas ++;
                   if($newas < 7)
                   {
                       $i=1;
                      $counter=$this->user->newinsertdatas($textbox1,$i,$c,$assignmentno,$contid12);
                         $c++;
                   }

                   if($newas > 6 && $newas < 13)
                   {
                       $i=2;
                      $counter=$this->user->newinsertdatas($textbox1,$i,$da,$assignmentno,$contid12);
                         $da++;
                   }
                   if($newas > 12 && $newas < 17)
                   {
                       $i=3;
                      $counter=$this->user->newinsertdatas($textbox1,$i,$db,$assignmentno,$contid12);
                         $db++;
                   }
                   if($newas > 16 && $newas < 20)
                   {
                       $i=4;
                       var_dump($na);
                      $counter=$this->user->newinsertdatas($textbox1,$i,$na,$assignmentno,$contid12);
                         $na++;
                   }
                 }
               
               $counter=$this->user->submittednews($contid12,$assignmentno);
            }
            else
            {
                //var_dump($_POST['abc3']);
                $assignmentno=$id;
              // $abcds=$_POST['abc'];
              $i=19;
              $a=0;
              $c='a';
              $da='a';
              $db='a';
              $na='a';
               foreach($_POST['abc1'] as $textbox){
                   $i++;
                   $a++;
               //$counter=$this->user->newinsertdata($textbox,$i,$a,$assignmentno,$contid12);
                 $counter=$this->user->newupdatedata($textbox,$i,$a,$assignmentno,$contid12); 
                 
                 
               }
               if($countersdata==0){
                   $newas=0;
                   //var_dump($_POST['abc3']);
                   foreach($_POST['abc3'] as $textbox1){
                   $i++;
                   $newas ++;
                   if($newas < 7)
                   {
                       $i=1;
                      $counter=$this->user->newinsertdatas($textbox1,$i,$c,$assignmentno,$contid12);
                         $c++;
                   }

                   if($newas > 6 && $newas < 13)
                   {
                       $i=2;
                      $counter=$this->user->newinsertdatas($textbox1,$i,$da,$assignmentno,$contid12);
                         $da++;
                   }
                   if($newas > 12 && $newas < 17)
                   {
                       $i=3;
                      $counter=$this->user->newinsertdatas($textbox1,$i,$db,$assignmentno,$contid12);
                         $db++;
                   }
                   if($newas > 16 && $newas < 20)
                   {
                       $i=4;
                       var_dump($na);
                      $counter=$this->user->newinsertdatas($textbox1,$i,$na,$assignmentno,$contid12);
                         $na++;
                   }
                 }
               }else{
                   $newns=0;
                   $cc='a';
                    $dac='a';
                    $dbc='a';
                    $nac='a';
                    foreach($_POST['abc3'] as $textbox1){
                   $i++;
                   $newns++;
                   if($newns < 7)
                   {
                       $i=1;
                      $counter=$this->user->newupdatedatas($textbox1,$i,$cc,$assignmentno,$contid12);
                         $cc++;
                   }

                   if($newns > 6 && $newns < 13)
                   {
                       $i=2;
                      $counter=$this->user->newupdatedatas($textbox1,$i,$dac,$assignmentno,$contid12);
                         $dac++;
                   }
                   if($newns > 12 && $newns < 17)
                   {
                       $i=3;
                      $counter=$this->user->newupdatedatas($textbox1,$i,$dbc,$assignmentno,$contid12);
                         $dbc++;
                   }
                   if($newns > 16 && $newns < 20)
                   {
                       $i=4;
                       //var_dump($na);
                      $counter=$this->user->newupdatedatas($textbox1,$i,$nac,$assignmentno,$contid12);
                         $nac++;
                   }
                 }
                    
               }
                if($submittedcount==0)
               {
                     $counter=$this->user->submittednews($contid12,$assignmentno);
               }
            }
            
            
            
            }
            if($id==2)
            {
                if($counterdata==0){
                $assignmentno=$id;
              // $abcds=$_POST['abc'];
              $i=35;
              $a=0;
               foreach($_POST['abc2'] as $textbox){
                   $i++;
                   $a++;
               $counter=$this->user->newinsertdata($textbox,$i,$a,$assignmentno,$contid12);
               
               //  $counter=$this->user->newupdatedata($textbox,$i,$a,$assignmentno,$contid12);  
                 
               }
               $counter=$this->user->submittednew($contid12,$assignmentno);
            }
            else
            {
                $assignmentno=$id;
              // $abcds=$_POST['abc'];
              $i=19;
              $a=0;
               foreach($_POST['abc2'] as $textbox){
                   $i++;
                   $a++;
               //$counter=$this->user->newinsertdata($textbox,$i,$a,$assignmentno,$contid12);
                 $counter=$this->user->newupdatedata($textbox,$i,$a,$assignmentno,$contid12);  
                 
                 
               }
            }
            }
           //redirect('newuser/super_assign'); 
            $this->load->view('supre');
        }
        
        /*-------------------------this is upload assignment-------------------------------------------*/
             public function uploadsolutionn($assignmentno){
                 
                      if($this->session->userdata('contid'))
                           {  
                                $contactid= $_SESSION['contid'];
                                $asssubdate=$this->user->getassigmentsubsuperdate($assignmentno,$contactid);
                                $date=date("Y-m-d");
                                if($date>$asssubdate){
                                      //echo "condition satisfied!!!!";
                                       $checkover=1;
                                    }else{
                                         $checkover=0;
                                    }
                               
                                $temp = explode(".",$_FILES["solutionfile"]["name"]);
                                $table="2_submission1";
				$extension = end($temp);
				
                                $file = $_FILES['solutionfile'];
                                $filesize=$file['size'];
                                
                                $chtokb=1048576;
                                
                                
                                $upload_path = "./uploads/".$table.'/';
                                $nameofuser=$this->user->getnameofuser($contactid);
                                $nameof;
                                
                                foreach($nameofuser as $rowname)
                                {
                                $nameof=$rowname->name;
                                }
                                //var_dump($nameofuser);
                                $filename = $nameof."_"."".$assignmentno.".".$extension;
				if(!empty($_FILES["solutionfile"]["name"]))
				{
					if($extension=="docx" || $extension=="doc" || $extension=="pdf" || $extension=="jpg" || $extension=="gif")
					{
						if ( $file['size'] > 5242880 || $file['error'] != 0) // 5 mb
						{
							$fileUploadSuccess = false;
//$this->load->view('upload', array('error' => 'File Size Greater than 5MB or Less Than 1KB','aid'=>$aid,'status'=>$status));
                                               $contactid=$_SESSION['contid']; 
                                                $errore="file is greater than 5 mb";                                                                                         
                                                $batchno=$this->user->getnoofbatch($contactid);
                                                 $seenassign=$this->user->getseenassignment($contactid);
                                                $totalassignment=$this->user->getnoofAssignment();
                                                $noofnewassignemts= $totalassignment-$seenassign;
                                                $this->user->updateseenassignment($contactid,$totalassignment);
              $this->load->view('fileuploaderrore',['batchno'=>$batchno,'errore'=>$errore,'noofnewassignemts'=>$noofnewassignemts]);
							    // echo "file is greater than 5 mb";
						}
						else
						{
							if(move_uploaded_file( $file['tmp_name'],$upload_path.$filename ))
							{
								$result = $this->user->uploadsuperSubmit($assignmentno,$filename,$checkover);
                                                                  
					
                                          
								 if($result){
                                                                                $err=true;
								                //echo "file uploaded sucessully!";
                                                                             $rtt="speaktofortune.com/assignment/uploads/2_submission1/".$nameof."_"."".$assignmentno.".".$extension;
$rtt1="http://speaktofortune.com/assignment/newadmin";
								                /* $this->load->library('email');

$this->email->initialize(array(
  'protocol' => 'smtp',
  'smtp_host' => 'mail.arfeenkhan.com',
  'smtp_user' => 'arfeenkhan@arfeenkhan.com',
  'smtp_pass' => 'rNX7zSKSCnev',
  'smtp_port' => 26,
  'crlf' => "\r\n",
  'newline' => "\r\n"
));

$this->email->from('Arfeenkhan@arfeenkhan.com', 'Arfeen Khan');
//$this->email->to('stf@arfeenkhan.com');
//$this->email->to('bhaveshgurav515@gmail.com');
//$this->email->cc('another@another-example.com');
//$this->email->bcc('them@their-example.com');
$this->email->subject('Assignment ');
$message = "<p>".$nameof." has completed Speak to Fortune Assignment and the Assignment No is ".$assignmentno."</p>";
$message .= "<p>Please Click the below Link to Download ".$nameof." Doc File</p>";
$message .= "<p><a href='".$rtt."' style='font-weight:bold;'>Click Here to Download</a></p>";

$message .="<h4><a href='".$rtt1."'>Click Here to Login for Speak to Fortune</a></h4>";
                         $this->email->message($message);
                         $this->email->set_mailtype('html');
$this->email->send();

echo $this->email->print_debugger();
*/

								                 $this->super_assigns($assignmentno,$filesize);
                                                                                    
                                                                            }else{
								               
                                                                                 $err=false;
                                                                                 echo "file upload errore";
								              }
							
							}
							else
							{
				      //$this->load->view('upload', array('error' => 'Problem Occur While Submitting Solution','aid'=>$aid,'status'=>$status)); 
								    echo "problem while uploading files";
							}
						}
					}
					else
					{
						//$this->load->view('upload', array('error' => $extension.' Extension Not Allowed','aid'=>$aid,'status'=>$status)); 
						//echo " only docx doc and pdf are allowed";
                                                            $contactid=$_SESSION['contid']; 
                                                $errore="only docx doc and pdf are allowed";                                                                                         
                                                $batchno=$this->user->getnoofbatch($contactid);
                                                $seenassign=$this->user->getseenassignment($contactid);
                                                $totalassignment=$this->user->getnoofAssignment();
                                                $noofnewassignemts= $totalassignment-$seenassign;
                                                $this->user->updateseenassignment($contactid,$totalassignment);
                          $this->load->view('fileuploaderrore',['batchno'=>$batchno,'errore'=>$errore,'noofnewassignemts'=>$noofnewassignemts]);                                             
					}
				}
				else
				{
					//$this->load->view('editsolution', array('error' =>' Solution file not selected','aid'=>$aid,));
					  echo "file is note selected";
				}
                            }else{
                       
                         $this->logout();
                    } 
                
              }
        
        
        public function newinsertdatas($id)
        {
            
            
            $contid12=$_SESSION["contid"];
            
            $counterdata=$this->user->counterdata($contid12,$id);
            
             $submittedcount=$this->user->submittedcount($contid12,$id);
            
            //var_dump($counterdata);
            
            if($id==2)
            {
                if($counterdata==0){
                $assignmentno=$id;
              // $abcds=$_POST['abc'];
              $i=35;
              $a=0;
               foreach($_POST['abc2'] as $textbox){
                   $i++;
                   $a++;
               $counter=$this->user->newinsertdata($textbox,$i,$a,$assignmentno,$contid12);
               
               //  $counter=$this->user->newupdatedata($textbox,$i,$a,$assignmentno,$contid12);  
                 
               }
               $counter=$this->user->submittednew($contid12,$assignmentno);
            }
            else
            {
                $assignmentno=$id;
              // $abcds=$_POST['abc'];
              $i=19;
              $a=0;
               foreach($_POST['abc2'] as $textbox){
                   $i++;
                   $a++;
               //$counter=$this->user->newinsertdata($textbox,$i,$a,$assignmentno,$contid12);
                 $counter=$this->user->newupdatedata($textbox,$i,$a,$assignmentno,$contid12);  
                 
                 
               }
                if($submittedcount==0)
               {
                     $counter=$this->user->submittednew($contid12,$assignmentno);
               }
               
            }
            }
            
            
            
           redirect('newuser/super_assign'); 
            
        }
        
}
?>