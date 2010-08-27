<?php

class Welcome extends My_Controller {

	function Welcome()
	{
		parent::Controller();	
		
	}
	
	function index()
	{
		
		redirect('/welcome/content');
	}
	
function introduction()
	
	{
		$data['main'] = "pages/content";
		$data['menu'] =	$this->content_model->get_menus();
		$data['info'] = "infoblock/times";
		$data['page'] = "home";
		$this->load->vars($data);
		$this->load->view('template');
	}
	
	
function content()
	{
		
		if(($this->uri->segment(3))==NULL)
			{
				$id = "home";
				$data['main'] = "pages/dynamic";
			}
		else
			{
				$id = $this->uri->segment(3);
				$data['main'] = "pages/dynamic";
			}
		
		$data['content'] =	$this->content_model->get_content($id);
		foreach($data['content'] as $row):
		
		$data['title'] = $row['title'];
		
		endforeach;
		$data['menu'] =	$this->content_model->get_menus();
		$data['slideshow'] = "global/slideshow1";
		$data['news'] = $this->news_model->list_news();
		$data['sidebar'] = 'sidebar/links';
		$data['rightcolumn'] = 'sidebar/channel_partner';
		$data['page'] = $id;
		$is_logged_in = $this->session->userdata('is_logged_in');
		
		if($is_logged_in!=NULL)
			{
			$data['edit'] = site_url("admin/edit/$id");
	        }
			
        $this->load->vars($data);
		$this->load->view('template');
	}
	
	
function contact()
	{
		$id = "contact_us";
		$data['content'] =	$this->content_model->get_content($id);
		$data['slideshow'] = "global/slideshow1";
		$data['menu'] =	$this->content_model->get_menus();
		$data['main'] = "pages/contact";
		$data['title'] = 'Contact Us';
		$data['news'] = $this->news_model->list_news();
		$data['sidebar'] = 'sidebar/links';
		$data['page'] = $id;
		$is_logged_in = $this->session->userdata('is_logged_in');
		
		if($is_logged_in!=NULL)
			{
			$data['edit'] = site_url("admin/edit/$id");
	        }
			
                       
			
	
		$this->load->vars($data);
		$this->load->view('template');
}
function login()
	{
		
		$id = 'login';
		$data['content'] =	$this->content_model->get_content($id);
		$data['main'] = "user/login_form";
		$data['menu'] =	$this->content_model->get_menus();
		$data['info'] = "infoblock/times";
		$data['page'] = "login";
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