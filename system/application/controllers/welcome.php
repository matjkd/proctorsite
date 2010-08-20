<?php

class Welcome extends My_Controller {

	function Welcome()
	{
		parent::Controller();	
		
	}
	
	function index()
	{
		
			$data['main'] = '/main/main_channel';
			
			$title = "Proctor Consulting";
			
		
		$data['title'] = $title;
		$this->load->vars($data);
		$this->load->view('template');
	}
	
	
// Customer Resource Links
	function quote()
	{
		$data['main'] = '/quote/main';
		$data['title'] = 'Quoting Tool';
		$this->load->vars($data);
		$this->load->view('template');
	}
	
	
// end of channel resource links
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */