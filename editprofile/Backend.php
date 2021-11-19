<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Backend extends CI_Controller {

private $apiurl = 'http://supportlaxmigroup.com/iaapi/'; 
public function __construct(){
	parent::__construct();			 
	date_default_timezone_set("Asia/Kolkata");
 
 $this->load->model('Submitmodel');
 $this->Submitmodel->is_user_logged_in(); 

}  

public function dashboard()
{

	 	$this->load->view('backend/comman/header');
	 	$this->load->view('backend/comman/topbar');
	 	$this->load->view('backend/comman/sidebar');
	    $this->load->view('backend/dashboard');
	 	$this->load->view('backend/comman/footer');
}

public function editprofile(){
      $CustomerID = $this->session->userdata('CustomerID');
	 $curl = curl_init();
   curl_setopt_array($curl, array(
	  CURLOPT_URL => $this->apiurl.'api/list/'.$CustomerID,
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => '',
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 0,
	  CURLOPT_FOLLOWLOCATION => true,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => 'GET',
	  CURLOPT_HTTPHEADER => array(
	    'Accept: application/json',
	    'Authorization: Bearer F46CBDFA-856D-4194-9971-A57445C846D6'
	  ),
	));

	  $response = curl_exec($curl);
	  curl_close($curl);
	 
	  $decode  = json_decode($response);
	 // var_dump($response);
	//	echo json_encode($decode->data->doctor_data[0]->Qualification);
	 $data['CustomerID'] = $decode->data->branch_data[0]->CustomerID;
	 $data['DentistName'] = $decode->data->branch_data[0]->DentistName;
	 $data['Services'] = $decode->data->branch_data[0]->Services;
	 $data['Latitude'] = $decode->data->branch_data[0]->Latitude;
	 $data['Longitude'] = $decode->data->branch_data[0]->Longitude;
	 $data['URL'] = $decode->data->branch_data[0]->URL;
	 $data['Address1'] = $decode->data->branch_data[0]->Address1;
	 $data['Address2'] = $decode->data->branch_data[0]->Address2;
	 $data['ClinicTiming'] = $decode->data->branch_data[0]->ClinicTiming;
	 if(isset($decode->data->branch_data[0]->City )){
	 $data['city'] = $decode->data->branch_data[0]->City;
	 }
	 if(isset($decode->data->branch_data[0]->State )){
	 $data['State'] = $decode->data->branch_data[0]->State;
	 }
	 $data['Country'] = $decode->data->branch_data[0]->Country;
	 $data['PinCode'] = $decode->data->branch_data[0]->PinCode;
	   if(isset($decode->data->branch_data[0]->MobileNo)){
	 $data['MobileNo'] = $decode->data->branch_data[0]->MobileNo;
	   }
	 $data['EMailID'] = $decode->data->branch_data[0]->EMailID;
    if(isset($decode->data->doctor_data[0]->WhatsappNo )){
	 $data['WhatsappNo'] = $decode->data->doctor_data[0]->WhatsappNo;
	 	 }
	 $data['Qualification'] = $decode->data->doctor_data[0]->Qualification;
	 $data['YearOfExperience'] = $decode->data->doctor_data[0]->YearOfExperience;
	 $data['Speciality'] = $decode->data->doctor_data[0]->Speciality;
	 $data['Education'] = $decode->data->doctor_data[0]->Education;
	 if(isset($decode->data->Profile)){
	   $data['profile'] = $decode->data->Profile;
	 } 
	 if(isset($decode->data->image_gallery_data )){
	   $data['image_gallery_data'] = $decode->data->image_gallery_data;
	 }
	  if(isset($decode->data->certificaete_data )){
	  $data['certificaete_data'] = $decode->data->certificaete_data;
	 }
    $data['country'] = $decode->data->country_data;
	$data['allstate'] = $decode->data->state_data;
	$data['allcity'] = $decode->data->city_data;
    $data['LongDescription'] = $decode->data->doctor_data[0]->LongDescription;
    $data['ShortDescription'] = $decode->data->doctor_data[0]->ShortDescription;
 
 
         $this->load->view('backend/comman/header');
	 	$this->load->view('backend/comman/topbar' ,$data);
	 	$this->load->view('backend/comman/sidebar');
	    $this->load->view('backend/editprofile',$data);
	 	$this->load->view('backend/comman/footer');
}

 public function submit_editporfile(){
$CustomerID = $_POST['CustomerID']; 
$DentistName = $_POST['DentistName']; 
$EMailID = $_POST['EMailID']; 
$PhoneNo = implode(",",$_POST['PhoneNo'] ); 
$MobileNo = implode(",",$_POST['MobileNo'] ); 
$Address1 = $_POST['Address1']; 
$Address2 = $_POST['Address2']; 
$State = $_POST['State']; 
$PinCode = $_POST['PinCode']; 
$Speciality = $_POST['Speciality']; 
$Education = $_POST['Education']; 

$longDescription = addslashes($_POST['longDescription']); 
$shortDescription = addslashes($_POST['shortDescription']); 
$mapaddress = $_POST['mapaddress']; 
$longitude = $_POST['longitude']; 
$latitude = $_POST['latitude']; 
$city = $_POST['city']; 
$country = $_POST['country']; 
if (!file_exists('assets/uploads/'.$CustomerID))
    {
	 	mkdir('assets/uploads/'. $CustomerID, 0777, TRUE);
    }
 if(isset($_FILES['profile_img']) && is_uploaded_file($_FILES['profile_img']['tmp_name'])){	
      $config['upload_path'] = 'assets/uploads/'.$CustomerID.'/';
      $config['allowed_types'] = 'jpg|jpeg|png|gif|JPG|JPEG|PNG|GIF';
      $config['max_size'] = '102400'; // max_size in kb
      //Load upload library
      $this->load->library('upload',$config);
       if(!$this->upload->do_upload('profile_img')){
         $error = $this->upload->display_errors();
         die();
        }else{				                        
         $uploadData = $this->upload->data();
         $filename3 = $uploadData['file_name'];
         $typeImage = 3;
         $authazure = $this->get_AZURE($filename3,$CustomerID,$typeImage);
         if(isset($_POST['existingProfile'])){
            $existingurl= $_POST['existingProfile'];
            $titleName = 'CustomerProfile';
           $this->deleteOnupload($CustomerID,$existingurl,$titleName);
         }
        
        } 
 }
 
 // multiple certification file upload 
   $countfiles = count($_FILES['filescert']['name']);
    for($i=0;$i<$countfiles;$i++){				 
    if(!empty($_FILES['filescert']['name'][$i])){				 
      // Define new $_FILES array - $_FILES['file']
      $_FILES['file']['name'] = $_FILES['filescert']['name'][$i];
      $_FILES['file']['type'] = $_FILES['filescert']['type'][$i];
      $_FILES['file']['tmp_name'] = $_FILES['filescert']['tmp_name'][$i];
      $_FILES['file']['error'] = $_FILES['filescert']['error'][$i];
      $_FILES['file']['size'] = $_FILES['filescert']['size'][$i];
      // Set preference
       				           
      $config['upload_path'] = 'assets/uploads/'.$CustomerID.'/';
      $config['allowed_types'] = 'jpg|jpeg|png|gif|JPG|JPEG|PNG|GIF';
      $config['max_size'] = '102400'; // max_size in kb
      $config['file_name'] = $_FILES['filescert']['name'][$i];				 
      //Load upload library
      $this->load->library('upload',$config);				 
      // File upload
       if(!$this->upload->do_upload('file')){
        $error = $this->upload->display_errors();				                       
        }else{				                        
        $uploadData = $this->upload->data();
        $filename[] =$uploadData['file_name']; 		              
         
      }		
         $imagename = $filename[$i]; 	
         $typeImage = 1;
         $authazure_certificate = $this->get_AZURE($imagename,$CustomerID,$typeImage);
          
      }
    }
	
	// multiple IMAGE GALARY file upload 
		$countGfiles = count($_FILES['filesimage']['name']);				 
	    for($i=0;$i<$countGfiles;$i++){				 
        if(!empty($_FILES['filesimage']['name'][$i])){				 
          // Define new $_FILES array - $_FILES['file']
          $_FILES['file']['name'] = $_FILES['filesimage']['name'][$i];
          $_FILES['file']['type'] = $_FILES['filesimage']['type'][$i];
          $_FILES['file']['tmp_name'] = $_FILES['filesimage']['tmp_name'][$i];
          $_FILES['file']['error'] = $_FILES['filesimage']['error'][$i];
          $_FILES['file']['size'] = $_FILES['filesimage']['size'][$i];
          // Set preference
         				           
          $config['upload_path'] = 'assets/uploads/'.$CustomerID.'/';
          $config['allowed_types'] = 'jpg|jpeg|png|gif|JPG|JPEG|PNG|GIF';
          $config['max_size'] = '102400'; // max_size in kb
          $config['file_name'] = $_FILES['filesimage']['name'][$i];				 
          //Load upload library
          $this->load->library('upload',$config);				 
          // File upload
           if(!$this->upload->do_upload('file')){
             $error = $this->upload->display_errors();				                       
        }else{				                        
            $uploadDatag = $this->upload->data();
            $filename2[] =$uploadDatag['file_name']; 
          } 
             $Gimagename = $filename2[$i]; 			              
             $typeImage = 2;
             $authazure_Galary = $this->get_AZURE($Gimagename,$CustomerID,$typeImage);
              
          }
        }
	
  $curl = curl_init();
  curl_setopt_array($curl, array(
  CURLOPT_URL => $this->apiurl.'api/setlist',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => 'CustomerID='.$CustomerID.'&DentistName='.$DentistName.'&EMailID='.$EMailID.'&PhoneNo='.$PhoneNo.'&MobileNo='.$MobileNo.'&Address1='.$Address1.'&Address2='.$Address2.'&State='.$State.'&PinCode='.$PinCode.'&Speciality='.$Speciality.'&Education='.$Education.'&LongDescription='.$longDescription.'&ShortDescription='.$shortDescription.'&mapaddress='.$mapaddress.'&longitude='.$longitude.'&latitude='.$latitude.'&city='.$city.'&country='.$country.'',
  CURLOPT_HTTPHEADER => array(
    'Accept: application/json',
    'Authorization: Bearer F46CBDFA-856D-4194-9971-A57445C846D6',
    'Content-Type: application/x-www-form-urlencoded'
  ),
));

$response = curl_exec($curl);
curl_close($curl);
$decode  = json_decode($response);
$this->session->set_flashdata('Success',$decode->message);
redirect('edit-profile');
  
}

public function get_AZURE($filename3,$CustomerID,$typeImage){
     $created_Date = Date('Y-m-d h:i:s');
    $curl = curl_init();
	curl_setopt_array($curl, array(
	  CURLOPT_URL => $this->apiurl.'api/uploadAuth',
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => '',
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 0,
	  CURLOPT_FOLLOWLOCATION => true,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => 'POST',
	  CURLOPT_POSTFIELDS => 'AuthKey=d9a60177-cbb8bd3fad-76035d0b7-1176a',
	  CURLOPT_HTTPHEADER => array(
	    'Accept: application/json',
	    'Authorization: Bearer F46CBDFA-856D-4194-9971-A57445C846D6',
	    'Content-Type: application/x-www-form-urlencoded'
	  ),
	));

	$response = curl_exec($curl);
	$azureCrdentialsapi=json_decode($response);
	//set all auth files
	$azurePath=$azureCrdentialsapi->data->auth_data[0]->AzurePath;
 	$SASToken=substr($azureCrdentialsapi->data->auth_data[0]->SASToken, 1);
	$ContainerName=$azureCrdentialsapi->data->auth_data[0]->ContainerName;
	$SCString= $azureCrdentialsapi->data->auth_data[0]->StorageConnectionString;
	$filter_SCString = explode(';',$SCString);
	$storageAccount = str_replace('AccountName=','',$filter_SCString[1]);
	$accesskey = str_replace('AccountKey=','',$filter_SCString[2]);
	$titleName;
	$virtualUrl; 
// 	set all image file
     if($typeImage=='1'){
             $titleName = 'CustomerCertificates';
             $virtualUrl ="https://blob.illusiondentallab.com/demo/CustomerCertificates/".$CustomerID;
            $destinationURL = "https://blob.illusiondentallab.com/demo/CustomerCertificates/".$CustomerID."/".$filename3;
     }else if($typeImage=='2'){
          $titleName = 'CustomerImageGallery';
            $virtualUrl ="https://blob.illusiondentallab.com/demo/CustomerImageGallery/".$CustomerID;
            $destinationURL = "https://blob.illusiondentallab.com/demo/CustomerImageGallery/".$CustomerID."/".$filename3;
     }else if($typeImage=='3'){
          $titleName = 'CustomerProfile';
            $virtualUrl ="https://blob.illusiondentallab.com/demo/CustomerProfile/".$CustomerID;
           $destinationURL = "https://blob.illusiondentallab.com/demo/CustomerProfile/".$CustomerID."/".$filename3;  
           
     }
    $filetoUpload = 'https://doctor.illusionaligners.com/assets/uploads/'.$CustomerID.'/'.$filename3;
    // insert in database
	$up_id=$this->Submitmodel->update_imge3($CustomerID,$filetoUpload,$filename3,$typeImage,$created_Date);
	
// 	upload in server
	$upload_status = $this->uploadBlob($filetoUpload, $storageAccount, $ContainerName, $filename3, $destinationURL, $accesskey,$azurePath,$SASToken);
	$this->Insert_Sucess_data($titleName,$CustomerID,$filename3,$virtualUrl,$filetoUpload,$destinationURL);  
    return true;
	curl_close($curl);
}


public function Insert_Sucess_data($titleName,$CustomerID,$filename3,$virtualUrl,$filetoUpload,$destinationURL){
  
	$curl2 = curl_init();
   curl_setopt_array($curl2, array(
  CURLOPT_URL => $this->apiurl.'api/setimage',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => 'Title='.$titleName.'&CustomerID='.$CustomerID.'&FileName='.$filename3.'&VirtualFilePath='.$virtualUrl.'&PhysicalFilePath='.$filetoUpload.'&FileURL='.$destinationURL,
  CURLOPT_HTTPHEADER => array(
    'Accept: application/json',
    'Authorization: Bearer F46CBDFA-856D-4194-9971-A57445C846D6',
    'Content-Type: application/x-www-form-urlencoded'
  ),
));

$response2 = curl_exec($curl2);
curl_close($curl2);
//echo $response2;
 $decode2  = json_decode($response2); 
  //echo json_encode($decode2->data->city_data);   
}

public function submitcertificate(){

           $CustomerID = $_POST['CustomerID'];   
           $created_Date = Date('Y-m-d h:i:s');
   
			    	    if (!file_exists('assets/uploads/'.$CustomerID)) {
										mkdir('assets/uploads/'. $CustomerID, 0777, TRUE);
									}
           			// Count total files for certificate upload
				     		$countfiles = count($_FILES['filescert']['name']);				 
				        // Looping all files
				     	 
				        for($i=0;$i<$countfiles;$i++){				 
				        if(!empty($_FILES['filescert']['name'][$i])){				 
				          // Define new $_FILES array - $_FILES['file']
				          $_FILES['file']['name'] = $_FILES['filescert']['name'][$i];
				          $_FILES['file']['type'] = $_FILES['filescert']['type'][$i];
				          $_FILES['file']['tmp_name'] = $_FILES['filescert']['tmp_name'][$i];
				          $_FILES['file']['error'] = $_FILES['filescert']['error'][$i];
				          $_FILES['file']['size'] = $_FILES['filescert']['size'][$i];
				          // Set preference
				           $URL = 'http://localhost/illusionaligner/';				           
				           $config['upload_path'] = 'assets/uploads/'.$CustomerID.'/';
				          $config['allowed_types'] = 'jpg|jpeg|png|gif|JPG|JPEG|PNG|GIF';
				          $config['max_size'] = '102400'; // max_size in kb
				          $config['file_name'] = $_FILES['filescert']['name'][$i];				 
				          //Load upload library
				          $this->load->library('upload',$config);				 
				          // File upload
				           if(!$this->upload->do_upload('file')){
                     $error = $this->upload->display_errors();				                       
                    }else{				                        
                     $uploadData = $this->upload->data();
			               $filename[] =$uploadData['file_name']; 		              
			              
			              }		
			              $imagename = $filename[$i]; 			              
			              $imgurl =    $URL.'assets/uploads/'.$CustomerID.'/'.$imagename;         
			              $up_id=$this->Submitmodel->update_imge($CustomerID,$imgurl,$imagename,$type='1',$created_Date);
				          }
				        }			            
				           
				        
}

public function submit_galaryimage(){

           $CustomerID = $_POST['CustomerID'];   
           $created_Date = Date('Y-m-d h:i:s');
   
			    	    if (!file_exists('assets/uploads/'.$CustomerID)) {
										mkdir('assets/uploads/'. $CustomerID, 0777, TRUE);
									}
           			// Count total files
				     		$countfiles = count($_FILES['filesimage']['name']);				 
				        // Looping all files
				     		 
				        for($i=0;$i<$countfiles;$i++){				 
				        if(!empty($_FILES['filesimage']['name'][$i])){				 
				          // Define new $_FILES array - $_FILES['file']
				          $_FILES['file']['name'] = $_FILES['filesimage']['name'][$i];
				          $_FILES['file']['type'] = $_FILES['filesimage']['type'][$i];
				          $_FILES['file']['tmp_name'] = $_FILES['filesimage']['tmp_name'][$i];
				          $_FILES['file']['error'] = $_FILES['filesimage']['error'][$i];
				          $_FILES['file']['size'] = $_FILES['filesimage']['size'][$i];
				          // Set preference
				           $URL = 'http://localhost/illusionaligner/';				           
				           $config['upload_path'] = 'assets/uploads/'.$CustomerID.'/';
				          $config['allowed_types'] = 'jpg|jpeg|png|gif|JPG|JPEG|PNG|GIF';
				          $config['max_size'] = '102400'; // max_size in kb
				          $config['file_name'] = $_FILES['filesimage']['name'][$i];				 
				          //Load upload library
				          $this->load->library('upload',$config);				 
				          // File upload
				           if(!$this->upload->do_upload('file')){
                     $error = $this->upload->display_errors();				                       
                    }else{				                        
                     $uploadData = $this->upload->data();
			                $filename2[] =$uploadData['file_name']; 
			              } 
			              $imagename = $filename2[$i]; 			              
			              $imgurl =    $URL.'assets/uploads/'.$CustomerID.'/'.$imagename;         
			              $up_id=$this->Submitmodel->update_imge2($CustomerID,$imgurl,$imagename,$type='2',$created_Date);
				            }
				            }			            
				           
				          
}
 

public function uploadBlob($filetoUpload, $storageAccount, $ContainerName, $filename3, $destinationURL, $accesskey,$azurePath,$SASToken) 
	{
        $currentDate = gmdate("D, d M Y H:i:s T", time());
        $handle = fopen($filetoUpload, "r");
        $head = array_change_key_case(get_headers($filetoUpload, 1));
        $fileLen =  $head['content-length'];
        $fileext = pathinfo($destinationURL, PATHINFO_EXTENSION);
        $fileext="image/".$fileext;
        $headerResource = "x-ms-blob-cache-control:max-age=3600\nx-ms-blob-type:BlockBlob\nx-ms-date:$currentDate\nx-ms-version:2020-08-04";
        $urlResource = "/$storageAccount/$ContainerName/$filename3";
        $destinationURL = "$destinationURL?$SASToken";
        $headers = [
            'x-ms-blob-cache-control: max-age=3600',
            'x-ms-blob-type: BlockBlob',
            'x-ms-version: 2020-08-04',
            'Content-Type: '.$fileext,
            'Content-Length: ' . $fileLen
        ];
        $ch = curl_init($destinationURL);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($ch, CURLOPT_INFILE, $handle); 
        curl_setopt($ch, CURLOPT_INFILESIZE, $fileLen); 
        curl_setopt($ch, CURLOPT_UPLOAD, true);
        return  $result = curl_exec($ch);
    	curl_error($ch);
        curl_close($ch);
    }

public function filterstates(){
$countryid = $_POST['countryID'];

	$curl = curl_init();
  curl_setopt_array($curl, array(
  CURLOPT_URL => $this->apiurl.'api/listState',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => 'CountryID='.$countryid,
  //CURLOPT_POSTFIELDS => 'CountryID=1',
  CURLOPT_HTTPHEADER => array(
    'Accept: application/json',
    'Authorization: Bearer F46CBDFA-856D-4194-9971-A57445C846D6',
    'Content-Type: application/x-www-form-urlencoded'
  ),
));

$response = curl_exec($curl);
curl_close($curl);
 //echo$response;
$decode  = json_decode($response);
echo json_encode($decode->data->state_data);
	 //$data['states'] = $decode->data->state_data[0]->Description
}

public function filtercity(){
$statename = $_POST['statename'];
	$curl2 = curl_init();
curl_setopt_array($curl2, array(
  CURLOPT_URL => $this->apiurl.'api/listCity',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => 'StateName='.$statename,
  CURLOPT_HTTPHEADER => array(
    'Accept: application/json',
    'Authorization: Bearer F46CBDFA-856D-4194-9971-A57445C846D6',
    'Content-Type: application/x-www-form-urlencoded'
  ),
));

$response2 = curl_exec($curl2);
curl_close($curl2);
//echo $response2;
 $decode2  = json_decode($response2); 
  echo json_encode($decode2->data->city_data);
	  
}
public function deleteOnupload($CustomerID,$FileUrl,$Title){
       $curl2 = curl_init();
      curl_setopt_array($curl2, array(
      CURLOPT_URL => $this->apiurl.'api/removeimages',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => 'Title='.$Title.'&CustomerID='.$CustomerID.'&FileUrl='.$FileUrl,
      CURLOPT_HTTPHEADER => array(
        'Accept: application/json',
        'Authorization: Bearer F46CBDFA-856D-4194-9971-A57445C846D6',
        'Content-Type: application/x-www-form-urlencoded'
      ),
    ));

  $response2 = curl_exec($curl2);
  curl_close($curl2);
 echo $response2;	 
}
public function deleteProfileimage(){
$CustomerID = $_POST['CustomerID'];
$FileUrl = $_POST['FileUrl'];
$Title = $_POST['Title'];
	  $curl2 = curl_init();
      curl_setopt_array($curl2, array(
      CURLOPT_URL => $this->apiurl.'api/removeimages',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => 'Title='.$Title.'&CustomerID='.$CustomerID.'&FileUrl='.$FileUrl,
      CURLOPT_HTTPHEADER => array(
        'Accept: application/json',
        'Authorization: Bearer F46CBDFA-856D-4194-9971-A57445C846D6',
        'Content-Type: application/x-www-form-urlencoded'
      ),
    ));

  $response2 = curl_exec($curl2);
  curl_close($curl2);
 echo $response2;	  
}

public function logout(){
	$this->session->sess_destroy();
		redirect('login');
}

}
