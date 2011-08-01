<?php

class Welcome extends MY_Controller
{
function __construct()
	{
		parent::__construct();
		$this->load->model('professionals_model');
		$this->load->model('captcha_model');
		$this->logged_in();
	}
	
	function index()
	{
		
		redirect('/welcome/content');
	}
	function logged_in()
	{
		$is_logged_in = $this->session->userdata('is_logged_in');
		$role = $this->session->userdata('role');
		if($is_logged_in!=NULL && $role ==1)
			{
			$globaldata['edit'] = "yes";
			$this->load->vars($globaldata);
	        }
			
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
		
		if($row['page_title'] != NULL){
			$data['title'] = $row['page_title'];
		}
		else
		{
			$data['title'] = $row['title'];
		}
		
		endforeach;
		$data['menu'] =	$this->content_model->get_menus();
		$data['slideshow'] = "slideshow/main_slideshow2";
		$data['news'] = $this->news_model->list_news();
		$data['widecolumn'] = 'global/mainbuttons';
		
		$data['widecolumntop'] = 'sidebar/testimonials';
		
		//@TODO come up with a better solution for this show consultancy buttons if consultancy page
		if($id == "consultancy")
		{
			
			$data['widecolumntop'] = 'extras/consultancy_side';
			
		}
		
		$data['page'] = $id;
		
		$is_logged_in = $this->session->userdata('is_logged_in');
		
		//display greybox module - this should eventually be controlled by some table or something
		$data['greybox'] = 1;
		
		
			
        $this->load->vars($data);
		$this->load->view('template');
	}
	
	
function contact()
	{
			
		$data['captcha'] = $this->captcha_model->initiate_captcha();
    	$data['email'] = $this->input->post('email');
    	$data['phone'] = $this->input->post('phone');
    	$data['message'] = $this->input->post('message');
    	$data['business_name'] = $this->input->post('business_name');
		$data['referral'] = $this->input->post('referral');
    	$data['name'] = $this->input->post('name');
		$data['errors'] = validation_errors();	
			
		$id = "contact_us";
		$data['content'] =	$this->content_model->get_content($id);
		//$data['slideshow'] = "slideshow/main_slideshow";
		$data['menu'] =	$this->content_model->get_menus();
		$data['main'] = "pages/contact";
		$data['title'] = 'Contact Us';
		$data['news'] = $this->news_model->list_news();
		
		$data['page'] = $id;
		
		$data['widecolumntop'] = 'sidebar/map';
		$data['widecolumn'] = 'sidebar/address';
		
		$this->load->vars($data);
		$this->load->view('template');
}
function management_team()
	{
		if(($this->uri->segment(3))==NULL)
			{
				$member = 7;
				
			}
		else
			{
				$member = $this->uri->segment(3);
			
			}
		
		$id = "management-team";
		$data['content'] =	$this->content_model->get_content($id);
		$data['team'] = $this->professionals_model->get_professionals();
		$data['slideshow'] = "slideshow/team";
		$data['menu'] =	$this->content_model->get_menus();
		$data['main'] = "pages/dynamic";
		$data['title'] = 'Management Team';
		$data['news'] = $this->news_model->list_news();
		$data['sidebar'] = 'sidebar/links';
		$data['rightcolumn'] = 'sidebar/channel_partner_program';
		$data['page'] = $id;
		
		
		         
		$this->load->vars($data);
		$this->load->view('template');
}
function team_member($id)
{
	$data['member'] = $this->professionals_model->get_professional($id);
	$this->load->vars($data);
	$this->load->view('ajax/member.php');
}
function lease_rate_calc()
{
	$id = "lease_rate_calc";
		$data['content'] =	$this->content_model->get_content($id);
		
		$data['menu'] =	$this->content_model->get_menus();
		$data['main'] = "pages/lease_rate_calc";
		$data['title'] = 'Lease Rate Calculator';
		$data['news'] = $this->news_model->list_news();
		$data['sidebar'] = 'sidebar/links';
		$data['rightcolumn'] = 'sidebar/channel_partner_program';
		$data['page'] = $id;
		$is_logged_in = $this->session->userdata('is_logged_in');
		
			//display widecolumn module - this should eventually be controlled by some table or something
		$data['widecolumn'] = 'sidebar/benefits_of_leasedesk';
		$data['widecolumn2'] = 'sidebar/testimonials';
		
		
	        
	     	$data['quote_ref'] ='';
						$data['capital'] ='';
						$data['capital_type'] ='';
						$data['amount_type'] ='';
						$data['interest_type'] = '';
						$data['calculate_by'] = '';
						$data['interest_rate'] = '';
						$data['rate_per_1000'] = '';
						$data['periodic_payment'] = '';
						$data['payment_type'] = '';
						$data['payment_frequency'] = '';
						$data['initial'] = '';
						$data['regular'] = '';
						$data['number_of_ports'] = '';
						$data['annual_support_costs'] = '';
						$data['other_monthly_costs'] = '';
						$data['user_id'] = '';
						
						
		$this->load->vars($data);
		$this->load->view('template');
}

	function lease_rate_results()
	{
	$id = "lease_rate_calc";
		$data['content'] =	$this->content_model->get_content($id);
		
		$data['menu'] =	$this->content_model->get_menus();
		$data['main'] = "pages/lease_rate_calc";
		$data['title'] = 'Lease Rate Calculator';
		$data['news'] = $this->news_model->list_news();
		$data['sidebar'] = 'sidebar/links';
		$data['rightcolumn'] = 'sidebar/channel_partner_program';
		$data['page'] = $id;
		$is_logged_in = $this->session->userdata('is_logged_in');
		
		//display widecolumn module - this should eventually be controlled by some table or something
		$data['widecolumn'] = 'sidebar/benefits_of_leasedesk';
		$data['widecolumn2'] = 'sidebar/testimonials';
		$is_logged_in = $this->session->userdata('is_logged_in');
		
		
				
		//validate the calculator entries
		
		$this->form_validation->set_rules('amount_type', 'capital type', 'trim|required');
		$this->form_validation->set_rules('calculate_by', 'calculate by', 'trim|required');
		$this->form_validation->set_rules('payment_type', 'payment type', 'trim|integer|required');
		$this->form_validation->set_rules('payment_frequency', 'payment_frequency', 'trim|integer|required');
		$this->form_validation->set_rules('initial', 'initial', 'trim|integer|required');
		$this->form_validation->set_rules('regular', 'regular', 'trim|integer|required');
		
		
		
		$data['quote_ref'] = $this->input->post('quote_ref');
		$data['capital'] = $this->input->post('capital');
		$data['capital_type'] = $this->input->post('capital_type');
		$data['amount_type'] = $this->input->post('amount_type');
		$data['interest_type'] = $this->input->post('interest_type');
		$data['calculate_by'] = $this->input->post('calculate_by');
		$data['payment_type'] = $this->input->post('payment_type');
		$data['payment_frequency'] = $this->input->post('payment_frequency');
		$data['initial'] = $this->input->post('initial');
		$data['regular'] = $this->input->post('regular');
	
		$submitted = $this->input->post('submit');
		$resetted = $this->input->post('reset');
		
		$segment_active = $this->uri->segment(3);
		
		if($segment_active>0)
			{
				$data['quote_id'] = $this->uri->segment(3);
				$quote_id = $data['quote_id'];
				
				
				$data2['quote_numbers'] = $this->quote_model->get_data("$quote_id");
				$this->load->vars($data2);
				
				foreach($data2['quote_numbers'] as $key => $row)
					{
						//if there is an error is may be caused here.
						$data['quote_id'] = $row['quote_id'];
						$data['quote_ref'] = $row['quote_ref'];
						$data['capital_type'] = $row['capital_type'];
						$data['amount_type'] = $row['amount_type'];
						$data['interest_type'] = $row['interest_type'];
						$data['capital'] = $row['capital'];
						$data['interest_rate'] = $row['interest_rate'];
						$data['rate_per_1000'] = $row['rate_per_1000'];
						$data['periodic_payment'] = $row['periodic_payment'];
						$data['payment_type'] = $row['payment_type'];
						$data['payment_frequency'] = $row['payment_frequency'];
						$data['initial'] = $row['initial'];
						$data['regular'] = $row['regular'];
						$data['calculate_by'] = $row['calculate_by'];
				
						
											
						$run = 'yes';
					}
			}
			else
			{
			if($this->form_validation->run() == FALSE)
				{
					$errors=validation_errors();
					$data['main'] = '/pages/lease_rate_calc';
					$data['title'] = 'Quote Calculator';
					$this->load->vars($data);
					$this->load->view('template');
					$run = 'no';
				}
				else
				{
					
					$run = 'yes';
				}
			}
		
		
		
			
		if($run=='yes')
		
		{
		
		//CALCULATION STARTS HERE
		$this->load->library('calculator');
		$data['quote_results'] = $this->calculator->quote($data['capital_type'], 
						$data['amount_type'], 
						$data['interest_type'],
						$data['calculate_by'],
						$data['payment_type'],
						$data['payment_frequency'],
						$data['initial'],
						$data['regular']);
		//CALCULATION ENDS HERE
		
		
		if($resetted=='Reset')
			{
				
				redirect('/welcome/lease_rate_calc', 'refresh');
				
			}
		
			
		
		
		$data['calc_results'] = '/pages/lease_rate_results';
		$data['main'] = '/pages/lease_rate_calc';
		$data['title'] = 'Quote Results';
		
		$this->load->vars($data);
		$this->load->view('template');
		
		}
		
	}

function iframe_calc()
	{
		$id = "lease_rate_calc";
		$data['content'] =	$this->content_model->get_content($id);
		
		$data['menu'] =	$this->content_model->get_menus();
		$data['main'] = "pages/lease_rate_calc";
		$data['title'] = 'Lease Rate Calculator';
		$data['page'] = $id;
		$is_logged_in = $this->session->userdata('is_logged_in');
		
		        
	     	$data['quote_ref'] ='';
						$data['capital'] ='';
						$data['capital_type'] ='';
						$data['amount_type'] ='';
						$data['interest_type'] = '';
						$data['calculate_by'] = '';
						$data['interest_rate'] = '';
						$data['rate_per_1000'] = '';
						$data['periodic_payment'] = '';
						$data['payment_type'] = '';
						$data['payment_frequency'] = '';
						$data['initial'] = '';
						$data['regular'] = '';
						$data['number_of_ports'] = '';
						$data['annual_support_costs'] = '';
						$data['other_monthly_costs'] = '';
						$data['user_id'] = '';
						
						
		$this->load->vars($data);
		$this->load->view('iframe');
		
	}
function login()
	{
		
		$id = 'login';
		$data['content'] =	$this->content_model->get_content($id);
		$data['main'] = "user/login_form";
		$data['menu'] =	$this->content_model->get_menus();
		$data['info'] = "infoblock/times";
		$data['page'] = "login";
		$data['title'] = $data['page'];
		 
	
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

        function video()
        {
            $data['youtubeid'] = "HuXmL4QalTo";
            $data['main'] = '/pages/video';
            $data['title'] = 'Video';
            $data['page'] = "Video";
            $this->load->vars($data);
            $this->load->view('template');

        }

        function request_demo()
        {
            $data['captcha'] = $this->captcha_model->initiate_captcha();
            $data['main'] = 'pages/form';
              $data['form'] = 'sidebar/forms/request_demo';
            $data['title'] = 'Request a Demo';
            $data['page'] = "Request Demo";
            $this->load->vars($data);
            $this->load->view('template');
            
        }
	
// end of channel resource links
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */