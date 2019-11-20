<?php

class CI_Tutorial extends CI_Controller {
 

  	public function __construct()
        {
                parent::__construct();
                $this->load->library('session');
        }

        public function index()
        {
       $data = array(
        array(
                'title' => 'My title',
                'name' => 'My Name',
                'date' => 'My date'
        ),
        array(
                'title' => 'Another title',
                'name' => 'Another Name',
                'date' => 'Another date'
        )
);

$this->MModal->insertingbatch($data);
		}
            public function index2()
        {
       $data2 = array(
        array(
                'title' => 'My title',
                'name' => 'My Name',
                'date' => 'My date'
        ),
        array(
                'title' => 'Another title',
                'name' => 'Another Name',
                'date' => 'Another date'
        )
);

$this->MModal->singleinserts($data2);
        }
	 
		       
    }

 

?>