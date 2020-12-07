<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
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

    
    <link rel="stylesheet" href="<?php echo base_url('assets/css/icomoon.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css');?>">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.0.13/css/all.css'>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/my-style.css');?>">
    <style type="text/css">
        body{ font: 14px sans-serif;}
    </style>

</head>
<body>
<?php
$total_products = $this->db->get('products')->num_rows();
$total_client_vouchers = $this->db->get('voucher_orders')->num_rows();
$total_vouchers = $this->db->get('vouchers')->num_rows();
$total_emails = $this->db->get('emails')->num_rows();
?>
<div class="page-wrapper chiller-theme toggled">
  <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
    <i class="fas fa-bars"></i>
  </a>
  <nav id="sidebar" class="sidebar-wrapper">
    <div class="sidebar-content">
      <div class="sidebar-brand">
        <a><?php echo htmlspecialchars($_SESSION["username"]); ?></a>
        <div id="close-sidebar">
          <i class="fas fa-times"></i>
        </div>
      </div>
      <div class="sidebar-header">
        <div class="user-info">
           <img src="<?php echo base_url('assets/images/logo-light.png');?>" alt="gemini-logo" style="width: 100%">
          </span>
        </div>
      </div>
      <!-- sidebar-header  -->
   
      <!-- sidebar-search  -->
      <div class="sidebar-menu">
        <ul>
          <li class="header-menu">
            <span>General</span>
          </li>
          <li class="sidebar-dropdown">
            <a href="<?php echo base_url('client');?>">
              <i class="fa fa-tachometer-alt"></i>
              <span>Dashboard</span>
            </a>
          </li>
          <li class="sidebar-dropdown">
            <a href="<?php echo base_url('client/images');?>">
              <i class="fa fa-shopping-cart"></i>
              <span>View My Images</span>
            </a>
          </li>
          <li class="sidebar-dropdown">
            <a href="<?php echo base_url('client/messages');?>">
              <i class="fa fa-shopping-cart"></i>
              <span>View My Messages</span>
            </a>
          </li>
        <li class="sidebar-dropdown">
            <a href="<?php echo base_url('client/subscription');?>">
              <i class="fa fa-shopping-cart"></i>
              <span>My Subscription</span>
            </a>
          </li>

        </ul>
      </div>
      <!-- sidebar-menu  -->
    </div>
    <!-- sidebar-content  -->
    <div class="sidebar-footer">
      <a href="<?php echo base_url('home/do_logout');?>">
        <i class="fa fa-power-off"></i>
      </a>
    </div>
  </nav>
  <!-- sidebar-wrapper  -->
 
</div>
<!-- page-wrapper -->
<section class="content-welcome" style="background-image: url(https://jnztesting.co.za/pix-guru-design1/images/testimonials/testimonials.png);background-position: center bottom;background-repeat: no-repeat; background-attachment: fixed;">
    <?php 
        $username = '';
        if(isset($_SESSION['username'])){
            $username = $_SESSION["username"];
        }
    ?>
  <section class="heading-table img" style="background-image: url(<?php echo base_url('assets/images/bg_8.jpg');?>)">
      <div class="container">
          <div class="row justify-content-center mb-3 pb-3">
        <div class="col-md-12 text-center heading-section ftco-animate">
          <h2>Hi, <b><?php echo htmlspecialchars($username); ?></b>. Welcome to our site.</h2>
            <p>
              <a href="<?php echo base_url('login/forgot_password');?>" class="btn btn-warning">Reset Your Password</a>
              <a href="<?php echo base_url('home/do_logout');?>" class="btn btn-danger">Sign Out of Your Account</a>
          </p>
        </div>
      </div>
      </div>
  </section>