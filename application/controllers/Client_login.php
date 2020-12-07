<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Client_login extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        $this->load->model('Login_model_client');
    }
    
    public function index($msg = ""){
        // Load our view to be displayed
        // to the user
        $data['msg'] = $msg;
        $data['username_err'] = '';
        $data['password_err'] = '';
        $this->load->view('client_login', $data);
    }
    
    public function success(){
        $this->index("Register successfully");
    }
    
    public function password(){
        $this->index("Password changed. Please log in with your new credentials.");
    }
    
    public function process(){
        // Validate the user can login
        $result = $this->Login_model_client->validate();
        
        // Now we verify the result
        if(!isset($result)){
            // If user did not validate, then show them login page again
            $msg = '<br/><div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Invalid username and/or password.</div>';
            $this->index($msg);
        }else{
            // If user did validate, 
            // Send them to members area
            redirect('client');
        }        
    }
    
	public function forgot_password() {
        
		$this->form_validation->set_rules('forgot_email', 'Email Address', 'valid_email|required|xss_clean');
	
		if($this->form_validation->run()){
	
			$key = md5(uniqid());
	
			$this->load->library('email', array('mailtype' => 'html'));
	
			$this->email->from('no_reply@pix-guru.co.za', 'Pix-Guru');
			$this->email->to($this->input->post('forgot_email'));
			$this->email->subject("Pix-Guru :: User Password Reset");
	
			$message = "<p>To reset you forgotten password please follow the link below.</p>";
			$message .= "<p>Please <a href='".base_url()."login/reset_psw/$key'>CLICK HERE</a>to change your password.</p>";
	
			$this->email->message($message);
	
			if($this->login_model_client->add_key($key)) {
	
				if($this->email->send()){
                    $msg = '<br/><div class="alert alert-info"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>An email has been sent to the given email address, Please follow the confirmation link to change your password.</div>';
                    $this->index($msg);
				} else {
                    $msg = '<br/><div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Could not send email, Please try again.</div>';
                    $this->index($msg);
				}
			} else {
                $msg = '<br/><div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>User could not be found, Please try again.</div>';
                $this->index($msg);
			}	
		} else {
            $msg = '<br/><div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.validation_errors().'</div>';
            $this->index($msg);
		}
	
	}
    
    public function reset_psw($msg = null) {
        $data['msg'] = $msg;
        $this->load->view('reset', $data);
    }
    
	public function reset_password() {
        
		$key = $this->uri->segment(3);
	
		$this->form_validation->set_rules('password', 'Password', 'required|trim|xss_clean|min:6');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|trim|matches[password]|xss_clean');
		
		if($this->form_validation->run()) {
			if($this->login_model_client->change_password($key)){
				$this->login_model_client->remove_key($key);
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