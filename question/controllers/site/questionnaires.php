<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH."third_party/infusionsoft/isdk.php");
require_once(APPPATH."third_party/infusionsoft/class.phpmailer.php");

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
		//	$this->load->view('site/questionnaires', $data);
			$this->showQuestionOpt( 27 );			
			
		}
		
		function showQuestion( $id )
		{
			$data['questionnaires'] 	= $this->SQuestionnaires_model->getQuestionnaire( $id );
			$data['questions'] 			= $this->SQuestionnaires_model->getQuestionsById( $id );
			
			
			$this->load->view('site/showquestions', $data );
		}
		
		function showQuestionOpt( $id )
		{
			$id = intval($id);
			
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
					//var_dump($option);
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
		
		 function beforethankyou()
		{
		    $id=27;
		     $qn_title = $_POST['qn_title'];
		     $questionnaire_id = $_POST['questionnaire_id'];
		     $totalpage = 9;
		     $totalQuestion = 84;
		    $questionnaires 	= $this->SQuestionnaires_model->getQuestionnaire( $id );
			$questions			= $this->SQuestionnaires_model->getQuestionsById( $id );
              $k=1;
              $abc = array();
              while($k < 85)
              {
                 array_push( $abc, $_POST['abc'.$k]);
                  $k++;
              }
              
           $this->load->view('site/beforethankyou', ['qn_title'=>$qn_title,'questionnaire_id'=>$questionnaire_id,'totalpage'=>$totalpage,'totalQuestion'=>$totalQuestion,'questionnaires'=>$questionnaires,'questions'=>$questions,'abc'=>$abc] );
        
                        
            
		    
		}
		
	 
	 
		function thankYouPage()
		{
		   // var_dump($this->input->post());
		   // IF NOT GETTING THE VALUE OF YOUR YES NO OR PARTIY CHANGE THE VALUE OF  ENCRYPTION CODE AT VIEW PAGE showquestionswithoptions
		//	echo $_POST['firstname'];
		
			session_start();
					
				error_reporting(0);
					
				$app = new iSDK;
				
				
				if(  ( (array_key_exists('ContactID', $_POST))) && ( intval($_POST['ContactID']) != 0 )  )
				{	
					$contactID = intval( $_POST['ContactID'] );
					$_SESSION['ContactID'] = $contactID;
				}
				else 
				if(  ( (array_key_exists('ContactID', $_SESSION))) && ( intval($_SESSION['ContactID']) != 0)   )
				{	
					$contactID = intval( $_SESSION['ContactID'] );
				}
				else 
				{
						if ($app->cfgCon("connectionName")) 
						{
								
							$conID = $app->addWithDupCheck(array('FirstName' =>$_POST['firstname'], 'Email' => $_POST['email'],'Phone1' => $_POST['mobile'] ), 'EmailAndName');
  
							$contactID = $conID;
							$contactId = $contactID;
							$groupId = 9107;
							$result2 = (boolean)  $app->grpAssign($contactId, $groupId);
							
						   	// get result then false 
						   		if ( !$result2 )
							   {
							   		// remove 
							    	$removeResult = $app->grpRemove($contactId, $groupId);
									 if( $removeResult )
									 {
										$result3 = $app->grpAssign($contactId, $groupId); 
									 }
									 
								}
							  
								
								if( intval($conID) <= 0 )
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
						            $mail->AddAddress('support@arfeenkhan.com', '');
                                    $mail->AddAddress($_POST['email'], $_POST['firstname']);
                                //$mail->AddAddress('anand@arfeenkhan.com', '');
                        			$mail->Subject = "Error In ".$_POST['firstname']." Questionnaires ";
						            $mail->Body= " Conact ID is empty. check Post ".base_url();
						            $mail->IsHTML(TRUE);
									$mail->Send();
											
									} 
									catch (phpmailerException $e) {
								 		echo "Email sending failed";
							             echo $e->errorMessage(); //Pretty error messages from PHPMailer
							            } catch (Exception $e) {
							            	echo "Email sending failed";
							            echo $e->getMessage(); //Boring error messages from anything else!
							        }
								}

							}
								
								

					//redirect( base_url() );
					
				}	
			
			 
				
				if(  ( (array_key_exists('firstname', $_SESSION))) && ( (array_key_exists('email', $_SESSION)))   )
				{
					$_POST['firstname'] 	= $_SESSION['firstname'];
					$_POST['email'] 		= $_SESSION['email'];
					$_POST['qn_title'] 		= $_SESSION['qn_title'];
					
					$k =1;
					if(array_key_exists('question_id', $_SESSION))
					{
						foreach ($_SESSION['question_id'] as $key => $value) 
						{
								if( $value )
								{
									if ( isset($value) )
									{
										$_POST['question_id'][($k-1)] = $value;
									}
									 
								 
									$_POST['abc'.$k] = @$_SESSION['abc'][($k-1)];
								}
							
							++$k;
							}
					}
					
				}
				else
				{
					if(  ( !(array_key_exists('email', $_POST))) || ( empty($_POST['email'])  ) )
					{
						//session_destroy();
						//redirect(base_url()."questionnaires");
					}
					
					$_SESSION['firstname'] 	= @$_POST['firstname'];
					$_SESSION['email'] 		= @$_POST['email'];
					
				}
			 
				
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
							" Love / Connection Mark " 		=> $love_mark,		
							" Certainty Mark " 				=> $centainty_mark,		
							" Variety / Uncertainty Mark " 	=> $variety_mark,
							" Significance Mark " 			=> $significande_mark /*,	
							" Other Mark " 					=> $other_mark */
							);
					
				$maximumvalues = array(  
								" Contribution Mark " 			=> $max_contribution_mark,
								" Growth Mark " 				=> $max_growth_mark,
								" Love / Connection Mark " 	=> $max_love_mark,
								" Certainty Mark " 				=> $max_centainty_mark,
								" Variety / Uncertainty Mark " 	=> $max_variety_mark,
								" Significance Mark " 			=> $max_significande_mark /*,
								" Other Mark " 					=> $max_other_mark */
							);			
				
				
				$html = "";
				$storeAllCatMarks = "";
				//ob_clean();
				
				$no = 1;
				$html .= "<br/><b>Result </b> <br/>";
				$descTopCategory = FALSE;
				
				$firstmaxval 	= 0;
				$secondmaxval	= 0;
				$pre_maxValue 	= 0;
				
				$twoTopCat = FALSE;
			 	foreach ($allmark as $key => $value) 
				{
					$max = 0;
					$maxValue = max($allmark);
					$maxIndex = array_search(max($allmark), $allmark);
					
					
					//$max = 	$maximumvalues[$maxIndex];
					$firstmaxbegin 	 =  "";
					$firstmaxend	 =  "";
					
					if( (($no < 3) && ($total!=0) ) || ($pre_maxValue==$maxValue) ) 
					{
						if( $no == 1 )
						{
							$firstmaxval = $maxValue;
						}
						
						if( $no == 2 )
						{
							$secondmaxval = $maxValue;
						}
						
						if( (($no == 2) && ($maxValue!=0)) ) 
						{
							$twoTopCat = TRUE;
							$pre_maxValue = $maxValue;
						}
						
						if( $maxValue != 0)  
						{
							$firstmaxbegin 		=  "<b>";
							$firstmaxend	 	=  "</b>";
							$descTopCategory[] 	= $maxIndex;	
						}
						
					}
					
						//$html .= $no++." : ".$maxIndex." :  ". $maxValue ." / ".$max."<br/>";
						$html .= $firstmaxbegin.$no++." : ".$maxIndex." :  ". $maxValue.$firstmaxend."<br/>";
						$storeAllCatMarks .= $firstmaxbegin.($no-1)." : ".str_replace (' Mark ', '', $maxIndex)." :  ". $maxValue.$firstmaxend.","; 
						
					unset( $allmark[ $maxIndex ] );
				}
				
				$html = str_replace (' Mark ', '', $html);
				
				$allcategoriesmarks = array(  
							" Contribution Mark " 			=> $contribution_mark,
							" Growth Mark " 				=> $growth_mark,
							" Love / Connection Mark " 		=> $love_mark,		
							" Certainty Mark " 				=> $centainty_mark,		
							" Variety / Uncertainty Mark " 	=> $variety_mark,
							" Significance Mark " 			=> $significande_mark /*,	
							" Other Mark " 					=> $other_mark */
							);
				
				
				$diffcategoriesmarks 		= "else";
				$sameneedcategoriesmarks 	= FALSE;
				
				if( ( $firstmaxval != 0 ) && ( $firstmaxval == ($allcategoriesmarks[ end($descTopCategory) ]) ))
				{
					$diffcategoriesmarks    	= "";
					$sameneedcategoriesmarks 	= TRUE;	
				}
				
			 
				$firstNeedDescAtt = array();
				
				//$pdfoneCatDesc = FALSE;
				$oneCatDesc = "";
				
				if( $sameneedcategoriesmarks )
				{
				
					if ( (in_array(" Contribution Mark ", $descTopCategory))   )
					{
						$firstNeedDescAtt[] = "contribution.pdf";
					}		
					 $diffcategoriesmarks;
					if ( (in_array(" Growth Mark ", $descTopCategory))   )
					{
						$firstNeedDescAtt[] = "growth.pdf";
					}
					 $diffcategoriesmarks;
					if ( (in_array(" Love / Connection Mark ", $descTopCategory)) )
					{
						$firstNeedDescAtt[] = "love_and_connection.pdf";
					}
					 $diffcategoriesmarks;
					if ( (in_array(" Certainty Mark ", $descTopCategory))   )
					{
						$firstNeedDescAtt[] = "certainty.pdf";
					}
					 $diffcategoriesmarks;
					if ( (in_array(" Variety / Uncertainty Mark ", $descTopCategory))   )
					{
						$firstNeedDescAtt[] = "uncertainty.pdf";
					}
					 $diffcategoriesmarks;
					if ( (in_array(" Significance Mark ", $descTopCategory))   )
					{
						$firstNeedDescAtt[] = "significance.pdf";
					}
					
				}			
				
				
				
				if( ($descTopCategory) && !($sameneedcategoriesmarks) )
				{
					//$p=1;
					/*foreach ($descTopCategory as $key => $value) 
					{*/
						
						//$oneCatDesc .= "<br/><br/>";
						$oneCatDeschead = "<h3> IF	YOUR	FIRST	NEED	IS	FOR ".str_replace (' Mark ', '', $descTopCategory[0])."</h3>";
						
						switch ($descTopCategory[0])
						{
							case ' Contribution Mark ':
								//$pdfoneCatDesc = "contribution.pdf";
								$firstNeedDescAtt[] = "contribution.pdf";
								$oneCatDesc = "Your Beliefs 
Life is incomplete without the sense that one is making a contribution to others or to a cause. I have to go beyond my own needs and give to others. I want to give back and to leave a mark on the world. 
How This Belief Serves You 
By focusing on something beyond myself, most of my problems and sources of pain become less significant. I get certainty because I know that there is always a way to contribute. I have variety because there are many different ways of making a contribution. I have significance because I know I am helping others. The spiritual bond that develops by helping others gives me a sense of connection. I grow and develop by helping others. 
The Principles You Lost Sight Of 
I lose sight of the fact that charity begins at home. I care for so many people or for such an important cause that I sometimes neglect taking care of my self and my loved ones. 
The Consequences of Losing Sight of These Principles 
A consequence is that my physical, emotional or spiritual health may suffer. I sometimes neglect my personal relationships and people can become resentful of the time and energy I put into a cause. 
CHARACTER 
Focus 
My focus is on the world, a cause, how to help others, how to contribute. 
Energy 
I’m energetic and focused outwardly to the point that I can exhaust myself. 
Health 
I would like to stay healthy, but my need to contribute may drive me to neglect myself and my health. 
What You Avoid 
I avoid being weak, dependent and powerless. I don’t want to lose the respect of the people I care about. 
Strengths 
I’m brave, persistent, generous and assertive. 
Communication Style 
I’m energetic and firm but can be seen as controlling and disregarding of others’ opinions. Words that I use frequently are: ideals, justice, the cause, fairness, compassion, and giving. 
Stress 
 
I can over exert myself and suffer from fatigue. Injustice stresses me. It’s difficult for me to restrain myself from being confrontational in the face of unfairness or injustice. 
Defensiveness 
I become defensive with people who try to control me and with people that are deceitful. I’m defensive when people are indifferent to important causes and ideals. 
Emotions 
I’m enthusiastic and outgoing but I can become angry and confrontational. 
GROWTH AND BALANCE 
Your Goal 
My goal is to find a balance between taking care of myself, my loved ones, and my need to contribute to the larger good. 
What I Need To Do 
I need to notice that I can come across as too intense. I need to take care of myself. I need to take care of my relationships. 
What Interferes With Your Goal 
Contribution satisfies all my needs at such a high level that I often ignore my own needs and neglect my self and others. My lifestyle can lead to exhaustion. My need to always be strong and deny my vulnerability interferes with my goal. 
How Others Can Support You in Your Goal 
Others can encourage me to take care of my self and to express my vulnerabilities. They can stand their ground in expressing what they need from me in terms of attention and energy. 
								";
							 break;
							
							case ' Growth Mark ':
								//$pdfoneCatDesc = "growth.pdf";
								$firstNeedDescAtt[] = "growth.pdf";
								$oneCatDesc = " Your Beliefs 
I need to constantly develop new skills, learn new things, and improve at what I already know. I have to develop my self physically, emotionally, intellectually and/or spiritually. I need to be constantly growing. 
How This Beliefs Serves You 
There is always a new challenge and something new to learn. I’m not dependent on others in order to find joy in learning. I’m self sufficient and active in my pursuits. I’m not attached to material possessions. It’s not about what I have; it’s about what I know and what I’m able to do. 
The Principles You Lost Sight Of 
Connecting and giving to others can be more fulfilling than acquiring new knowledge and skills. There can be more pleasure in sharing than in accumulating. 
The Consequences of Losing Sight Of This Principle 
I can be seen as reserved and unwilling to share. I can become detached and overly private. I tend to under value relationships. 
CHARACTER 
Focus 
I focus on learning, studying, developing my skills and being the best I could possibly be. 
Energy 
I conserve my energy and focus away from feelings in order to learn everything there is to be learned. I am self-contained and I set careful limits to protect my time and privacy. 
Health 
If my need to grow is tied to developing physically, I will do whatever is necessary to stay healthy and fit. 
What You Avoid 
I will do anything to avoid feeling inadequate or drained. I avoid demands and intrusions on the privacy that allows me to focus on my own personal growth. 
Strengths 
I’m respectful of others. I’m thoughtful, calm and dependable. I like to think that I’m a model of self - improvement for others. 
Communication Style 
Because I like to focus on content and facts, people might see me as distant. Words that I use frequently are: I, me, my self, know, learn, grow, develop, understand, analyze, accomplish, goals. 
 
Stress 
I’m stressed when I feel tired or dependent on others. Intrusions on my privacy are stressful to me. 
Defensiveness 
I become defensive when there are intrusions or limitations on what I want to do. I can become angry when people interfere with my need for privacy. 
Emotions 
I’m careful when expressing emotions but I can have outbursts of temper when I feel intruded upon. 
GROWTH AND BALANCE 
Your Goal 
My goal is to be able to pursue my growth while enjoying relationships and connection with people. I need to be able to experience joy and pleasure in many ways, not just by learning. 
What To Do 
I need to find balance in life by focusing more on others, rather than on my own growth and development. I need to experience pleasure in giving, to be less reserved and give priority to love and relationships. I need to take better care of those I love. 
What Interferes With Your Goal 
The belief that I’m not worthy if I don’t constantly improve myself. The importance that I give to privacy interferes with my goal. I need to recognize that I can appear self-centered. 
How Others Can Support You In Your Goal 
Others can appreciate my ability to be self sufficient and independent as well as my willingness to live and let live, while at the same time encouraging me to be more social and loving. 
								";
								break;
							
							
							case ' Love / Connection Mark ':
								//$pdfoneCatDesc = "love_and_connection.pdf";
								$firstNeedDescAtt[] = "love_and_connection.pdf";
								$oneCatDesc = "Your Beliefs 
In order to feel worthy I need to love and be loved. I need to have meaningful connections with people. If I’m not loved and I can’t give my love, I’m worthless. 
How This Belief Serves You 
I’m kind a generous to those I love and I can be fiercely protective of them. I’m nurturing and responsible. 
The Principles You Lost Sight Of 
You must love yourself first. You are not indispensable to others. To be loved is not equal to being needed. 
The Consequences of Losing Sight of This Principle 
In thinking of others first, I repress my own needs. I can become intrusive. Often I’m unable to say “no.” Because by giving to others I expect to be loved, I’m often disappointed. I’m often not aware of my own needs. I can be intrusive without realizing it. 
CHARACTER Focus 
My focus is on the relationships with those I love and on how to satisfy their needs. I have great empathy for the feelings and emotions of others. I expect to be loved in return. 
Energy 
My focus is on understanding others and meeting their needs. I like to feel that I can help and I’m proud of being able to do so. I need people’s approval and acceptance. I have high energy when it comes to giving. I crave romantic love. 
Health 
I may be so focused on taking care of others that I neglect my own health. 
What You Avoid 
I will do almost anything to avoid feeling dispensable. I avoid disappointing others and feeling unappreciated. It’s hard for me to tolerate rejection. 
Strengths 
I’m generous, sensitive, supportive and helpful. I relate well to people of all ages and all walks of life. I’m a good companion and listener. I give good advice. I give freely of my time, energy and material possessions. I empathize with suffering. I have emotional depth. 
Communication Style 

I am focused on others and I’m friendly and open. I express myself well and I’m quick to give advice. I’m supportive. Words that I frequently use are: togetherness, passion, unity, warmth, tenderness, and desire. Sometimes people experience me as emotionally intense. 
Stress 
I am stressed when I’m not appreciated for all I give and when I’m not loved in return. I’m also stressed when sometimes people perceive me as intrusive or controlling. Feeling needed by so many people is stressful and my confusion about my own needs doesn’t help. I invest too much in challenging relationships. I sometimes envy what others have and what is not emotionally available to me. 
Defensiveness 
I get defensive when people tell me how to live, especially when they insist I should give less to others. I can get angry if I feel controlled and if people attribute bad intentions to me. I can get enraged when people are cruel. I can also become defensive when I feel misunderstood. 
Emotions 
I worry a great deal about others. I can easily attribute blame to myself and/or to others. I sometimes experience resentment and I have angry outbursts when I don’t feel appreciated or I’m treated inconsiderately. When I’m away from those I love, I feel great pain in missing them. I often feel possessive about those I love. I feel deeply and I’m idealistic. I long for what is missing in my life. I can be very emotional and sink into depression. 
GROWTH AND BALANCE Your Goal 
I need to take care of myself better and to be more aware of my own needs. I need to feel that I can be loved for who I am, not for what I give. 
What To Do 
I need to practice setting limits on what I give. I need to develop clarity about my own needs and how to satisfy them. I need to be sensitive to when I can be seen as intrusive or controlling. I need to honor my feelings and my idealism. 
What Interferes With Your Goal 
My need to help and to give to those I love interferes with my goal. I often feel guilty when I pay attention to my own needs. My feelings of pride for not paying attention to my needs interfere with my goal, as does my fear of being selfish. I have difficulty in asking for anything and in receiving from others. I believe that I am loved based on what I give. 
How Others Can Support You In Your Goal 
Others can model on my independence instead of becoming dependent on what I give. Others could ask me about my needs and pay attention to them. Give me appreciation for what I give and also appreciate whenever I say “no.” People could focus on understanding me instead of trying to change me. 
								";
								break;
							
							case ' Certainty Mark ':
								//$pdfoneCatDesc = "certainty.pdf";
								$firstNeedDescAtt[] = "certainty.pdf";
								$oneCatDesc = "YOUR BELIEFS 
I need to feel secure, safe and comfortable and I need to make sure that I will be secure, safe and comfortable in the future. Avoiding pain is very important to me. I can’t be happy when I’m uncertain about things. 
How this Belief Serves You 
I avoid risks and I carefully plan for the future. I’m careful and I take care of myself. People know I am predictable. I know how to be organized. 
The Principles You Lost Sight Of 
The future is unpredictable; all we have is the present moment. Where there is no risk, there is no gain. It is possible to be uncertain about the future, yet happy in the present. 
The Consequences of Losing Sight of This Principle 
I limit my new experiences. I have trouble letting love flow when I don’t feel secure and comfortable. I have trouble involving myself with people for fear that they will cause me pain. People sometimes think that I’m controlling. I may seem unenthusiastic and even boring. I am predictable at the cost of being spontaneous. 
CHARACTER Focus 
I focus on stability, on habitual routines and on preparing and saving for the future. I prefer work that is stable and easy instead of work that is challenging and stretches my abilities. 
Energy 
I put my energy into organizing a secure and comfortable environment. I’m focused inwardly on evaluating my level of comfort-discomfort. 
Health 
I like to take care of myself, but my need for comfort may lead me to over eating or drinking. 
What You Avoid 
I tend to avoid new people and new experiences. I avoid relationships where there is not full commitment. I avoid threats and hazards. I fear not being in control. 
Strengths 
I am organized, reliable and dependable. I can create a home and work environment that is pleasing and where people can feel comfortable. 
Communication Style 
I often talk about my internal states, emphasizing whether I feel grounded, protected and safe. Words that I frequently use are: comfort, security, stability, and predictability. 
Stress 
I am stressed when something new is required of me, when I don’t know what’s going to happen next. Changes in plans, even if there are new opportunities, stress me out. I put pressure on myself to make sure I don’t feel insecure. 
Defensiveness 
I get defensive when I’m required to change my habits or to deal with new people and new situations. I can get angry when people challenge my need to feel comfortable and to have predictability in my life. 
Emotions 
I worry a great deal about the future. I’m very sensitive to danger and experience fear easily. I sometimes envy people who have more money or a larger income than I do. 
GROWTH AND BALANCE Your Goal 
My goal is to be able to live in the present, to experience the moment without focusing on what will happen next and what the future might hold. I need to take some risks in order to reap some benefits. I need to accept that uncertainty and insecurity are a part of life. 
What To Do 
I need to stretch myself by learning new things and having new experiences. Instead of fear and anxiety, I need to learn to experience excitement and joy. I need to learn to enjoy a challenge. I need to develop courage and to be able to act even when I feel insecure. I need to get a reality check from others about my fears and concerns. 
What Interferes with Your Goal 
My wish to feel comfortable and to plan for the future interferes with my goal. I am over protective and controlling. I require too much certainty. I can be pessimistic about the future. 
How Others Can Support You in Your Goal 
Others can support me by introducing me to new experiences and by encouraging more spontaneity and fun. They can counter my doubts and fears in realistic ways. 
								";
								break;
							
							case ' Variety / Uncertainty Mark ':
								//$pdfoneCatDesc = "uncertainty.pdf";
								$firstNeedDescAtt[] = "uncertainty.pdf";
								$oneCatDesc = "Your Beliefs 
I believe that happiness comes from having many different experiences and challenges that exercise my emotional, intellectual or physical range. My emotional well-being requires uncertainty, suspense and surprise. I need the excitement that comes from variety. 
How This Belief Serves You 
I have many interests. People usually see me as entertaining, dynamic, interesting and fun to be with. I can always find new things to do and new adventures. I have many friends from different backgrounds. I interact well with people of all ages and all walks of life. I am trusting and think the best of people. I’m not easily bored because I can always find something interesting to do. I’m fun loving and carefree. I’m usually upbeat and I like to enjoy life to the fullest. 
The Principles You Lost Sight Of 
To have balance in life there are times where the priority is stability and responsibility in relationships. Sometimes it’s necessary to focus on subjects and tasks that are not particularly interesting in order to obtain rewards later on. You can’t always trust everyone. 
The Consequences of Losing Sight of This Principle 
People sometimes feel they can’t count on me, that I am uncommitted, unreliable and don’t take care of my loved ones. I can be involved in too many things at once and neglect what I need to do to make sure that I’m safe and comfortable. I can get myself into dangerous or difficult situations physically, emotionally and financially. Sometimes I can be careless about things that I know are important to me and to others. My trusting, optimistic nature makes it possible for people to take advantage of me. Studying, memorizing and sitting still can be difficult for me and may result in challenges in my career. I can become unfocused. 
CHARACTER Focus 
I focus on seeking excitement and change. My focus is on what is new and interesting or challenging. While involved in an adventure, I’m planning the next one. I like suspense and exertion. 
Energy 
I’m energetic and need to focus my energy on several projects. I’m focused outwardly on what there is to do next. Whether I am spectator or an active participant, I constantly seek stimulation and entertainment. 
Health
I stay fit in order to be involved in all the activities that interest me. 
What You Avoid 
I avoid a life of habits and routines. I don’t like to be involved in relationships that restrict me from new challenges and new experiences. I avoid boredom. 
Strengths  
I’m enthusiastic, independent and fun to be with. I like to live so that there is never a dull moment. I see the glass half full. I’m a leader and I can be the life of the party. I’m not afraid of taking risks. I’m playful and optimistic. 
Communication Style 
I like to talk about different projects and adventures. I can be so enthusiastic in my conversation that I forget to listen to the other person or to ask their opinion. Sometimes I become restless and need to stand up and walk around during a conversation. Words that I frequently use are: fear, instability, change, chaos, entertainment, suspense, exertion, surprise, conflict and crisis. 
Stress 
I am stressed when I don’t have the time or the means to become involved in new challenges and adventures. A routine life stresses me. I’m upset if my physical condition prevents me from participating in activities I like. Restrictions on my freedom are very stressful to me. 
Defensiveness 
I get defensive when someone attempts to impose routines or schedules or to restrict my social life. I can get angry when people criticize my desire for adventure and entertainment. 
Emotions 
I like to feel excited, thrilled, exuberant, joyful, and adventurous. I do everything possible to avoid boredom. My ability to experience a broad range of emotions makes it easy for me to feel empathy towards others. I know I can experience what they are experiencing. 
GROWTH AND BALANCE Your Goal 
My goal is to be able to have roots, stability and permanent relationships while still enjoying times of excitement and adventure. Taking good care of myself and of others has to be more of a priority for me. I need to be a better judge of character. I need to live more in the present than in the future. 
What To Do 
I need to focus more on the present and less on the next adventure in the future. I need to create a stable, harmonious environment for myself and to develop long lasting relationships. I need to focus on activities that are not particularly exciting but that lead to important accomplishments in the future. 
What Interferes With Your Goal 
There are an infinite number of new, exciting experiences that are open to me. It’s difficult to choose among them and it’s difficult to stay with what I need to focus on in the present. Sometimes I focus too much on my self and what I want. I can be easily distracted and diverted. 
How Others Can Support You in Your Goal 
Others can support me by encouraging me and praising me when I stick to a task that is not particularly exciting and when I take steps towards taking care of myself and providing stability for myself and my loved ones. People can help me to stay in the present. 
";
							break;
							
							case ' Significance Mark ':
								//$pdfoneCatDesc = "significance.pdf";
								$firstNeedDescAtt[] = "significance.pdf";
								$oneCatDesc = "Your Beliefs 
I believe that happiness comes from feeling respected and important. I need to be considered unique and special. I need for people to look up to me and even fear me to a certain extent. 
How This Belief Serves You 
I work hard at being different, special, and unique. I strive to be a leader. I do whatever is necessary for people to look up to me, respect me and admire me. I never want to be a follower. 
The Principles You Lost Sight Of 
Sometimes love is more important than respect. It’s difficult to love someone who has to feel important all the time. Humility is an important virtue. Being admired by many but loved by few may not be conducive to happiness. “Heavy lies the head that bears the crown.” – Shakespeare – 
The Consequences of Losing Sight of These Principles 
People sometimes dislike me because they see me as arrogant and full of myself. I have to constantly work at being respected and admired. I have trouble letting love flow when I don’t feel important. People sometimes think that I consider myself superior to everyone. I can come across as cold and uncaring. I often find it difficult to have fun. I can be seen as close-minded. I have trouble relating to others because I focus on differences rather than commonalities. I’m overly concerned with hierarchical pecking orders. 
CHARACTER Focus 
I focus on what to do to appear special, different and important. I will do almost anything to preserve my uniqueness. I focus on playing the part of someone very special. I need to feel proud of myself. I have high standards and I live by them. I evaluate myself as compared to others. I need to be heard, and sometimes “heard” to me, means being obeyed. 
Energy 
I constantly ask myself whether people respect me and admire me. I’m watchful to correct any signs of lack of respect. I need to feel that I make a difference in any situation. I’m disciplined, competitive, and I can be a perfectionist. 
Health 
If my sense of significance is tied to my appearance, endurance and strength, I will do whatever it takes to stay fit and healthy. I may injure myself by overdoing it while exercising or practicing a sport. 
What You Avoid 
I avoid people who don’t admire me or treat me with respect. I avoid situations where I can’t feel that I’m very important. I don’t tolerate rejection. I will do anything to avoid being over shadowed by others. I hate losing face. 
Strengths 

I work hard and strive to deserve the respect and admiration I crave. I’m willing to take responsibility to the point of self-sacrifice. I’m relentless in accomplishing my goals. I’m a leader. I stand up for what I believe in. I’m not afraid of risk or confrontation. 
Communication Style 
I often talk about my accomplishments, my sacrifices, my intelligence, my strengths and my attractiveness. I can be seen as overriding others’ view. Some of the words that I frequently use are: pride, importance, standards, achievement, performance, perfection, evaluation, discipline, competition and rejection. 
Stress 
I am stressed when I feel that I’m not living up to my standards. Not being respected and heard stresses me out, as well as feeling that I’m not a leader. I feel pressure to achieve prestige, power and status. I’m stressed from doing too much and from not being in touch with my values. 
Defensiveness 
I get defensive at the slightest criticism and when people tell me what to do. Anything that implies that I’m a follower, instead of a leader, puts me on the defensive. 
Emotions 
I experience despair, anger and rage when I’m not living up to my standards and not accomplishing my goals. I can get angry when people disagree with my values, beliefs and leadership. I can be impatient and irritable. 
GROWTH AND BALANCE Your Goal 
My goal is to be loved for who I am, not because of my accomplishments or because of the respect and admiration of others. I need to learn to value love and connection more than respect and admiration. I need to learn to be humble and practice patience. I need to notice when my standards are too high. I need to self-sacrifice less and love myself more. 
What To Do 
I need to get involved in experiences where I won’t get any admiration or special respect. I need to work less and love myself more. I need to indulge in pleasurable experiences just for the sake of pleasure. I need to relax. I need to pay attention to feelings and relationships. 
What Interferes With Your Goal 
My constant need to feel special, important and a leader, interfere with my goal. The high standards I hold myself to, and my willingness to sacrifice interfere with my goal. 
How Others Can Support You in Your Goal 
Others can help me with my goal by introducing me to interesting, challenging or fun experiences at which I’m not an expert. They can reassure me that they love me for who I am and not for my accomplishments. They can remind me to slow down and encourage me to work less and play more.";
								break;
								
							default:
								$pdfoneCatDesc = FALSE;
								$oneCatDesc = "";
								break;
								 
						}	
						
						$oneCatDesc = "<h3>".$oneCatDeschead."</h3>".htmlentities($oneCatDesc);
						
						
					//	$p++;
					//}
					
				}
				
				$singleattchmentfileN = array(  
							" Contribution Mark " 			=> "contribution",
							" Growth Mark " 				=> "growth",
							" Love / Connection Mark " 		=> "love",		
							" Certainty Mark " 				=> "certainty",		
							" Variety / Uncertainty Mark " 	=> "uncertainty",
							" Significance Mark " 			=> "significance" /*,	
							" Other Mark " 					=> $other_mark */
							);	
				
				
					//$pdfDesc =FALSE;
				$pdfDesc = array();
				$desc = "";
				
				if( !($sameneedcategoriesmarks) )
				{
					
					foreach ($descTopCategory as $allkey => $allvalue) 
					{
						if ( $allkey != 0  )
						{
							$b = $singleattchmentfileN[$allvalue]."_and_".$singleattchmentfileN[$descTopCategory[0]].".pdf";
							
							if ( !(file_exists(APPPATH.'pdffile/special_pdf/'.$b)) ) 
							{
							    $b = $singleattchmentfileN[$descTopCategory[0]]."_and_".$singleattchmentfileN[$allvalue].".pdf";
							}
							
							$pdfDesc[] = $b;
						}			
					}
					
					
				
				}
				
				
				if(($twoTopCat) && ($sameneedcategoriesmarks) )
				{
						//case (  (in_array(" Certainty Mark ", $descTopCategory) ) && ($descTopCategory[1] == ' Variety / Uncertainty Mark ') ):
						if ( (in_array(" Certainty Mark ", $descTopCategory))  && (in_array(" Variety / Uncertainty Mark ", $descTopCategory))  )
						{
							
							//$desc = $descTopCategory[0].' : '.$descTopCategory[1];
							$pdfDesc[] = "certainty_and_uncertainty.pdf";
							$desc .="
I am	in	inner	turmoil	and	conflict	since	these	are	conflicting	needs.		Sometimes	I	want	stay	put,	be	

comfortable	and	make	sure	that	I	feel	safe	and	secure.		At	other	times	I	seek	change,	variety	in	my	

activities,	and	suspense.		I	want	to	take	risks	and	feel	excited.		This	inner	conflict	affects	my	

relationships	since	people	aren't	sure	of	what	it	is	that	I	truly	want,	and	therefore	they	don't	know	

how	to	help	me	to	fulfill	my	needs.		When	I	have	certainty,	I	crave	uncertainty/variety.		And	when	I	

have	uncertainty/variety,	I	crave	certainty.		It	often	seems	to	me	that	I	will	never	have	enough	of	

either	one.		At	work,	I	need	a	comfortable,	organized,	predictable	environment,	yet	I	also	need	

uncertainty,	new	experiences	and	challenges,	which	might	be	disconcerting	to	fellow	workers.
	";
						}	
						 $diffcategoriesmarks;   
						//else 
							if( (in_array(" Certainty Mark ", $descTopCategory))  && (in_array(" Significance Mark ", $descTopCategory)) )
							{
								//$desc = $descTopCategory[0].' : '.$descTopCategory[1];
								$pdfDesc[] = "certainty_and_significance.pdf";
								$desc="I	am	in	inner	conflict	because	significance	can	only	be	accomplished	by	comparing	yourself	to	others,	

by	being	competitive,	being	out	there	in	the	world	and	by	taking	risks.		On	the	other	hand,	I	don't	

want	to	be	competitive,	to	take	risks	or	to	be	out	there	in	the	world.		Because	of	my	need	for	certainty	

I	have	trouble	involving	myself	with	people,	yet	I	can	only	satisfy	my	need	for	significance	by	

comparing	myself	to	others.		I	need	the	certainty	of	knowing	that	I'm	significant	and	important,	and	

this	makes	it	difficult	to	get	along	with	me.		It's	difficult	for	me	to	truly	love	and	take	care	of	others	

because	I	am	so	focused	on	my	inner	feelings.";
							}	   
						//else 
						 $diffcategoriesmarks;
							if( (in_array(" Certainty Mark ", $descTopCategory))  && (in_array(" Love / Connection Mark ", $descTopCategory)) )
							{
								//$desc = $descTopCategory[0].' : '.$descTopCategory[1];
								$pdfDesc[] = "certainty_and_love.pdf";
								$desc="It's	important	for	me	to	distinguish	whether	it	is	certainty	or	love/connection	that	is	my	number	one	

need.		If	certainty	is	number	one,	my	love	will	not	flow	easily,	since	I	need	to	feel	certain	before	I	can	

freely	give	love,	and	certainty	is	very	difficult	to	accomplish.		If	love/connection	is	my	number	one	

need,	my	love	will	flow,	even	when	I	don't	feel	certain	and	I	will	be	able	to	love	and	be	loved.		Yet,	the	

need	for	certainty,	even	when	it	is	my	need	number	two,	will	put	restraints	on	my	ability	to	love	and	

to	connect	to	others.		I	have	trouble	at	work	if	I	feel	that	the	work	environment	is	not	comfortable,	

organized,	predictable	and	if	I	dont	feel	connected	and	appreciated	by	others.";
							}   
						//else   
						 $diffcategoriesmarks;
							if( (in_array(" Certainty Mark ", $descTopCategory))  && (in_array(" Growth Mark ", $descTopCategory)) )
							{
								//$desc = $descTopCategory[0].' : '.$descTopCategory[1];
								$pdfDesc[] = "certainty_and_growth.pdf";
								$desc="My	inner	conflict	is	that	I	want	to	feel	comfortable,	safe,	and	secure.		I	need	a	predictable	

environment	and	I	don't	want	to	take	risks.		Yet	to	grow,	I	need	to	put	myself	out	there,	take	risks,	

extend	the	limits	of	my	comfort	and	stretch	myself.		To	satisfy	my	need	for	certainty,	I	prefer	to	avoid	

new	people	and	new	situations.		To	satisfy	my	need	for	growth	I	need	to	become	involved	with	new	

people	and	new	situations.		This	inner	conflict	preoccupies	me	and	makes	it	difficult	for	people	to	

help	me	to	satisfy	my	needs,	since	they	don't	know	whether	certainty	or	growth	are	more	important	

to	me.		One	way	I	can	resolve	this	dilemma	is	that	I	can	always	be	certain	that	I	can	grow,	because	

there	are	always	new	things	to	learn	and	new	skills	to	be	developed.		The	way	to	resolve	my	conflict	

is	to	satisfy	my	need	for	certainty	by	always	growing.		I	might	have	difficulties	at	work	if	I	don't	feel	

that	I'm	growing	and,	at	the	same	time,	that	I	am	in	comfortable,	organized,	predictable	environment.";
							}		
					//else 
					 $diffcategoriesmarks;
							if( (in_array(" Certainty Mark ", $descTopCategory))  && (in_array(" Contribution Mark ", $descTopCategory)) )
							{
								//$desc = $descTopCategory[0].' : '.$descTopCategory[1];
								$pdfDesc[] = "certainty_and_contribution.pdf";
								$desc="If	certainty	means	that	I	cannot	take	risks,	that	everything	has	to	be	predictable	and	that I must always	feel	comfortable,	then	certainty	and	contribution	are	conflicting	needs.		In	order	to	contribute, I	need	to	put	myself	out	there,	take	risks	and	the	results	are	not	always	predictable.		However,	if	I	can	
satisfy	my	need	for	certain	by	contributing,	then	there	is	no	inner	conflict.		I	can	always	be	certain	that	I	will	contribute.		Everyone	can	contribute	beyond	oneself	and	I	can	be	sure	that	I	will	find	ways of	making	a	contribution	to	others.		At	work,	my	need	for	certainty	might	interfere	with	my	need	to	contribute	to	the	people	I	work	with,	if	I	feel	they	are	not	collaborating	sufficiently	in	creating	a	predictable,	organized	work	environment.";
	
							}	
						//else   
						 $diffcategoriesmarks;
							if( (in_array(" Variety / Uncertainty Mark ", $descTopCategory))  && (in_array(" Significance Mark ", $descTopCategory)) )
							{
								//$desc = $descTopCategory[0].' : '.$descTopCategory[1];
								$pdfDesc[] = "uncertainty_and_significance.pdf";
								$desc="I	have	the	inner	conflict	that	I	like	uncertainty,	variety,	suspense,	risk	and	yet	I	want	to	always	feel	

important,	significant.		When	there	is	uncertainty	and	things	are	unpredictable,	I	cannot	be	sure	that	I	

will	experience	the	sense	of	being	important	and	significant	that	I	crave.		Yet	if	I	don't	face	

uncertainty,	I	can't	be	sure	that	I	will	feel	significant	enough.		My	need	for	both	uncertainty/variety	

and	significance	can	sometimes	lead	me	to	be	too	competitive	and	confrontational	with	people,	and	

therefore	it	can	be	difficult	to	get	along	with	me.		One	solution	to	my	inner	conflict	is	for	me	to	

experience	significance	precisely	because	I'm	capable	of	experiencing	uncertainty	and	variety,	rather	

than	because	I'm	more	important	and	more	competitive	than	others.		I	may	be	a	difficult	person	to	

work	with	because	I	want	to	always	feel	important	and	my	need	for	uncertainty/variety	interferes	

with	the	ability	to	be	organized	and	efficient.		My	need	for	both	significance	and	uncertainty/variety	

may	lead	me	to	neglect	my	health	and	to	risk	injuries	in	sports	and	other	activities.	";	
							}	
						//else
						 $diffcategoriesmarks;
							if( (in_array(" Variety / Uncertainty Mark ", $descTopCategory))  && (in_array(" Love / Connection Mark ", $descTopCategory)) )
							{
								//$desc = $descTopCategory[0].' : '.$descTopCategory[1];
								$pdfDesc[] = "uncertainty_and_love.pdf";
								$desc="It	is	difficult	for	me	to	have	a	stable,	long-term	relationship	with	a	partner	or	spouse.		There	are	too	

many	tempting	possibilities	for	uncertainty	and	variety	out	there.		I	might	seek	to	satisfy	my	need	for	

uncertainty/variety	by	getting	involved	with	other	people	that	threaten	my	primary	relationship	or	

by	getting	involved	with	activities	that	take	me	away	from	my	partner.		This	conflict	is	exacerbated	if	

the	number	one	need	is	uncertainty/variety	and	love/connection	is	second,	because	it	will	be	

difficult	for	me	to	love	and	take	care	of	the	people	that	are	important	in	my	life.		If	love/connection	is	

the	first	need	and	uncertainty/variety	is	second,	it	will	not	be	easy	but	I	will	be	able	to	give	priority	to	

the	ones	I	love	instead	of	to	my	need	for	new	experiences.		Work	may	be	difficult	for	me	if	I	don't	feel	

there	are	sufficient	variety	and	a	good	connection	with	the	people	I	work	with.		In	terms	of	health,	I	

might	exhaust	myself	trying	to	give	enough	time	to	fulfilling	both	my	need	for	love/connection	and	

for	love.	";	
							}	
						//else
						 $diffcategoriesmarks;
							if( (in_array(" Variety / Uncertainty Mark ", $descTopCategory))  && (in_array(" Growth Mark ", $descTopCategory)) )
							{
								//$desc = $descTopCategory[0].' : '.$descTopCategory[1];
								$pdfDesc[] = "uncertainty_and_growth.pdf";
								$desc="These	needs	are	not	incompatible	or	conflicting	and	I	will	be	able	to	satisfy	my	need	for	

uncertainty/variety	through	my	personal	growth,	and	my	need	for	growth	through	new	experiences	

that	give	me	the	uncertainty/variety	that	I	need.		However,	because	these	are	my	two	most	important	

needs,	I	tend	not	to	focus	sufficiently	on	relationships	and	on	the	people	I	care	about.		People	might	

feel	that	I	don't	give	them	enough	and	that	I	dont	truly	love	them.		Work	may	be	difficult	for	me	if	I	

don't	feel	that	there	is	sufficient	variety	and	opportunity	for	growth.		In	terms	of	health	and	safety,	I	

might	take	too	many	risks	that	may	result	in	injuries	or	health	problems.	";	
							}	
						//else
						 $diffcategoriesmarks;
							if( (in_array(" Variety / Uncertainty Mark ", $descTopCategory))  && (in_array(" Contribution Mark ", $descTopCategory)) )
							{
								//$desc = $descTopCategory[0].' : '.$descTopCategory[1];
								$pdfDesc[] = "uncertainty_and_contribution.pdf";
								$desc="These	needs	are	not	incompatible	or	conflicting	and	I	will	be	able	to	satisfy	my	need	for	

uncertainty/variety	by	contributing	to	others,	and	I	will	be	able	to	satisfy	my	need	for	contribution	

by	finding	different	ways	of	contributing.		However,	because	these	are	my	two	most	important	needs,	

I	tend	not	to	focus	sufficiently	on	relationships	and	on	the	people	I	care	about.		People	might	feel	that	

I	don't	give	them	enough	and	that	I	don't	truly	love	them.		Work	may	be	difficult	for	me	if	I	don't	feel	

that	there	is	sufficient	variety	and	opportunity	to	contribute.		In	terms	of	health	and	safety,	I	might	

take	too	many	risks	that	may	result	in	injuries	or	health	problems.";
							}
						//else
						 $diffcategoriesmarks;
							if( (in_array(" Significance Mark ", $descTopCategory))  && (in_array(" Love / Connection Mark ", $descTopCategory)) )
							{
						   		//$desc = $descTopCategory[0].' : '.$descTopCategory[1];
						   		$pdfDesc[] = "significance_and_love.pdf";
						   		$desc="	I	will	have	trouble	fulfilling	my	need	for	love/connection	because	it's	difficult	to	love	someone	who	

has	to	feel	important	all	the	time.		I	have	a	better	chance	if	love/connection	is	my	first	need,	but	even	

so	I	will	experience	difficulties.		I	have	a	hard	time	experiencing	love/connection	when	I	don't	feel	

important	and	respected	at	the	same	time.		I	sometimes	try	to	feel	connected	and	loved	because	Im	

so	important	and	this	is	precisely	what	pushes	people	away	from	me.		If	I	feel	insignificant,	I	feel	

unloved	and	I	might	attempt	to	feel	connected	through	confrontation	and	intimidation.		This	makes	it	

difficult	to	work	with	me	and	to	be	in	a	long-term	stable	relationship.";
							}
						//else
						 $diffcategoriesmarks;
							if( (in_array(" Significance Mark ", $descTopCategory))  && (in_array(" Growth Mark ", $descTopCategory)) )
							{
						   		//$desc = $descTopCategory[0].' : '.$descTopCategory[1];
						   		$pdfDesc[] = "significance_and_growth.pdf";
						   		$desc="My	inner	conflict	is	that	to	grow	I	have	to	be	willing	to	accept	that	there	are	new	things	for	me	to	

learn	and	new	skills	that	I	can	develop.		Yet,	sometimes	my	need	to	feel	significant	makes	me	think	

that	I	already	know	everything.		This	inner	conflict	is	more	troubling	if	significance	comes	first	and	

growth	comes	second.		When	growth	is	first,	I	can	satisfy	my	need	for	significance	by	growing,	

developing	new	skills	and	learning.		Because	these	are	my	two	most	important	needs,	people	might	

feel	that	I'm	not	sufficiently	connected	to	them	and	that	I	don't	care	enough	for	them.		I	might	be	

difficult	to	work	with	because	I'm	so	focused	on	myself.		I	tend	to	take	good	care	of	my	health	when	

it's	part	of	my	need	to	feel	that	I'm	growing	and	that	I'm	important.	";
							}
						//else
						 $diffcategoriesmarks;
							if( (in_array(" Significance Mark ", $descTopCategory))  && (in_array(" Contribution Mark ", $descTopCategory)) )
							{
								//$desc = $descTopCategory[0].' : '.$descTopCategory[1];
								$pdfDesc[] = "significance_and_contribution.pdf";
								$desc="My	inner	conflict	is	that	to	fulfill	my	need	to	contribute,	I	have	to	focus	on	others,	and	not	on	myself;	

and	to	fulfill	my	need	for	feeling	important	and	significant,	I	have	to	focus	on	myself	and	not	on	

others.		This	inner	conflict	can	be	resolved	if	I'm	able	to	satisfy	my	need	for	significance	through	the	

contributions	I	make	to	others.		Because	these	are	my	two	most	important	needs,	family	members	

and	important	people	in	my	life	might	feel	that	I'm	not	sufficiently	connected	to	them	and	that	I	don't	

care	enough	about	them.		I	might	be	difficult	to	work	with	because	I'm	so	focused	on	what	is	

important	to	me.		I	might	neglect	my	health	if	I	feel	that	taking	care	of	myself	physically	and	

emotionally	interferes	with	my	need	to	gain	importance	and	to	make	a	contribution.	";
							}
						//else
						 $diffcategoriesmarks;
							if( (in_array(" Love / Connection Mark ", $descTopCategory))  && (in_array(" Growth Mark ", $descTopCategory)) )
							{	 
						   		//$desc = $descTopCategory[0].' : '.$descTopCategory[1];
						   		$pdfDesc[] = "love_and_growth.pdf";
						   		$desc="My	inner	conflict	is	that	my	need	for	personal	growth	interferes	with	putting	enough	focus	and	

energy	on	connecting	with	others	and	on	giving	and	receiving	love.		In	order	to	grow,	I	have	to	focus	

on	myself	and	not	on	others;	and	in	order	to	satisfy	my	need	for	love/connection,	I	have	to	focus	on	

others	and	not	on	myself.		This	inner	conflict	can	be	resolved	if	I'm	able	to	satisfy	my	need	for	growth	

through	love	and	connection	to	others.		When	growth	is	my	first	need,	I	may	not	be	able	to	feel	loved	

and	connected	unless	I	feel	I'm	growing.		When	love/connection	comes	first,	I	may	not	be	able	to	feel	

that	I'm	growing	unless	I'm	connected	and	loved.		I	often	want	my	spouse	or	partner	to	participate	in	

my	growth	experiences	so	I	can	feel	connected	and	loved	through	growth.";
							}
						//else
						 $diffcategoriesmarks;
							if( (in_array(" Love / Connection Mark ", $descTopCategory))  && (in_array(" Contribution Mark ", $descTopCategory)) )
							{	
						   		//$desc = $descTopCategory[0].' : '.$descTopCategory[1];
						   		$pdfDesc[] = "love_and_contribution.pdf";
								$desc="If	my	need	for	contribution	comes	first,	I	have	trouble	with	those	I	love	as	they	might	feel	that	contributing	to	others	or	to	the	world	is	more	important	to	me	than	they	are.		This	conflict	is	less	severe	if	my	first	need	is	for	love/connection	and	contribution	is	second,	since	I	will	only	be	able to fulfill	my	need	for	contribution	if	I	feel	love	and	connection.		This	conflict	is	resolved	if	my	need	to	
contribute	is	in	great	part	fulfilled	through	my	need	to	give	love	to	others.		I	often	want	my	spouse	or	
partner	to	participate	in	the	contributions	I	make	so	I	can	feel	connected	and	loved	through contribution.	";
							}
						//else
						 $diffcategoriesmarks;
							if( (in_array(" Growth Mark ", $descTopCategory))  && (in_array(" Contribution Mark ", $descTopCategory)) )
							{
								//$desc = $descTopCategory[0].' : '.$descTopCategory[1];
								$pdfDesc[] = "growth_and_contribution.pdf";
								$desc="I	might	have	trouble	with	those	I	love	because	they	may	feel	that	my	need	to	grow	and	to	contribute
is	more	important	to	me	than	they	are.		They	might	feel	neglected	and	resentful.		This	conflict	can	be	resolved	if	my	need	for	growth	and	contribution	includes	contributing	to	those	I	love	and	helping	them	to	grow	in	the	ways	that	they	want	to	grow.		I	might	have	conflicts	with	my	spouse	or	partner	if	I	want	him/her	to	value	growth	and	contribution	in	the	same	way	I	do.";
							}
					/*	else
						{
							$pdfDesc = FALSE;
				        	$desc = 'Some error has occurred. Please Inform Support team. We will get back to you.';
				        }
						*/
					$Heading_desc ="If your first two needs are for ".str_replace (' Mark ', '', $descTopCategory[0]) ." and ".str_replace(' Mark ','', $descTopCategory[1]);	
						
					$desc = "<h3>".$Heading_desc."</h3>".htmlentities($desc);
							
				}
			 
			 
				$_SESSION['total'] = $total;
				
				$storeAllCatMark =  strip_tags($storeAllCatMarks);
				
				$this->load->model('user_model');
				$this->user_model->storeMarks($storeAllCatMark);
				//die;
				
				?>
				<br/>

				<?php 
				
				
				
				$userinfo = "	Name	:	<b>".@$_POST['firstname']."</b> <br><br>	Email	:	<b>".@$_POST['email']."</b><br><br>	Questionnaire Title	:	<b>".@$_POST['qn_title']."</b><br><br>";
			    //$result = " <b>Result : </b><br><br><br><b> 1 : Love / Connection Mark : 120 </b><br><br><b> 2 : Growth Mark : 100 </b><br><br> 3 : Contribution Mark : 80 <br><br> 4 : Centainty Mark : 70 <br><br> 5 : Variety / Uncertainty Mark : 60 <br><br> 6 : Significance Mark : 0 <br>";
				
				$result = str_replace ('<br/>', '<br><br>', $html);
				$pdfname = $_POST['firstname'].".pdf";
				
				$this->createPDFFile($pdfname, $userinfo, $result);
				
			 
		//$app = new iSDK;
		if ($app->cfgCon("connectionName")) 
		{
			
			$contactId = $contactID;
			$groupId = 2020;
			$result2 = (boolean)  $app->grpAssign($contactId, $groupId);
		 //insert query to client data in database with date and time 
		 
			  $data = array(  
                        'name'     => $this->input->post('firstname'),  
                        'email'  => $this->input->post('email'),  
                        'phone'   => $this->input->post('mobile'),  
                        'session_date' => $this->input->post('session_date'),  
                        'session_time' => $this->input->post('session_time') , 
                        'coach_id' =>'1' 
                        );  
        //insert data into database table.  
        $this->db->insert('client_registrations',$data);  
  
  
		   // get result then false 
		   		if ( !$result2 )
			   {
			   		// remove 
			    	$removeResult = $app->grpRemove($contactId, $groupId);
					 if( $removeResult )
					 {
						$result3 = $app->grpAssign($contactId, $groupId); 
					 }
					 
				}
			   
			
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
            
            // $mail->AddAddress('anand@arfeenkhan.com', '');
             $mail->AddAddress('support@arfeenkhan.com', '');
              $mail->AddAddress($_POST['email'], $_POST['firstname']);
             $mail->AddAddress('info@arfeenkhan.com', '');
             
			if($total!=0)
			{
				//$mail->AddAddress('arfeenkhan@arfeenkhan.com', '');
            			//$mail->AddAddress('info@arfeenkhan.com', '');
                                //$mail->AddAddress('amit@arfeenkhan.com', '');
                                
		            	//$mail->AddAddress('chirag912@gmail.com', '');				
			}
             
         
           
            $mail->Subject = $_POST['firstname']." Questionnaire Result ";

            //$mail->Body= " Name : <b>".$_POST['firstname']."</b><br/> Email : <b>".$_POST['email']."</b><br/> Questionnaires Title : <b>".$_POST['qn_title']."</b><br/>".$html."<br/>".$oneCatDesc."<br/><br/>".$desc;
			$mail->Body= " Name : <b>".$_POST['firstname']."</b><br/> Email : <b>".$_POST['email']."</b><br/> Questionnaires Title : <b>".$_POST['qn_title']."</b><br/>".$html;
			$mail->AddAttachment(APPPATH.'pdffile/'.$pdfname );
           
			if( !empty($firstNeedDescAtt) )
			{
				foreach ( $firstNeedDescAtt as $needpdfkey => $needpdfvalue) 
				{
					$mail->AddAttachment(APPPATH.'pdffile/special_pdf/'.$needpdfvalue );	
				}
			}

			if( !empty($pdfDesc) )
			{
				foreach ( $pdfDesc as $pdfkey => $pdfvalue) 
				{
					$mail->AddAttachment(APPPATH.'pdffile/special_pdf/'.$pdfvalue );	
				}
			} 
			
			
			$mail->IsHTML(true);
          //$mail->Send();	
				
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
				
				$_POST['ContactID'] ="";
				
				if( (array_key_exists('time', $_SESSION)) && ($_SESSION['time'] == 0 ) )
				{
						$thank_page               = FALSE;
						$timerdata['questionnaire_id'] =  $_SESSION['questionnaire_id'];
						session_destroy();
						$this->load->view('site/timerthankyou',$timerdata );
				}
				
				if( $thank_page )
				{
					session_destroy();
				 	$this->load->view('site/thankyou', $_POST );
				}
				
		}


		function setFormVariablesINSession()
		{
			session_start();
			if(  ( !(array_key_exists('qn_title', $_POST)))   )
			{
			//	redirect( base_url() );
			}
				
			$_SESSION['firstname'] 	 	= $_POST['firstname'];
			$_SESSION['email'] 		 	= $_POST['email'];
			$_SESSION['question_id'] 	= $_POST['question_id'];
			$_SESSION['abc'] 			= $_POST['abc'];
			$_SESSION['time'] 			= 0;
			
			
		}
		
		function lists( $id )
		{
			$data['questionnaires'] 	= $this->SQuestionnaires_model->getQuestionnaire( $id );
			$data['questions'] 			= $this->SQuestionnaires_model->getQuestionsById( $id );
			
			$this->load->view('site/showquestions', $data );
		}
		
		function addtagInfusionsoft()
		{
			session_start();
			
			$firstname	 	= $_POST['fistname'];
			$email 		 	= $_POST['emailid'];
			$mobile 		= $_POST['mobileno'];
			
			//$firstname	 	= "Mobin";
			
				
			//require_once(APPPATH."third_party/infusionsoft/isdk.php");
			
			$app = new iSDK;  
			if ($app->cfgCon("connectionName")) 
			{ 
			    $conID = $app->addWithDupCheck(array('FirstName' =>$firstname, 'Email' => $email,'Phone1' => $mobile), 'EmailAndName');
  
				$_SESSION["ContactID"] = $conID;
				
				//$ContactID = $arr['Contact.Id'];
				$ContactID = $conID;
				
			    $groupId = 9105;
			    $res = $app->grpAssign($ContactID, $groupId);	
				
				// get result then false 
		   		if ( !$res )
			   {
			   		// remove 
			    	$removeRes = $app->grpRemove($ContactID, $groupId);
					 if( $removeRes )
					 {
						$res3 = $app->grpAssign($ContactID, $groupId); 
					 }
					
			   }
				
				//echo '<input type="hidden" name="ContactID"  value="'.intval($conID).'" />';
				
				echo intval($conID);
				
			}
		
		}
		
		
		function createPDFFile( $pdfname ,$userinfo, $result  )
		{
			require_once(APPPATH."third_party/fpdf/my_fpdf.php");
		 	
			$pdf = new PDF();
			// First page
			$pdf->AddPage();
			$pdf->SetFont('Arial','',20);
			//$pdf->Image('images/logo.jpg',10,12,30,0,'JPG','');
			$pdf->Image(APPPATH.'third_party/fpdf/images/logo.jpg',10,12,190,50,'JPG','');
			//$pdf->Write(5,"testing 2 To find out what's new in this tutorial, click ");
			
			// Line break
			$pdf->Ln(70);
			$pdf->WriteHTML($userinfo);   
			
			// Line break
			$pdf->Ln(10);
			$pdf->WriteHTML($result); 
			$pdf->SetFont('','U');
			$link = $pdf->AddLink();
		 
			 
			$pdf->Output(APPPATH."pdffile/".$pdfname,"F");
				
		}
			
}

?>