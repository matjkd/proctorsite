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

	function request_info()
	{
		
	}
	function request_demo()
	{
		$this->form_validation->set_rules('email', 'email', 'trim|required');
		$this->form_validation->set_rules('name', 'name', 'trim|required');
		$this->form_validation->set_rules('phone', 'phone', 'trim|required');
		$this->form_validation->set_rules('business_name', 'business_name', 'trim|required');
		$this->form_validation->set_rules('message', 'message', 'trim|required');
		$this->form_validation->set_rules('date', 'date', 'trim|required');		
		
		//set session data for form entries
		$this->session->set_flashdata('formname', $this->input->post('name'));
		$this->session->set_flashdata('formphone', $this->input->post('phone'));
		$this->session->set_flashdata('formbusiness_name', $this->input->post('business_name'));
		$this->session->set_flashdata('formemail', $this->input->post('email'));
		$this->session->set_flashdata('formdate', $this->input->post('date'));
		$this->session->set_flashdata('formmessage', $this->input->post('message'));
		
		//captcha data
		$word = $this->input->post('captcha');
		$time = $this->input->post('time');
		$ip_address = $this->input->post('ip_address');
			if($this->form_validation->run() == FALSE)
				{
					
					
					
					$data['errors'] = validation_errors();
				
					$this->session->set_flashdata('message', $data['errors']);
					
				
					
					redirect('leasedesk', 'refresh');
					
				}
			else
				{
				// check captcha
					// if it returns true the captcha has failed
						if($this->captcha_model->check($word, $ip_address, $time))
						{
								$this->session->set_flashdata('message', 'The captcha was wrong');
								
								redirect('leasedesk', 'refresh');
						}	
						
					// end check captcha
					
					
						//add request to database
						$this->forms_model->add_request();
						
						//send email
						$email = $this->input->post('email');
						$phone = $this->input->post('phone');
		    			$business_name = $this->input->post('business_name');
						$message = $this->input->post('message');
						$preferred_date = $this->input->post('date');
						$preferred_time = $this->input->post('time');
		    			
		    			$name = $this->input->post('name');
						
						
						$this->postmark->from('noreply@lease-desk.com', 'Lease Desk Limited');
						//$this->postmark->to('chloe@lease-desk.com'); 
						$this->postmark->to('mat@redstudio.co.uk'); 
						//$this->postmark->cc('debra.taylor@lease-desk.com'); 
						$this->postmark->subject('Request a Demo');
						$this->postmark->message_html("$name has Requested a Demo.<br/><br/>
						
						
						 Company Name: $business_name<br/>
						 Email: $email<br/>
						 Phone: $phone		 <br/>
						 Preferred Date: $preferred_date <br/>
						 Message: $message");	
						
						$this->postmark->send();
		
						// send email to webCRM
						$this->postmark->clear();
					
					$this->session->set_flashdata('formname', '');
					$this->session->set_flashdata('formphone', '');
					$this->session->set_flashdata('formbusiness_name',  '');
					$this->session->set_flashdata('formemail',  '');
					$this->session->set_flashdata('formdate',  '');
					$this->session->set_flashdata('formmessage',  '');
					
					$this->session->set_flashdata('message', 'The form has been sent');
					
					redirect('leasedesk', 'refresh');
				}	
	}

function calc_results()
	{
		//get data from form
		$data['capital_type'] = $this->input->post('capitalType');
		$data['amount_type'] = $this->input->post('capitalamount');
		$data['interest_type'] = $this->input->post('interestType');
		
		$data['calculate_by'] = $this->input->post('interestamount');
		$data['payment_type'] = $this->input->post('paymentType');
		$data['payment_frequency'] = $this->input->post('paymentFrequency');
		
		$data['initial'] = $this->input->post('initial');
		$data['regular'] = $this->input->post('regular');
		
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
	
		
		
		//$data['value3'] =$data['value1'] + $data['value2'];
		
		
		$this->load->vars($data);
		$this->load->view('popups/calculator_results');
		
	}
}
