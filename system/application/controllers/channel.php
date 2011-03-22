<?php

class Channel extends MY_Controller
{
function __construct()
	{
		parent::__construct();
		$this->load->model('forms_model');	
	}
	
	function index()
	{
		
		$data['email'] = '';
		$data['phone'] = '';
		$data['business_name'] = '';
		$data['name'] = '';
		$data['postcode'] = '';
		$data['interested'] = '';
		
		$data['message'] = '';
		$data['errors'] = '';
		$data['main'] = 'sidebar/forms/channel_partner';
		$this->load->vars($data);
		$this->load->view('form_template');
		
		
		
	}
function request()
	{
		
		$this->form_validation->set_rules('email', 'email', 'trim|required');
		$this->form_validation->set_rules('phone', 'phone', 'trim|required');
		$this->form_validation->set_rules('business_name', 'business_name', 'trim|required');
		$this->form_validation->set_rules('name', 'name', 'trim|required');
		
		
    	$data['email'] = $this->input->post('email');
    	$data['phone'] = $this->input->post('phone');
		$data['business_name'] = $this->input->post('business_name');
		$data['postcode'] = $this->input->post('postcode');
    	$data['message'] = $this->input->post('message');
		$data['interested'] = $this->input->post('interested');
    	$data['preferred_date'] = $this->input->post('preferred_date');
    	$data['name'] = $this->input->post('name');
			if($this->form_validation->run() == FALSE)
				{
					
					
					
					$data['errors'] = validation_errors();
				
					$data['main'] = 'sidebar/forms/channel_partner';
					$this->load->vars($data);
					$this->load->view('form_template');
					
				}
			else
				{
				
				$this->forms_model->add_request();
				$email = $this->input->post('email');
    			$phone = $this->input->post('phone');
				$business_name = $this->input->post('business_name');
				$postcode = $this->input->post('postcode');
    			$message = $this->input->post('message');
				$interested = $this->input->post('interested');
    			
    			$name = $this->input->post('name');
				
				
				$this->postmark->from('noreply@lease-desk.com', 'Lease Desk Limited');
				$this->postmark->to('chloe@lease-desk.com'); 
				$this->postmark->cc('mat@redstudio.co.uk'); 
				
				$this->postmark->subject('Channel Partner Program');
				$this->postmark->message_plain("$name has completed the request form.
				
			
				 Business Name: $business_name 
				 Interested in: $interested
				 Email: $email
				 Phone: $phone 
				 
				 Message: $message");	
				
				$this->postmark->send();
				
				// send email to webCRM
				$this->postmark->clear();
				
				$this->postmark->to('cm3208SPoYUg@b2b-email.net');
				$this->postmark->from('noreply@lease-desk.com', 'Lease Desk Limited');
				$this->postmark->cc('mat@redstudio.co.uk'); 
				
				$this->postmark->subject('/*/AUTO/*/');
				$this->postmark->message_plain("Start:DateTime

End
Start:Organisation
A:01:$business_name
A:06:$phone
A:30:Interested in $interested |CR| $message
End
Start:Person
A:01:$name
A:02:$email
End
Start:Activity
A:30:Interested in $interested |CR| $message
End
Start:OpportunityDelivery

End
				
				");	
				$this->postmark->send();
				//end mailto webCRM
				
				$data['main'] = 'sidebar/forms/request_sent';
				$this->load->vars($data);
				$this->load->view('form_template');
				}
	}
}