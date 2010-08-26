<?php

class Leasedesk extends My_Controller {

	function Leasedesk()
	{
		parent::Controller();	
		
	}
	function index()
	{
		$id = "leasedesk";
		$data['main'] = "pages/dynamic";
		
		
		$data['content'] =	$this->content_model->get_content($id);
		foreach($data['content'] as $row):
		
		$data['title'] = $row['title'];
		
		endforeach;
		$data['menu'] =	$this->content_model->get_menus();
		$data['slideshow'] = "global/lease-desk-flash";
		$data['news'] = $this->news_model->list_news();
		$data['sidebar'] = 'sidebar/links';
		$data['rightcolumn'] = 'sidebar/channel_partner';
		$data['bottom'] = 'sidebar/leasedesk_forms';
		$data['page'] = $id;
		$is_logged_in = $this->session->userdata('is_logged_in');
		
		if($is_logged_in!=NULL)
			{
			$data['edit'] = site_url("admin/edit/$id");
	        }
			
        $this->load->vars($data);
		$this->load->view('template');
	}
}