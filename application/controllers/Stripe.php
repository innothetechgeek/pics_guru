<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once('Stripe/init.php');

class Stripe extends CI_Controller {

    
    public function processPayment(){

        // Set your secret key. Remember to switch to your live secret key in production!
        // See your keys here: https://dashboard.stripe.com/account/apikeys
        $app =  \Stripe\Stripe::setApiKey('sk_test_51HueDxAsgKxZZ0EMjkHJjmxbiKoJCLHyXkqMsZtC5GqVNEdgP5u26cPYRVxXZjAEe2pJCExgQQowBtzwXZzXGgsM008erq5Pgq');

        echo $this->input->post('paymentMethodId');

        return;
        //Set the default payment method on the customer
       $customer = \Stripe\Customer::create([
            'email' => $this->input->post('email'),
            'name' => $this->input->post('username'),
            'invoice_settings' => [
                'default_payment_method' => 'CARDS'
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

      //  return $response->withJson($subscription);

      echo json_encode($subscription);
    }

    
}
