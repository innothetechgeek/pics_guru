<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo base_url('assets/css/open-iconic-bootstrap.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/animate.css');?>">

    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap-datepicker.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/jquery.timepicker.css');?>">

    <link rel="stylesheet" href="<?php echo base_url('assets/css/pix-guru/main.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/pix-guru/util.css');?>">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{  padding: 20px; margin: 0 auto; height: 86vh; }
    </style>
</head>
<body>
    
	<div class="limiterclass login100-more " style="background-image: url('assets/images/pix-guru/bg-01.jpg');">
	    
		<div class="container-login100 container">
			<div class="row">
				<div class="col-md-12 text-center" >


					<div class=" p-l-50 p-r-50 p-t-72 p-b-50">
                        <form class="login100-form validate-form" action="<?php echo base_url('register/register_temp');?>" method="post">
							<div class=" login-w">
								<h2 class="sign-up-h2">Sign Up</h2>
                                <p class="sign-up-p">Please fill this form to create an account.</p>
								<div class="row">
									<div class="col-md-12 text-center" >
										<div class="wrap-input100 validate-input <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
											<i class="fa fa-envelope icon"></i>
											<input class="input100" type="text" name="username" placeholder="Username" required>
											<span class="help-block"><?php echo $username_err; ?></span>
										</div>
									</div>
									<div class="col-md-12 text-center" >
										<div class="wrap-input100 validate-input <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
											<i class="fa fa-envelope icon"></i>
											<input class="input100" type="text" name="email" placeholder="Email" required>
											<span class="help-block"><?php echo $username_err; ?></span>
										</div>
									</div>
									<div class="col-md-12 text-center" >
										<div class="wrap-input100 validate-input <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
											<i class="fa fa-lock icon"></i>
											<input class="input100" type="password" name="password" placeholder="Password">
											<span class="help-block"><?php echo $password_err; ?></span>
										</div>
									</div>
									<div class="col-md-12 text-center" >
										<div class="wrap-input100 validate-input <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
											<i class="fa fa-lock icon"></i>
											<input class="input100" type="password" name="confirm_password" placeholder=" Confirm Password">
											<span class="help-block"><?php echo $confirm_password_err; ?></span>
										</div>
									</div>
									<div class="col-md-12 text-center" style="display: none">
										<div class="wrap-input100 validate-input ">
											<i class="fa fa-lock icon"></i>
											<input class="input100" readonly type="text" name="membership" placeholder="Membership" value="<?php echo $membership;?>">
										</div>
									</div>
									<div class="col-md-12 text-center" >
  
										<button class="form-btn" type="submit"  value="Sign Up">
											Continue to Payment
										</button>
										<button class=" reset-btn" type="reset"  value="Reset">
											Reset
										</button>

									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>


    
