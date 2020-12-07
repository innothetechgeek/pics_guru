<?php
  /*
    $variablesarray = explode("&",urldecode($_SERVER['QUERY_STRING']));
    foreach($variablesarray as $variable)
    {
        $variable = htmlentities($variable, ENT_QUOTES | ENT_HTML5, 'UTF-8');
        parse_str($variable);
        $variable = "";
    }
    
    
    $productmenu = "";
    $query = "SELECT id, heading FROM products ORDER BY heading ASC";
    if($result = mysqli_query($link, $query))
    {
        while ($row = mysqli_fetch_row($result))
        {
            $menuid = $row[0];
            $menutitle = $row[1];
            
            $productmenu .= '<a class="dropdown-item" href="product.php?id='.$menuid.'">'.$menutitle.'</a>';
            
            $menuid = $menutitle = "";
        }
        mysqli_free_result($result);
    }
    */
    $productmenu = "";
    $services = $this->db->order_by('heading','asc')->get('products')->result();
    foreach($services as $service){
      $productmenu .= '<a class="dropdown-item" href="'.base_url("web/services/{$service->id}").'">'.$service->heading.'</a>';
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Pix-Guru</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo base_url('assets/css/open-iconic-bootstrap.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/animate.css');?>">
    
    <link rel="stylesheet" href="<?php echo base_url('assets/css/owl.carousel.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/owl.theme.default.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/magnific-popup.css');?>">

    <link rel="stylesheet" href="<?php echo base_url('assets/css/aos.css');?>">

    <link rel="stylesheet" href="<?php echo base_url('assets/css/ionicons.min.css');?>">

    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap-datepicker.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/jquery.timepicker.css');?>">

    
    <link rel="stylesheet" href="<?php echo base_url('assets/css/flaticon.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/icomoon.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css');?>">
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
      <div class="container">
        <a class="navbar-brand" href="index.php">Pix-Guru</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active"><a href="<?php echo base_url('index');?>" class="nav-link">Home</a></li>
            <li class="nav-item"><a href="<?php echo base_url('about');?>" class="nav-link">About</a></li>
            <li class="nav-item"><a href="<?php echo base_url('portfolio');?>" class="nav-link">Portfolio</a></li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Services</a>
                <div class="dropdown-menu" aria-labelledby="dropdown04">
                  <?=$productmenu?>
                </div>
            </li>
            <li class="nav-item"><a href="<?php echo base_url('contact');?>" class="nav-link">Contact</a></li>
            <li class="nav-item"><a href="https://www.fresha.com/nails-beauty-by-chanel-uhrq98pd/booking?menu=true" class="nav-book nav-link">Book Now</a></li>

          </ul>
        </div>
      </div>
    </nav>
    <!-- END nav -->