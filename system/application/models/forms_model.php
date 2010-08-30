<?php 

class Forms_model extends Model {

	function __construct()
    {
        parent::__construct();
        
      
    }
    function add_request()
    {
    	
    				$new_request_insert_data = array(
    				'email' => $this->input->post('email'),
    				'phone' => $this->input->post('phone'),
			    	'business_name' => $this->input->post('business_name'),
					'postcode' => $this->input->post('postcode'),
    				'message' => $this->input->post('message'),
					'preferred_time' => $this->input->post('preferred_time'),
    				'preferred_date' => $this->input->post('preferred_date'),
    				'name' => $this->input->post('name'),
    				'date_added' => unix_to_human(now(), TRUE, 'eu')
					);
		
				
		
		$insert = $this->db->insert('request', $new_request_insert_data);
		return $insert;
    }
}