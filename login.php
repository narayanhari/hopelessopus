<?php
	include_once 'config.php';
	include_once 'validations.php';
	session_start();
    session_unset();
    session_destroy();
    session_start();
    $errors=[];

    $message="";

	if(isset($_POST['submit'])){ 
    include_once 'config.php';
    $regno= mysqli_real_escape_string($conn, $_POST["regno"]);
    $pwd=mysqli_real_escape_string($conn, $_POST["pwd"]);
    //$pass=password_hash($pwd, PASSWORD_DEFAULT); 
    // echo "$pass is password";
    $fields_required=["regno","pwd"];
        foreach ($fields_required as $field) {
            if(!has_presence(trim($_POST[$field]))){
                $errors[$field]= $field . " can't be empty";
            }
        }

        if(empty($errors)) {
        	$sql = "SELECT * FROM login WHERE regno='$regno' and pass='$pwd' ";
	        $result = mysqli_query($conn, $sql);
	        $resultCheck = mysqli_num_rows($result);

	        if($resultCheck < 1){
            $message = "Wrong Credentials";
        }else{
                    $_SESSION['regno']= $regno;
                    $_SESSION['log']=911;
                    header("Location: story.php");
                    exit();
        }
        }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Hopeless Opus-Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
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
	<link rel="stylesheet" href="css/utillog.css">
	<link rel="stylesheet" href="css/mainlog.css">
	<link rel="icon" type="image/ico" href="img/acumen2.png" />
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<h1><?php echo $message; ?></h1>
			<div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33">
				<form class="login100-form validate-form flex-sb flex-w" action="login.php" method="POST">
					<span class="login100-form-title p-b-59" >
						LOGIN
					</span>
					<div class="p-t-31 p-b-9">
						<span class="txt1">
							Registration Number
						</span>
					</div>
					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="regno" >
						<span class="focus-input100"></span>
					</div>
					
					<div class="p-t-13 p-b-9">
						<span class="txt1">
							Password
						</span>

					</div>
					<div class="wrap-input100 validate-input">
						<input class="input100" type="password" name="pwd" >
						<span class="focus-input100"></span>
					</div>

					<div class="container-login100-form-btn m-t-17">
						<button class="login100-form-btn" type="submit" name="submit">
							Log In
						</button>
					</div>
					<p style="font-size: 16px"><?php echo error_report($errors);?></p>
					<div class="w-full text-center p-t-55">
						<span class="txt2">
							Not a member?
						</span>

						<a href="signup.php?err=0" class="txt2 bo1">
							Sign up now
						</a>
					</div>
				</form>

				
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
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