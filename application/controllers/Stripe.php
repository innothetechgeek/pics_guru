<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once('Stripe/init.php');

class Stripe extends CI_Controller {

    
    public function processPayment(){

        // Set your secret key. Remember to switch to your live secret key in production!
        // See your keys here: https://dashboard.stripe.com/account/apikeys
        $app =  \Stripe\Stripe::setApiKey('sk_test_51HueDxAsgKxZZ0EMjkHJjmxbiKoJCLHyXkqMsZtC5GqVNEdgP5u26cPYRVxXZjAEe2pJCExgQQowBtzwXZzXGgsM008erq5Pgq');


        $requestBody = json_decode(file_get_contents('php://input'));
    
        //creates customer
       $customer = \Stripe\Customer::create([
           
            'name' =>$requestBody->customer->name,
            'email' => $requestBody->customer->email,
           
       ]);

        $payment_method = \Stripe\PaymentMethod::retrieve($requestBody->paymentMethodId->paymentMethodId);
        //attach payment method to customer  
        $payment_method->attach([
            'customer' => $customer->id,
        ]);

        // Set the default payment method on the customer
        \Stripe\Customer::update($customer->id, [
            'invoice_settings' => [
            'default_payment_method' => $requestBody->paymentMethodId->paymentMethodId
            ]
        ]);

         // Create the subscription
        $subscription = \Stripe\Subscription::create([
            'customer' => $customer->id,
            'items' => [
            [
                'price' =>  $requestBody->priceId,
            ],
            ],
            'expand' => ['latest_invoice.payment_intent'],
        ]);
    
        //deletes temp user
       $this->db->delete('temp_user', array('email' =>$requestBody->customer->email));
    }
     

    public function successPage(){
        $this->load->view('web/pages/success');
    }

    
}
