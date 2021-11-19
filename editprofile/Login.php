<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Login extends CI_Controller {
	private $apiurl = 'http://supportlaxmigroup.com/iaapi/'; 	  
	
	public function forgetpassword(){
		$this->load->view('backend/forgetpassword');
 	 
}
	 public function authenticate(){
	  $username = $_POST['username'];
	  $password = $_POST['password'];
	  
	  if(($username=='superadmin'|| $username=='admin') && $password =='admin@4321'){
	        $person = array();
	        $userdata = array();
	        $userdata['username'] = $username;
	        $userdata['password'] = $password;
	        $myjson1 = array(json_encode($userdata));
            $person['message'] = "User Login successfully";
            $person['status'] = "Success";
            $person['data'] = $myjson1;
            $person['status_code'] = 'spadmin';
           echo $myJSON = json_encode($person);
           	$decode1  = json_decode($myJSON);
            
	    if($decode1->status_code=='spadmin'){
	        $resp_msg = json_decode($decode1->data[0]);
			$newdata1 = array('loggedin_username'=>$resp_msg->username);
		    $this->session->set_userdata($newdata1);
		}  
	     
	  }else{
	   $curl = curl_init();
		curl_setopt_array($curl, array(
		  CURLOPT_URL => $this->apiurl.'api/login',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'POST',
		  CURLOPT_POSTFIELDS => 'code='.$username.'&password='.$password,
		  CURLOPT_HTTPHEADER => array(
		    'Accept: application/json',
		    'Authorization: Bearer F46CBDFA-856D-4194-9971-A57445C846D6',
		    'Content-Type: application/x-www-form-urlencoded'
		  ),
		));

		$response = curl_exec($curl);
		 curl_close($curl);
		 echo $response;
		$decode  = json_decode($response);
		// echo json_encode($decode->data[0]->Description);
		if($decode->status_code==200){
			$newdata = array('loggedin_username'=>$decode->data[0]->Description,'code'=>$decode->data[0]->code,'CustomerID'=>$decode->data[0]->CustomerID);
		$this->session->set_userdata($newdata);
		}   
	  }
		
}

}