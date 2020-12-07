<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        $this->load->model('login_model');
    }
    
    public function index($msg = NULL){
        // Load our view to be displayed
        // to the user
        $data['msg'] = $msg;
        $data['username_err'] = '';
        $data['password_err'] = '';
        $this->load->view('login', $data);
    }
    
    public function success(){
        $this->index("Register successfully");
    }
    
    public function password(){
        $this->index("Password changed. Please log in with your new credentials.");
    }
    
    public function process(){
        // Validate the user can login
        $result = $this->login_model->validate();
        
        // Now we verify the result
        if(! $result){
            // If user did not validate, then show them login page again
            $msg = '<br/><div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Invalid email and/or password.</div>';
            $this->index($msg);
        }else{
            // If user did validate, 
            // Send them to members area
            redirect('home');
        }        
    }
    
	public function forgot_password() {
        
        $data = null;
        $data['email_err'] = '';
        
		//$this->form_validation->set_rules('forgot_email', 'Email Address', 'valid_email|required|xss_clean');
	
		if($this->input->post()){
	        
	        $data = $this->input->post();
	        $data['email_err'] = '';
	        
			$key = md5(uniqid());
	
			$message = "<p>To reset you forgotten password please follow the link below.</p>";
			$message .= "<p>Please <a href='".base_url()."login/reset_psw/$key'>CLICK HERE</a>to change your password.</p>";
	        
			if($this->login_model->add_key($key)) {
	            
	            $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $headers .= 'From: Pix-Guru <no_reply@pix-guru.co.za>' . "\r\n";
                
	            $mailsent = mail($data['forgot_email'],"Pix-Guru :: User Password Reset",$message,$headers);
	            
	            if($mailsent)
	            {
	                $data['email_err'] = '<br/><div class="alert alert-info"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>An email has been sent to the given email address, Please follow the confirmation link to change your password.</div>';
	            }
	            else
	            {
	                $data['email_err'] = '<br/><div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Could not send email, Please try again.</div>';
	            }
	            
	            /*$this->load->library('email', array('mailtype' => 'html'));
	            
    			$this->email->from('no_reply@pix-guru.co.za', 'Pix-Guru');
    			$this->email->to($data['forgot_email']);
    			$this->email->subject("Pix-Guru :: User Password Reset");
			    
			    $this->email->message($message);
			    
				if($this->email->send()){
                    $data['email_err'] = '<br/><div class="alert alert-info"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>An email has been sent to the given email address, Please follow the confirmation link to change your password.</div>';
				} else {
                    $data['email_err'] = '<br/><div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Could not send email, Please try again.</div>';
				}*/
				
			} else {
                $data['email_err'] = '<br/><div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>User could not be found, Please try again.</div>';
			}	
		}
		
	    $this->load->view('forgot_password', $data);
	}
    
    public function reset_psw($msg = null) {
        
        $msg = $this->uri->segment(3);
        
        $data['key'] = $msg;
        $data['new_err'] = '';
        $data['confirm_err'] = '';
        
        if($this->input->post())
        {
            $data = $this->input->post();
            
            $data['key'] = $msg;
            $data['new_err'] = '';
            $data['confirm_err'] = '';
            
            $dataerr = 0;
            
            if(!$data['password']){ $dataerr=1; $data['new_err'] = 'Please fill in your password'; }
        	if(!$data['confirm_password']){ $dataerr=1; $data['confirm_err'] = 'Please fill in your password'; }
        	if($data['password'] != $data['confirm_password']){ $dataerr=1; $data['new_err'] = 'Passwords must be the same'; $data['confirm_err'] = ''; }
        	
        	if(!$dataerr)
        	{
        	    if($this->login_model->change_password($msg))
        	    {
        	        $this->login_model->remove_key($msg);
        	        redirect('login/password');
        	    }
        	    else
        	    {
        	        $data['new_err'] = 'Could not reset password, please try again.';
        	    }
        	}
        }
		
        $this->load->view('reset', $data);
    }
    
	public function reset_password() {
        
		$key = $this->uri->segment(3);
	
		$this->form_validation->set_rules('password', 'Password', 'required|trim|xss_clean|min:6');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|trim|matches[password]|xss_clean');
		
		if($this->form_validation->run()) {
			if($this->login_model->change_password($key)){
				$this->login_model->remove_key($key);
                $msg = '<br/><div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Password changed. Please log in with your new credentials.</div>';
                $this->index($msg);
			} else {
                $msg = '<br/><div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Could not reset password, please try again.</div>';
                $this->reset_psw($msg);
			}
		} else {
            $msg = '<br/><div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.validation_errors().'</div>';
            $this->reset_psw($msg);
		}
	}
    
}
?>