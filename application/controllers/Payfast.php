<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include( 'payfast_common.inc' );

class Payfast extends CI_Controller {

	public function callback(){
        $payfast_data = $this->db->where('id',1)->get('payfast_settings')->row();
        $sandbox = ($payfast_data->demo_mode == 1)? true: false;
        $merchant_id = $payfast_data->merchant_id;
        $merchant_key = $payfast_data->merchant_key;
        $passphrase = $payfast_data->passphrase;

        if ( $payfast_data->payfast_debug )
        {
            $debug = true;
        }
        else
        {
            $debug = false;
        }
        define( 'PF_DEBUG', $debug );

        $pfError = false;
        $pfErrMsg = '';
        $pfDone = false;
        $pfData = array();
        $pfParamString = '';

        if ( isset( $this->request->post[ 'm_payment_id' ] ) )
        {
            $order_id = $this->request->post[ 'm_payment_id' ];
        }
        else
        {
            $order_id = 0;
        }

        //// Notify PayFast that information has been received
        if ( !$pfError && !$pfDone )
        {
            header( 'HTTP/1.0 200 OK' );
            flush();
        }

        //// Get data sent by PayFast
        if ( !$pfError && !$pfDone )
        {
            pflog( 'Get posted data' );

            // Posted variables from ITN
            $pfData = pfGetData();
            $pfData[ 'item_name' ] = html_entity_decode( $pfData[ 'item_name' ] );
            $pfData[ 'item_description' ] = html_entity_decode( $pfData[ 'item_description' ] );
            pflog( 'PayFast Data: ' . print_r( $pfData, true ) );

            if ( $pfData === false )
            {
                $pfError = true;
                $pfErrMsg = PF_ERR_BAD_ACCESS;
            }
        }

         //// Verify security signature
         if ( !$pfError && !$pfDone )
         {
             pflog( 'Verify security signature' );
            //  $passphrase = !$this->config->get( 'payment_payfast_sandbox' ) ? $this->config->get( 'payment_payfast_passphrase') : 'payfast';
            $passphrase = 'payfast';
             if ( !empty( $passphrase ) || $sandbox )
             {
                 $pfPassphrase = $passphrase;
             }
             else
             {
                 $pfPassphrase = null;
             }
 
             $server = $sandbox ? 'test' : 'live';
 
             // If signature different, log for debugging
             if ( !pfValidSignature( $pfData, $pfParamString, $pfPassphrase, $server ) )
             {
                 $pfError = true;
                 $pfErrMsg = PF_ERR_INVALID_SIGNATURE;
             }
         }
 
         //// Verify source IP (If not in debug mode)
         if ( !$pfError && !$pfDone && !PF_DEBUG )
         {
             pflog( 'Verify source IP' );
 
             if ( !pfValidIP( $_SERVER[ 'REMOTE_ADDR' ] ) )
             {
                 $pfError = true;
                 $pfErrMsg = PF_ERR_BAD_SOURCE_IP;
             }
         }
         //// Get internal cart
         if ( !$pfError && !$pfDone )
         {
             // Get order data
             $this->load->model( 'checkout/order' );
             $order_info = $this->db->where('id',$order_id)->get('voucher_orders')->row();
 
             pflog( "Purchase:\n" . print_r( $order_info, true ) );
         }
 
         //// Verify data received
         if ( !$pfError )
         {
             pflog( 'Verify data received' );
 
             $pfValid = pfValidData( $this->pfHost, $pfParamString );
 
             if ( !$pfValid )
             {
                 $pfError = true;
                 $pfErrMsg = PF_ERR_BAD_ACCESS;
             }
         }
 
         //// Check data against internal order
         if ( !$pfError && !$pfDone )
         {
             pflog( 'Check data against internal order' );
 
             if ( empty( $pfData['token'] ) || strtotime( $pfData['custom_str2'] ) <= strtotime( gmdate( 'Y-m-d' ). '+ 2 days' ) )
             {
                 $amount = $order_info->voucher_value;
             }
            /*
             if ( !empty( $pfData['token'] ) && strtotime( $pfData['custom_str2'] ) > strtotime( gmdate( 'Y-m-d' ). '+ 2 days' ) )
             {
                 $recurring = $this->getOrderRecurringByReference( $pfData['m_payment_id'] );
                 $amount = $this->currency->format( $recurring['recurring_price'], 'ZAR', '', false );
             }
            */
             // Check order amount
             if ( !pfAmountsEqual( $pfData[ 'amount_gross' ], $amount ) )
             {
                 $pfError = true;
                 $pfErrMsg = PF_ERR_AMOUNT_MISMATCH;
             }
         }

          //// Check status and update order
        if ( !$pfError && !$pfDone )
        {
            pflog( 'Check status and update order' );

            $transaction_id = $pfData[ 'pf_payment_id' ];

            if ( empty( $pfData['token'] ) )
            {
                switch ($pfData['payment_status']) {
                    case 'COMPLETE':
                        pflog('- Complete');

                        // Update the purchase status
                        $order_status_id = 1; //completed

                        break;

                    case 'FAILED':
                        pflog('- Failed');

                        // If payment fails, delete the purchase log
                        $order_status_id = 2; //failed

                        break;

                    case 'PENDING':
                        pflog('- Pending');

                        // Need to wait for "Completed" before processing
                        break;

                    default:
                        // If unknown status, do nothing (safest course of action)
                        break;
                }
                if (!$order_info->status) {
                    // $this->model_checkout_order->addOrderHistory($order_id, $order_status_id);
                    $this->db->where('id',$pfData['m_payment_id'])->update('voucher_orders',array('status' => $order_status_id));
                } else {
                    // $this->model_checkout_order->addOrderHistory($order_id, $order_status_id);
                    $this->db->where('id',$pfData['m_payment_id'])->update('voucher_orders',array('status' => $order_status_id));
                }
                return true;
            }

            if ( isset( $pfData['token'] ) && $pfData['payment_status'] == 'COMPLETE' )
            {
                // $recurring = $this->getOrderRecurringByReference($pfData['m_payment_id']);

                // $this->db->query("INSERT INTO `" . DB_PREFIX . "order_recurring_transaction` SET `order_recurring_id` = '" . $recurring['order_recurring_id'] . "', `date_added` = NOW(), `amount` = '" . $pfData['amount_gross'] . "', `type` = '1'");

                //update recurring order status to active
                // $this->db->query("UPDATE `" . DB_PREFIX . "order_recurring` SET `status` = 1 WHERE `order_id` = '" . $pfData['custom_str4'] . "' AND `product_id` = '" . $pfData['custom_str5'] . "'");

                $order_status_id = 1;
                if ( !$order_info['status'] )
                {
                    // $this->model_checkout_order->addOrderHistory( $order_id, $order_status_id );
                    $this->db->where('id',$pfData['m_payment_id'])->update('voucher_orders',array('status' => $order_status_id));

                } else
                {
                    // $this->model_checkout_order->addOrderHistory( $order_id, $order_status_id );
                    $this->db->where('id',$pfData['m_payment_id'])->update('voucher_orders',array('status' => $order_status_id));
                }
                $this->notification_email($pfData['m_payment_id']);
                return true;
            }
        }
        else
        {
            // $this->model_checkout_order->addOrderHistory( $order_id, 3 );
            $this->db->where('id',$pfData['m_payment_id'])->update('voucher_orders',array('status' => 0));
            pflog( "Errors:\n" . print_r( $pfErrMsg, true ) );
            return false;
        }

        if ( $pfData['payment_status'] == 'CANCELLED' )
        {
            $this->db->where('id',$pfData['m_payment_id'])->update('voucher_orders',array('status' => 2));
        }


    }
    
    
    public function notifiation_email($id){
        $data = $this->db->where('id',$id)->get('voucher_orders')->row();
        
        if($data->status == 1){
         $subject  = 'Payment Received';
         $name = $data->client_name;
         $email = $data->client_email;
         $msg = "Thank you for your payment.<br/>You have successfully purchased the R".$data->voucher_value." for ".$data->recipient_name;
        
         $email_body = '
                <!Doctype html>
                <html lang="en">
                    <head>
                        <meta charset="utf-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
                        <title>Gemini Beauty Studio :: Contact Form</title>
                    </head>
                    <body bgcolor="#fff">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                                <td style="padding: 0 0 30px 0;">
            
                                    <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border: 1px solid #cccccc; border-collapse: collapse;">
                                        <tr>
                                            <td align="center" bgcolor="#222" style="padding: 40px 0 30px 0; color: #FFF; font-size: 28px; font-weight: bold; font-family: Arial, sans-serif;">
                                                 <h2>Gemini Beauty Studio Enquiry </h2>
                                            </td>
            
            
                                        </tr>
                                        <tr>
                                            <td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
                                                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                    <tr>
                                                        <td style="color: #222; font-family: Arial, sans-serif; font-size: 24px;">
                                                            <b>Voucher Purchased</b>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding: 20px 0 30px 0; color: #7B6C63; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
                                                                <table width="100%">
                                                            <tr>
                                                                <td><strong>Subject</strong></td>
                                                                <td>'.$subject.'</td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Name</strong></td>
                                                                <td>'.$name.'</td>
                                                            </tr>
            
                                                            <tr>
                                                                <td><strong>Email</strong></td>
                                                                <td>'.$email.'</td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Message</strong></td>
                                                                <td>
                                                                    '.nl2br($msg).'
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
    
        
    
            $config['useragent'] = 'GeminiBeauty';
    		$config['mailtype'] = "html";
    		$config['newline'] = "\r\n";
    		$config['charset'] = 'utf-8';
    		$config['wordwrap'] = TRUE;
    
        	$this->load->library('email', $config);
    		$this->email->from('no-reply@geminibeauty.co.za', 'Gemini Beauty');
    		$this->email->to($email);
    	
    		$this->email->subject($subject);
    		$this->email->message($email_body);
    
    		$send = $this->email->send();
    		if ($send) {
    			// return $send;
    // 			return true;
    			echo 'email sent';
    		} else {
    			// $error = show_error($this->email->print_debugger());
    			// return $error;
    // 			return false;
                echo 'email failed';
    		}
        }else{
            echo 'not ready yet';
        }
		
    }

}
