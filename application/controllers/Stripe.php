<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include( 'payfast_common.inc' );

class Stripe extends CI_Controller {

    
    public function process_payment(){

        // Set your secret key. Remember to switch to your live secret key in production!
        // See your keys here: https://dashboard.stripe.com/account/apikeys
        \Stripe\Stripe::setApiKey('sk_test_51HueDxAsgKxZZ0EMjkHJjmxbiKoJCLHyXkqMsZtC5GqVNEdgP5u26cPYRVxXZjAEe2pJCExgQQowBtzwXZzXGgsM008erq5Pgq');

        $app->post('/create-checkout-session', function(Request $request, Response $response, array $args) {
        $body = json_decode($request->getBody());

        try {
            // See https://stripe.com/docs/api/checkout/sessions/create
            // for additional parameters to pass.
            // {CHECKOUT_SESSION_ID} is a string literal; do not change it!
            // the actual Session ID is returned in the query parameter when your customer
            // is redirected to the success page.
            $checkout_session = \Stripe\Checkout\Session::create([
            'success_url' => 'https://example.com/success.html?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => 'https://example.com/canceled.html',
            'payment_method_types' => ['card'],
            'mode' => 'subscription',
            'line_items' => [[
                'price' => $body->priceId,
                // For metered billing, do not pass quantity
                'quantity' => 1,
            ]],
            ]);
        } catch (Exception $e) {
            return $response->withJson([
            'error' => [
                'message' => $e->getError()->message,
            ],
            ], 400);
        }

        return $response->withJson(['sessionId' => $checkout_session['id']]);
        });
    }

    
}
