<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Forms extends MY_Controller
{
function __construct()
	{
		parent::__construct();
		$this->load->model('forms_model');	
		$this->load->model('captcha_model');	
	}
	

function contact_page()
	{
		
		$this->form_validation->set_rules('email', 'email', 'trim|required');
		$this->form_validation->set_rules('name', 'name', 'trim|required');
		$this->form_validation->set_rules('phone', 'phone', 'trim|required');
		$this->form_validation->set_rules('business_name', 'business_name', 'trim|required');
		$this->form_validation->set_rules('message', 'message', 'trim|required');
		$this->form_validation->set_rules('referral', 'referral', 'trim|required');
		
		
		
		//captcha data
		$word = $this->input->post('captcha');
		$time = $this->input->post('time');
		$ip_address = $this->input->post('ip_address');
			if($this->form_validation->run() == FALSE)
				{
					
					
					
					$data['errors'] = validation_errors();
				
					$this->session->set_flashdata('message', $data['errors']);
					redirect('welcome/contact', 'refresh');
					
				}
			else
				{
				// check captcha
					// if it returns true the captcha has failed
						if($this->captcha_model->check($word, $ip_address, $time))
						{
								$this->session->set_flashdata('message', 'The captcha was wrong');
								redirect('welcome/contact', 'refresh');
						}	
						
					// end check captcha	
				
				
				//$this->forms_model->add_request();
				$email = $this->input->post('email');
				$phone = $this->input->post('phone');
    			$business_name = $this->input->post('business_name');
				$message = $this->input->post('message');
				
    			$referral = $this->input->post('referral');
    			$name = $this->input->post('name');
				
				
				$this->postmark->from('noreply@lease-desk.com', 'Lease Desk Limited');
				$this->postmark->to('chloe@lease-desk.com'); 
				$this->postmark->cc('mat@redstudio.co.uk'); 
				$this->postmark->cc('debra.taylor@lease-desk.com'); 
				$this->postmark->subject('Contact Page');
				$this->postmark->message_html("$name has completed the contact page.<br/><br/>
				
				They heard about us: $referral <br/>
				Company Name: $business_name<br/>
				 Email: $email<br/>
				 Phone: $phone		 <br/>
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
				$this->postmark->send();
				//end mailto webCRM
				
				$this->session->set_flashdata('message', 'Your message has been sent');
				redirect('welcome/contact', 'refresh');
				}
	}

	
}