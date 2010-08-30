<?php

class Channel extends Controller {

	function Channel()
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
				
					$data['main'] = 'sidebar/forms/request';
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
				
				
				$this->email->from('info@proctorconsulting.co.uk', 'Proctor Consulting');
				$this->email->to('chloe@lease-desk.com'); 
				$this->email->cc('mat@redstudio.co.uk', 'debra.taylor@lease-desk.com'); 
				
				$this->email->subject('Channel Partner Program');
				$this->email->message("$name has completed the request form.
				
			
				 Business Name: $business_name 
				 Interested in: $interested
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
				$this->email->send();
				//end mailto webCRM
				
				$data['main'] = 'sidebar/forms/request_sent';
				$this->load->vars($data);
				$this->load->view('form_template');
				}
	}
}