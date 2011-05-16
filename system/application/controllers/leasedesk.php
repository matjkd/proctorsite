<?php

class Leasedesk extends MY_Controller {

function __construct()
	{
		parent::__construct();
		
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
		$data['slideshow'] = "slideshow/software";
		$data['news'] = $this->news_model->list_news();
		$data['widecolumntop'] = 'extras/software_solutions';
		$data['widecolumn'] = 'global/mainbuttons';
		$data['rightcolumn'] = 'sidebar/channel_partner_program';
		$data['bottom'] = 'sidebar/leasedesk_forms';
		$data['page'] = $id;
		$is_logged_in = $this->session->userdata('is_logged_in');
		
		//display greybox module - this should eventually be controlled by some table or something
		$data['greybox'] = 1;
		
		if($is_logged_in!=NULL)
			{
			$data['edit'] = site_url("admin/edit/$id");
	        }

		//Load the shiny new rssparse
  		//$this->load->library('RSSParser', array('url' => 'http://twitter.com/statuses/user_timeline/190582980.rss', 'life' => 2));
  		//Get six items from the feed
 		//$data['twitter'] = $this->rssparser->getFeed(6);	        
	        
        $this->load->vars($data);
		$this->load->view('template');
	}
}