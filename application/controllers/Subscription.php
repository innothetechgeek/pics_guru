<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require FCPATH . 'vendor/autoload.php';

use PayPal\Api\ChargeModel;
use PayPal\Api\Currency;
use PayPal\Api\MerchantPreferences;
use PayPal\Api\PaymentDefinition;
use PayPal\Api\Plan;
use PayPal\Api\Patch;
use PayPal\Api\PatchRequest;
use PayPal\Common\PayPalModel;
use PayPal\Api\Agreement;
use PayPal\Api\Payer;
use PayPal\Api\ShippingAddress;

class Subscription extends CI_Controller {

	private $apiContext;
// 	private $api_url = 'https://api.sandbox.paypal.com/v1/';
	private $api_url = 'https://api.paypal.com/v1/';
	private $client_id;
	private $client_secret;
	private $token;
	
    function __construct()
    {
        parent::__construct();
		$this->client_id = 'AZgMhOj_DSvfjxbigSUl0-pXB1363LxBh5S-4cwZJuH1NshGGmnA1ECvuMi06683UwCyqFHuHPptr7o3';
		$this->client_secret = 'EHaVMnpd14xRtFK9i4svFnxe1xT9uqt1T0z1Far4PrHexO8UqCzNB8Dqg8wQg-aVRdp-AA6-XXPwmsCS';
		// $this->client_id = 'ASd6O_j7qWSIlDEYZiuEc9J3dWE5cGgF5m-GKdWtJWvOYnpMdTDeC8WZ4-To5fbT5XYp0WPpX_lBDPBZ';
		// $this->client_secret = 'EBwdu2dh9Z1O8zCCaElw9SZHvLq8m4gCcy7EPtNAEyEdaVMq5TROTUkwXAEayu83agnNwGWLPSqJbR88';
		// $this->apiContext = new \PayPal\Rest\ApiContext(new \PayPal\Auth\OAuthTokenCredential($this->client_id, $this->client_secret));
    }
  
	public function submit_plan(){
		// if (! empty($_POST["subscribe"])) {
			// require_once "./Service/createPHPTutorialSubscriptionPlan.php";
		// }
		$this->create_billing_plan();
	}
  
	public function create_billing_plan() {
		// Create a new billing plan
		
		if (! empty($_POST["plan_name"]) && ! empty($_POST["plan_description"])) {
			$plan = new Plan();
			$plan->setName($_POST["plan_name"])
				->setDescription($_POST["plan_description"]);
			print_r($plan); exit;
			// Set billing plan definitions
			$paymentDefinition = new PaymentDefinition();
			$paymentDefinition->setName('Regular Payments')
				->setType('REGULAR')
				->setFrequency('DAY')
				->setFrequencyInterval('1')
				->setCycles('3')
				->setAmount(new Currency(array(
				'value' => 3,
				'currency' => 'USD'
			)));

			// Set charge models
			$chargeModel = new ChargeModel();
			$chargeModel->setType('SHIPPING')->setAmount(new Currency(array(
				'value' => 1,
				'currency' => 'USD'
			)));
			$paymentDefinition->setChargeModels(array(
				$chargeModel
			));

			// Set merchant preferences
			$merchantPreferences = new MerchantPreferences();
			$merchantPreferences->setReturnUrl(base_url('subscription/status?status=success'))
				->setCancelUrl(base_url('subscription/status?status=cancel'))
				->setAutoBillAmount('yes')
				->setInitialFailAmountAction('CONTINUE')
				->setMaxFailAttempts('0')
				->setSetupFee(new Currency(array(
				'value' => 1,
				'currency' => 'USD'
			)));

			$plan->setPaymentDefinitions(array(
				$paymentDefinition
			));
			$plan->setMerchantPreferences($merchantPreferences);

			try {
				$createdPlan = $plan->create($this->apiContext);
				
				    try {
						$patch = new Patch();
						$value = new PayPalModel('{"state":"ACTIVE"}');
						$patch->setOp('replace')
							->setPath('/')
							->setValue($value);
						$patchRequest = new PatchRequest();
						$patchRequest->addPatch($patch);
						$createdPlan->update($patchRequest, $this->apiContext);
						$patchedPlan = Plan::get($createdPlan->getId(), $this->apiContext);
						
						require_once "createPHPTutorialSubscriptionAgreement.php";
					} catch (PayPal\Exception\PayPalConnectionException $ex) {
						echo $ex->getCode();
						echo $ex->getData();
						die($ex);
					} catch (Exception $ex) {
						die($ex);
					}
	
			} catch (PayPal\Exception\PayPalConnectionException $ex) {
				echo $ex->getCode();
				echo $ex->getData();
				die($ex);
			} catch (Exception $ex) {
				die($ex);
			}
		}
	}
	
	public function create_agreement() {
		// Create new agreement
		$startDate = date('c', time() + 3600);
		$agreement = new Agreement();
		$agreement->setName('PHP Tutorial Plan Subscription Agreement')
			->setDescription('PHP Tutorial Plan Subscription Billing Agreement')
			->setStartDate($startDate);

		// Set plan id
		$plan = new Plan();
		$plan->setId($patchedPlan->getId());
		$agreement->setPlan($plan);

		// Add payer type
		$payer = new Payer();
		$payer->setPaymentMethod('paypal');
		$agreement->setPayer($payer);

		// Adding shipping details
		// $shippingAddress = new ShippingAddress();
		// $shippingAddress->setLine1('111 First Street')
			// ->setCity('Saratoga')
			// ->setState('CA')
			// ->setPostalCode('95070')
			// ->setCountryCode('US');
		// $agreement->setShippingAddress($shippingAddress);

		try {
			// Create agreement
			$agreement = $agreement->create($this->apiContext);
			
			// Extract approval URL to redirect user
			$approvalUrl = $agreement->getApprovalLink();
			
			header("Location: " . $approvalUrl);
			exit();
		} catch (PayPal\Exception\PayPalConnectionException $ex) {
			echo $ex->getCode();
			echo $ex->getData();
			die($ex);
		} catch (Exception $ex) {
			die($ex);
		}
	}
	
	public function status() {
		if (!empty($_GET['status'])) {
			if($_GET['status'] == "success") {
				$token = $_GET['token'];
				$agreement = new \PayPal\Api\Agreement();
				
				try {
					// Execute agreement
					$agreement->execute($token, $this->apiContext);
				} catch (PayPal\Exception\PayPalConnectionException $ex) {
					echo $ex->getCode();
					echo $ex->getData();
					die($ex);
				} catch (Exception $ex) {
					die($ex);
				}
			} else {
				echo "user canceled agreement";
			}
			exit;
		}
	}
	
	
	/* option 2 */
	public function get_token()
	{
	    exit;
		// print_r($this->apiContext);
		// die();
		$handle = curl_init();
		curl_setopt($handle, CURLOPT_URL, $this->api_url . 'oauth2/token');
		 curl_setopt($handle, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json', 'Authorization: Basic '. base64_encode($this->client_id . ':'. $this->client_secret)));
		// curl_setopt($handle, CURLOPT_HTTPHEADER, array(
            // 'Content-Type: application/json', 'Authorization: Basic '.$this->client_id . ':'. $this->client_secret));
		 // curl_setopt($handle, CURLOPT_USERPWD, $this->client_id.":".$this->client_id);  
			 // curl_setopt($handle, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($handle, CURLOPT_RETURNTRANSFER, 1);
		// curl_setopt($handle, CURLOPT_POST,1);
		curl_setopt($handle, CURLOPT_POSTFIELDS, http_build_query(array('grant_type' => 'client_credentials')));
		// print_r(curl_getinfo($handle));
		
		$response = curl_exec($handle);
		
		$resp = json_decode($response);
		
		if($response){
			if(isset($response->error)){
				// echo $response->description; die();
			}else{
				$this->token = $resp->access_token;
			}
		}
	}
	
	public function create_product($id) {
	  exit;
		$this->get_token();
		
		$info = $this->db->where('id',$id)->get('memberships')->row();
			
		if($info->type =='beginner_annual'){
			$post_fields = array(
				'name' => 'Beginner Annual',
				'description' => 'Beginner Annual Membership',
				'type' => 'Service',
				'category' => 'Software',
				'image_url' => base_url('assets/images/beginner_annual.png'),
				'home_url' => base_url(),
			);
			$plan['name']  = 'Basic Annual Plan';
			$plan['description'] = 'Advanced Annual Plan';
			$plan['cycle'] = 1;
			$plan['sequence'] = 1;
			$plan['interval'] = 'Year';
			$plan['interval_count'] = 1;
// 			$plan['product_id'] = $info->paypal_product_id;
// 			$plan['value'] = $info->price;
		}
		
		if($info->type =='beginner_monthly'){
			$post_fields = array(
				'name' => 'Beginner Monthly',
				'description' => 'Beginner Monthly Membership',
				'type' => 'Service',
				'category' => 'Software',
				'image_url' => base_url('assets/images/beginner_monthly.png'),
				'home_url' => base_url(),
			);
			$plan['name']  = 'Basic Monthly Plan';
			$plan['description'] = 'Basic Monthly Plan';
			$plan['cycle'] = 12;
			$plan['sequence'] = 1;
			$plan['interval'] = 'Month';
			$plan['interval_count'] = 1;
		}
		
		if($info->type =='advanced_monthly'){
			$post_fields = array(
				'name' => 'Advanced Monthly',
				'description' => 'Advaced Monthly Membership',
				'type' => 'Service',
				'category' => 'Software',
				'image_url' => base_url('assets/images/beginner_annual.png'),
				'home_url' => base_url(),
			);
			$plan['name'] = 'Advanced Monthly Plan';
			$plan['description'] = 'Advanced Monthly Plan';
			$plan['cycle'] = 12;
			$plan['sequence'] = 1;
			$plan['interval'] = 'Month';
			$plan['interval_count'] = 1;
		}
		
		if($info->type =='advanced_annual'){
			$post_fields = array(
				'name' => 'Advanced Annual',
				'description' => 'Advaced Annual Membership',
				'type' => 'Service',
				'category' => 'Software',
				'image_url' => base_url('assets/images/beginner_annual.png'),
				'home_url' => base_url(),
			);
			$plan['name']  = 'Advanced Annual Plan';
			$plan['description'] = 'Advanced Annual Plan';
			$plan['cycle'] = 1;
			$plan['sequence'] = 1;
			$plan['interval'] = 'Year';
			$plan['interval_count'] = 1;
		}		

// 			$this->create_plan($plan);
// 			exit;
        // 		print_r($plan); exit;

		
		$handle = curl_init();
		curl_setopt($handle, CURLOPT_URL, $this->api_url . 'catalogs/products');
		 curl_setopt($handle, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json','Authorization: Bearer '.$this->token));
			
		curl_setopt($handle, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($handle, CURLOPT_POST,1);
		curl_setopt($handle, CURLOPT_POSTFIELDS, json_encode($post_fields));
		$resp = curl_exec($handle);
		
		$response = json_decode($resp);
		print_r($response);
		if($response->name !== 'INVALID_REQUEST'){
			$product_id = $response->id;
			$name = $response->name;
			$description = $response->description;
// 			$type = $response->type;
// 			$category = $response->category;
// 			$image_url = $response->image_url;
// 			$home_url = $response->home_url;
			$create_time = $response->create_time;
// 			$update_time = $response->update_time;
			$links = $response->links;
			$plan['product_id'] = $product_id;
			$plan['value'] = $info->price;
			
			$this->db->where('id',$id)->update('memberships',array('paypal_product_id' => $product_id));
			$this->create_plan($plan);
		}
	}
	
	public function create_plan($plan) {
       exit;
		
		$post_fields = array(
			'product_id' => $plan['product_id'],
			'name' => $plan['name'],
			'description' => $plan['description'],
			'billing_cycles' => array(
				array(
					'frequency' => array('interval_unit' => $plan['interval'], 'interval_count' => $plan['interval_count']),
					'tenure_type' => 'REGULAR',
					'sequence' => $plan['sequence'],
					'total_cycles' =>$plan['cycle'],
					'pricing_scheme' => array(
							'fixed_price' => array(
								'value' => $plan['value'],
								'currency_code' => 'USD'
							),
						),
					),
			),
			'payment_preferences' => array(
			    "auto_bill_outstanding" => true,
                "setup_fee" => array(
                  "value" => "0",
                  "currency_code" => "USD"
                ),
                "setup_fee_failure_action" =>  "CONTINUE",
                "payment_failure_threshold" => 3,
                ),
                "taxes" =>  array (
                "percentage" => "0",
                "inclusive" => false
              ),
		);
        // echo json_encode($post_fields); exit;
		
		$handle = curl_init();
		curl_setopt($handle, CURLOPT_URL, $this->api_url . 'billing/plans');
	    curl_setopt($handle, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json','Accept: application/json','Authorization: Bearer '.$this->token));
			
		curl_setopt($handle, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($handle, CURLOPT_POST,1);
		curl_setopt($handle, CURLOPT_POSTFIELDS, json_encode($post_fields));
		$resp = curl_exec($handle);
		
		$response = json_decode($resp);
		
		if($resp){
		    print_r($resp);   
		}else{
		    echo 'No Response';
		    print_r($resp);
		}
		
	}
	
	public function list_products()
	{
	    exit;
	   // echo 'list_products'; die();
	    $this->get_token();
	    
		$handle = curl_init();
		curl_setopt($handle, CURLOPT_URL, $this->api_url . 'catalogs/products?page_size=12&page=1&total_required=true');
	    curl_setopt($handle, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json','Authorization: Bearer '.$this->token));
            
		curl_setopt($handle, CURLOPT_RETURNTRANSFER, 1);
		$response = curl_exec($handle);
		print_r($response);
	}
	
	public function list_plans()
	{
	    exit;
	   // echo 'list_products'; die();
	    $this->get_token();
	    
		$handle = curl_init();
		curl_setopt($handle, CURLOPT_URL, $this->api_url . 'billing/plans?page_size=12&page=1&total_required=true');
	    curl_setopt($handle, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json','Authorization: Bearer '.$this->token));
            
		curl_setopt($handle, CURLOPT_RETURNTRANSFER, 1);
		$response = curl_exec($handle);
		print_r($response);
	}
	
	public function show_plan($id) {
	    exit;
        $this->get_token();
	    
		$handle = curl_init();
		curl_setopt($handle, CURLOPT_URL, $this->api_url . 'billing/plans/'.$id);
        curl_setopt($handle, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json','Accept: application/json','Authorization: Bearer '.$this->token));
			
		curl_setopt($handle, CURLOPT_RETURNTRANSFER, 1);
		$response = curl_exec($handle);
		print_r($response);
	}
	
	public function update_plan($id) {
	    exit;
        $post_fields = array(
            "pricing_schemes" => array(
              array(
                  "billing_cycle_sequence" => 1,
                  "pricing_scheme" => array(
                "fixed_price" => array(
                  "value" =>  "12.95",
                  "currency_code" => "USD"
                ),
              ))
            )
      );
        // print_r(json_encode($post_fields)); exit;
       $this->get_token();
	    
		$handle = curl_init();
		curl_setopt($handle, CURLOPT_URL, $this->api_url . 'billing/plans/'.$id.'/update-pricing-schemes');
        curl_setopt($handle, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json','Accept: application/json','Authorization: Bearer '.$this->token));
			
		curl_setopt($handle, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($handle, CURLOPT_POST,1);
		curl_setopt($handle, CURLOPT_POSTFIELDS, json_encode($post_fields));
		$resp = curl_exec($handle);
		
		$response = json_decode($resp);
		
		if($resp){
		    print_r($resp);   
		}else{
		    echo 'No Response';
		    print_r($resp);
		}
		
	}
}
 