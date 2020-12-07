<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client_register extends CI_Controller {

	public function index()
	{
	    //$newpass = sha1("yournewpassword");
		//$data['username'] = $newpass;
		
		$data['email'] = '';
		$data['username'] = '';
		$data['password'] = '';
		$data['confirm_password'] = '';
		$data['email_err'] = '';
		$data['username_err'] = '';
    	$data['password_err'] = '';
    	$data['confirm_password_err'] = '';
    	
		if($this->input->post())
		{
		    $data = $this->input->post();
		    
		    $data['email_err'] = '';
    		$data['username_err'] = '';
        	$data['password_err'] = '';
        	$data['confirm_password_err'] = '';
        	
        	$dataerr = 0;
        	
    	    if(!$data['email']){ $dataerr=1; $data['email_err'] = 'Please fill in your email'; }
    	    if(!$data['username']){ $dataerr=1; $data['username_err'] = 'Please fill in your username'; }
    	    if(!$data['password']){ $dataerr=1; $data['password_err'] = 'Please fill in your password'; }
    	    if(!$data['confirm_password']){ $dataerr=1; $data['confirm_password_err'] = 'Please fill in your password'; }
    	    if($data['password'] != $data['confirm_password']){ $dataerr=1; $data['password_err'] = 'Passwords must be the same'; $data['confirm_password_err'] = ''; }
    	    
    	    if(!$dataerr)
    	    {
    	        $dataerr = 0;
    	        
    	        $check['user_name'] = $this->db->where('username',$data['username'])->get('user')->result();
    	        $check['email_address'] = $this->db->where('email',$data['email'])->get('user')->result();
    	        
    	        if($check['user_name']){ $dataerr=1; $data['username_err'] = 'Username exists'; }
    	        if($check['email_address']){ $dataerr=1; $data['email_err'] = 'Email Address exists'; }
    	        
    	        if(!$dataerr)
    	        {
    	            $adddata['username'] = $data['username'];
    	            $newpass = sha1($data['password']);
    	            $adddata['password'] = $newpass;
    	            $adddata['created_at'] = date("Y-m-d H:i:s");
    	            $adddata['email'] = $data['email'];
    	            
    	            $this->db->insert('user',$adddata);
    	            
    	            redirect('client_login/success');
    	        }
    	    }
		}
		
		$this->load->view('client_register', $data);
	}
}
