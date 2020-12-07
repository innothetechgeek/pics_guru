<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* This is only viewable to those members that are logged in */
class Home extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->check_isvalidated();
    }
    
	public function index(){
		if($this->session->userdata('validated')){
		// if($this->session->userdata('role') != null && $this->session->userdata('role') != 5 ) redirect('admin');
			// redirect('admin');
		// }
			redirect('admin');
		}
	}
    
    private function check_isvalidated(){
        if(! $this->session->userdata('validated')){
            $this->index();
        }
    }
	
    public function do_logout(){
        $this->session->sess_destroy();
        redirect('web');
    }
	
}
?>