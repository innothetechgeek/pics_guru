<?php
  /*
    $product = $heading = $price = $description = $images = "";
    
    $query = "SELECT heading, price, description, images FROM products WHERE id = ".$_GET['id'];
    if($result = mysqli_query($link, $query))
    {
        while ($row = mysqli_fetch_row($result))
        {
            $heading = $row[0];
            $price = $row[1];
            $description = $row[2];
            $images = $row[3];
            
            $product = '<div class="col-lg-6 mb-5 ftco-animate">
                <a href="assets/images/test/'.$images.'" class="image-popup"><img style="width: 100%" src="assets/images/test/'.$images.'" class="img-fluid" alt="'.$heading.'"></a>
            </div>
            <div class="col-lg-6 product-details pl-md-5 ftco-animate">
                <h3>'.$heading.'</h3>
                <p class="price"><span>'.$price.'</span></p>
                <p>'.$description.'</p>
                <p><a href="https://www.fresha.com/nails-beauty-by-chanel-uhrq98pd/booking" target="_blank" class="btn btn-book">BOOK NOW</a></p>
            </div>';
        }
        mysqli_free_result($result);
    }
    */
    // ini_set('display_errors',1);
  
?>
   
  <div class="hero-wrap hero-bread bg-pink">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-0 bread"><b><?php echo $service->heading; ?></b></h1>
          </div>
        </div>
      </div>
    </div>

    <div class="goto-here"></div>


    <section class="ftco-section">
      <div class="container">
        <div class="row">
            
         <div class="col-lg-6 mb-5 ftco-animate">
                <a href="<?php echo base_url('assets/images/test/'.$service->images);?>" class="image-popup"><img style="width: 100%" src="<?php echo base_url('assets/images/test/'.$service->images);?>" class="img-fluid" alt="<?php echo $service->heading;?>"></a>
            </div>
            <div class="col-lg-6 product-details pl-md-5 ftco-animate">
                <h3><?php echo $service->heading; ?></h3>
                <p class="price"><span><?php echo $service->price; ?></span></p>
                <p><?php echo $service->description;?></p>
                <p><a href="https://www.fresha.com/nails-beauty-by-chanel-uhrq98pd/booking" target="_blank" class="btn btn-book">BOOK NOW</a></p>
            </div>
            
        </div>
      </div>
    </section>

    <section class="ftco-section ftco-section-more img" style="background-image: url(<?php echo base_url('assets/images/bg_5.jpg');?>);">
      <div class="container">
        <div class="row justify-content-center mb-3 pb-3">
          <div class="col-md-12 heading-section ftco-animate">
            <h2>BE YOU</h2>
          </div>
        </div>
      </div>
    </section>
