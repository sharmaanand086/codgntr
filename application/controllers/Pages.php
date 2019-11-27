<?php

/**
 * 
 */
class Pages extends CI_Controller
{
	
 public function index($url){
 	$data['pages'] = $this->DynamicPageModal->checkbypageid($url);
 	//var_dump($data['pages']);
 	//die();
 	$this->load->view('Newpages',$data);
 }
}