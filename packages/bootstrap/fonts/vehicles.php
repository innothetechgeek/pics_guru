<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Vehicles extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(! $this->session->userdata('validated')){
			redirect('login');
		}else{
			if($this->session->userdata('role') == 5) redirect('home');
		}
        
		$this->load->model('images_model');  
		$this->load->model('vehicles_model');  
		$this->load->model('vehicletypes_model');  
		$this->load->model('vehiclemakes_model');  
		$this->load->model('roadworthy_model');  
		$this->load->model('companies_model');
		$this->load->model('customers_model');
		$this->load->model('examiners_model');
        
		$this->load->library('form_validation');
	}

	public function index($page = null, $data = null){
	
		if(!$page){
			$page = 'vehicles';
			$data = array(
				'title' 	=> $page,
				'vehicles' 	=> $this->vehicles_model->get_all_vehicles(),
				'customers' => $this->customers_model->get_all_customers(),
				'types' 	=> $this->vehicletypes_model->get_all_types(),
				'makes' 	=> $this->vehiclemakes_model->get_all_makes(),
			);
		}
		
		if ( ! file_exists('application/views/admin/vehicles/'.$page.'.php')) show_404();

		$this->load->view('admin/temps/header', $data);
		$this->load->view('admin/temps/sidebar');
		$this->load->view('admin/vehicles/'.$page, $data);
		$this->load->view('admin/temps/footer');
	}

	public function create_vehicle(){
    
		$this->form_validation->set_rules('registrationno', 'Vehicle Plate Number', 'required|trim|xss_clean|min:6');
		$this->form_validation->set_rules('reg_date', 'Vehicle Registration Date', 'required|trim|xss_clean');
		$this->form_validation->set_rules('make', 'Manufacturer', 'required|trim|xss_clean');
		$this->form_validation->set_rules('type', 'Vehicle Type', 'required|trim|xss_clean');
	 
		if($this->form_validation->run()){
			if($this->vehicles_model->insert_vehicle()){
				$this->session->set_flashdata('success', 'The type has been added.');
				redirect('vehicles');
			} else {
				$this->session->set_flashdata('warning', 'The type could not be saved, please try again.');
				redirect('vehicles');
			}
		} else {
			$this->session->set_flashdata('error', validation_errors());
			redirect('vehicles');
		}
	}
    
    public function edit() {
        $page = 'vehicle_edit';
        
        $data = array(
            'title'     => $page,
            'vehicle'   => $this->vehicles_model->get_by_vehicle_id($this->uri->segment(3)),
            'customers' => $this->customers_model->get_all_customers(),
            'makes'     => $this->vehiclemakes_model->get_all_makes(),
            'types'     => $this->vehicletypes_model->get_all_types()
        );
        
        $this->index($page, $data);
    }
	
	 public function types_edit($id = null) {
        $page = 'types_edit';
        
        $data = array(
            'title'     => $page,
            'type'     => $this->vehicletypes_model->get_by_type($this->uri->segment(3))
        );
        
        $this->index($page, $data);
    }
    
	public function edit_vehicle(){
    
        $id = $this->input->post('vehicleID');
        
		$this->form_validation->set_rules('registrationno', 'Vehicle Plate Number', 'required|trim|xss_clean');
		$this->form_validation->set_rules('reg_date', 'Registration Date', 'required|trim|xss_clean');
		$this->form_validation->set_rules('make', 'Vehicle Make', 'required|trim|xss_clean');
		$this->form_validation->set_rules('model', 'Vehicle Model', 'required|trim|xss_clean');
	 
		if($this->form_validation->run()){
			if($this->vehicles_model->update_vehicle()){
				$this->session->set_flashdata('success', 'The type has been added.');
				redirect('vehicles');
			} else {
				$this->session->set_flashdata('warning', 'The type could not be saved, please try again.');
				redirect('vehicles/edit/'.$id);
			}
		} else {
			$this->session->set_flashdata('errors', validation_errors());
			redirect('vehicles/edit/'.$id);
		}
	}
	
	public function details($vehicleID = null) {
	
		$page = 'vehicle_details';
		$vehicleID = $this->uri->segment(3);

		$data = array(
			'title' 	=> $page,
			'vehicle' 	=> $this->vehicles_model->get_by_vehicle_id($vehicleID),
			'customers' => $this->customers_model->get_all_customers(),
			'types' 	=> $this->vehicletypes_model->get_all_types(),
			'makes' 	=> $this->vehiclemakes_model->get_all_makes(),
            'images'    => $this->images_model->get_by_image_vehicle_id($vehicleID),
            'roadtests' => $this->roadworthy_model->get_by_vehicleID($vehicleID)
		);
		
		$this->index($page, $data);
	}

	public function types() {
	
		$page = 'vehicle_types';
		$data = array(
			'title' => $page,
			'vehicletypes' => $this->vehicletypes_model->get_all_types()
		);

		$this->index($page, $data);
	}

	public function create_type() {

		$this->form_validation->set_rules('vehicletype', 'Vehicle Type Code', 'required|trim|xss_clean');
		$this->form_validation->set_rules('description', 'Description', 'required|trim|xss_clean');
		$this->form_validation->set_rules('ex_price', 'Examination Price', 'required|trim|xss_clean');
		$this->form_validation->set_rules('ver_price', 'Verification Price', 'required|trim|xss_clean');
		$this->form_validation->set_rules('re_price', 'Re-Examination Price', 'required|trim|xss_clean');

		if($this->form_validation->run()){
			if($this->vehicletypes_model->insert_type()){
				$this->session->set_flashdata('success', 'New Vehicle type has been added.');
				redirect('vehicles/types');
			} else {
				$this->session->set_flashdata('warning', 'The type could not be saved, please try again.');
				redirect('vehicles/types');
			}
		} else {
			$this->session->set_flashdata('error', validation_errors());
			redirect('vehicles/types');
		}
		
	}
	
	public function edit_type($id) {

		$this->form_validation->set_rules('vehicletype', 'Vehicle Type Code', 'required|trim|xss_clean');
		$this->form_validation->set_rules('description', 'Description', 'required|trim|xss_clean');
		$this->form_validation->set_rules('ex_price', 'Examination Price', 'required|trim|xss_clean');
		$this->form_validation->set_rules('ver_price', 'Verification Price', 'required|trim|xss_clean');
		$this->form_validation->set_rules('re_price', 'Re-examination Price', 'required|trim|xss_clean');

		if($this->form_validation->run()){
			if($this->vehicletypes_model->update_type($id)){
				$this->session->set_flashdata('success', 'The vehicle type has been updated.');
				redirect('vehicles/types');
			} else {
				$this->session->set_flashdata('warning', 'The vehicle type could not be updated, please try again.');
				redirect('vehicles/types');
			}
		} else {
			$this->session->set_flashdata('error', validation_errors());
			redirect('vehicles/types');
		}
		
	}

	public function makes() {
	
		$page = 'vehicle_makes';
		$data = array(
			'title' 		=> $page,
			'vehiclemakes' 	=> $this->vehiclemakes_model->get_all_makes()
		);
	  
		$this->index($page, $data);
	}

	public function create_make() {

		$this->form_validation->set_rules('vehiclemake', 'Vehicle Make Code', 'required|trim|xss_clean');

		if($this->form_validation->run()){
			if($this->vehiclemakes_model->insert_make()){
				$this->session->set_flashdata('message', 'New make has been added.');
				redirect('vehicles/makes');
			} else {
				$this->session->set_flashdata('message', 'The make could not be saved, please try again.');
				redirect('vehicles/makes');
			}
		} else {
			$this->session->set_flashdata('form_errors', validation_errors());
			redirect('vehicles/makes');
		}
		
	}
    
    public function reallocate() {
        
        $id = $this->uri->segment(3);
        
        $this->form_validation->set_rules('new_owner', 'New Owner', 'requierd|trim');
        
        if($this->form_validation->run()){
            if($this->vehicles_model->update_allocate($id)){
                $this->session->set_flashdata('success', 'Owner has successfully been changed.');
				redirect('vehicles/details/'.$id);
            }else{
                $this->session->set_flashdata('warning', 'Something went wrong, please try again.');
				redirect('vehicles/details/'.$id);
            }
        }else{
            $this->session->set_flashdata('error', validation_errors());
            redirect('vehicles/details/'.$id);
        }
        
    }
    
    public function history() {
        
		$id = $this->uri->segment(3);
		
		$vehicleID = $this->uri->segment(4);
		$page = 'vehicle_test_history';
        
		$data = array(
			'title' 		=> $page,
			'vehicle' 		=> $this->vehicles_model->get_by_vehicle_id($vehicleID),
			'categories' 	=> $this->roadworthy_model->get_all_categories(),
			'description' 	=> $this->roadworthy_model->get_all_catDetails(),
			'makes' 		=> $this->vehiclemakes_model->get_all_makes(),
			'history' 		=> $this->roadworthy_model->get_vehicle_history($id),
			'roadtest' 		=> $this->roadworthy_model->get_by_vehicleID($vehicleID),
			'subcat' 	=> $this->roadworthy_model->get_all_subDetails(),
		);
        
		$this->index($page, $data);
    }
    
    public function images() {
        
        $id = $this->uri->segment(3);
        $page = 'vehicle_images';
        
        $data = array(
            'title'      => $page,
			'vehicle'    => $this->vehicles_model->get_by_vehicle_id($id),
            'images'     => $this->images_model->get_by_image_vehicle_id($id)
        );
        
        $this->index($page, $data);
    }

    public function upload() {
        
        $id = $this->uri->segment(3);
        
        $this->form_validation->set_rules('vehicleID', 'Vehicle ID', 'required|trim');
        
        if($this->form_validation->run()){
            if($this->images_model->insert_image()) {
                $this->session->set_flashdata('success', 'File Uploaded successfully.');
                redirect('vehicles/images/'.$id);
            }else{
                $this->session->set_flashdata('warning', 'Something went wrong, please try again');
                redirect('vehicles/images/'.$id);
            }
        }else{
            $this->session->set_flashdata('error', validation_errors());
            redirect('vehicles/images/'.$id);
        }
    }
    
    public function vehicle_date($id = null, $vehicleID =null) {
        
		$vehicleID = $this->uri->segment(3);
		$page = 'vehicle_tests';
        
		$data = array(
			'title' 		=> $page,
			'categories' 	=> $this->roadworthy_model->get_all_categories(),
			'description' 	=> $this->roadworthy_model->get_all_catDetails(),
			'customers' 	=> $this->customers_model->get_all_customers(),
			'examiners' 	=> $this->examiners_model->get_all_examiners(),
			'vehicles' 		=> $this->vehicles_model->get_all_vehicles(),
			'vehicle' 		=> $this->vehicles_model->get_by_vehicle_id($vehicleID),
			'makes' 		=> $this->vehiclemakes_model->get_all_makes(),
			'roadtest' 		=> $this->roadworthy_model->get_by_vehicleID($vehicleID),
			'categories' 	=> $this->roadworthy_model->get_all_categories(),
			'description' 	=> $this->roadworthy_model->get_all_catDetails(),
			'customers' 	=> $this->customers_model->get_all_customers(),
			'vehicles' 		=> $this->vehicles_model->get_all_vehicles(),
			'makes' 		=> $this->vehiclemakes_model->get_all_makes(),
			'vehicleID'     => $this->uri->segment(3)
		);
        
		$this->index($page, $data);
	}
    
}
