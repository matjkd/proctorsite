<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

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
		$data['main'] = 'sidebar/forms/request';
		$this->load->vars($data);
		$this->load->view('form_template');
		
		
		
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
				
					$data['main'] = 'sidebar/forms/request';
					$this->load->vars($data);
					$this->load->view('mitel_form_template');
					
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
				
				$data['main'] = 'sidebar/forms/request_sent';
				$this->load->vars($data);
				$this->load->view('mitel_form_template');
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
				
					$data['main'] = 'sidebar/forms/request2';
					$this->load->vars($data);
					$this->load->view('form_template');
					
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
				
				$data['main'] = 'sidebar/forms/request_sent';
				$this->load->vars($data);
				$this->load->view('form_template');
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
				
					$data['main'] = 'sidebar/forms/contact';
					$this->load->vars($data);
					$this->load->view('form_template');
					
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


function register_weds()
	{
		
		$this->form_validation->set_rules('email', 'email', 'trim|required');
		$this->form_validation->set_rules('name', 'name', 'trim|required');
		$this->form_validation->set_rules('phone', 'phone', 'trim|required');
		$this->form_validation->set_rules('business_name', 'business_name', 'trim|required');
		$this->form_validation->set_rules('message', 'message', 'trim|required');
		
		
    	$data['email'] = $this->input->post('email');
    	$data['phone'] = $this->input->post('phone');
    	$data['message'] = $this->input->post('message');
    	$data['business_name'] = $this->input->post('business_name');
		$data['name'] = $this->input->post('name');
			if($this->form_validation->run() == FALSE)
				{
					
					
					
					$data['errors'] = validation_errors();
					$data['datetime'] = "Wednesday 26th Jan 2011 at 10am";
					$data['form'] = "register_weds";
					$data['main'] = 'sidebar/forms/request_webinar';
					$this->load->vars($data);
					$this->load->view('form_template');
					
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
				$this->email->subject('Register for Weds 26th Jan Webinar');
				$this->email->message("$name has completed the request form.
				
				They heard about us: $referral 
				Company Name: $business_name
				 Email: $email
				 Phone: $phone		 
				 Message: $message
				 Date of Webinar:  Weds 26th Jan 2011");	
				
				
				$this->email->send();

				
				
				$data['main'] = 'sidebar/forms/request_sent';
				$this->load->vars($data);
				$this->load->view('form_template');
				}
	}

function register_thurs()
	{
		
		$this->form_validation->set_rules('email', 'email', 'trim|required');
		$this->form_validation->set_rules('name', 'name', 'trim|required');
		$this->form_validation->set_rules('phone', 'phone', 'trim|required');
		$this->form_validation->set_rules('business_name', 'business_name', 'trim|required');
		$this->form_validation->set_rules('message', 'message', 'trim|required');

		$data['email'] = $this->input->post('email');
    	$data['phone'] = $this->input->post('phone');
    	$data['message'] = $this->input->post('message');
    	$data['business_name'] = $this->input->post('business_name');
		$data['referral'] = $this->input->post('referral');
    	$data['name'] = $this->input->post('name');
    	
			if($this->form_validation->run() == FALSE)
				{
					
					
					
					$data['errors'] = validation_errors();
					$data['datetime'] = "Thursday 27th Jan 2011 at 10am";
					$data['form'] = "register_thurs";
					$data['main'] = 'sidebar/forms/request_webinar';
					$this->load->vars($data);
					$this->load->view('form_template');
					
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
				$this->email->subject('Register for Thursday 27th Jan Webinar');
				$this->email->message("$name has completed the request form.
				
				They heard about us: $referral 
				Company Name: $business_name
				 Email: $email
				 Phone: $phone		 
				 Message: $message
				 Date of Webinar: Thursday 27th Jan 2011");	
				
				
				$this->email->send();

				
				
				$data['main'] = 'sidebar/forms/request_sent';
				$this->load->vars($data);
				$this->load->view('form_template');
				}
	}
function webinar()
{
			
		$data['webinardate'] = "Wednesday 23rd March 2011 at 4pm";
		$webinardate = $data['webinardate'];
		$this->form_validation->set_rules('email', 'email', 'trim|required');
		$this->form_validation->set_rules('phone', 'phone', 'trim|required');
		$this->form_validation->set_rules('business_name', 'business_name', 'trim|required');
		$this->form_validation->set_rules('firstname', 'First name', 'trim|required');
		$this->form_validation->set_rules('lastname', 'Last name', 'trim|required');
		
		$data['email'] = $this->input->post('email');
		$data['firstname'] = $this->input->post('firstname');
		$data['lastname'] = $this->input->post('lastname');
		$data['business_name'] = $this->input->post('business_name');
		$data['jobtitle'] = $this->input->post('jobtitle');
		$data['address'] = $this->input->post('address');
		$data['phone'] = $this->input->post('phone');
		
		
			if($this->form_validation->run() == FALSE)
				{
				$data['errors'] = validation_errors();
				$data['main'] = 'forms/webinar';
				$this->load->vars($data);
				$this->load->view('forms/form_template');
				}
				else
					{
				
					$data['errors'] = validation_errors();
					//$this->forms_model->add_request();
								$email = $this->input->post('email');
								$firstname = $this->input->post('firstname');
								$lastname = $this->input->post('lastname');
								$business_name = $this->input->post('business_name');
								$jobtitle = $this->input->post('jobtitle');
								$address = $this->input->post('address');
								$phone = $this->input->post('phone');
						
								
								
				    			$referral = $this->input->post('referral');
				    			$name = $this->input->post('name');
								
								
								$this->email->from('info@proctorconsulting.co.uk', 'Proctor Consulting');
								$this->email->to('chloe@lease-desk.com'); 
								$this->email->cc('debra.taylor@lease-desk.com'); 
								$this->email->cc('mat@redstudio.co.uk'); 
								$this->email->subject('Register for Webinar');
								$this->email->message("$firstname $lastname has completed the request form for webinar on $webinardate.
								
Job Title: $jobtitle
Company Name: $business_name
Email: $email
Phone: $phone		 
address: 
$address
");	
								
								
								$this->email->send();
								$data['main'] = 'forms/success';
						
						
						
								$this->load->vars($data);
								$this->load->view('forms/form_template');
					
					
					
					}
		
		
}

function mitel1()
{
			
		$data['webinardate'] = "Friday 27th May at 10am";
		$webinardate = $data['webinardate'];
		$this->form_validation->set_rules('email', 'email', 'trim|required');
		$this->form_validation->set_rules('phone', 'phone', 'trim|required');
		$this->form_validation->set_rules('business_name', 'business_name', 'trim|required');
		$this->form_validation->set_rules('firstname', 'First name', 'trim|required');
		$this->form_validation->set_rules('lastname', 'Last name', 'trim|required');
		
		$data['email'] = $this->input->post('email');
		$data['firstname'] = $this->input->post('firstname');
		$data['lastname'] = $this->input->post('lastname');
		$data['business_name'] = $this->input->post('business_name');
		$data['jobtitle'] = $this->input->post('jobtitle');
		$data['address'] = $this->input->post('address');
		$data['phone'] = $this->input->post('phone');
		
		
			if($this->form_validation->run() == FALSE)
				{
				$data['errors'] = validation_errors();
				$data['main'] = 'forms/webinar';
				$this->load->vars($data);
				$this->load->view('forms/mitel_form_template');
				}
				else
					{
				
					$data['errors'] = validation_errors();
					//$this->forms_model->add_request();
								$email = $this->input->post('email');
								$firstname = $this->input->post('firstname');
								$lastname = $this->input->post('lastname');
								$business_name = $this->input->post('business_name');
								$jobtitle = $this->input->post('jobtitle');
								$address = $this->input->post('address');
								$phone = $this->input->post('phone');
						
								
								
				    			$referral = $this->input->post('referral');
				    			$name = $this->input->post('name');
								
								
								$this->email->from('info@proctorconsulting.co.uk', 'Proctor Consulting');
								$this->email->to('chloe@lease-desk.com'); 
								$this->email->cc('debra.taylor@lease-desk.com'); 
								$this->email->cc('jacob.monks@lease-desk.com'); 
								$this->email->subject('Register for Webinar');
								$this->email->message("$firstname $lastname has completed the request form for webinar on $webinardate.
								
Job Title: $jobtitle
Company Name: $business_name
Email: $email
Phone: $phone		 
address: 
$address
");	
								
								
								$this->email->send();
								$data['main'] = 'forms/success';
						
						
						
								$this->load->vars($data);
								$this->load->view('forms/mitel_form_template');
					
					
					
					}
		
		
}
function mitel2()
{
			
		$data['webinardate'] = "Thursday 2nd June at 10am";
		$webinardate = $data['webinardate'];
		$this->form_validation->set_rules('email', 'email', 'trim|required');
		$this->form_validation->set_rules('phone', 'phone', 'trim|required');
		$this->form_validation->set_rules('business_name', 'business_name', 'trim|required');
		$this->form_validation->set_rules('firstname', 'First name', 'trim|required');
		$this->form_validation->set_rules('lastname', 'Last name', 'trim|required');
		
		$data['email'] = $this->input->post('email');
		$data['firstname'] = $this->input->post('firstname');
		$data['lastname'] = $this->input->post('lastname');
		$data['business_name'] = $this->input->post('business_name');
		$data['jobtitle'] = $this->input->post('jobtitle');
		$data['address'] = $this->input->post('address');
		$data['phone'] = $this->input->post('phone');
		
		
			if($this->form_validation->run() == FALSE)
				{
				$data['errors'] = validation_errors();
				$data['main'] = 'forms/webinar2';
				$this->load->vars($data);
				$this->load->view('forms/mitel_form_template');
				}
				else
					{
				
					$data['errors'] = validation_errors();
					//$this->forms_model->add_request();
								$email = $this->input->post('email');
								$firstname = $this->input->post('firstname');
								$lastname = $this->input->post('lastname');
								$business_name = $this->input->post('business_name');
								$jobtitle = $this->input->post('jobtitle');
								$address = $this->input->post('address');
								$phone = $this->input->post('phone');
						
								
								
				    			$referral = $this->input->post('referral');
				    			$name = $this->input->post('name');
								
								
								$this->email->from('info@proctorconsulting.co.uk', 'Proctor Consulting');
								$this->email->to('chloe@lease-desk.com'); 
								$this->email->cc('debra.taylor@lease-desk.com'); 
								$this->email->cc('jacob.monks@lease-desk.com'); 
								$this->email->subject('Register for Webinar');
								$this->email->message("$firstname $lastname has completed the request form for webinar on $webinardate.
								
Job Title: $jobtitle
Company Name: $business_name
Email: $email
Phone: $phone		 
address: 
$address
");	
								
								
								$this->email->send();
								$data['main'] = 'forms/success';
						
						
						
								$this->load->vars($data);
								$this->load->view('forms/mitel_form_template');
					
					
					
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
				
					$data['main'] = 'sidebar/forms/request_a_demo';
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
				
				$data['main'] = 'sidebar/forms/request_sent';
				$this->load->vars($data);
				$this->load->view('form_template');
				}
	}

}
/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */