<!DOCTYPE html>
<html lang="en">
<head>
	<title>Hopleless Opus-Signup</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<!-- <link rel="icon" type="image/png" href="images/icons/favicon.ico"/> -->
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" href="css/util.css">
	<link rel="stylesheet" href="css/main.css">
	<link rel="icon" type="image/ico" href="img/acumen2.png" />
	<script src='https://www.google.com/recaptcha/api.js'></script>

<!--===============================================================================================-->
</head>
<body style="background-color: #999999;">
	
	<div class="limiter">
		<div class="container-login100">
			<div class="login100-more" style="background-image: url('images/bg-01_1.png');">
				<div class="bg d-none d-lg-block">
					<center><img src="img/acumen2.png" style=" margin-top: 14%;" width="500px" height="500px"></center>
					
				</div>
			</div>

			<div class="wrap-login100 p-l-50 p-r-50 p-t-72 p-b-50">
				<form class="login100-form validate-form" action="regcheck.php" method="POST">
					<span class="login100-form-title p-b-59">
						Sign Up
					</span>
					<div class="wrap-input100 validate-input" data-validate="Name is required" class="signup-form">
						<span class="label-input100" name="name">Full Name</span>
						<input class="input100" type="text" name="name" placeholder="Name...">
						<span class="focus-input100"></span>
					</div>
                    
                    <div class="wrap-input100 validate-input" data-validate="Registration Number is required">
						<span class="label-input100">Registration Number</span>
						<input class="input100" type="text" name="regno" placeholder="Registration Number...">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Registration Number is required">
						<span class="label-input100">College Name</span>
						<input class="input100" type="text" name="clgnm" placeholder="College Name...">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<span class="label-input100">Email</span>
						<input class="input100" type="text" name="email" placeholder="Email address...">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Contact Number is required">
						<span class="label-input100">Contact Number</span>
						<input class="input100" type="number" name="phone" placeholder="Contact Number...">
						<span class="focus-input100"></span>
					</div>
                        
					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="pwd" placeholder="*************">
						<span class="focus-input100"></span>
					</div>
					
					<div class="g-recaptcha" data-sitekey="6LcSTrwUAAAAABYn43lKT7-lOEiX-pPph2Q3igGZ"></div>
                        <!-- </div>  -->

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" type="submit" name="submit">
								Sign Up
							</button>
						</div>

						<a href="login.php" class="dis-block txt3 hov1 p-r-30 p-t-10 p-b-10 p-l-30">
							Sign in
							<i class="fa fa-long-arrow-right m-l-5"></i>
						</a>
					</div>
				</form>
				<?php
                            if($_GET['err']==1)
                            {
                                echo "Registration number already taken";
                            }
                            if($_GET['err']==2)
                            {
                                echo "NAME FIELD CANNOT BE EMPTY";
                            }
                            if($_GET['err']==3)
                            {
                                echo "Registration number invalid";
                            }
                             if($_GET['err']==4)
                            {
                                echo "REGISTRATION NO. FIELD CANNOT BE EMPTY";
                            }
                             if($_GET['err']==5)
                            {
                                echo "EMAIL ID FIELD CANNOT BE EMPTY";
                            }
                             if($_GET['err']==6)
                            {
                                echo "PASSWORD FIELD CANNOT BE EMPTY";
                            }
                             if($_GET['err']==7)
                            {
                                echo "NUMBER FIELD CANNOT BE EMPTY";
                            }
                            if($_GET['err']==8)
                            {
                                echo "NUMBER MUST BE 10 DIGITS";
                            }
                            if($_GET['err']==9)
                            {
                                echo "PASSWORD MUST BE ATLEAST 6 CHARACTERS LONG";
                            }
                            if($_GET['err']==10)
                            {
                                echo "Enter College Name";
                            }
                            if($_GET['err']==11)
                            {
                                echo "CAPTCHA IS WRONG";
                            }

                        ?>
			</div>
		</div>
	</div>
	
<!--===============================================================================================-->
	<!-- <script src="vendor/jquery/jquery-3.2.1.min.js"></script> -->
<!--===============================================================================================-->
	<!-- <script src="vendor/animsition/js/animsition.min.js"></script> -->
<!--===============================================================================================-->
	<!-- <script src="vendor/bootstrap/js/popper.js"></script> -->
	<!-- <script src="vendor/bootstrap/js/bootstrap.min.js"></script> -->
<!--===============================================================================================-->
	<!-- <script src="vendor/select2/select2.min.js"></script> -->
<!--===============================================================================================-->
	<!-- <script src="vendor/daterangepicker/moment.min.js"></script> -->
	<!-- <script src="vendor/daterangepicker/daterangepicker.js"></script> -->
<!--===============================================================================================-->
	<!-- <script src="vendor/countdowntime/countdowntime.js"></script> -->
<!--===============================================================================================-->
	<!-- <script src="js/main.js"></script> -->

</body>
</html>