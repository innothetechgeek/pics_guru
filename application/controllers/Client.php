<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends CI_Controller {

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
	    if(!$_SESSION["userid"]) redirect('client_login');
	    
		$data['type'] = '';
		$this->load->view('client/components/sidebar');
		$this->load->view('client/pages/home',$data);
		$this->load->view('client/components/footer');
	}
    
    public function messages($id = "")
	{
	    if(!$_SESSION["userid"]) redirect('client_login');
	    $data['id'] = $id;
	    
	    if($id > 0)
	    {
	        $data['view'] = 1;
	        
	        $array = array('images.id' => $id, 'images.user_id' => $_SESSION["userid"]);
	        $this->db->select('images.image,messages.image_id,messages.person_id,messages.person_type,messages.message,messages.timestamp');
            $this->db->from('images');
            $this->db->where($array);
            $this->db->join('messages', 'messages.image_id = images.id');
            $this->db->order_by('messages.timestamp', 'DESC');
            $chats = $this->db->get()->result();
            
            $messagecnt = 0;
            
            foreach($chats as $chat) 
            {
                $data['messages']['image_id'] = $chat->image_id;
                $data['messages']['image'] = $chat->image;
                
                if($chat->person_type == 'client')
                {
                    $users = $this->db->where('id',$chat->person_id)->get('user')->row();
                    
                    $data['messages']['row'][$messagecnt]['message'] = $chat->message;
    		        $data['messages']['row'][$messagecnt]['timestamp'] = date("Y-m-d H:i", strtotime($chat->timestamp));
    		        $data['messages']['row'][$messagecnt]['username'] = $users->username;
    		        
    		        $messagecnt++;
                }
                else if($chat->person_type == 'admin')
                {
                    $users = $this->db->where('id',$chat->person_id)->get('users')->row();
                    
                    $data['messages']['row'][$messagecnt]['message'] = $chat->message;
    		        $data['messages']['row'][$messagecnt]['timestamp'] = date("Y-m-d H:i", strtotime($chat->timestamp));
    		        $data['messages']['row'][$messagecnt]['username'] = $users->username;
    		        
    		        $messagecnt++;
                }
            }
	        
	    }
	    else
	    {
	        $data['view'] = 0;
	        
            $this->db->select('images.image,messages.image_id,messages.person_id,messages.person_type,messages.message,messages.timestamp');
            $this->db->from('images');
            $this->db->where('user_id',$_SESSION["userid"]);
            $this->db->join('messages', 'messages.image_id = images.id');
            $this->db->order_by('messages.timestamp', 'ASC');
            $chats = $this->db->get()->result();
            
            foreach($chats as $chat)
            {
                $image_id = $chat->image_id;
                
                if($chat->person_type == 'client')
                {
                    $users = $this->db->where('id',$chat->person_id)->get('user')->row();
                    
                    $data['messages'][$image_id]['image_id'] = $image_id;
                    $data['messages'][$image_id]['image'] = $chat->image;
                    $data['messages'][$image_id]['message'] = $chat->message;
    		        $data['messages'][$image_id]['timestamp'] = date("Y-m-d H:i", strtotime($chat->timestamp));
    		        $data['messages'][$image_id]['username'] = $users->username;
                }
                else if($chat->person_type == 'admin')
                {
                    $users = $this->db->where('id',$chat->person_id)->get('users')->row();
                    
                    $data['messages'][$image_id]['image_id'] = $image_id;
                    $data['messages'][$image_id]['image'] = $chat->image;
                    $data['messages'][$image_id]['message'] = $chat->message;
    		        $data['messages'][$image_id]['timestamp'] = date("Y-m-d H:i", strtotime($chat->timestamp));
    		        $data['messages'][$image_id]['username'] = $users->username;
                }
            }
	    }
	    
	    $this->load->view('client/components/sidebar');
		$this->load->view('client/pages/messages',$data);
		$this->load->view('client/components/footer');
	}
	
	public function add_message()
	{
	    $data = $this->input->post();
		unset($data['submit']);
		
		$id = $data['id'];
		unset($data['id']);
        
        $data['image_id'] = $id;
        $data['person_id'] = $_SESSION["userid"];
        $data['person_type'] = 'client';
        $data['timestamp'] = date("Y-m-d H:i:s");
		
		$this->db->insert('messages',$data);
		redirect('client/messages/'.$id);
	}
	
    public function images($id = "")
    {
        if(!$_SESSION["userid"]) redirect('client_login');
        
        $timestamp = strtotime('-1 month');
    	//$timestamp = strtotime('-7 days', strtotime('20200628 15:00:00'));
    	
		if(is_numeric($id)){
		    $array = array('id' => $id, 'user_id' => $_SESSION["userid"]);
			$images = $this->db->where($array)->get('images')->row();
			
			$array2 = array('image_id' => $id);
			$feedback = $this->db->where($array2)->get('image_feedback')->row();
			
			if(!isset($images)) redirect('client/images');
			$membership_type = ($this->db->where('id',$_SESSION["userid"])->get('user')->row('membership') <= 2) ? 1: 2;
		    $data['membership_type'] =  $membership_type;
		 
			$data['type'] = 'edit';
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
		}
		else if($id=='add')
		{
		    $membership_type = ($this->db->where('id',$_SESSION["userid"])->get('user')->row('membership') <= 2) ? 1: 2;
		    $data['membership_type'] =  $membership_type;
		    
		    $data['type'] = 'add';
		    $data['id'] = '';
    		$data['timestamp'] = '';
    		$data['image'] = '';
    		$data['fstop'] = '';
    		$data['iso_type_type'] = '';
    		$data['white_balance_type'] = '';
    		$data['time'] = '';
    		$data['who'] = '';
    		$data['number'] = '';
    		$data['taken'] = '';
    		$data['audience'] = '';
    		$data['why'] = '';
    		$data['relationship'] = '';
    		$data['edit'] = '';
    		$data['genre'] = '';
    		$data['error'] = 0;
    		
			$data['taken_with'] = '';
			$data['other_specified'] = '';
			$data['camera_settings'] = '';
			$data['shutter_speed'] = '';
			$data['aperture'] = '';
			
    		$array = array('timestamp >=' => date("Y-m-d H:i:s", $timestamp), 'user_id' => $_SESSION["userid"]);
    		$data['rollingimage'] = $this->db->where($array)->get('images')->result();
    		
    		if($membership_type == 2)
    		{
    		    if(count($data['rollingimage']) >= 12) $data['error'] = 1;
    		}
    		else
    		{
    		    if(count($data['rollingimage']) >= 8) $data['error'] = 1;
    		}
		}else{
		    
		    $membership_type = ($this->db->where('id',$_SESSION["userid"])->get('user')->row('membership') <= 2) ? 1: 2;
		    $data['membership_type'] =  $membership_type;
		    
    		$array = array('timestamp >=' => date("Y-m-d H:i:s", $timestamp), 'user_id' => $_SESSION["userid"]);
    		$data['rollingimage'] = $this->db->where($array)->get('images')->result();
    		
    		$data['imagecnt'] = count($data['rollingimage']);
		    
		    $data['type'] = 'view';
			$data['images'] = $this->db->where('user_id',$_SESSION["userid"])->get('images')->result();
		}
		
		$this->load->view('client/components/sidebar');
		$this->load->view('client/pages/images',$data);
		$this->load->view('client/components/footer');
    }
    
	/*public function beginner_image($id = null, $type = 'beginner_image')
	{
	    if(!$_SESSION["userid"]) redirect('client_login');
	    
		$data['id'] = ($id>0)?$id:'';
		$data['type'] = $type;
		$data['timestamp'] = '';
		$data['image'] = '';
		$data['time'] = '';
		$data['who'] = '';
		$data['number'] = '';
		$data['taken'] = '';
		$data['audience'] = '';
		$data['why'] = '';
		$data['relationship'] = '';
		$data['edit'] = '';
		$data['genre'] = '';
		
		if($id > 0){
		    $array = array('id' => $id, 'user_id' => $_SESSION["userid"]);
			$beginner_image = $this->db->where($array)->get('images')->row();
			
			if(!isset($beginner_image)) redirect('client/beginner_image');
			
			$data['timestamp'] = $beginner_image->timestamp;
			$data['who'] = $beginner_image->who;
			$data['time'] = $beginner_image->time;
			$data['number'] = $beginner_image->number;
			$data['taken'] = $beginner_image->taken;
			$data['audience'] = $beginner_image->audience;
			$data['why'] = $beginner_image->why;
			$data['relationship'] = $beginner_image->relationship;
			$data['edit'] = $beginner_image->edit;
			$data['genre'] = $beginner_image->genre;
			$data['image'] = $beginner_image->image;
		}else{
			$data['beginner_image'] = $this->db->where('user_id',$_SESSION["userid"])->get('images')->result();
		}
		
		$this->load->view('client/components/sidebar');
		$this->load->view('client/pages/beginner_image',$data);
		$this->load->view('client/components/footer');
	}*/



	public function add_image(){
		$data = $this->input->post();
		unset($data['submit']);
		
		if (!empty($_FILES['image']['name'])) {
            $val = $this->uploadImage('image','test'); //beginner_image/gallery
            //$val == TRUE || redirect('client/beginner_image');
            if($val == TRUE) $data['image'] = $val['path'];
        }
        
        if(empty($data['image'])) unset($data['image']);
        
        $data['user_id'] = $_SESSION["userid"];
        
		// 1 beginner, 2 advanced
		$membership_type = ($this->db->where('id',$_SESSION["userid"])->get('user')->row('membership') <= 2) ? 1: 2;
		
		$data['image_type'] =  $membership_type;
		
		$this->db->insert('images',$data);
		redirect('client/images');
	}

	public function update_image($id = null){
	    if($this->input->post()){
    		if($id > 0){
    		    
    		    $array = array('id' => $id, 'user_id' => $_SESSION["userid"]);
    	        $data['images'] = $this->db->where($array)->get('images')->result();
    	        
    	        if(isset($data['images']))
    	        {
        			$data = $this->input->post();
        			unset($data['submit']);
        			
        			if (!empty($_FILES['image']['name'])) {
        				$val = $this->uploadImage('image','test'); //beginner_image/gallery
        				//$val == TRUE || redirect('client/beginner_image);
        				if($val == TRUE){
        				    $data['image'] = $val['path'];
        				    unlink('/home/jnztesti/pix-guru.jnztesting.co.za/assets/images/test/' . $data['currentimage']);
        				    unset($data['currentimage']);
        				}
        			}
        			
        			if(empty($data['image'])) unset($data['image']);
        			
        			$array = array('id' => $id, 'user_id' => $_SESSION["userid"]);
        			$query = $this->db->where($array)->update('images', $data);
        			//echo $this->db->last_query();
        			//print_r($this->db->error());
        			//exit;
    	        }
    		}
	    }
	    redirect('client/images');
	}

	/*public function delete_beginner_image($id = null){
		if($id > 0){
		    $array = array('id' => $id, 'user_id' => $_SESSION["userid"]);
	        $data['beginner_image'] = $this->db->where($array)->get('beginner-image')->result();
	        
	        if(isset($data['beginner_image']))
	        {
    		    $array = array('id' => $id, 'user_id' => $_SESSION["userid"]);
    			$query = $this->db->where($array)->delete('beginner-image');
    			
    			unlink('/home/jnztesti/pix-guru.jnztesting.co.za/assets/images/test/' . $data['beginner_image']['image']);
	        }
			//redirect($_SERVER['HTTP_REFERER']);
			redirect('client/beginner_image');
		}
	}*/
	
	
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
    
    public function subscription() {
        if(!$_SESSION["userid"]) redirect('client_login');
	    
		$data['subscription'] = $this->db->join('memberships','memberships.id = user.membership','left')->join('payments','payments.userId = user.id','left')->where('user.id',$_SESSION["userid"])->get('user')->row();

		$this->load->view('client/components/sidebar');
		$this->load->view('client/pages/subscription',$data);
		$this->load->view('client/components/footer');
    }
    
    
}
