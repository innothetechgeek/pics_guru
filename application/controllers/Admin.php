<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
	    if(!$_SESSION["userid"]) redirect('login');
	    
		$data['type'] = '';
		$this->load->view('admin/components/sidebar');
		$this->load->view('admin/pages/home',$data);
		$this->load->view('admin/components/footer');
	}
	
		public function posts($id = null, $type = 'post')
	{
	    if(!$_SESSION["userid"]) redirect('login');
		$data['id'] = ($id>0)?$id:'';
		$data['type'] = $type;
		$data['title'] = '';
		$data['body'] = '';
		$data['image'] = '';
		$data['slug'] = '';
		$data['category_id'] = 1;
		$data['categories'] = $this->db->get('categories')->result();
		$data['user_id'] = 1;
		$data['users'] = $this->db->get('users')->result();
		
		if($id > 0){
			$post = $this->db->where('id',$id)->get('posts')->row();
			$data['title'] = $post->title;
			$data['body'] = $post->body;
			$data['image'] = $post->image;
			$data['slug'] = $post->slug;
		}else{
			$data['posts'] = $this->db->get('posts')->result();
		}
		
		$this->load->view('admin/components/sidebar');
		$this->load->view('admin/pages/posts',$data);
		$this->load->view('admin/components/footer');
	}
	
	public function add_post(){
		$data = $this->input->post();
		unset($data['submit']);
		
		if (!empty($_FILES['image']['name'])) {
            $val = $this->uploadImage('image','test'); //products/gallery
            //$val == TRUE || redirect('admin/products');
            if($val == TRUE) $data['image'] = $val['path'];
        }
        
        if(empty($data['image'])) unset($data['image']);

		$this->db->insert('posts',$data);
		//redirect($_SERVER['HTTP_REFERER']);
		redirect('admin/posts');
	}
	
	public function delete_post($id = null){
		if($id > 0){
			$query = $this->db->where('id',$id)->delete('posts');
			if($query){
				redirect($_SERVER['HTTP_REFERER']);
			}
		}
	}







	
	 public function blog_categories($id = null, $type = 'category')
	{
	    if(!$_SESSION["userid"]) redirect('login');
		$data['id'] = ($id>0)?$id:'';
		$data['type'] = $type;
		$data['name'] = '';
		
		if($id > 0){
			$category = $this->db->where('id',$id)->get('categories')->row();
			$data['name'] = $category->name;
		}else{
			$data['categories'] = $this->db->get('categories')->result();
		}
		
		$this->load->view('admin/components/sidebar');
		$this->load->view('admin/pages/blog_categories',$data);
		$this->load->view('admin/components/footer');
	}
	
	 public function add_categories(){
		$data = $this->input->post();
		unset($data['submit']);
		
		if (!empty($_FILES['images']['name'])) {
            $val = $this->uploadImage('images','test'); //products/gallery
            //$val == TRUE || redirect('admin/products');
            if($val == TRUE) $data['images'] = $val['path'];
        }
        
        if(empty($data['images'])) unset($data['images']);

		$this->db->insert('categories',$data);
		//redirect($_SERVER['HTTP_REFERER']);
		redirect('admin/blog_categories');
	}

	public function update_categories($id = null){
		if($id > 0){
			$data = $this->input->post();
			unset($data['submit']);
			
			if (!empty($_FILES['images']['name'])) {
				$val = $this->uploadImage('images','test'); //products/gallery
				//$val == TRUE || redirect('admin/products');
				if($val == TRUE) $data['images'] = $val['path'];
			}
			
			if(empty($data['images'])) unset($data['images']);
			
			$query = $this->db->where('id',$id)->update('categories', $data);
			//redirect($_SERVER['HTTP_REFERER']);
			redirect('admin/blog_categories');
		}
	}

	public function delete_categories($id = null){
		if($id > 0){
			$query = $this->db->where('id',$id)->delete('categories');
			if($query){
				redirect($_SERVER['HTTP_REFERER']);
			}
		}
	}
	


	
	
	public function newsletter($id = null, $type = 'newsletters')
	{
		$data['id'] = ($id>0)?$id:'';
		$data['type'] = $type;
		$data['heading'] = $type;
		$data['button'] = '';
		
		if($id > 0){
			$newsletters = $this->db->where('id',$id)->get('newsletter')->row();
			$data['heading'] = $newsletters->heading;
			$data['button'] = $newsletters->button;
		}else{
			$data['newsletters'] = $this->db->get('newsletter')->result();
		}
		
		$this->load->view('admin/components/sidebar');
		$this->load->view('admin/pages/newsletter',$data);
		$this->load->view('admin/components/footer');
	}
	
	public function services($id = null, $type = 'service')
	{
		$data['id'] = ($id>0)?$id:'';
		$data['type'] = $type;
		$data['heading'] = '';
		$data['price'] = '';
		$data['extra'] = '';
		$data['description'] = '';
		$data['directions'] = '';
		$data['safe'] = '';
		$data['work'] = '';
		$data['result'] = '';
		$data['images'] = '';
		
		if($id > 0){
			$service = $this->db->where('id',$id)->get('services')->row();
			$data['heading'] = $service->heading;
			$data['price'] = $service->price;
			$data['extra'] = $service->extra;
			$data['description'] = $service->description;
			$data['directions'] = $service->directions;
			$data['safe'] = $service->safe;
			$data['work'] = $service->work;
			$data['result'] = $service->result;
			$data['images'] = $service->images;
		}else{
			$data['services'] = $this->db->get('services')->result();
		}
		
		$this->load->view('admin/components/sidebar');
		$this->load->view('admin/pages/services',$data);
		$this->load->view('admin/components/footer');
	}

	public function vouchers($id = null, $type = 'voucher')
	{
		$data['id'] = ($id>0)?$id:'';
		$data['method'] = $type;
		$data['title'] = '';
		$data['type'] = '';
		$data['price'] = '';
		
		if($id > 0){
			$voucher = $this->db->where('id',$id)->get('vouchers')->row();
			$data['title'] = $voucher->title;
			$data['type'] = $voucher->type;
			$data['price'] = $voucher->price;
		}else{
			$data['vouchers'] = $this->db->get('vouchers')->result();
		}
		
		$this->load->view('admin/components/sidebar');
		$this->load->view('admin/pages/vouchers',$data);
		$this->load->view('admin/components/footer');
	}

	public function voucher_orders($id = null)
	{
		$data['id'] = $id?$id:'';
		$data['type'] = 'voucher';
		$data['vouchers'] = $this->db->get('voucher_orders')->result();
		$this->load->view('admin/components/sidebar');
		$this->load->view('admin/pages/voucher',$data);
		$this->load->view('admin/components/footer');
	}

	public function emails()
	{
		$data['emails'] = $this->db->get('emails')->result();
		$this->load->view('admin/components/sidebar');
		$this->load->view('admin/pages/emails',$data);
		$this->load->view('admin/components/footer');
	}
	
	public function add_newsletters(){
		$data = $this->input->post();
		unset($data['submit']);
		
		
		$data['status'] = 1;
		$this->db->insert('newsletter',$data);
		//redirect($_SERVER['HTTP_REFERER']);
		redirect('admin/newsletter');
	}

	public function update_newsletters($id = null){
		if($id > 0){
			$data = $this->input->post();
			unset($data['submit']);
			
			
			$query = $this->db->where('id',$id)->update('newsletter', $data);
			//redirect($_SERVER['HTTP_REFERER']);
			redirect('admin/newsletter');
		}
	}

	public function add_service(){
		$data = $this->input->post();
		unset($data['submit']);
		
		if (!empty($_FILES['images']['name'])) {
            $val = $this->uploadImage('images','test'); //products/gallery
            //$val == TRUE || redirect('admin/products');
            if($val == TRUE) $data['images'] = $val['path'];
        }
        
        if(empty($data['images'])) unset($data['images']);

		$this->db->insert('services',$data);
		//redirect($_SERVER['HTTP_REFERER']);
		redirect('admin/services');
	}

	public function update_service($id = null){
		if($id > 0){
			$data = $this->input->post();
			unset($data['submit']);
			
			if (!empty($_FILES['images']['name'])) {
				$val = $this->uploadImage('images','test'); //products/gallery
				//$val == TRUE || redirect('admin/products');
				if($val == TRUE) $data['images'] = $val['path'];
			}
			
			if(empty($data['images'])) unset($data['images']);
			
			$query = $this->db->where('id',$id)->update('services', $data);
			//redirect($_SERVER['HTTP_REFERER']);
			redirect('admin/services');
		}
	}

	public function delete_service($id = null){
		if($id > 0){
			$query = $this->db->where('id',$id)->delete('services');
			if($query){
				redirect($_SERVER['HTTP_REFERER']);
			}
		}
	}


	public function add_voucher(){
		$data = $this->input->post();
		unset($data['submit']);
		
		/*if (!empty($_FILES['images']['name'])) {
            $val = $this->uploadImage('images','vouchers');
            //$val == TRUE || redirect('admin/vouchers');
            if($val == TRUE) $data['images'] = $val['path'];
        }
        
        if(empty($data['images'])) unset($data['images']);
        */
		$data['status'] = 1;
		$this->db->insert('vouchers',$data);
		//redirect($_SERVER['HTTP_REFERER']);
		redirect('admin/vouchers');
	}

	public function update_voucher($id = null){
		if($id > 0){
			$data = $this->input->post();
			unset($data['submit']);
			
			/*if (!empty($_FILES['images']['name'])) {
				$val = $this->uploadImage('images','vouchers');
				//$val == TRUE || redirect('admin/vouchers');
				if($val == TRUE) $data['images'] = $val['path'];
			}
			
			if(empty($data['images'])) unset($data['images']);
			*/
			
			$query = $this->db->where('id',$id)->update('vouchers', $data);
			//redirect($_SERVER['HTTP_REFERER']);
			redirect('admin/vouchers');
		}
	}

	public function change_voucher_status($action,$id = null){
		if($id > 0){
			$status = ($action=='Enable')? 1:0;
			$query = $this->db->where('id',$id)->update('vouchers', array('status' => $status));
			if($query){
				redirect($_SERVER['HTTP_REFERER']);
			}
		}
	}

	function uploadImage($field, $type){
		$config['upload_path'] = './assets/images/'.$type.'/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 2000;
        $config['max_width'] = 1500;
        $config['max_height'] = 1500;


		$this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload($field)) {
            $error = $this->upload->display_errors();
            $type = "error";
            $message = $error;
            // set_message($type, $message);
            //return $error;
            return FALSE;
            // uploading failed. $error will holds the errors.
        } else {
            $fdata = $this->upload->data();
            //$img_data ['path'] = $config['upload_path'] . $fdata['file_name'];
            $img_data ['path'] = $fdata['file_name'];
            return $img_data;
            // uploading successfull, now do your further actions
        }
        // $this->load->library('upload', $config);

        // if (!$this->upload->do_upload('upload_image')) {
            // $error = array('error' => $this->upload->display_errors());
			// return false;
        // } else {
            // $data = array('image_metadata' => $this->upload->data());
			// return true;
        // }
		
	}

	function images($type=1,$id="") {
	    if(!$_SESSION["userid"]) redirect('login');
	    if($id > 0)
	    {
	        $array = array('id' => $id);
			$images = $this->db->where($array)->get('images')->row();
			
		    $array2 = array('image_id' => $id);
			$feedback = $this->db->where($array2)->get('image_feedback')->row();
			
			if(!isset($images)) redirect('admin/images');
			
			$data['view'] = 1;
			$data['type'] = $type;
			$data['id'] = $id;
			$data['timestamp'] = $images->timestamp;
			$data['who'] = $images->who;
			$data['time'] = $images->time;
			$data['number'] = $images->number;
			$data['taken'] = $images->taken;
			$data['audience'] = $images->audience;
			$data['why'] = $images->why;
			$data['relationship'] = $images->relationship;
			$data['edit'] = $images->edit;
			$data['genre'] = $images->genre;
			$data['image'] = $images->image;
			$data['fstop'] = $images->fstop;
			$data['iso_type'] = $images->iso_type;
			$data['white_balance_type'] = $images->white_balance_type;
			
			$data['taken_with'] = $images->taken_with;
			$data['other_specified'] = $images->other_specified;
			$data['camera_settings'] = $images->camera_settings;
			$data['shutter_speed'] = $images->shutter_speed;
			$data['aperture'] = $images->aperture;
			
			// Feedback Data
			if($feedback){
				foreach($feedback as $key => $value){
					if(!in_array($key, array('id'))){
						$data[$key] = $value;
					}
				}
    		}else{
    			$feedback = $this->db->list_fields('image_feedback');
    			foreach($feedback as $key){
    					if(!in_array($key, array('id'))){
    						$data[$key] = '';
    					}
    				}
    		}
		
			$this->db->select('*');
            $this->db->from('messages');
            $this->db->where('image_id',$id);
            $this->db->order_by('timestamp', 'ASC');
            $chats = $this->db->get()->result();
            
            $messagecnt = 0;
            
            foreach($chats as $chat)
            {
                if($chat->person_type == 'client')
                {
                    $users = $this->db->where('id',$chat->person_id)->get('user')->row();
                    
                    $data['messages'][$messagecnt]['message'] = $chat->message;
			        $data['messages'][$messagecnt]['timestamp'] = date("Y-m-d H:i", strtotime($chat->timestamp));
			        $data['messages'][$messagecnt]['username'] = $users->username;
			        
			        $messagecnt++;
                }
                else if($chat->person_type == 'admin')
                {
                    $users = $this->db->where('id',$chat->person_id)->get('users')->row();
                    
                    $data['messages'][$messagecnt]['message'] = $chat->message;
			        $data['messages'][$messagecnt]['timestamp'] = date("Y-m-d H:i", strtotime($chat->timestamp));
			        $data['messages'][$messagecnt]['username'] = isset($users->username)?$users->username:'';
			        
			        $messagecnt++;
                }
            }
	    }
	    else
	    {
	       
    	    $this->db->select('*');
            $this->db->from('user');
            if($type == 1){
                $this->db->where('membership',1);
                $this->db->or_where('membership',2);
            }elseif($type == 2){
                $this->db->where('membership',3);
                $this->db->or_where('membership',4);
            }

            $this->db->join('images', 'images.user_id = user.id');
            $this->db->order_by('images.timestamp', 'DESC');
            
            $data['images'] = $this->db->get()->result();
	    }
		
		$data['type'] = $type; //($type == 1) ? 'beginner_image':'';
// 		print_r($data); exit;
		$this->load->view('admin/components/sidebar');
		$this->load->view('admin/pages/images',$data);
		$this->load->view('admin/components/footer');
	}
	
	public function add_message()
	{
	    $data = $this->input->post();
		unset($data['submit']);
		
		$type = $data['type'];
		unset($data['type']);
		
		$id = $data['id'];
		unset($data['id']);
        
        $data['image_id'] = $id;
        $data['person_id'] = $_SESSION["userid"];
        $data['person_type'] = 'admin';
        $data['timestamp'] = date("Y-m-d H:i:s");
		
		$this->db->insert('messages',$data);
		redirect('admin/images/'.$type.'/'.$id);
	}
	
	public function memberships() {
	    if(!$_SESSION["userid"]) redirect('login');
		$data['memberships'] = $this->db->join('memberships','memberships.id = user.membership','left')->get('user')->result();
		
		$this->load->view('admin/components/sidebar');
		$this->load->view('admin/pages/memberships',$data);
		$this->load->view('admin/components/footer');
	}
	
	public function add_image_feedback($type, $id){
		
		$data = $this->input->post();
		unset($data['submit']);
		
		$array = array('id' => $id);
		$images = $this->db->where($array)->get('images')->row();
	
		$array = array('image_id' => $id);
		$feedback = $this->db->where($array)->get('image_feedback')->row();
		if(!$feedback){
			$data['image_id'] = $id;
			$data['client_id'] = $images->user_id;

			$this->db->insert('image_feedback',$data);
		}else{
			$this->db->where('image_id',$id)->update('image_feedback',$data);
		}
		redirect("admin/images/$type/$id");
	}
	
	public function newsletter_responses(){
        $data['newsletters_contacts'] = $this->db->get('newsletter_signups')->result();
	     
    	$this->load->view('admin/components/sidebar');
		$this->load->view('admin/pages/newsletter_signups',$data);
		$this->load->view('admin/components/footer');
	}
	
		
	public function all_memberships() {
	    if(!$_SESSION["userid"]) redirect('login');
		$data['memberships'] = $this->db->get('memberships')->result();
		
		$this->load->view('admin/components/sidebar');
		$this->load->view('admin/pages/all_services',$data);
		$this->load->view('admin/components/footer');
	}
}
