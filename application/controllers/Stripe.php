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
                'price' => 'price_1HueKxAsgKxZZ0EMup4VtTg0',
            ],
            ],
            'expand' => ['latest_invoice.payment_intent'],
        ]);

        //$this->load->view('web/pages/success');
       // redirect('web/success');
    }
     

    public function successPage(){
        $this->load->view('web/pages/success');
    }

    
}
