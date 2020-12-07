<script src="https://js.stripe.com/v3/"></script>
<script>
  // Set your publishable key: remember to change this to your live publishable key in production
  // See your keys here: https://dashboard.stripe.com/account/apikeys
  let stripe = Stripe('pk_test_51HueDxAsgKxZZ0EMdkk2HEIhh8PVAnc33a9nTVsklMufJyWPU6yLagUAmC64MScL5Ea50gXNnr9xKdtPswUJ9Ieg005AB5xlY7');
  let elements = stripe.elements();
</script>

<style>
.payment-info-container {
    margin: 0;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-line-pack: center;
        align-content: center;
    -webkit-box-align: center;
        -ms-flex-align: center;
            align-items: center;
    -webkit-box-pack: center;
        -ms-flex-pack: center;
            justify-content: center;
    min-height: 50vh;
    -ms-flex-wrap: wrap;
        flex-wrap: wrap;
    font-family: 'Raleway';
}

.payment-title {
    width: 100%;
    text-align: center;
}

.form-container .field-container:nth-of-type(1) {
    grid-area: package;
}
.form-container .field-container:nth-of-type(2) {
    grid-area: name;
}

.form-container .field-container:nth-of-type(3) {
    grid-area: number;
}

.form-container .field-container:nth-of-type(4) {
    grid-area: subscribe;
}



.field-container input {
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
}

.field-container {
    position: relative;
}

.form-container {
    display: grid;
    grid-column-gap: 10px;
    grid-template-columns:350px;
    grid-template-rows: 70px 90px 90px 90px;
    grid-template-areas: "package package""name name""number number""subscribe subscribe";
    max-width: 400px;
    padding: 20px;
    color: #707070;
}

label {
    padding-bottom: 5px;
    font-size: 13px;
}

input {
    margin-top: 3px;
    padding: 15px;
    font-size: 16px;
    width: 100%;
    border-radius: 3px;
    border: 1px solid #dcdcdc;
}

.ccicon {
    height: 38px;
    position: absolute;
    right: 6px;
    top: calc(50% - 17px);
    width: 60px;
}
#card-element{
  border: 1px solid #c89438;
    padding: 14px 15px;
    color: #8c8c8c;
    font-size: 13px;
    max-width: 100%;
    background: transparent;
}

.member-btn{
max-width: 100%;
}



</style>

    <div class="container payment-info-container">
      
      <!-- stripe card elements  -->
      <form id="subscription-form"> 
          <!-- Elements will create input elements here -->
            <div class="form-container">
                <div class="field-container">
                    <label class ="trial">Package: <?php echo ucwords(str_replace('_', " ", $membership->type)) ?></label>
                </div>
                <div class="field-container">
                    <label for="name">Name</label>
                    <input id="name" maxlength="20" type="text" value = "<?php echo $user->username ?>">
                </div>
                
                <div class="field-container">
                    <label for="cardnumber">Card Number</label>
                    <div id="card-element"> 
                        <input id="cardnumber" type="text" pattern="[0-9]*" inputmode="numeric">
                    </div>
                   
                </div>
              <div class="field-container">
                <button class ="member-btn subscribe-btn" onClick = "createPaymentMethod()" style = "padding: 2% !important" type="submit">Subscribe</button>
              </div>
             
          </div>
        </form>
    </div>
    
    <br/><br/>
</div>

<script>
  function createPaymentMethod(){
    let priceId =  'prod_IVfgMwd1F4unb8';
     let billing_name = document.getElementById("name").value;
    let result = stripe.createPaymentMethod({
      type: 'card',
      card: card,
      billing_details: {
        name: billing_name,
      },
    });
     
     if (result.error) {
        alert('results has error');
        displayError(result);
      } else {
        alert(result.paymentMethod.id);
        createSubscription({
          paymentMethodId: result.paymentMethod.id,
          priceId: priceId,
        });
      }
    }
    
    var style = {'background-color':'red'};
    let card = elements.create('card',{'style': style }); //can passing card css tyle as a second param, will do that later...
    card.mount('#card-element');

    // validates card numbers
    card.on('change', function (event) {
        displayError(event);
      });
      function displayError(event) {
        changeLoadingStatePrices(false);
        let displayError = document.getElementById('card-element-errors');
        if (event.error) {
          displayError.textContent = event.error.message;
        } else {
          displayError.textContent = '';
        }
      }

    var form = document.getElementById('subscription-form');

    form.addEventListener('submit', function (ev) {
          ev.preventDefault();
    });

    
    function createSubscription($payment_method) {

      alert('about to create subscription');
    //  document.getElementById("myText").value;
           let baseUrl = "<?php echo base_url(); ?>";
            let priceId =  'prod_IVfgMwd1F4unb8';
            return (
              fetch(baseUrl+'/process-stripe-payment', {
                method: 'post',
                headers: {
                  'Content-type': 'application/json',
                },
                body: JSON.stringify({
                  priceId: priceId,
                }),
              })
                .then((response) => {
                  return response.json();
                })
                // If the card is declined, display an error to the user.
                .then((result) => {
                  if (result.error) {
                    // The card had an error when trying to attach it to a customer.
                    throw result;
                  }
                  return result;
                })
                // Normalize the result to contain the object returned by Stripe.
                // Add the additional details we need.
                .then((result) => {
                  return {
                    priceId: priceId,
                    subscription: result,
                  };
                })
                // No more actions required. Provision your service for the user.
              //  .then(onSubscriptionComplete)
                .catch((error) => {
                  // An error has happened. Display the failure to the user here.
                  // We utilize the HTML element we created.
                  showCardError(error);
                })
            );
      }
</script>
</body>
</html>