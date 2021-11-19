<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(E_ALL);
ini_set('display_errors', 1);

// name PHPMailer\PHPMailer\PHPMailer;
// name PHPMailer\PHPMailer\Exception;
require_once(APPPATH."third_party/PHPMailer/PHPMailer/src/Exception.php");
require_once(APPPATH."third_party/PHPMailer/PHPMailer/src/PHPMailer.php");
require_once(APPPATH."third_party/PHPMailer/PHPMailer/src/SMTP.php");
 

class Welcome extends CI_Controller {
	private $apiurl = 'http://supportlaxmigroup.com/iaapi/'; 
	 public function login(){
		$this->load->view('backend/login');
	}
	public function index()
	{
		$this->load->view('comman/head');
		$this->load->view('comman/nav');
		$this->load->view('frontend/index');
 		$this->load->view('comman/footer');
	}
	public function about()
	{
		$this->load->view('comman/head');
		$this->load->view('comman/nav');
		$this->load->view('frontend/about');
 		$this->load->view('comman/footer');
	}
	public function advantage()
	{
		$this->load->view('comman/head');
		$this->load->view('comman/nav');
		$this->load->view('frontend/advantage');
 		$this->load->view('comman/footer');
	}
	public function howitwork()
	{
		$this->load->view('comman/head');
		$this->load->view('comman/nav');
		$this->load->view('frontend/how-it-work');
 		$this->load->view('comman/footer');
	}
	public function treatablecases()
	{
		$this->load->view('comman/head');
		$this->load->view('comman/nav');
		$this->load->view('frontend/treatable-cases');
 		$this->load->view('comman/footer');
	}
	public function search()
	{
		$this->load->view('comman/head');
		$this->load->view('comman/nav');
		$this->load->view('frontend/search');
 		$this->load->view('comman/footer');
	}
	public function contact()
	{
		$this->load->view('comman/head');
		$this->load->view('comman/nav');
		$this->load->view('frontend/contact');
 		$this->load->view('comman/footer');
	}
	public function termscondition(){
		$this->load->view('comman/head');
		$this->load->view('comman/nav');
		$this->load->view('frontend/terms-condition');
 		$this->load->view('comman/footer');
	}
	public function privacypolicy(){
		$this->load->view('comman/head');
		$this->load->view('comman/nav');
		$this->load->view('frontend/privacypolicy');
 		$this->load->view('comman/footer');
	}
	public function disclaimer(){
		$this->load->view('comman/head');
		$this->load->view('comman/nav');
		$this->load->view('frontend/disclaimer');
 		$this->load->view('comman/footer');
	}
	public function search_results(){
	    $City = $data['city']= $_POST['city'];
	    $Area = $data['area']= $_POST['area'];
	    $DoctorName = $data['doctorname']= $_POST['doctorname'];
	    $ClinicName = $data['clinicname']= $_POST['clinicname'];
	    $Latitude = $data['latitude']= $_POST['latitude'];
	    $Longitude = $data['longitude']= $_POST['longitude'];
	    
	    $PageNumber = $data['pagenumber']= $_POST['pagenumber'];
	    $Pagesize = $data['pagesize']= $_POST['pagesize'];

	    $curl2 = curl_init();
		  curl_setopt_array($curl2, array(
		  CURLOPT_URL => $this->apiurl.'api/FindList',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'POST',
		  CURLOPT_POSTFIELDS => 'City='.$City.'&Area='.$Area.'&DoctorName='.$DoctorName.'&ClinicName='.$ClinicName.'&Latitude='.$Latitude.'&Longitude='.$Longitude.'&PageNumber='.$PageNumber.'&Pagesize='.$Pagesize,
		  CURLOPT_HTTPHEADER => array(
		    'Accept: application/json',
		    'Authorization: Bearer F46CBDFA-856D-4194-9971-A57445C846D6',
		    'Content-Type: application/x-www-form-urlencoded'
		  ),
		 ));

		$response2 = curl_exec($curl2);
		curl_close($curl2);  
 		$result_array = json_decode($response2);
 		$dataobj = json_encode($result_array->data);
 		$dataobj2 = json_decode($dataobj);
 		$dataobj3 =json_decode($dataobj2[0]->Result);
	     $data['totalcount'] = $dataobj3->TotalCount;    
	     $data['pages'] = ceil($data['totalcount'] / $Pagesize);    
	     $data['dentists'] = $dataobj3->Dentist;
	     $newdata = array(
        'city'  => $_POST['city'],
        'area'     => $_POST['area'],
        'doctorname' => $_POST['doctorname'],
        'clinicname'  => $_POST['clinicname'],
        'latitude'     => $_POST['latitude'],
        'longitude' => $_POST['longitude'],
        'pagenumber'  => $_POST['pagenumber'],  
         'pagesize'  => $_POST['pagesize']         
		);
	     $this->session->set_userdata($newdata);
	     $this->load->library('pagination');
		$config['base_url'] = site_url('welcome/search_result');
		$config['total_rows'] = $data['totalcount'];
		$config['per_page'] = 20;
		$config['full_tag_open'] = '<ul style="list-style: none;  justify-content: center;  display: flex;    letter-spacing: 12px;    font-size: 16px;">';
	    $config['full_tag_close'] = '</ul>';
	    $config['first_link'] = false;
	    $config['last_link'] = false;
	    $config['first_tag_open'] = '<li class="stling-li">';
	    $config['first_tag_close'] = '</li>';
	    $config['prev_link'] = '&laquo';
	    $config['prev_tag_open'] = '<li class="prev stling-li">';
	    $config['prev_tag_close'] = '</li>';
	    $config['next_link'] = '&raquo';
	    $config['next_tag_open'] = '<li class="stling-li">';
	    $config['next_tag_close'] = '</li>';
	    $config['last_tag_open'] = '<li class="stling-li">';
	    $config['last_tag_close'] = '</li>';
	    $config['cur_tag_open'] = '<li class="active stling-li"><a href="#" class="stling-li">';
	    $config['cur_tag_close'] = '</a></li>';
	    $config['num_tag_open'] = '<li class="stling-li">';
	    $config['num_tag_close'] = '</li> '; 
		$this->pagination->initialize($config);
		redirect('welcome/search_result');
		// $this->load->view('comman/head');
		// $this->load->view('comman/nav');
		// $this->load->view('frontend/search_results',$data);
 	// 	$this->load->view('comman/footer');
	}

	public function search_result(){
		 $data['city']= $_SESSION['city'];
	     $data['area']= $_SESSION['area'];
	     $data['doctorname']= $_SESSION['doctorname'];
	     $data['clinicname']= $_SESSION['clinicname'];
	     $data['latitude']= $_SESSION['latitude'];
	     $data['longitude']= $_SESSION['longitude'];	    
	     $data['pagenumber']= $_SESSION['pagenumber'];
	     $data['pagesize']= $_SESSION['pagesize'];
	     
		$curl2 = curl_init();
		  curl_setopt_array($curl2, array(
		  CURLOPT_URL => $this->apiurl.'api/FindList',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'POST',
		  CURLOPT_POSTFIELDS => 'City='.$data['city'].'&Area='.$data['area'].'&DoctorName='.$data['doctorname'].'&ClinicName='.$data['clinicname'].'&Latitude='.$data['latitude'].'&Longitude='. $data['longitude'].'&PageNumber='.$data['pagenumber'].'&Pagesize='.$data['pagesize'],
		  CURLOPT_HTTPHEADER => array(
		    'Accept: application/json',
		    'Authorization: Bearer F46CBDFA-856D-4194-9971-A57445C846D6',
		    'Content-Type: application/x-www-form-urlencoded'
		  ),
		 ));

		$response2 = curl_exec($curl2);
		curl_close($curl2);  
 		$result_array = json_decode($response2);
 		$dataobj = json_encode($result_array->data);
 		$dataobj2 = json_decode($dataobj);
 		$dataobj3 =json_decode($dataobj2[0]->Result);	 
 		
 	 	
	     $data['totalcount'] = $dataobj3->TotalCount;    
	     $data['pages'] = ceil($data['totalcount'] / $data['pagesize']);    
	     $data['dentists'] = $dataobj3->Dentist;

		$this->load->library('pagination');
		$config['base_url'] = site_url('welcome/search_result');
		$config['total_rows'] = $data['totalcount'];
		$config['per_page'] = 20;
		$config['full_tag_open'] = '<ul style="list-style: none;  justify-content: center;  display: flex;    letter-spacing: 12px;    font-size: 16px;">';
	    $config['full_tag_close'] = '</ul>';
	    $config['first_link'] = false;
	    $config['last_link'] = false;
	    $config['first_tag_open'] = '<li class="stling-li">';
	    $config['first_tag_close'] = '</li>';
	    $config['prev_link'] = '&laquo';
	    $config['prev_tag_open'] = '<li class="prev stling-li">';
	    $config['prev_tag_close'] = '</li>';
	    $config['next_link'] = '&raquo';
	    $config['next_tag_open'] = '<li class="stling-li">';
	    $config['next_tag_close'] = '</li>';
	    $config['last_tag_open'] = '<li class="stling-li">';
	    $config['last_tag_close'] = '</li>';
	    $config['cur_tag_open'] = '<li class="active stling-li"><a href="#" class="stling-li">';
	    $config['cur_tag_close'] = '</a></li>';
	    $config['num_tag_open'] = '<li class="stling-li">';
	    $config['num_tag_close'] = '</li> ';
	     
		$this->pagination->initialize($config);
		$this->load->view('comman/head');
		$this->load->view('comman/nav');
		$this->load->view('frontend/search_results',$data);
 		$this->load->view('comman/footer');
	}
	public function clinic_doctor_infodetails(){
		$cbid = $_POST['cbid'];
		$cid = $_POST['cid'];
		$drid = $_POST['drid'];
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => $this->apiurl.'api/GetDoctor',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'POST',
		  CURLOPT_POSTFIELDS => 'CustomerID='.$cid.'&DoctorID='.$drid.'&CustomerBranchID='.$cbid,
		  CURLOPT_HTTPHEADER => array(
		    'Accept: application/json',
		    'Authorization: Bearer F46CBDFA-856D-4194-9971-A57445C846D6',
		    'Content-Type: application/x-www-form-urlencoded'
		  ),
		));

		$response = curl_exec($curl);
		curl_close($curl); 
		$myrespo = json_decode($response);		 
		$datares = json_decode($myrespo->data[0]->Result);
	    $fdenstist = $datares->Dentist;
	    $doctoname = $datares->Dentist[0]->DoctorName;
	    $ip =$this->input->ip_address();
	    $date = date('Y-m-d');
	   	$this->db->query("INSERT INTO `Fd_tracking`( `CustomerID`,`CustomerbranchID`, `Doctor_name`, `ip`, `created_date`) VALUES ('$cid','$cbid','$doctoname','$ip','$date')");
   	
	   echo json_encode($fdenstist);
	   
	}
	public function clinic_details(){
		$this->load->view('comman/head');
		$this->load->view('comman/nav');
		$this->load->view('frontend/clinic_details');
 		$this->load->view('comman/footer');
	}
	public function doctor_details(){
		$this->load->view('comman/head');
		$this->load->view('comman/nav');
		$this->load->view('frontend/doctor_details');
 		$this->load->view('comman/footer');
	}
	public function doctor_clinic_details(){
		$CustomerBranchID = $_POST['CustomerBranchID'];
		$CustomerID = $_POST['CustomerID'];
	   $curl2 = curl_init();
	  curl_setopt_array($curl2, array(
	  CURLOPT_URL => $this->apiurl.'api/GetClinic',
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => '',
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 0,
	  CURLOPT_FOLLOWLOCATION => true,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => 'POST',
	  CURLOPT_POSTFIELDS => 'City='.$city,
	  CURLOPT_HTTPHEADER => array(
	    'Accept: application/json',
	    'Authorization: Bearer F46CBDFA-856D-4194-9971-A57445C846D6',
	    'Content-Type: application/x-www-form-urlencoded'
	  ),
	));

	$response2 = curl_exec($curl2);
	curl_close($curl2); 
   var_dump($response2);

	}
	public function contactsubmit(){

		date_default_timezone_set('Asia/Kolkata');
		$f_name = $_POST['f_name'];
		$l_name = $_POST['l_name'];
		$clinic = $_POST['clinic'];
		$city = $_POST['city'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];
		$message = $_POST['message']; 
	 $created_date =date("Y-m-d h:i:sa");
	 $this->load->model('Submitmodel');
 if(empty($_POST['querybot']) && empty($_POST['namebot'])){
 		
 	$query = 	$this->db->query("INSERT INTO `contactus`( `fname`, `lname`, `clinicname`, `city`, `phone`, `email`, `query`, `createddate`) VALUES ('$f_name','$l_name','$clinic','$city','$phone','$email','$message','$created_date')");
   		 
		  //CRM
		$curl = curl_init();
		curl_setopt_array($curl, array(
		  CURLOPT_URL => 'https://illusiondental.automatecrm.io/modules/Webforms/capture.php',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'POST',
		  CURLOPT_POSTFIELDS => array('publicid' => 'bcb067ce0f113a19f57fc3a38dd9edb1','urlencodeenable' => '1','firstname' => $f_name,'lastname' => $l_name,'email' => $email,'mobile' => $phone,'city' => $city,'company' => $clinic,'description' => $message),
		));

		//$response = curl_exec($curl);
		curl_close($curl);

 }else{
	     $boat1 = $_POST['querybot'];
	     $boat2 =$_POST['namebot'];
	    $query =  $this->db->query(" INSERT INTO `spamcontactus`(`fname`, `query`, `createddate`) VALUES 
	   ('$boat2','$boat1','$created_date')");
	    
   
 }
  
 if($query){
			 	redirect(base_url('thankyou'));
			 }else{
			redirect(base_url('contact'));
			 }

// echo $response;


//email
$mail = new PHPMailer;
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = TRUE;
$mail->SMTPSecure = 'tls';
$mail->Username = 'zaroon.junaid@sibinfotech.in';
$mail->Password = 'zaroon@1234';
$mail->Port = 587;
$mail = new PHPMailer(TRUE);
 
try {
        $body_message ="
        <table width='500' border='1' cellspacing='0'>
            <tr>
                <td colspan='2' align='center' style='padding:5px;'><img src='https://www.illusionaligners.com/images/logo.jpg' width='160'/></td>
            </tr>
            <tr>
                <td width='250' style='padding:5px'>First Name</td>
                <td style='padding:5px'>".$f_name."</td>
            </tr>
            <tr>
                <td width='250' style='padding:5px'>Last Name</td>
                <td style='padding:5px'>".$l_name."</td>
            </tr>
            <tr>
                <td width='250' style='padding:5px'>Clinic Name</td>
                <td style='padding:5px'>".$clinic."</td>
            </tr>
            <tr>
                <td width='250' style='padding:5px'>City</td>
                <td style='padding:5px'>".$city."</td>
            </tr>
            <tr>
                <td width='250' style='padding:5px'>Phone</td>
                <td style='padding:5px'>".$phone."</td>
            </tr>
            <tr>
                <td width='250' style='padding:5px'>Email</td>
                <td style='padding:5px'>".$email."</td>
            </tr>
            <tr>
                <td width='250' style='padding:5px'>Your Query</td>
                <td style='padding:5px'>".$message."</td>
            </tr>
        </table>";
        
        $mail->setFrom("info@illusionaligners.com", "Illusion Aligners");
        $mail->Body = $body_message;
        
        $mail->addAddress('anandsharma@illusiondental.com','Illusion Aligners');
     //  $mail->addAddress('info@illusionaligners.com','Illusion Aligners');
       //$mail->addAddress('reema@illusiondental.com','Illusion Aligners');
        
        $mail->Subject = "New Contact Inquiry";
        $mail->IsHTML(true);
        /* Finally send the mail. */
		      if ($mail->send()) { 
		      	 
		         //success msg
		        } 
		        else {  
		        //failed msg
		      }
		    
			 }
			 catch (Exception $e) 
			 {
			  echo $e->errorMessage();
			}
			catch (\Exception $e)
			 {
			  echo $e->getMessage();
			 }

			 
	}

	 public function thankyou(){
	$this->load->view('comman/head');
		$this->load->view('comman/nav');
		$this->load->view('frontend/thankyou');
 		$this->load->view('comman/footer');
	 }

	 public function citysearch(){
	$city = $_POST['city'];
	$curl2 = curl_init();
	  curl_setopt_array($curl2, array(
	  CURLOPT_URL => $this->apiurl.'api/cityFind',
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => '',
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 0,
	  CURLOPT_FOLLOWLOCATION => true,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => 'POST',
	  CURLOPT_POSTFIELDS => 'City='.$city,
	  CURLOPT_HTTPHEADER => array(
	    'Accept: application/json',
	    'Authorization: Bearer F46CBDFA-856D-4194-9971-A57445C846D6',
	    'Content-Type: application/x-www-form-urlencoded'
	  ),
));

$response2 = curl_exec($curl2);
curl_close($curl2);  
$decode2  = json_decode($response2); 
$areas= json_encode($decode2->data); 
$newaras = json_decode($areas);
// var_dump($newaras);
 if($newaras)
 	{
		 foreach ($newaras as $area)  { 	 
		 
		echo '<ul id="areas_links" class="smart_search_list">
		   
		    <li><a href="#" class="area_res"> '.$area->area.'  </a></li>
		  
		</ul>';

		}
	}
}

	 public function clinicsearch(){
	$doctorname = $_POST['doctorname'];
	$curl2 = curl_init();
	  curl_setopt_array($curl2, array(
	  CURLOPT_URL => $this->apiurl.'api/docNcli',
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => '',
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 0,
	  CURLOPT_FOLLOWLOCATION => true,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => 'POST',
	  CURLOPT_POSTFIELDS => 'Search='.$doctorname,
	  CURLOPT_HTTPHEADER => array(
	    'Accept: application/json',
	    'Authorization: Bearer F46CBDFA-856D-4194-9971-A57445C846D6',
	    'Content-Type: application/x-www-form-urlencoded'
	  ),
));
 
   $response2 = curl_exec($curl2);
   curl_close($curl2);  
   $result_array = json_decode($response2);  
   $areas= json_encode($result_array->data);   
   $newaras = json_decode($areas); 
   $decodedstring = json_decode($newaras); 
   
	if($result_array->condition =='2' || $result_array->condition =='3'){
	$clinics1 = $decodedstring->Clinics;
	if($clinics1){
	echo'<ul id="clinics_links" class="smart_search_list">
	<li class="list_title"><a>Clinics</a></li>';
	foreach ($clinics1 as $clinic)  { 	
	echo '<li><span class="res_set">'.$clinic->ClinicName.'</span> <span>'.$clinic->DentistLocation.'</span></li>';
	}
	echo '</ul>';
	} 
	} 

	if($result_array->condition =='1' || $result_array->condition =='3'){
	$doctors = $decodedstring->Doctors;
	if($doctors){

	echo'<ul id="doctors_links" class="smart_search_list">
	<li class="list_title"><a>Doctors</a></li>';
	foreach ($doctors as $doctor)  { 	
	echo '<li><span class="res_set">'.$doctor->DoctorName.'</span> <span>'.$doctor->Speciality.'</span></li>';
	}
	echo '</ul>';
	}
	}
    
}

 public function getdoctorprofile(){
	$city = $_POST['city'];
	$city = $_POST['city'];
	$city = $_POST['city'];
	$curl2 = curl_init();
	  curl_setopt_array($curl2, array(	  	 
	  		CURLOPT_URL => $this->apiurl.'api/GetClinic',	   
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => '',
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 0,
	  CURLOPT_FOLLOWLOCATION => true,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => 'POST',
	  CURLOPT_POSTFIELDS => 'City='.$city.'&Area='.$Area.'&DoctorName='.$DoctorName.'&ClinicName='.$ClinicName.'&Latitude='.$Latitude.'&Longitude='.$Longitude,
	  CURLOPT_HTTPHEADER => array(
	    'Accept: application/json',
	    'Authorization: Bearer F46CBDFA-856D-4194-9971-A57445C846D6',
	    'Content-Type: application/x-www-form-urlencoded'
	  ),
));

$response2 = curl_exec($curl2);
curl_close($curl2);  
$decode2  = json_decode($response2); 
 
 var_dump($response2);
  
}



//cdata
public function cdata(){
    $fname = $_POST['fname'];
	$fphone = $_POST['fphone'];
	$fpinc = $_POST['fpinc'];
	$ip_address = $this->get_client_ip();
	$querycheck = 	$this->db->query("SELECT * FROM `patient` WHERE phone='$fphone' AND pincode='$fpinc' AND name='$fname'");
 
 	if($querycheck->num_rows()==0){
	  $query = 	$this->db->query("INSERT INTO `patient`(`name`, `phone`, `pincode`,`ipaddress`) VALUES ('$fname','$fphone','$fpinc','$ip_address')");  
 	}
	
	$newdata = array(
        'name'  => $fname,
        'phone'     => $fphone,
        'pin' => $fpinc
    );
    $this->session->set_userdata($newdata);
    echo "1";
}

public function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

}
