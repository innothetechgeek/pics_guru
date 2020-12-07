<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends CI_Controller {

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
	    $data['newsletter'] = $this->db->where('id',2)->get('newsletter')->row();
	   // echo json_encode($data); exit;
		$this->load->view('web/components/header');
		$this->load->view('web/pages/index', $data);
		$this->load->view('web/components/footer');
	}
	public function critique()
	{
		$this->load->view('web/components/header');
		$this->load->view('web/pages/critique');
		$this->load->view('web/components/footer');
	}
	public function gallery()
	{
		$this->load->view('web/components/header');
		$this->load->view('web/pages/gallery');
		$this->load->view('web/components/footer');
	}
	public function blog()
	{
	   $data['post'] = $this->db->get('posts')->result();
        // print_r($data); exit;
		$this->load->view('web/components/blogheader');
		$this->load->view('web/pages/blog',$data);
		$this->load->view('web/components/footer');
	}

    public function error()
	{
		$this->load->view('web/pages/404');
	}


	public function about()
	{
		$this->load->view('web/components/header');
		$this->load->view('web/pages/about');
		$this->load->view('web/components/footer');
	}

	public function portfolio()
	{
		$this->load->view('web/components/header');
		$this->load->view('web/pages/portfolio');
		$this->load->view('web/components/footer');
	}

	public function services($service_id)
	{
		
		$data['service'] = $this->db->where('id',$service_id)->get('products')->row();
		$this->load->view('web/components/header');
		$this->load->view('web/pages/services',$data);
		$this->load->view('web/components/footer');
	}
	
	public function products($product_id)
	{
		
		$data['product'] = $this->db->where('id',$product_id)->get('services')->row();
		$this->load->view('web/components/header');
		$this->load->view('web/pages/products',$data);
		$this->load->view('web/components/footer');
	}
	

	public function contact()
	{
		$data = [];
		$this->load->view('web/components/header');
		$this->load->view('web/pages/contact',$data);
		$this->load->view('web/components/footer');
	}
	
	public function privacy()
	{
		$this->load->view('web/components/header');
		$this->load->view('web/pages/privacy-policy',$data);
		$this->load->view('web/components/footer');
	}
	public function refund()
	{
		$this->load->view('web/components/header');
		$this->load->view('web/pages/refund',$data);
		$this->load->view('web/components/footer');
	}
	public function cookies()
	{
		$this->load->view('web/components/header');
		$this->load->view('web/pages/cookies',$data);
		$this->load->view('web/components/footer');
	}
	public function terms()
	{
		$this->load->view('web/components/header');
		$this->load->view('web/pages/terms',$data);
		$this->load->view('web/components/footer');
	}

	public function voucher($voucher_id)
	{
		
		$data['voucher'] = $this->db->where('id',$voucher_id)->get('vouchers')->row();
		$this->load->view('web/components/header');
		$this->load->view('web/pages/voucher',$data);
		$this->load->view('web/components/footer');
	}

	public function mail(){
		$data['name'] = $this->input->post('name');
		$data['email'] = $this->input->post('email');
		$data['subject'] = $this->input->post('subject');
		$data['message'] = $this->input->post('message');
        
        $email_body = '
                <!Doctype html>
                <html lang="en">
                    <head>
                        <meta charset="utf-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
                        <title>Pix Guru :: Contact Form</title>
                    </head>
                    <body bgcolor="#fff">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                                <td style="padding: 0 0 30px 0;">
            
                                    <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border: 1px solid #cccccc; border-collapse: collapse;">
                                        <tr>
                                            <td align="center" bgcolor="#222" style="padding: 40px 0 30px 0; color: #FFF; font-size: 28px; font-weight: bold; font-family: Arial, sans-serif;">
                                                 <h2>Pix Guru Enquiry </h2>
                                            </td>
            
            
                                        </tr>
                                        <tr>
                                            <td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
                                                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                    <tr>
                                                        <td style="color: #222; font-family: Arial, sans-serif; font-size: 24px;">
                                                            <b>Contact Form</b>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding: 20px 0 30px 0; color: #7B6C63; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
                                                                <table width="100%">
                                                            <tr>
                                                                <td><strong>Subject</strong></td>
                                                                <td>'.$data['subject'].'</td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Name</strong></td>
                                                                <td>'.$data['name'].'</td>
                                                            </tr>
            
                                                            <tr>
                                                                <td><strong>Email</strong></td>
                                                                <td>'.$data['email'].'</td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Message</strong></td>
                                                                <td>
                                                                    '.nl2br($data['message']).'
                                                                </td>
                                                            </tr>
            
                                                        </table>
                                                                                </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td bgcolor="#222" style="padding: 30px 30px 30px 30px;">
                                                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                    <tr>
                                                        <td style="color: #ffffff; font-family: Arial, sans-serif; font-size: 14px;" width="100%">
                                                          &copy; ' . date('Y') . '
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </body>
                </html>
        
            ';
            
		$result = $this->send_email(['from' => $data['name'],
									 'subject' => $data['subject'], 
									 'message' => $email_body, 
									 'resource_file' => '']);
		$data['status'] = $result;
		$this->db->insert('emails', $data);
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function checkout_voucher($id){
		$post_data = $this->input->post();
		$data = $post_data;
		$data['voucher_id'] = $id;
		$voucher = $this->db->where('id',$id)->get('vouchers')->row();
		if($voucher->status == 1){
			$data['voucher_type'] = $voucher->type;
			if($voucher->type == 'fixed'){
				$data['voucher_value'] = $voucher->price;
			}elseif($voucher->type == 'custom'){
				$data['voucher_value'] = $post_data['voucher_value'];
			}

			$query = $this->db->insert('voucher_orders',$data);
		}else{
			redirect($_SERVER['HTTP_REFERER']);
		}
		if($query){
			$order_id = $this->db->insert_id();
			redirect('checkout/process/'.$order_id);
		}else{
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	public function send_email($params){
		// Send email
		$config['useragent'] = 'Pixguru';
		$config['mailtype'] = "html";
		$config['newline'] = "\r\n";
		$config['charset'] = 'utf-8';
		$config['wordwrap'] = TRUE;

		$this->load->library('email', $config);
		$this->email->from($params['from'], 'WebForm');
		$this->email->to('	letstalk@pix-guru.com');
		// if(isset($params['cc_email'])){
		// 	$this->email->cc($params['cc_email']);
		// }
		$this->email->subject($params['subject']);
		$this->email->message($params['message']);
		if ($params['resource_file'] != '') {
			$this->email->attach($params['resourceed_file']);
		}
		$send = $this->email->send();
		if ($send) {
			// return $send;
			return true;
		} else {
			// $error = show_error($this->email->print_debugger());
			// return $error;
			return false;
		}
	}

	public function membership() {
		$data['memberships'] = $this->db->get('memberships')->result();
		$this->load->view('web/components/header');
		$this->load->view('web/pages/membership',$data);
		$this->load->view('web/components/footer');
	}
	
	public function apply_newsletter($id)
	{
	    if($id > 0){
	       $newsletter = $this->db->where('id',$id)->get('newsletter')->row();
	       
	       $this->db->insert('newsletter_signups', array('newsletter_heading'=> $newsletter->heading, 'contact_name' => $this->input->post('contact_name'), 'email' => $this->input->post('contact_email')));
	       $this->send_newsletter_signuped_email($this->db->insert_id());
	       redirect($_SERVER['HTTP_REFERER']);
	    }else{
	        redirect($_SERVER['HTTP_REFERER']);
	    }
	}
	
	public function send_newsletter_signuped_email($id){
	    $newsletter = $this->db->where('id',$id)->get('newsletter_signups')->row();
	    // Email stuff Here
	}
    
    
}
