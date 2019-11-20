<?php

class Crud extends CI_Controller {

public function index(){
	$this->load->view('student');

}
public function newuser(){
	echo $data['fullName'] = $this->input->post('fullName',true);
	echo $data['email'] = $this->input->post('email',true);
	echo $data['password'] = $this->input->post('password',true);
	echo $data['age'] = $this->input->post('age',true);
	if( 
      empty($data['fullName']) ||  empty($data['email'])||
       empty($data['password'])|| empty($data['age'])
	){
		$this->session->set_flashdata('message','please check the required field');
		redirect('crud');
	}else{
          $myreturn=  $this->ModCrud->addUser($data);
          if($myreturn){
         $this->session->set_flashdata('message','success insert data');
		redirect('crud');
          }else{
		$this->session->set_flashdata('message','Not inserted data');
		redirect('crud');
          }
	}
} 

public function allStudents(){
	$data['allStudents'] = $this->ModCrud->getAllRecords();
	$this->load->view('allstudents',$data);
}

public function editstudents($id = null){
 //echo $id;
 $data['returnid'] = $this->ModCrud->CheckRecords($id);
 if(count($data['returnid']) == 1){
     //echo "found";
 	$this->load->view('editstudent',$data);
 }else{
 	//echo "not found";
 	$this->session->set_flashdata('message','This records is not exists');
		redirect('crud/allStudents');
 }
}

public function updaterecords(){
	echo $data['fullName'] = $this->input->post('fullName',true);
	echo $data['email'] = $this->input->post('email',true);
 	echo $data['age'] = $this->input->post('age',true);
 	echo $userid = $this->input->post('userid',true);
	if( 
      empty($data['fullName']) ||  empty($data['email'])||
         empty($data['age']) || empty( $userid)
	){
		$this->session->set_flashdata('message','please check the required field');
		redirect('crud/allStudents');
	}else{
          $myreturn1=  $this->ModCrud->updatestudent($data,$userid);
          if($myreturn1){
         $this->session->set_flashdata('message','success update data');
		redirect('crud/allStudents');
          }else{
		$this->session->set_flashdata('message','something went wrong');
		redirect('crud/editstudents');
          }
	}
}
public function deletestudents($id = null){
	if(empty($id)){
		$this->session->set_flashdata('message','we can not delete right now');
		redirect('crud/allStudents');
	}else{
      $data['returnid'] = $this->ModCrud->CheckRecords($id);
		if(count($data['returnid']) == 1){
		    // echo "found";
		    $deleted = $this->ModCrud->deleteRecords($id);
		    if( $deleted){
			   $this->session->set_flashdata('message','success records is deleted ');
				redirect('crud/allStudents');
		    }else{
				 $this->session->set_flashdata('message','we can not delete right now');
				redirect('crud/allStudents');
		    }
		 	 
		 }else{
		 	//echo "not found";
		 	$this->session->set_flashdata('message','This records is not exists');
				redirect('crud/allStudents');
		 }
	}

   }


}

?>