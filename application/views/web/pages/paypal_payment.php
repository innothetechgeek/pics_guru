   <script
     src="https://www.paypal.com/sdk/js?client-id=AZgMhOj_DSvfjxbigSUl0-pXB1363LxBh5S-4cwZJuH1NshGGmnA1ECvuMi06683UwCyqFHuHPptr7o3&currency=EUR&vault=true&intent=capture">
  </script> 

    <div class="container pix-guru" style="padding-top: 0"> 
	
		<div class="col-md-4 col-offset-4 price text-center" >
		    	<h2 style="text-align: center; padding-bottom: 5%">Payment</h2>
		    <div style="  height: 100%;border-radius: 0;padding: 6% 7%;color: #fff; margin: 0;font-weight: 700 !important; background-color: #fff !important; box-shadow: navajowhite; background-color: #BFDFEA;border: 1px solid #222;}">
			<?php $type = explode("_", $membership->type); ?>
			
			<h3 class="member-text"><?php echo $type[0];?><br> <span><?php echo $type[1];?></span></h3>
			
			<div class="trial">Package</div>
			<hr>
			
			<h4 class="member-price" style="color: #353432">$<?php echo $membership->price; ?></h4>
			<div id="paypal-button-container"></div>
			</div>
		</div>

    </div>
    
    <br/><br/>
  <script>

paypal.Buttons( {

  createSubscription: function(data, actions) {

    return actions.subscription.create({

      'plan_id': '<?php echo $membership->paypal_plan_id;?>',
      'subscriber': {
        'name': {
            'given_name': '<?php echo $user->username; ?>',
        },
        'email_address': '<?php echo $user->email; ?>',
        }

    });

  },


  onApprove: function(data, actions) {
    console.log(data);
    
     $.ajax({
            url: "<?php echo base_url('register/register_user'); ?>",
            type: "POST",
            data: { 
                "username": '<?php echo $user->username;?>', 
                "email": '<?php echo $user->email;?>', 
                "password" : '<?php echo $user->password;?>', 
                "membership": '<?php echo $membership->id;?>',
                "orderId": data.orderID, 
                "billingToken": data.billingToken, 
                "subscriptionId": data.subscriptionID, 
                "facilitatorAccessToken": data.facilitatorAccessToken, 
            } ,
            success: function (response) {
    			console.log(response);
               // You will get response from your PHP page (what you echo or print)
            },
            error: function(jqXHR, textStatus, errorThrown) {
               console.log(textStatus, errorThrown);
            }    
     });     
    alert('You have successfully subscribed, Here\'s your subscriptionID: ' + data.subscriptionID + ' Please continue to the login screen.');

  }


}).render('#paypal-button-container');

  </script>


</body>
</html>