<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function index()
	{
		
		$data['username'] = '';
		$data['email'] = '';
		$data['password'] = '';
		
		$data['username_err'] = '';
		$data['email_err'] = '';
		$data['password_err'] = '';
		$data['confirm_password_err'] = '';
		$data['membership'] = $_GET['membership'];
		
		$membership = $this->db->where('type', $data['membership'])->get('memberships')->row();
		
        $this->load->view('register', $data);
	}
	
	public function register_temp(){
    	$data['username'] = $this->input->post('username');
		$data['email'] = $this->input->post('email');
		$data['password'] = $this->input->post('password');

		if(empty($data['email']) || empty($data['username'])){
		  redirect('register?membership='.$this->input->post('membership'));
		}
		$membership = $this->db->where('type', $this->input->post('membership'))->get('memberships')->row();
			
		// check if user email exists
		$exists = $this->db->where('email',$data['email'])->get('user')->row();
		if($exists){
		  $this->load->view('register', $data);
		}else{	
            if($membership){
                $data['membership'] = $membership->id;
        		$this->db->insert('temp_user', $data);
        		$insertId = $this->db->insert_id();
        		
        		if($insertId){
        		    $info['user'] = $this->db->where('id',$insertId)->get('temp_user')->row();
        		    $info['membership'] = $this->db->where('id',$info['user']->membership)->get('memberships')->row();
        		  
        		  	$this->load->view('web/components/header');
        		    $this->load->view('web/pages/stripe_payment',$info);
        		    $this->load->view('web/components/footer');
        		}else{
        		    $this->load->view('register', $data);
        		}
            }else{
                $this->load->view('register', $data);
            }
		}
	}
	
	public function register_user(){
	    $data['username'] = $this->input->post('username');
	    $data['email'] = $this->input->post('email');
	    $data['password'] = sha1($this->input->post('password'));
	    $data['membership'] = $this->input->post('membership');
	    $data['status'] = 1;
	    
	    $payment['orderId'] = $this->input->post('orderId');
	    $payment['billingToken'] = $this->input->post('billingToken');
	    $payment['subscriptionId'] = $this->input->post('subscriptionId');
	    $payment['facilitatorAccessToken'] = $this->input->post('facilitatorAccessToken');
	    
	    $this->db->insert('user', $data);
	    $payment['userId'] = $this->db->insert_id();
	    
	    $this->db->insert('payments',$payment);
	    return true;
	}
	
}
