<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model{
    function __construct(){
        parent::__construct();
		// $this->load->model('customers_model');
    }
    
    public function validate(){
        // grab user input
        $email = $this->security->xss_clean($this->input->post('email'));
        $password = $this->security->xss_clean($this->input->post('password'));

        // Prep the query
        $this->db->where('email', $email);
        $this->db->where('password', sha1($password));
        $this->db->limit(1);
        
        // Run the query
        $query = $this->db->get('users');
		
        // Let's check if there are any results
        if($query->num_rows() == 1)
        {
            // If there is a user, then create session data
            $row = $query->row();
	
            $data = array(
                    'userid' 	=> $row->id,
                    'username' 	=> $row->username,
                    'email' 	=> $row->email,
                    'validated' => true
                    );
					
				// if ($row->roleID == 5) {
					// Bug fix if user does not exist as customer.
					// $is_customer	= $this->customers_model->get_by_customer_userid($row->usersID);
					// if(empty($is_customer))
					// {
						// $data = array('validated' => false);
						// return false;
					// }
				// }	
				
            $this->session->set_userdata($data);
            return true;
        }
        // If the previous process did not validate
        // then return false.
        return false;
    }
    
    public function change_password($key) {
        
        $this->db->where('emailkey', $key);
		$query = $this->db->get('forgot_password');
		
		if($query->num_rows() == 1){
			$user = $query->row();
			$email = $user->email;

			$this->db->where('username', $email);
			$query = $this->db->get('users');
			
			if($query){
				$data = array(
					'password' => sha1($this->input->post('password'))
				);
				$this->db->where('username', $email);
				if($this->db->update('users', $data)) return true;
			}
		}
		return false;
    }
    
    public function add_key($key) {
        
        // see if user exits
		$email = $this->input->post('forgot_email');
		
		$this->db->where('email', $email);
		$query = $this->db->get('users');
		
		if($query->num_rows() == 1)
		{
			// if user was found
			// add user email and key to db
			$user = $query->row();
			
			$data = array(
				'email' => $user->username,
				'emailkey'	=> $key
			);
			if($this->db->insert('forgot_password', $data)) return true;
		}
		return false;
    }
    
    public function remove_key($key) {
        $this->db->where('emailkey', $key);
		if($this->db->delete('forgot_password')) return true;
		return false;
    }
    
}