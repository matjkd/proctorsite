<?php

class Forms extends Controller {

	function Forms()
	{
		parent::Controller();
		$this->load->model('forms_model');	
	}
	
	function index()
	{
		
		$data['email'] = '';
		$data['phone'] = '';
		$data['business_name'] = '';
		$data['name'] = '';
		$data['postcode'] = '';
		$data['preferred_date'] = '';
		$data['preferred_time'] = '';
		$data['message'] = '';
		$data['errors'] = '';
		$data['main'] = '/forms/request';
		$this->load->vars($data);
		$this->load->view('template');
		
		
		
	}
	function send_request()
	{
		
		$this->form_validation->set_rules('email', 'email', 'trim|required');
		$this->form_validation->set_rules('phone', 'phone', 'trim|required');
		$this->form_validation->set_rules('business_name', 'business_name', 'trim|required');
		$this->form_validation->set_rules('name', 'name', 'trim|required');
		$this->form_validation->set_rules('preferred_time', 'preferred_time', 'trim|required');
		$this->form_validation->set_rules('preferred_date', 'preferred_date', 'trim|required');
		
    	$data['email'] = $this->input->post('email');
    	$data['phone'] = $this->input->post('phone');
		$data['business_name'] = $this->input->post('business_name');
		$data['postcode'] = $this->input->post('postcode');
    	$data['message'] = $this->input->post('message');
		$data['preferred_time'] = $this->input->post('preferred_time');
    	$data['preferred_date'] = $this->input->post('preferred_date');
    	$data['name'] = $this->input->post('name');
			if($this->form_validation->run() == FALSE)
				{
					
					
					
					$data['errors'] = validation_errors();
				
					$data['main'] = '/forms/request';
					$this->load->vars($data);
					$this->load->view('template');
					
				}
			else
				{
				
				$this->forms_model->add_request();
				$email = $this->input->post('email');
    			$phone = $this->input->post('phone');
				$business_name = $this->input->post('business_name');
				$postcode = $this->input->post('postcode');
    			$message = $this->input->post('message');
				$preferred_time = $this->input->post('preferred_time');
    			$preferred_date = $this->input->post('preferred_date');
    			$name = $this->input->post('name');
				
				
				$this->email->from('info@proctorconsulting.co.uk', 'Proctor Consulting');
				$this->email->to('chloe@lease-desk.com'); 
				$this->email->cc('mat@redstudio.co.uk'); 
				$this->email->cc('debra.taylor@lease-desk.com'); 
				$this->email->subject('Request a Demo');
				$this->email->message("$name has completed the request form.
				
				Preferred Date: $preferred_date 
				Preferred Time: $preferred_time
				 Business Name: $business_name 
				 Email: $email
				 Phone: $phone 
				 
				 Message: $message");	
				
				$this->email->send();
				
				// send email to webCRM
				$this->email->clear();
				
				$this->email->to('cm3208SPoYUg@b2b-email.net');
				$this->email->from('info@proctorconsulting.co.uk', 'Proctor Consulting');
				$this->email->cc('mat@redstudio.co.uk'); 
				
				$this->email->subject('/*/AUTO/*/');
				$this->email->message("Start:DateTime

End
Start:Organisation
A:01:$business_name
A:06:$phone
A:30:Preferred Date and Time $preferred_date $preferred_time |CR| $message
End
Start:Person
A:01:$name
A:02:$email
End
Start:Activity
A:30:Preferred Date and Time $preferred_date $preferred_time |CR| $message
End
Start:OpportunityDelivery

End
				
				");	
				$this->email->send();
				//end mailto webCRM
				
				$data['main'] = '/forms/request_sent';
				$this->load->vars($data);
				$this->load->view('template');
				}
	}
function send_info()
	{
		
		$this->form_validation->set_rules('email', 'email', 'trim|required');
		$this->form_validation->set_rules('name', 'name', 'trim|required');
		$this->form_validation->set_rules('phone', 'phone', 'trim|required');
		$this->form_validation->set_rules('business_name', 'business_name', 'trim|required');
		$this->form_validation->set_rules('message', 'message', 'trim|required');
		$this->form_validation->set_rules('referral', 'referral', 'trim|required');
		
    	$data['email'] = $this->input->post('email');
    	$data['phone'] = $this->input->post('phone');
    	$data['message'] = $this->input->post('message');
    	$data['business_name'] = $this->input->post('business_name');
		$data['referral'] = $this->input->post('referral');
    	$data['name'] = $this->input->post('name');
			if($this->form_validation->run() == FALSE)
				{
					
					
					
					$data['errors'] = validation_errors();
				
					$data['main'] = '/forms/request2';
					$this->load->vars($data);
					$this->load->view('template');
					
				}
			else
				{
				
				//$this->forms_model->add_request();
				$email = $this->input->post('email');
				$phone = $this->input->post('phone');
    			$business_name = $this->input->post('business_name');
				$message = $this->input->post('message');
				
    			$referral = $this->input->post('referral');
    			$name = $this->input->post('name');
				
				
				$this->email->from('info@proctorconsulting.co.uk', 'Proctor Consulting');
				$this->email->to('chloe@lease-desk.com'); 
				$this->email->cc('debra.taylor@lease-desk.com'); 
				$this->email->cc('mat@redstudio.co.uk'); 
				$this->email->subject('Website Request: Further Lease-Desk Information');
				$this->email->message("$name has completed the request form.
				
				They heard about us: $referral 
				Company Name: $business_name
				 Email: $email
				 Phone: $phone		 
				 Message: $message");	
				
				$this->email->send();

				// send email to webCRM
				$this->email->clear();
				$this->email->to('cm3208SPoYUg@b2b-email.net');
				$this->email->from('info@proctorconsulting.co.uk', 'Proctor Consulting');
				$this->email->cc('mat@redstudio.co.uk'); 
				$this->email->subject('/*/AUTO/*/');
				$this->email->message("Start:DateTime

End
Start:Organisation
A:01:$business_name
A:06:$phone
A:30:They requested More info. They left this message - $message
End
Start:Person
A:01:$name
A:02:$email
End
Start:Activity

End
Start:OpportunityDelivery

End
				
				");	
				$this->email->send();
				//end mailto webCRM
				
				$data['main'] = '/forms/request_sent';
				$this->load->vars($data);
				$this->load->view('template');
				}
	}
function contact_page()
	{
		
		$this->form_validation->set_rules('email', 'email', 'trim|required');
		$this->form_validation->set_rules('name', 'name', 'trim|required');
		$this->form_validation->set_rules('phone', 'phone', 'trim|required');
		$this->form_validation->set_rules('business_name', 'business_name', 'trim|required');
		$this->form_validation->set_rules('message', 'message', 'trim|required');
		$this->form_validation->set_rules('referral', 'referral', 'trim|required');
		
    	$data['email'] = $this->input->post('email');
    	$data['phone'] = $this->input->post('phone');
    	$data['message'] = $this->input->post('message');
    	$data['business_name'] = $this->input->post('business_name');
		$data['referral'] = $this->input->post('referral');
    	$data['name'] = $this->input->post('name');
			if($this->form_validation->run() == FALSE)
				{
					
					
					
					$data['errors'] = validation_errors();
				
					$data['main'] = '/forms/contact';
					$this->load->vars($data);
					$this->load->view('template');
					
				}
			else
				{
				
				//$this->forms_model->add_request();
				$email = $this->input->post('email');
				$phone = $this->input->post('phone');
    			$business_name = $this->input->post('business_name');
				$message = $this->input->post('message');
				
    			$referral = $this->input->post('referral');
    			$name = $this->input->post('name');
				
				
				$this->email->from('info@proctorconsulting.co.uk', 'Proctor Consulting');
				$this->email->to('chloe@lease-desk.com'); 
				$this->email->cc('mat@redstudio.co.uk'); 
				$this->email->cc('debra.taylor@lease-desk.com'); 
				$this->email->subject('Contact Page');
				$this->email->message("$name has completed the contact page.
				
				They heard about us: $referral 
				Company Name: $business_name
				 Email: $email
				 Phone: $phone		 
				 Message: $message");	
				
				$this->email->send();

				// send email to webCRM
				$this->email->clear();
				$this->email->to('cm3208SPoYUg@b2b-email.net');
				$this->email->from('info@proctorconsulting.co.uk', 'Proctor Consulting');
				$this->email->cc('mat@redstudio.co.uk'); 
				$this->email->subject('/*/AUTO/*/');
				$this->email->message("Start:DateTime

End
Start:Organisation
A:01:$business_name
A:06:$phone
A:30:Contact via contact page. They left this message - $message
End
Start:Person
A:01:$name
A:02:$email
End
Start:Activity

End
Start:OpportunityDeliverIn an economic environment where the benefit of using financial structures to adopt technology are understood and demanded by both Senior Management at the Vendor and the Customer alike, it is often a sales force lacking in confidence in their financial skills that acts as a barrier to sale. 

Proctor Consulting has vast experience in developing people and their financial skills.

We will develop your senior sales teams to a standard where they are confident of presenting business cases and financial cases to key Financial Decision Makers

Lease-Desk allows you to follow your sales teams development and identify those courses which actually increase your sale of products.

Our ongoing development process means that you will always have the best Financial Products and your people will always have the skills to sell them.y

End
				
				");	
				$this->email->send();
				//end mailto webCRM
				
				$data['main'] = '/forms/request_sent';
				$this->load->vars($data);
				$this->load->view('template');
				}
	}


function register_thursday()
	{
		
		$this->form_validation->set_rules('email', 'email', 'trim|required');
		$this->form_validation->set_rules('name', 'name', 'trim|required');
		$this->form_validation->set_rules('phone', 'phone', 'trim|required');
		$this->form_validation->set_rules('business_name', 'business_name', 'trim|required');
		$this->form_validation->set_rules('message', 'message', 'trim|required');
		$this->form_validation->set_rules('referral', 'referral', 'trim|required');
		
    	$data['email'] = $this->input->post('email');
    	$data['phone'] = $this->input->post('phone');
    	$data['message'] = $this->input->post('message');
    	$data['business_name'] = $this->input->post('business_name');
		$data['referral'] = $this->input->post('referral');
    	$data['name'] = $this->input->post('name');
			if($this->form_validation->run() == FALSE)
				{
					
					
					
					$data['errors'] = validation_errors();
				
					$data['main'] = '/forms/register_thursday';
					$this->load->vars($data);
					$this->load->view('template');
					
				}
			else
				{
				
				//$this->forms_model->add_request();
				$email = $this->input->post('email');
				$phone = $this->input->post('phone');
    			$business_name = $this->input->post('business_name');
				$message = $this->input->post('message');
				
				
    			$referral = $this->input->post('referral');
    			$name = $this->input->post('name');
				
				
				$this->email->from('info@proctorconsulting.co.uk', 'Proctor Consulting');
				$this->email->to('chloe@lease-desk.com'); 
				$this->email->cc('debra.taylor@lease-desk.com'); 
				$this->email->cc('mat@redstudio.co.uk'); 
				$this->email->subject('Register for Thursday 10th June Webinar');
				$this->email->message("$name has completed the request form.
				
				They heard about us: $referral 
				Company Name: $business_name
				 Email: $email
				 Phone: $phone		 
				 Message: $message
				 Date of Webinar: thursday 10th June 2010");	
				
				
				$this->email->send();

				
				
				$data['main'] = '/forms/request_sent';
				$this->load->vars($data);
				$this->load->view('template');
				}
	}

function register_friday()
	{
		
		$this->form_validation->set_rules('email', 'email', 'trim|required');
		$this->form_validation->set_rules('name', 'name', 'trim|required');
		$this->form_validation->set_rules('phone', 'phone', 'trim|required');
		$this->form_validation->set_rules('business_name', 'business_name', 'trim|required');
		$this->form_validation->set_rules('message', 'message', 'trim|required');
		$this->form_validation->set_rules('referral', 'referral', 'trim|required');
		
    	$data['email'] = $this->input->post('email');
    	$data['phone'] = $this->input->post('phone');
    	$data['message'] = $this->input->post('message');
    	$data['business_name'] = $this->input->post('business_name');
		$data['referral'] = $this->input->post('referral');
    	$data['name'] = $this->input->post('name');
			if($this->form_validation->run() == FALSE)
				{
					
					
					
					$data['errors'] = validation_errors();
				
					$data['main'] = '/forms/register_friday';
					$this->load->vars($data);
					$this->load->view('template');
					
				}
			else
				{
				
				//$this->forms_model->add_request();
				$email = $this->input->post('email');
				$phone = $this->input->post('phone');
    			$business_name = $this->input->post('business_name');
				$message = $this->input->post('message');
				
				
    			$referral = $this->input->post('referral');
    			$name = $this->input->post('name');
				
				
				$this->email->from('info@proctorconsulting.co.uk', 'Proctor Consulting');
				$this->email->to('chloe@lease-desk.com'); 
				$this->email->cc('debra.taylor@lease-desk.com'); 
				$this->email->cc('mat@redstudio.co.uk'); 
				$this->email->subject('Register for Friday 11th June Webinar');
				$this->email->message("$name has completed the request form.
				
				They heard about us: $referral 
				Company Name: $business_name
				 Email: $email
				 Phone: $phone		 
				 Message: $message
				 Date of Webinar: Friday 11th June 2010");	
				
				
				$this->email->send();

				
				
				$data['main'] = '/forms/request_sent';
				$this->load->vars($data);
				$this->load->view('template');
				}
	}
function request_a_demo()
	{
		
		$this->form_validation->set_rules('email', 'email', 'trim|required');
		$this->form_validation->set_rules('phone', 'phone', 'trim|required');
		$this->form_validation->set_rules('business_name', 'business_name', 'trim|required');
		$this->form_validation->set_rules('name', 'name', 'trim|required');
		$this->form_validation->set_rules('preferred_time', 'preferred_time', 'trim|required');
		$this->form_validation->set_rules('preferred_date', 'preferred_date', 'trim|required');
		
    	$data['email'] = $this->input->post('email');
    	$data['phone'] = $this->input->post('phone');
		$data['business_name'] = $this->input->post('business_name');
		$data['postcode'] = $this->input->post('postcode');
    	$data['message'] = $this->input->post('message');
		$data['preferred_time'] = $this->input->post('preferred_time');
    	$data['preferred_date'] = $this->input->post('preferred_date');
    	$data['name'] = $this->input->post('name');
			if($this->form_validation->run() == FALSE)
				{
					
					
					
					$data['errors'] = validation_errors();
				
					$data['main'] = '/forms/request_a_demo';
					$this->load->vars($data);
					$this->load->view('template');
					
				}
			else
				{
				
				$this->forms_model->add_request();
				$email = $this->input->post('email');
    			$phone = $this->input->post('phone');
				$business_name = $this->input->post('business_name');
				$postcode = $this->input->post('postcode');
    			$message = $this->input->post('message');
				$preferred_time = $this->input->post('preferred_time');
    			$preferred_date = $this->input->post('preferred_date');
    			$name = $this->input->post('name');
				
				
				$this->email->from('info@proctorconsulting.co.uk', 'Proctor Consulting');
				$this->email->to('chloe@lease-desk.com'); 
				$this->email->cc('mat@redstudio.co.uk', 'debra.taylor@lease-desk.com'); 
				 
				$this->email->subject('Request a Demo');
				$this->email->message("$name has completed the request form.
				
				Preferred Date: $preferred_date 
				Preferred Time: $preferred_time
				 Business Name: $business_name 
				 Email: $email
				 Phone: $phone 
				 
				 Message: $message");	
				
				$this->email->send();
				
				// send email to webCRM
				$this->email->clear();
				
				$this->email->to('cm3208SPoYUg@b2b-email.net');
				$this->email->from('info@proctorconsulting.co.uk', 'Proctor Consulting');
				$this->email->cc('mat@redstudio.co.uk'); 
				
				$this->email->subject('/*/AUTO/*/');
				$this->email->message("Start:DateTime

End
Start:Organisation
A:01:$business_name
A:06:$phone
A:30:Preferred Date and Time $preferred_date $preferred_time |CR| $message
End
Start:Person
A:01:$name
A:02:$email
End
Start:Activity
A:30:Preferred Date and Time $preferred_date $preferred_time |CR| $message
End
Start:OpportunityDelivery

End
				
				");	
				$this->email->send();
				//end mailto webCRM
				
				$data['main'] = '/forms/request_sent';
				$this->load->vars($data);
				$this->load->view('template');
				}
	}

}
/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */