<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller {

    var $pfHost = '';
    
    function __construct()
    {
        parent::__construct();
        $this->pfHost = ( $this->test_mode() ? 'sandbox' : 'www' ) . '.payfast.co.za';
    }
    
    public function test_mode(){
        return  $payfast_data = $this->db->where('id',1)->get('payfast_settings')->row('demo_mode');
    }

    public function process($id){
        $payfast_data = $this->db->where('id',1)->get('payfast_settings')->row();
        if ( !$this->test_mode() )
        {
            $merchant_id = $payfast_data->merchant_id;;
            $merchant_key = $payfast_data->merchant_key;;
            $passphrase = $payfast_data->passphrase;
        }
        else
        {
            //Default sandbox account (recurring)
            $merchant_id = '10004002';
            $merchant_key = 'q1cd2rdny4a53';
            $passphrase = 'payfast';
        }

        $data[ 'action' ] = 'https://' . $this->pfHost . '/eng/process';
        $data['sandbox'] = $this->test_mode();

        $order = $this->db->where('id',$id)->get('voucher_orders')->row();

        $return_url = base_url('checkout/success');
        $cancel_url = base_url('checkout/cancel');
        $notify_url = base_url('payfast/callback');

        $name_first = $order->client_name;
        $name_last = '';
        $email_address = $order->client_email;
        $m_payment_id = $order->id;
        $amount = $order->voucher_value;
        $item_name = '#Voucher - R'.$order->voucher_value;
        $item_description = 'Voucher - '.$order->voucher_value;
        $custom_str1 = $order->id.'_'.$order->client_number;
        $signature = '';

        $payArray = array(
            'merchant_id' => $merchant_id, 'merchant_key' => $merchant_key, 'return_url' => $return_url,
            'cancel_url' => $cancel_url, 'notify_url' => $notify_url, 'name_first' => $name_first,
            'name_last' => $name_last, 'email_address' => $email_address, 'm_payment_id' => $m_payment_id,
            'amount' => $amount, 'item_name' => html_entity_decode( $item_name ),
            'item_description' => html_entity_decode( $item_description ), 'custom_str1' => $custom_str1
        );

        $secureString = '';
        foreach ( $payArray as $k => $v )
        {
            $secureString .= $k . '=' . urlencode( trim( $v ) ) . '&';
            $data[ $k ] = $v;
        }

        if ( !empty( $passphrase ) || $this->test_mode() )
        {
            $secureString = $secureString . 'passphrase=' . urlencode( $passphrase );
        }
        else
        {
            $secureString = substr( $secureString, 0, -1 );
        }

        $securityHash = md5( $secureString );
        $data[ 'signature' ] = $securityHash;
        $data[ 'user_agent' ] = 'CI3.0';

        $data['order'] = $order;
		$this->load->view('web/components/header');
		$this->load->view('web/pages/checkout',$data);
		$this->load->view('web/components/footer');
    }

   public function success(){
    $this->load->view('web/components/header');
    $this->load->view('web/pages/success');
    $this->load->view('web/components/footer');
   }

   public function cancel(){
    $this->load->view('web/components/header');
    $this->load->view('web/pages/cancellation');
    $this->load->view('web/components/footer');
   }
    
   public function check_payfast()
   {

    $fields = 'token=1234&m_payment_id=6&item_name=jamie&item_description=voucher&payment_status=COMPLETE&signature=7968768686';
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, base_url('payfast/callback'));
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS,
                $fields);

    // In real life you should use something like:
    // curl_setopt($ch, CURLOPT_POSTFIELDS, 
    //          http_build_query(array('postvar1' => 'value1')));

    // Receive server response ...
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $server_output = curl_exec($ch);

    curl_close ($ch);

    print_r($server_output);
   }
}
 