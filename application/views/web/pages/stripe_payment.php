
<script src="https://js.stripe.com/v3/"></script>

    <div class="container pix-guru" style="padding-top: 0"> 
	
		<div class="col-md-4 col-offset-4 price text-center" >
		    	<h2 style="text-align: center; padding-bottom: 5%">Payment</h2>
		    <div style="  height: 100%;border-radius: 0;padding: 6% 7%;color: #fff; margin: 0;font-weight: 700 !important; background-color: #fff !important; box-shadow: navajowhite; background-color: #BFDFEA;border: 1px solid #222;}">
			<?php $type = explode("_", $membership->type); ?>
			
			<h3 class="member-text"><?php echo $type[0];?><br> <span><?php echo $type[1];?></span></h3>
			
			<div class="trial">Package</div>
			<hr>
			
			<h4 class="member-price" style="color: #353432">R<?php echo $membership->price; ?></h4>
			<div id="stripe-button-container" >
        <button id="checkout" class = "member-btn">Subscribe</button>
      </div>
			</div>
		</div>

    </div>
    
    <br/><br/>
  <script>

  var createCheckoutSession = function(priceId) {
      return fetch("/create-checkout-session", {
        method: "POST",
        headers: {
          "Content-Type": "application/json"
        },
        body: JSON.stringify({
          priceId: priceId
        })
      }).then(function(result) {
        return result.json();
      });
  };

  document.getElementById("checkout")
    .addEventListener("click", function(evt) {
      createCheckoutSession(PriceId).then(function(data) {
        // Call Stripe.js method to redirect to the new Checkout page
        stripe
          .redirectToCheckout({
            sessionId: data.sessionId
          })
          .then(handleResult);
      });
  });

  </script>


</body>
</html>