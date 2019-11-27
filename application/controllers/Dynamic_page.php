<?php

/**
 * 
 */
class Dynamic_page extends CI_Controller
{

public function index(){
	echo "<h1>This is your Home page";
}

public function newPage(){
	$this->load->view('dynamicpage');

}

public function create_page(){
	//echo "working";
	$this->form_validation->set_rules('pagename','Page Name','required');
	$this->form_validation->set_rules('p_text','Page Description','required');
	if($this->form_validation->run() ===  false){
     $this->newPage();
	}else{
//echo "fine";
		$data['p_name'] = $this->input->post('pagename',true);
		$data['p_text'] = $this->input->post('p_text',true);
		$data['p_date']= date('Y-m-d h:i:sa');
		//echo $this->seoURL($data['p_name']);
		$data['p_slug'] =$this->seoURL($data['p_name']);
		$checkpage = $this->DynamicPageModal->checkpage($data);
		if($checkpage->num_rows() > 0 ){
				CustomFlash('Already created page ','alert-success','Dynamic_page/create_page');
		}else{
			$addPage = $this->DynamicPageModal->addPage($data);
			if($addPage){
				//echo "success";
				$this->save_routes();
				CustomFlash('You have successfully created your page ','alert-success','Dynamic_page/create_page');
			}else{
				//echo "failed";
				CustomFlash('Something went wrong please try again  ','alert-warning','Dynamic_page/create_page');
			}

		}
	}
}

public function seoURL($text){
	$text =  strtolower(htmlentities($text));
	$text = str_replace(' ','-',$text);
	return $text;
}

private function save_routes(){
	$routes = $this->DynamicPageModal->get_all_routes();
	$data =  array();
	if(!empty($routes)){
		$data[] =  '<?php ';//  if(!define(\'BASEPATH\')) exit(\' No direct access allowed \' );';
		foreach ($routes as $route ) {
		$data[]= '$route[\''.$route['p_slug'].'\']=\''.'Pages'.'/'.'index/'.$route['p_id'].'\';';
		}
		$output = implode("\n",$data);
		write_file(APPPATH.'cache/routes.php',$output);
	}else{
		echo "else here";
	}
}
}

