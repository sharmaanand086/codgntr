<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Questionnaires extends CI_Controller
{
		public function __construct()
		{
			parent::__construct();
			$this->load->library('encrypt');
			$this->load->model('SQuestionnaires_model');
		}
		
		function index( )
		{
			$data['questionnaires'] = $this->SQuestionnaires_model->getAllQuestionnaire();
			$this->load->view('site/questionnaires', $data);
		}
		
		function showQuestion( $id )
		{
			$data['questionnaires'] 	= $this->SQuestionnaires_model->getQuestionnaire( $id );
			$data['questions'] 			= $this->SQuestionnaires_model->getQuestionsById( $id );
			
			$this->load->view('site/showquestions', $data );
		}
		
		function showQuestionOpt( $id )
		{
			if( $id <= 0 )
			{
				redirect(base_url()."site/questionnaires");
				
			}
			
			$data['questionnaires'] 	= $this->SQuestionnaires_model->getQuestionnaire( $id );
			
			if( empty($data['questionnaires']) )
			{
				redirect(base_url()."site/questionnaires");
			}
			
			$data['questions'] 			= $this->SQuestionnaires_model->getQuestionsById( $id );
			if( $data['questions'] )
			{
				$this->load->model('options_model');
				foreach ( $data['questions'] as $key => $value) 
				{
					$quest_id = intVal($value->question_id);
					$option = $this->options_model->getOptionsByQuestionId($quest_id);
					
					if(empty($option))
					{
						$option = $this->options_model->getOptionsByQuestionnaireId( $id );	
					}
					$opt['options'][$quest_id] = $option;
				}
			}
			
			if( isset($opt['options']) )
			{
				$data['options'] = $opt['options'];
			}
			
			$this->load->view('site/showquestionswithoptions', $data );
		}
		
		
		function thankYouPage()
		{
			session_start();
				
			if( !(isset($_POST['submit'])) || !($_POST['submit']=="SUBMIT") || ( !(array_key_exists('qn_title', $_SESSION)))   )
			{
				redirect(base_url()."questionnaires");
				
			}
				
				$_SESSION['firstname'] 	= $_POST['firstname'];
				$_SESSION['email'] 		= $_POST['email'];
				
				
				$total 				= 0;
				$contribution_mark	= 0;
				$growth_mark		= 0;
				$love_mark			= 0;
				$centainty_mark		= 0;
				$variety_mark		= 0;
				$significande_mark	= 0;
				$other_mark			= 0;
				
				$max_contribution_mark	= 0;
				$max_growth_mark		= 0;
				$max_love_mark			= 0;
				$max_centainty_mark		= 0;
				$max_variety_mark		= 0;
				$max_significande_mark	= 0;
				$max_other_mark			= 0;
				
				$i=1;
				foreach ($_POST as $key => $value) 
				{
					$quest_id = 0;
					$maxOptVal = 0;
					
					if ( isset($_POST['question_id'][($i-1)]))
					{
						$quest_id =(int) $this->encrypt->decode($_POST['question_id'][($i-1)]);
						 
					}
					 
					if ( ( $quest_id != 0 ) && array_key_exists( 'value_max' , $_POST) )  
					{
						$maxOptVal =(int) $this->encrypt->decode($_POST['value_max'][$quest_id]);
					}
					
					if( $quest_id == 0 )
					{
						break;
					}
					
					$value2 = (int) $this->encrypt->decode( @$_POST['abc'.$i] );
					$total =   $total+$value2;
					
					$category_id =(int) $this->SQuestionnaires_model->getCategoryByQuestId( $quest_id );
					
					switch ($category_id) 
					{
						case '1':
							$contribution_mark = $value2+$contribution_mark;
							$max_contribution_mark = $maxOptVal+ $max_contribution_mark;
							break;
						case '2':
							$growth_mark = $value2+$growth_mark;
							$max_growth_mark = $maxOptVal+$max_growth_mark;
							break;
						case '3':
							$love_mark = $value2+$love_mark;
							$max_love_mark = $maxOptVal+$max_love_mark;
							break;
						case '4':
							$centainty_mark = $value2+$centainty_mark;
							$max_centainty_mark = $maxOptVal+$max_centainty_mark;
							break;
						case '5':
							$variety_mark = $value2+$variety_mark;
							$max_variety_mark = $maxOptVal+$max_variety_mark;
							break;	
						case '6':
							$significande_mark = $value2+$significande_mark;
							$max_significande_mark = $maxOptVal+$max_significande_mark;
							break;	
						case '0':
							$other_mark = $value2+$other_mark;
							$max_other_mark = $maxOptVal+$max_other_mark;
							break;	
						default:
							$other_mark = $value2+$other_mark;
							$max_other_mark = $maxOptVal+$max_other_mark;
							break;	
					}
					
					++$i;
				}
					
				$allmark = array(  
							" Contribution Mark " 			=> $contribution_mark,
							" Growth Mark " 				=> $growth_mark,
							" Love And Connection Mark " 	=> $love_mark,		
							" Centainty Mark " 				=> $centainty_mark,		
							" Variety / Uncertainty Mark " 	=> $variety_mark,
							" Significande Mark " 			=> $significande_mark /*,	
							" Other Mark " 					=> $other_mark */
							);
					
				$maximumvalues = array(  
								" Contribution Mark " 			=> $max_contribution_mark,
								" Growth Mark " 				=> $max_growth_mark,
								" Love And Connection Mark " 	=> $max_love_mark,
								" Centainty Mark " 				=> $max_centainty_mark,
								" Variety / Uncertainty Mark " 	=> $max_variety_mark,
								" Significance Mark " 			=> $max_significande_mark /*,
								" Other Mark " 					=> $max_other_mark */
							);			
				
				//var_dump($allmark);
				
				$html = "";
				//ob_clean();
				
				$no = 1;
				
				$html .= "<br/>	<b> Result </b> <br/>";
				
				foreach ($allmark as $key => $value) 
				{
					$max = 0;
					$maxValue = max($allmark);
					$maxIndex = array_search(max($allmark), $allmark);
							
					//$max = 	$maximumvalues[$maxIndex];
					$firstmaxbegin 	 =  "";
					$firstmaxend	 =  "";
					
					if( $no < 3 )
					{
						$firstmaxbegin 	 =  "<b>";
						$firstmaxend	 =  "</b>";
					}
					
					
					//$html .= $no++." : ".$maxIndex." :  ". $maxValue ." / ".$max."<br/>";
					$html .= $firstmaxbegin.$no++." : ".$maxIndex." :  ". $maxValue.$firstmaxend."<br/>";
					
					?>
					
					<?php 
					unset( $allmark[ $maxIndex ] );
				};
				//echo " Total :  ". $total;
				
				//$html = ob_get_clean();
				//echo $html;
				
				$_SESSION['total'] = $total;
				
				$this->load->model('user_model');
				$this->user_model->storeMarks();
				//die;
				
				?>
				<br/>

				<?php 
				
				require_once(APPPATH."third_party/infusionsoft/isdk.php");
				require_once(APPPATH."third_party/infusionsoft/class.phpmailer.php");	
				
					//var_dump(base_url().APPPATH."third_party/infusionsoft/class.phpmailer.php");
					//die;
					
						$app = new iSDK;
					
		
		if ($app->cfgCon("connectionName")) 
		{
				try{
				 $mail = new PHPMailer(true); // the true param means it will throw exceptions on     errors, which we need to catch

        $mail->IsSMTP(); // telling the class to use SMTP
        $mail->Host = 'mail.arfeenkhan.com';  // Specify main and backup server
	$mail->Port = '26';
	$mail->SMTPAuth = 'true';                               // Enable SMTP authentication
	$mail->Username = 'arfeenkhan@arfeenkhan.com';                            // SMTP username
	$mail->Password = 'rNX7zSKSCnev';                           // SMTP password
	$mail->SMTPSecure = 'SSL/TLS';

      
            $mail->SetFrom('Arfeenkhan@arfeenkhan.com', 'Arfeen Khan');
            $mail->AddAddress('mobin.t3office@gmail.com', '');
            $mail->AddAddress('chirag912@gmail.com', '');
           
            $mail->Subject = $_POST['firstname']." Questionnaire Result ";

            $mail->Body= " Name : <b>".$_POST['firstname']."</b><br/> Email : <b>".$_POST['email']."</b><br/> Questionnaires Title : <b>".$_SESSION['qn_title']."</b><br/>".$html;

            $mail->IsHTML(true);
          //  $mail->Send();	
			
			if( $mail->Send() )
				{
					//echo "<h1> Thank You ".$_POST['firstname']."</h1>";
					$thank_page = true;
				}				    
				else
				{
					echo "Email sending failed";
					$thank_page = false;
				}	
				
			 } catch (phpmailerException $e) {
			 		echo "Email sending failed";
		             echo $e->errorMessage(); //Pretty error messages from PHPMailer
		            } catch (Exception $e) {
		            	echo "Email sending failed";
		            echo $e->getMessage(); //Boring error messages from anything else!
		        }
		}
				
				
				 			
				$_SESSION['flag']		= TRUE; 
				session_destroy();
				
				if( $thank_page )
				{
					$this->load->view('site/thankyou', $_POST );
				}
				
		}
		
}
?>