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
        <?php if($sandbox) { ?>
                <div class="alert alert-danger alert-dismissible"><i class="fa fa-exclamation-circle"></i> You are currently using the payfast sandbox environment, payments will not be linked to orders.</div>
            <?php } ?>
            <div class="col-md-6 order-md-last d-flex">
                <h2>Order</h2>
                <h3><?php echo $order->voucher_value;?></h3>
                <form action="<?php echo $action ;?>" method="post">
                    <input type="hidden" name="merchant_id" value="<?php echo $merchant_id ;?>">
                    <input type="hidden" name="merchant_key" value="<?php echo $merchant_key ;?>">
                    <input type="hidden" name="return_url" value="<?php echo $return_url ;?>">
                    <input type="hidden" name="cancel_url" value="<?php echo $cancel_url ;?>">
                    <input type="hidden" name="notify_url" value="<?php echo $notify_url ;?>">
                    <input type="hidden" name="name_first" value="<?php echo $name_first ;?>">
                    <input type="hidden" name="name_last" value="<?php echo $name_last  ;?>">
                    <input type="hidden" name="email_address" value="<?php echo $email_address ;?>">
                    <input type="hidden" name="m_payment_id" value="<?php echo $m_payment_id ;?>">
                    <input type="hidden" name="amount" value="<?php echo $amount ;?>">
                    <input type="hidden" name="item_name" value="<?php echo $item_name ;?>">
                    <input type="hidden" name="item_description" value="<?php echo $item_description ;?>">
                    <input type="hidden" name="custom_str1" value="<?php echo $custom_str1 ;?>">

                    <input type="hidden" name="signature" value="<?php echo $signature ;?>">

                    <div class="buttons">
                        <div class="">
                        <img src="<?php echo base_url('assets/images/payment/payfast.png');?>" /><input type="submit" value="Pay Now" class="btn btn-primary">
                        </div>
                    </div>
                </form>
            </div>

        <div class="col-md-6 d-flex">
        <div class="info p-4"><br><br>
            <div class="row">
            <img src="<?php echo base_url('assets/images/gift-wrap.png');?>" alt="gemini beauty studio" style="width: 100%">
            </div>
        </div>
        </div>
    </div>
</section>