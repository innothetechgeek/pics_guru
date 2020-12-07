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
    $products = $this->db->order_by('heading','asc')->get('products')->result();
    foreach($products as $product){
      $productmenu .= '<a class="dropdown-item" href="'.base_url("web/services/{$product->id}").'">'.$product->heading.'</a>';
    }
    $servicesmenu = "";
    $services = $this->db->order_by('heading','asc')->get('services')->result();
    foreach($services as $service){
      $servicesmenu .= '<a class="dropdown-item" href="'.base_url("web/products/{$service->id}").'">'.$service->heading.'</a>';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <title>PIX-GURU</title>
    
    <meta name="description" content="Thousands of photography training programs can be bought or followed on-line today. But, nowhere will you find a website dedicated to giving feedback 
    on your photos! This is the aim of Pix-Guru. To give you honest and creative feedback enabling you to become a PIX-GURU!">
    <meta name="keywords" content="photography critique, photography membership program, photography training program, photography feedback/critique, 
    beginner photography training, advance photography training, pix-guru, pix-guru photography training, photography day trip ">
    <meta name="author" content="Michele Brumme - JNZ Software">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/pix-guru/animate.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/pix-guru/bootstrap.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/pix-guru/font-awesome.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/pix-guru/owl.carousel.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/pix-guru/chosen.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/pix-guru/lightbox.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/pix-guru/pe-icon-7-stroke.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/pix-guru/blog.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/pix-guru/jquery.mCustomScrollbar.css');?>">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/pix-guru/magnific-popup.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/pix-guru/style.css');?>">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400italic,400,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto:300,100,100italic,300italic,400,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
    
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
    	//$(document).ready(function(){
    //		$("#myModal").modal('show');
    //	});
        $(window).load(function(){
            setTimeout(function() {
                    $('#myModal').modal('show');
            }, 5000);
        });

    </script>
</head>
<body class="" style="    background: url(assets/images/pix-guru/backgrounds.png);background-position: center; background-attachment: fixed;}">
	<div id="box-mobile-menu" class="box-mobile-menu full-height full-width">
		<div class="box-inner">
			<span class="close-menu"><span class="icon pe-7s-close"></span></span>
		</div>
	</div>
	<header id="header" class="header style2">
		<div class="main-header">
			<div class="container">
				<div class="main-menu-wapper">
					<div class="row">
						<div class="col-sm-12 col-md-4 logo-wapper">
							<div class="logo">
								<a href="index.html"><img src="https://pix-guru.com/assets/images/pix-guru/logos/logo.png" alt="Pix-Guru"></a>
							</div>
						</div>
						<div class="col-sm-12 col-md-8 menu-wapper">
							<ul class="boutique-nav main-menu clone-main-menu">                                      
								<li class=" active menu-item-has-children item-megamenu">
									<a href="<?php echo base_url('index');?>">Home</a>
								</li>
								<li class=" menu-item-has-children item-megamenu">
									<a href="<?php echo base_url('web/membership');?>">Critique</a>
								</li>
								<li class="menu-item-has-children item-megamenu">
									<a href="<?php echo base_url('about');?>">About Us</a>
								</li>
								<li class=" menu-item-has-children item-megamenu">
									<a href="<?php echo base_url('gallery');?>">Gallery</a>
								</li>
								<li class=" menu-item-has-children item-megamenu">
									<a href="<?php echo base_url('contact');?>">Contact Us</a>
								</li>
								<li class=" menu-item-has-children item-megamenu">
									<a href="<?php echo base_url('client');?>">Login</a>
								</li>
							</ul>
							<span class="mobile-navigation"><i class="fa fa-bars"></i></span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
	<!-- ./Header -->



    <!-- END nav -->