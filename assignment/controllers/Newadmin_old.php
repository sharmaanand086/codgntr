<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class newadmin extends CI_Controller {

    public function __construct() 
	     {
		parent::__construct();
		//$this->load->model('user');
	        $this->load->model('admin');
	    }
    
      public function index()
             {
               $this->load->view('admin/login');
             }

          public function participants()
              {
                  if($this->session->userdata('contid')){    

                $user=$this->admin->getusers();
                $assignment=$this->admin->getassignemnts();
                $view=$this->admin->getviewss();
                $userstatus=$this->admin->getuserstatus();
                $totalnoassignment=$this->admin->getassignemntsno();
                $this->load->view('admin/participants',['user'=>$user,'assignment'=>$assignment,'view'=>$view,'userstatus'=>$userstatus,'totalnoassignment'=>$totalnoassignment]);
                   }else{
                       
                          $this->logout();
                    }      
              }
          public function editassignment($iid){
                         if($this->session->userdata('contid')){

                                                $id=$iid;
                                                $contid12=$_SESSION["contid"];
                                             
                                               $assdetails=$this->admin->getassignmentdetails($id,$contid12);
                                               $this->load->view('admin/edit_add_assignment',['iid'=>$iid,'assdetails'=> $assdetails]);   

                         }else{
                       
                          $this->logout();
                    }     
                                              }

          public function search_name()
              {
                $message = $_POST['search'];
                $searchmessage=$this->admin->getmessagesearch($message);
                  if($searchmessage!=null){
                      $i=0;
                    foreach($searchmessage as $row)
                         {
                          if($i === 0){
                        echo "<li class='parti_row'> <div class='chunk-details'><div class='col-md-12 parti_info'><div class='col-md-6 parti_name '><p>".$row->name."</p></div><div class='col-md-3 details_comp'><span class='no_ass'>" .$row->username."</span></div><div class='col-md-2 view_details'><p>".$row->uid. "</p></div></div></div></li>";
                            //$this->load->view('admin/login');
                                    $i++;
                                      }else{
                        echo "<li class='parti_row'> <div class='chunk-details'><div class='col-md-12 parti_info1'><div class='col-md-6 parti_name '><p>".$row->name."</p></div><div class='col-md-3 details_comp'><span class='no_ass'>" .$row->username."</span></div><div class='col-md-2 view_details'><p>".$row->uid. "</p></div></div></div></li>";
                                       $i--;
                                           }
                          }
                      
        
                           }else{
                           echo "<h1> data is not available</h1>";
                             }
              }

       /*------------This is for Notification -----------*/

               public function  chat_message12(){
                        if($this->session->userdata('contid')){
                         $newid=$_POST['id'];
                         $contid12=$_SESSION["contid"];
                         $counter=$this->admin->Count_message1($newid,$contid12);
                         
                          echo "$counter";
                        
                            }else{
                       
                          $this->logout();
                    }   
                         }

                public function  chat_message1234(){
                         $newid=$_POST['id'];
                        // echo "heyyy thid asjdm;ak";exit();
                         $contid12=$_SESSION["contid"];
                         
                        $this->admin->Count_message123($newid,$contid12);
                         }

        /*------------This is for forgetpassword-----------*/

         public function chat(){

                       if($this->session->userdata('contid')){
                     $message = $_POST['msg'];
                     $contid12=$_SESSION["contid"];
                     $this->admin->insert_message12($_POST['msg'],$_POST['name'],$_POST['id'],$contid12);
                     
                     }else{
                       
                          $this->logout();
                    }   
                    
                           
               }
         public function  chat_message(){

                          if($this->session->userdata('contid')){
                           $newid=$_POST['id'];
                        $allmessage=$this->admin->getallchatmessages($newid);
                        $id=$_SESSION["contid"];
                        $uname=$_POST['name'];
                        //$name=$this->admin->getname($id);
                         foreach($allmessage as $row){
                                         $name=$row->name;
                                      if($uname==$name){
                                echo "<li class='wrapp-comments'> <div class='post-info'><p style='color:#d3b730'>".$row->name."</p></div>: <div class='post_cmmnt'><p>".$row->msg. "</p></div></li>";
                                          }else{
                                           echo "<li class='wrapp-comments'> <div class='post-info'><p>".$row->name."</p></div>: <div class='post_cmmnt'><p>".$row->msg. "</p></div></li>";
                                      }
                                       
                                  }
                         //var_dump($allmessage);
                         //echo(json_encode($this->admin->getallchatmessages()));

                          }else{
                       
                          $this->logout();
                    }   
               }
        public function do_search($uname,$msg)
                   {        
                           
                              echo $uname;echo $msg;
                              $logs=$this->admin->getlogs(); 
                              var_dump($logs);
                              foreach($logs as $row){
                                             //echo $row->msg;
                                              
                                       }
                            // var_dump($logs); 
                            //echo"this function called !!!";
                   }

         
             public function forgot()
               {
                     

                    $this->load->view('admin/forgotpass');

                     
                   
               }
                public function Recovery()
               {
                     
                   $username=$this->input->post('email');
                   //var_dump($username);exit;
                   $this->form_validation->set_rules('email', 'email', 'trim|required');
                   $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>'); 
                   if ($this->form_validation->run())
                   {                        
                       $output=$this->admin->checkemail($username);
                       $password=$this->admin->getpassword($username);
                      
                        
                      if($output){
                                     $secretid=$this->admin->newgetUser($username, $password);
                                      $temp_pass = md5(uniqid());
                                         
                                      $this->load->library('email', array('mailtype'=>'html'));
                                    
                                      $this->email->from('arfeenkhan@arfeenkhan.com',"arfeenkhan.com");
                                      $this->email->to($this->input->post('email'));
                                      $this->email->subject("Reset your Password");

                         $message = "<p>This email has been sent as a request to reset  password</p>";
                         $message .= "<p><a href='".base_url()."newadmin/resetpassword/$secretid'>Click here </a>if you want to reset your password,
                                     if not, then ignore</p>";
                         $this->email->message($message);
                          
                            if($this->email->send()){
                                                      $this->load->view('admin/link_sent');
                
                                                  }else{
                                                     echo "email was not sent, please contact your administrator";
                                                     }         
                
                             }else{
                                        $this->session->set_flashdata('emailmsg', 'Email id does not exist');
                                        $this->load->view('admin/forgotpass');
                                      }
                                   


                   }else{
                            $this->session->set_flashdata('emailmsg', '');
                            $this->load->view('admin/forgotpass'); 
                        }

                     
                     
               }

            
              public function resetpassword($secretid){
                                              
                                                   
                                                    $this->load->view('admin/reset_password',['userid'=>$secretid]);
                                               
                                               
                                                      }
                                             
             
               
              public function updatepass($ccid){

                          
                     $password=$this->input->post('newpassword');
                     $confirmpassword=$this->input->post('confirmpassword');
                     
                   
                      
                     
                     $this->form_validation->set_rules('newpassword', 'Password', 'trim|required');
               
                     $this->form_validation->set_rules('confirmpassword', 'Confirm password', 'trim|required|matches[newpassword]'); 
 
                     $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');  
                   
                  if($this->form_validation->run()){
                                      
                                          
                                        $checkupate=$this->admin->updatepassword($ccid, $password);
                                         if( $checkupate){
                                                      $this->load->view('admin/password_update');
                                             }else{
                                                     $this->resetpassword($ccid);
                                                           
                                                  }
                                          
                              }else{
                                         // echo "passwords not a valid one";  
                                          $this->resetpassword($ccid);
                                          $this->session->set_flashdata('resetpassmsg', '');
                                  }
                   
                      }
 
       /* ------------This is for dashboard page---------- */
          public function dashboard()
              {
                   if($this->session->userdata('contid')){
                 $assignment=$this->admin->getassignemnts();
                 $id=$_SESSION["contid"];
                 $name=$this->admin->getname($id);
                 //var_dump($name);exit;
                 $user=$this->admin->getusers();
                 $view=$this->admin->getviewss();
                 $gettotalass=$this->admin->gettotalass();
                 $userstatus=$this->admin->getuserstatus();
                 $nnoofuser=$this->admin->getnnoofuser();
               
                  $this->load->view('admin/chat_dashboard',['assignment'=>$assignment,'name'=>$name,'user'=>$user,'userstatus'=>$userstatus,'view'=>$view,'nnoofuser'=>$nnoofuser,'gettotalass'=>$gettotalass]);

                  }else{
                       
                          $this->logout();
                    }     
              }
        /*----------------this is for dummy test page----------*/
        public function dashboardtest()
              {
                    if($this->session->userdata('contid')){
                 $assignment=$this->admin->getassignemnts();
                
                $this->load->view('admin/dashboard',['assignment'=>$assignment]);

                  }else{
                       
                          $this->logout();
                    }     
               
              }
     /* ------------This is for Add assignment  page---------- */
          public function addassignemnt()
              {
                 if($this->session->userdata('contid')){
                 $this->load->view('admin/add_assignment');
                  }else{
                       
                          $this->logout();
                    }     
              }
        
   
      /* ------------this is login page.---------- */
        public function login()
          {
                  $username=$this->input->post('email');
                  $password=$this->input->post('password');
                  
              
                 
                  $this->form_validation->set_rules('email', 'UserName', 'trim|required');
                  $this->form_validation->set_rules('password', 'Password', 'trim|required');  
                   
                  $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');  
                 
      if ($this->form_validation->run())
                {
                  
                  $output=$this->admin->newgetUser($username, $password);
                  $Emailoutput=$this->admin->checkemail($username);
                  $sessiondata = array('contid' => $output);
                  
		  $this->session->set_userdata($sessiondata);
                      
                     if( $output>0){
                                       $this->dashboard();
                                      
                                   
                                  }else{
                                           if($Emailoutput>0){
                                                               $this->session->set_flashdata('usermsg', 'Invalid username and password!');
                                                               $this->load->view('admin/login'); 
                                                             }else{
                                                                   $this->session->set_flashdata('usermsg', 'Email Id does not exist !');
                                                                   $this->load->view('admin/login'); 
                                                             }
                                       
                                        
                                  }
                       
                 }else{
                        $this->session->set_flashdata('usermsg', '');
                        $this->load->view('admin/login'); 
                    }
                  
                 
                //$this->load->view('login');
                //$this->load->view('newlogin');
           }
           /* -------------------------upload assignment------------------- */
           
   public function uploadassignment(){
                                              
                    if($this->session->userdata('contid')){
                                 
                    $description=$this->input->post("description"); 
                    $filetoupload=$this->input->post("fileassignment"); 
                    //var_dump($filetoupload);exit;
                    //$abc=$this->input->post('addassignment');
                   // var_dump($abc);exit;
                    $filesubdate=$this->input->post("datesub");      
                    $filenewdate=$this->input->post("submdate");                 
                
     if ($this->input->post('addassignment')){
                                               
                                                      
			                       $table = "2_assignment";
                                               $fname = $this->input->post("assignmentname");
                                               $myfilename= $this->input->post("assignmentname1");
			                      //var_dump($fname);exit;
			                       $description=$this->input->post("description1");
                                       
			                       $udate = date('Y/m/d');
			                      // var_dump($udate);exit;
			                       $subdate =date_format(date_create($this->input->post("datesub")),'Y/m/d');
			                    
			                       $upload_path = "./uploads/".$table.'/';
			                       $cid=2;          
                                                       
			
			                      $this->form_validation->set_rules("assignmentname", "Assignment Name", "trim|required");
			                      $this->form_validation->set_rules("datesub", "Last date", "trim|required");
                                              $this->form_validation->set_rules("description", "description", "trim|required"); 
                                              $this->form_validation->set_rules("assignmentname1", "Reference File", "trim|required"); 
                                              //$this->form_validation->set_rules("fileassignment", "Reference File", "trim|required");  
                                       
                                         
                    if ($this->form_validation->run() == FALSE)
			    {
                                   
				   $data['query'] = '';
				 
                                     $this->load->view('admin/add_assignment', $data);
			      }
			      else
			      {
                                       
                                          $query = $this->db->query("SHOW TABLE STATUS LIKE '$table'");
				           foreach ($query->result() as $row)
				                    {
						      $aid = $row->Auto_increment;
				                    }
				                     
				                    
				               if(empty($_FILES["fileassignment"]["name"]))
				                      {
				                      //var_dump($_FILES["fileassignment"]["name"]);exit;
                                                          //echo "file is empty !";exit();
                                         // var_dump($ufile); var_dump($fname);var_dump($udate);var_dump($subdate);var_dump($cid);var_dump($description);exit;
				                    	  $ufile = "No";
					       $data['query'] = $this->admin->uploadAssignment($ufile,$fname,$udate,$subdate,$cid,$description);

					                 
                                                            $this->load->view('admin/add_assignment', $data);
				                       }
				                     else
				                       {
				                         
				                           $file = $_FILES['fileassignment'];
				                       //var_dump($_FILES['fileassignment']['name']);exit;
					                   $temp = explode(".",$_FILES["fileassignment"]["name"]);
					                   $extension = end($temp);
					                   $extension1 = prev($temp);
					                   $ufile = $extension1 .".".$extension;
                                                         
					                  if ( $file['size'] > 20971520 || $file['error'] != 0) // 5 mb
					                   {
						                 $data['query'] = 'File Size Greater than 20MB or Less Than 1KB';
						                
                                                                    $this->load->view('admin/add_assignment', $data);
					                   }
					                  else
					                   {
						                 if(move_uploaded_file( $file['tmp_name'],$upload_path.$ufile ))
						                  {
						                                                            //var_dump($ufile); //var_dump($fname);var_dump($udate);var_dump($subdate);var_dump($cid);var_dump($description);exit;
                                               $data['query'] = $this->admin->uploadAssignment($ufile,$fname,$udate,$subdate,$cid,$description);

							          //$this->dashboard();
                                                                   redirect('newadmin/dashboard');
						                  }
						                  else
						                 {
							              $data['query'] = 'Problem Occur While Uploading Assignment';
							             
                                                                        $this->load->view('admin/add_assignment', $data);
						                  }
					                    }
				                                   
                                                       }
                                  }                                                                     
                                                            
                                                             
                             }else{
                                           

                                           
                                  $this->load->view('admin/add_assignment'); 
                                                              
                                 }

                       }else{
                       
                          $this->logout();
                    }     
                                      
                      }
                      
                    public function  uuploadassignment($id)
                      {                
                       if($this->session->userdata('contid')){                               
                                                                   //var_dump($id);
                                                                   //echo "this method called for adding";
                                                                    
                                 
                    $description=$this->input->post("description1"); 
                    $filetoupload=$this->input->post("fileassignment"); 
                    //var_dump($filetoupload);exit;
                    $filesubdate=$this->input->post("datesub");      
                    $filenewdate=$this->input->post("submdate");                 
                 
     if ($this->input->post('addassignment')){
                                              
                                                      
			                       $table = "2_assignment";
                                               $fname = $this->input->post("assignmentname");
			                       
			                       $description=$this->input->post("description1");
                                       
			                       $udate = date('Y/m/d');
			                       
			                       $subdate =date_format(date_create($this->input->post("datesub")),'Y/m/d');
			                       
			                       $upload_path = "./uploads/".$table.'/';
			                       $cid=2;          
                                                       
			
			                      $this->form_validation->set_rules("assignmentname", "Assignment Name", "trim|required");
			                      $this->form_validation->set_rules("datesub", "Last date", "trim|required");
                                              $this->form_validation->set_rules("description", "description", "trim|required");         
                    if ($this->form_validation->run() == FALSE)
			    {
                                    
				   $data['query'] = '';
				
                                     $this->load->view('admin/add_assignment', $data);
			      }
			      else
			      {
                                       
                                          $query = $this->db->query("SHOW TABLE STATUS LIKE '$table'");
				           foreach ($query->result() as $row)
				                    {
						      $aid = $row->Auto_increment;
				                    }
				                     
				                    
				               if(empty($_FILES["fileassignment"]["name"]))
				                      {
                                                         //var_dump($fname);var_dump($udate);var_dump($subdate);var_dump($cid);var_dump($description);exit;
				                    	  $ufile = "No";
					       $data['query'] = $this->admin->uuploadAssignment12($fname,$udate,$subdate,$cid,$description,$id);

					                 
                                                            //$this->load->view('admin/add_assignment', $data);
                                                            redirect('newadmin/dashboard');
				                       }
				                     else
				                       {
				                         
				                           $file = $_FILES['fileassignment'];
				                      // var_dump($_FILES['fileassignment']['name']);
					                   $temp = explode(".",$_FILES["fileassignment"]["name"]);
					                   //var_dump($temp);
					                   $extension = end($temp);
					                   $extension1 = prev($temp);
					                   //var_dump($extension1);exit;
					                   $ufile = $extension1.".".$extension;
                                                         
					                  if ( $file['size'] > 20971520 || $file['error'] != 0) // 5 mb
					                   {
						                 $data['query'] = 'File Size Greater than 20MB or Less Than 1KB';
						                
                                                                    $this->load->view('admin/add_assignment', $data);
					                   }
					                  else
					                   {
						                 if(move_uploaded_file( $file['tmp_name'],$upload_path.$ufile ))
						                  {
						                                                         
                                               $data['query'] = $this->admin->uuploadAssignment($ufile,$fname,$udate,$subdate,$cid,$description,$id);
                                                                   // redirect('newadmin/dashboard');
							          $this->dashboard();
						                  }
						                  else
						                 {
							              $data['query'] = 'Problem Occur While Uploading Assignment';
							             
                                                                        $this->load->view('admin/add_assignment', $data);
						                  }
					                    }
				                                   
                                                       }
                                  }                                                                     
                                                            
                                                              
                             }else{
                                           

                                             
                                  $this->load->view('admin/add_assignment'); 
                                                              
                                 }
                                                                   
                                }else{
                       
                          $this->logout();
                    }                   
                                                            }
          /* -------------------------Logout assignment------------------- */
         
           public function logout()
           {      
                  $this->session->unset_userdata('contid');
                  $this->load->view('admin/login');
           }

         /*-------------------------test for function-----------------*/
             public function test()
             {      
                  echo "this is called";
             }

   /*-----------------------own chat --------------------------------*/
   
   public function ownchat()
              {
                  if($this->session->userdata('contid')){    

                $user=$this->admin->getusers();
                $this->load->view('admin/ownchat',['user'=>$user]);
                   }else{
                       
                          $this->logout();
                    }      
              }
   public function count_noti()
              {
                  if($this->session->userdata('contid')){ 
                     
                 $newid=$_POST['id'];
                $user=$this->admin->getallcountmsg($newid);
               echo $user;
                   }else{
                       
                          $this->logout();
                    }      
              } 
              
   public function  get_msg_noti(){

                          if($this->session->userdata('contid')){
                          $contid12=$_SESSION["contid"];
                           $newid=$_POST['id'];
                        $allmessage=$this->admin->getpartiownchatmessages($newid,$contid12);
                      //var_dump($allmessage);
                      
                      
                      $name_person=$this->admin->getnamechatmessages($newid);
                       foreach($allmessage as $row)
                       {
                      if($row->toid == $contid12){
                      
                      echo "<li class='left clearfix'><h3 class='username'>Arfeen khan:</h3><p class='contents'>".$row->msg."</p></li>";
                      }
                      else
                      {
                      foreach($name_person as $name){
                      echo "<li class='left clearfix'><h3 class='username' style='color:#000;'>".$name->name.":</h3><p class='contents'>".$row->msg."</p></li>";
                      }
                       
                      }
                       
                       
                       }
             
                         

                          }else{
                       
                          $this->logout();
                    }   
               } 
   
public function set_msg_noti()
              {
                  if($this->session->userdata('contid')){    

                $fromid=$_POST['id'];
                $toid=$_SESSION["contid"];
                $msg=$_POST["msg"];
                var_dump($msg);
                $this->admin->setmsg($toid,$fromid,$msg);
                   }else{
                       
                          $this->logout();
                    }      
              }

/*--------------------------super assignments-----------------------*/

public function superassignment()
             {
              if($this->session->userdata('contid')){
              
                 $assignment=$this->admin->getassignemnts1();
                 $id=$_SESSION["contid"];
                 $name=$this->admin->getname($id);
                 //var_dump($name);exit;
                 $user=$this->admin->getusers();
                 $view1=$this->admin->getviewss();
                  $view=$this->admin->getviewss1(); 
                 $gettotalass=$this->admin->gettotalass1();
                 $userstatus1=$this->admin->getuserstatus1();
                 $userstatus=$this->admin->getuserstatus();
                 $nnoofuser=$this->admin->getnnoofuser();
                 //$question=$this->admin->getquestion();
               
                  $this->load->view('admin/superassignment',['assignment'=>$assignment,'name'=>$name,'user'=>$user,'userstatus'=>$userstatus,'userstatus1'=>$userstatus1,'view'=>$view,'nnoofuser'=>$nnoofuser,'gettotalass'=>$gettotalass]);

                  }else{
                       
                          $this->logout();
                    }
              
             }

        
}
  
?>