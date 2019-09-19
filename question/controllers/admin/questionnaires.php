<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Questionnaires extends CI_Controller
{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('Questionnaires_model');
			if( !$this->session->userdata('is_logged_in') )
			{
				redirect(base_url().'admin/login');	
			}
			
			$status_array[] = array('0'=>'Enable', '1'=>'Disable');
			
		}
		
		function getQuestionsByQnIdAndCatId()
		{
			$row = $this->Questionnaires_model->getQuestionsDataByQnAndCatId();
			echo $row;
		}
		
		
		function getQuestionnaireByQnId($questionanaire_id)
		{
			$row = $this->Questionnaires_model->getQuestionnaire($questionanaire_id);
			return $row[0];
		}
		
		function index()
		{
			$data['questionnaires'] = $this->Questionnaires_model->getAllQuestionnaire();
			$this->load->view('admin/questionnaires', $data);
		}
		
		function addQuestionnaire()
		{
			$this->load->view('admin/addquestionnaire');
			
		}
		
		function saveQuestionnaire()
		{
			$row['title'] 	 		 = $this->input->post('title');
			$row['ShortDescription'] = $this->input->post('ShortDescription');
			$row['per_page'] 		 = $this->input->post('per_page');
			$row['status'] 			 = $this->input->post('status');
			$row['minutes']			 = $this->input->post('minutes');
			$row['seconds']			 = $this->input->post('seconds');
			
			
			$res = $this->Questionnaires_model->addQuestionnaire($row);
			
			if ( $res > 0 )
			{
				$data['message'] = $row['title']." Questionnaire saved.";
			}
			else{
				$data['message'] = $row['title']." Questionnaire not saved.";
			}
			
			redirect(base_url().'admin/questionnaires?message='.$data['message']);  
			
		}
		
		function edit($questionanaire_id)
		{
			$row = $this->Questionnaires_model->getQuestionnaire($questionanaire_id);
			$this->load->view('admin/editquestionnaire', $row[0] );
		}
	
		function updateQuestionnaire()
		{
			$row = array();
			$row['title'] 	 			= $this->input->post('title');
			$row['min_desc'] 			= $this->input->post('ShortDescription');
			$row['questionnaire_id'] 	= $this->input->post('questionnaire_id');
			$row['per_page'] 			= $this->input->post('per_page');
			$row['status'] 			    = $this->input->post('status');
			$row['minutes']			 	= $this->input->post('minutes');
			$row['seconds']			 	= $this->input->post('seconds');
			
			$res = $this->Questionnaires_model->updateQuestionnaire($row);
			if ( $res > 0 ) 
			{
				$data['message'] = $row['title']." Questionnaire updated. ";
			}
			else{
				$data['message'] = $row['title']." Questionnaire not updated.";
			}
			
			redirect(base_url().'admin/questionnaires?message='.$data['message']);  
		}
		
		function delete( $id )
		{
			$res = $this->Questionnaires_model->deleteQuestionnaire($id);
			if ( $res ) 
			{
				$data['message'] = " Questionnaire deleted. ";
				/*$delQuest = $this->Questionnaires_model->deleteQuestionByQuestionnaireId($id);
				if( $delQuest )
				{
					$this->load->model('Options_model');
					$this->Options_model->deleteOptionByQuestionnaireId($id);
				}
				*/
			}
			else{
				$data['message'] = " Questionnaire not deleted.";
			}
			
		    redirect(base_url().'admin/questionnaires?message='.$data['message']);  
		}
		
		
		// 
		function addQuest( $id )
		{
			$row 	= $this->Questionnaires_model->getQuestionnaire($id);
			$id = intval($id);
			
			$row[0]->marks = "";
			if( $id >= 0 ) 
			{
				$this->load->model('user_model');
				$row[0]->marks = $this->user_model->getMarksByQnId( $id );
			}
			
			
			//$row[0]->questions_info = $row['questions_info'];
			$this->load->view('admin/add_ques_in_questionnaire', $row[0] );
		}
		
		
		//
		function savequestions(  )
		{
			
			$res = $this->Questionnaires_model->addQuestionInQuestionnaire();
			
			
			if ( $res > 0 )
			{
				$data['message'] = "Question Added.";
			}
			else{
				$data['message'] = "Question not Added";
			}
			
			redirect(base_url().'admin/questionnaires?message='.$data['message']);  
		}
		
		
		//
		function updateQuestion()
		{
			$res = $this->Questionnaires_model->updateQuestionInQuestionnaire();
			
			if ( $res > 0 ) 
			{
				echo "Question Updated.";
			}
			else{
				
				echo "Question not updated.";
			}
			
			  
		}
		

		function deleteQuestion( )
		{
			$res = $this->Questionnaires_model->deleteQuestion();
			if( $res == 1)
			{
				echo "Question deleted.";
				
			}else{
				echo "Question not deleted.";
			}
			
			
		}
		
		function getQuestionsDataByAJAX()
		{
			$q_id = $this->input->post('q_id');
			echo  $this->Questionnaires_model->getQuestionsData( $q_id );
		}
		
		
		// Add Option in Question
		function AddOptionInQuest()
		{
			$this->load->model('Options_model');
			$res = $this->Options_model->AddOptionInQuestion();
			if ( $res > 0 ) 
			{
				$msg = "Option saved.";
			}
			else{
				$msg = "Option not saved.";
			}
			
		
			
			$result = array(
		        'msg' 		=> $msg,
		        'opt_id' 	=> $res,
		     );
			 
		    echo json_encode($result);
			
		}
		
		// Add Option in Question
		function deleteOptionById()
		{
			$this->load->model('Options_model');
			
			$res = $this->Options_model->deleteOption();
			
			if( $res == 1)
			{
				echo "Option deleted.";
				exit;
				
			}else{
				echo "Option not deleted.";
				exit;
			}
			
			echo "Option not deleted.";
			exit;
		}
		
		/*
		function getOptionsByAJAX()
		{
			$this->load->model('Options_model');
			$question_id = (int) $this->input->post('question_id');
			return $this->Options_model->getOptionsByQuestionId( $question_id );
		}
		*/
		
		// Add Option in Question
		function updateOptionInQuest()
		{
			$this->load->model('Options_model');
			
			$res = $this->Options_model->UpdateOptionInQuestion();
			if ( $res > 0 ) 
			{
				echo "Option updated.";
			}
			else{
				echo "Option not updated.";
			}
			
		}
		
		
		////////////////////////////////Start Common Option////////////////////////////////////////////
		
		// Add Option by Questionnaire id
		function AddCommonOptionByQuestionnaireId()
		{
			$this->load->model('Options_model');
			$res = $this->Options_model->AddCommonOptionByQuestionnaireId();
			
			if ( $res > 0 ) 
			{
				$msg = "Common Option Saved.";
			}
			else{
				$msg = "Common Option Not Saved.";
			}
		
			$result = array(
		        'msg' 		=> $msg,
		        'opt_id' 	=> $res,
		     );
			 
		    echo json_encode($result);
			
		}
		
		function updateOrderinQuestion()
		{
			$res = $this->Questionnaires_model->updateOptionInQuestionByAjax();
			if ( $res ) 
			{
				echo " Question Order updated. ";
			}
			else{
				echo "  Question Order not updated. ";
			}
			
		}
		
		//////////////////////////////// End Common Option////////////////////////////////////////////
		
		function getQuestionsByQnId()
		{
			$qn_id = $this->input->post('qn_id');
			echo $this->Questionnaires_model->getQuestionsByQnIdByAjax( $qn_id );
		}
		
		function copyQnbyQnId()
		{
			$row['old_qn_id']		= $this->input->post('old_qn_id');
			$row['title'] 	 		= $this->input->post('title');
			$row['ShortDescription']= $this->input->post('ShortDescription');
			$row['per_page'] 		= $this->input->post('per_page');
			
			$res = $this->Questionnaires_model->copyQn($row);
			//echo $res;
			if ( $res > 0 )
			{
				echo $row['title']." Copy Questionnaire.";
			}
			else{
				echo $row['title']." Not Copy Questionnaire.";
			}
			exit;
			
		}
		
		
		function getQnInfoByQnIdWithAjax()
		{
			$qn_id = $this->input->post('qn_id');
			$res = $this->getQuestionnaireByQnId($qn_id);
			
			$result = array(
		        'qn_info' 	=> $res,
		     );
			 
		    echo json_encode($result);
			exit;
		}
		
		
}
?>