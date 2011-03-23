<?php

class Blog extends MY_Controller {

	 function __construct()
    {
        parent::__construct();
			
	}
	
	function index()
	{
		redirect('blog/item');
	}
	
function item()
	{
		
		if(($this->uri->segment(3))==NULL)
			{
				$id = "news";
			}
		else
			{
				$id = $this->uri->segment(3);
			}
			
		
		$data['menu'] =	$this->content_model->get_menus();
		$data['slideshow'] = "slideshow/main_slideshow";
		$data['news'] = $this->news_model->list_news();
		$data['sidebar'] = 'sidebar/links';
		$data['rightcolumn'] = 'sidebar/channel_partner';
		$data['page'] = $id;
		$is_logged_in = $this->session->userdata('is_logged_in');	
			
		$data['content'] =	$this->content_model->get_content($id);
	
		$data['main'] = "pages/news";
		
		$is_logged_in = $this->session->userdata('is_logged_in');
		
			//display widecolumn module - this should eventually be controlled by some table or something
		$data['widecolumn'] = 'sidebar/benefits_of_leasedesk';
		
		if($is_logged_in!=NULL)
			{
			$data['edit'] = site_url("admin/editnews/");
			$data['create_news'] = site_url("admin/create_news");
	        }
			
         $data['title'] = 'Proctor Consulting Blog';
		              
			
		$data['info'] = "infoblock/times";
		$this->load->vars($data);
		$this->load->view('template');
	}
function post($post)
	{
		
		$id = 'news';
		$data['menu'] =	$this->content_model->get_menus();
		$data['slideshow'] = "slideshow/main_slideshow";
		$data['news'] = $this->news_model->get_news($post);
		$data['sidebar'] = 'sidebar/links';
		$data['rightcolumn'] = 'sidebar/channel_partner';
		$data['page'] = $id;
		$is_logged_in = $this->session->userdata('is_logged_in');	
			
		$data['content'] =	$this->content_model->get_content($id);
	
		$data['main'] = "pages/news";
		
		$is_logged_in = $this->session->userdata('is_logged_in');
		
			//display widecolumn module - this should eventually be controlled by some table or something
		$data['widecolumn'] = 'sidebar/benefits_of_leasedesk';
		
		if($is_logged_in!=NULL)
			{
			$data['edit'] = site_url("admin/editnews/");
			$data['create_news'] = site_url("admin/create_news");
	        }
			
         $data['title'] = 'Proctor Consulting Blog';
		              
			
		$data['info'] = "infoblock/times";
		$this->load->vars($data);
		$this->load->view('template');
	}
	
}

/* End of file news.php */
/* Location: ./system/application/controllers/news.php */