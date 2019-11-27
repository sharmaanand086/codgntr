<?php

function CustomFlash($error,$class,$redirectUrl){
	$CI = get_instance();
	$CI->load->Helper('url');
	$CI->load->library('session');
	$CI->session->set_flashdata('class',$class);
    $CI->session->set_flashdata('error',$error);
    redirect($redirectUrl);

}

function checkflash(){
	$CI = get_instance();
 	$CI->load->library('session');
 	if($CI->session->flashdata('error') && $CI->session->flashdata('class'))
 		
 	{
 		$data['error']= $CI->session->flashdata('error');
 		$data['class']= $CI->session->flashdata('class');
 		$CI->load->view('errors/customError',$data);
 	}
 	else
 	{

 	}
}