<?php

class Home extends CI_Controller{

 public function cache(){
 	$this->load->driver('cache',array('adapter'=>'apc','backup'=>'file'));

 	// if($this->cache->apc->is_supported()){
 	// 	echo "availabe driver";
 	// }else{
 	// 	echo "driver in not availabe";
 	// }
 	if(!$this->cache->get('arfeenkhan')){
 		$arrayName = array('one' =>1 , 'two' =>2 );
 		$this->cache->save('arfeenkhan',$arrayName,300);//5 min 
 	}
 	$showCache =  null;
 	$showCache = $this->cache->get('arfeenkhan');
 	$showCache = $this->cache->cache_info();
 	var_dump($showCache);
 }

 public function deletedcache($cachename){
 	$this->load->driver('cache', array('adapter' =>'apc' ,'backup'=>'file' ));
 	$status = $this->cache->delete($cachename);
 	var_dump($status);
 }
}