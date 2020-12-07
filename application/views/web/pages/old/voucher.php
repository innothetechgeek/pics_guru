    <div class="hero-wrap hero-bread" style="background-image: url(<?php echo base_url('assets/images/gift.jpg'); ?>);">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-0 bread" style="color: #fff"><b>GIFT VOUCHER OPTIONS</b></h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section contact-section bg">
      <div class="container">
        <div class="row block-9">
          <div class="col-md-6 order-md-last d-flex">
          <?php if($voucher->status == 0){ ?>
            <p class="price"><span>Sorry, This voucher is no longer active.</span></p>
          <?php }else{ ?>
            <form action="<?php echo base_url('web/checkout_voucher/'.$voucher->id);?>" method="post" class=" contact-form">
              <div class="row voucher-page"><br>
                  <p class="price"><span>Spoil the people you care about with a beauty treatment gift voucher</span></p>
                  <h2><?php echo $voucher->title; ?></h2>                  
                  <?php if($voucher->type == 'fixed'){ ?>
                    <h3>Voucher Value: R<?php echo $voucher->price; ?></h3>
                  <?php } ?>
                  <?php if($voucher->type == 'custom'){ ?>
                    <h3>Voucher Value: Custom Value</h3>
                  <?php } ?>
                  <div class="col-md-12 form-group">
                    <input type="text" class="form-control" placeholder="Recipient Name" name="recipient_name" required>
                  </div>
                  <?php if($voucher->type == 'custom'){ ?>
                  <div class="col-md-12 form-group">
                    <input type="number" steps="0.1" class="form-control" placeholder="Voucher Value" name="voucher_value" required >
                  </div>
                  <?php } ?>
                  <div class="col-md-12 form-group">
                    <input type="text" class="form-control" placeholder="Recipient Number" name="recipient_number">
                  </div>
                  <div class="col-md-12 form-group">
                    <input type="text" class="form-control" placeholder="Your Name" name="client_name" required>
                  </div>
                  <div class="col-md-12 form-group">
                    <input type="text" class="form-control" placeholder="Your Number" name="client_number">
                  </div>
                  <div class="col-md-12 form-group">
                    <input type="email" class="form-control" placeholder="Your Email" name="client_email" required>
                  </div>
                  <div class="form-group" style="margin: 0 auto;">
                    <input type="submit" value="Checkout" class="btn btn-voucher py-3 px-5">
                  </div>
              </div>
            </form>
              <?php } ?>
          </div>

          <div class="col-md-6 d-flex">
            <div class="info p-4"><br><br>
              <div class="row">
                <img src="<?php echo base_url('assets/images/gift-wrap.png');?>" alt="gemini beauty studio" style="width: 100%">
              </div>
           </div>
          </div>
        </div>
      </div>
    </section>
