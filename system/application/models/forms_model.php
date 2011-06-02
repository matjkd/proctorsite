<?php 

class Forms_model extends Model {

	function __construct()
    {
        parent::__construct();
        
      
    }
    function add_request()
    {
    	
    				$new_request_insert_data = array(
    				'request_type' => 'request_demo',
    				'email' => $this->input->post('email'),
    				'phone' => $this->input->post('phone'),
			    	'business_name' => $this->input->post('business_name'),
					'message' => $this->input->post('message'),
					'preferred_date' => $this->input->post('date'),
					'preferred_time' => $this->input->post('preferredtime'),
    				'name' => $this->input->post('name'),
    				'date_sent' => now()
					);
		
				
		
		$insert = $this->db->insert('requests', $new_request_insert_data);
		return $insert;
    }
}