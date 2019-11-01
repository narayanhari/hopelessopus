<?php
    function check_captcha() {
    $response = $_POST["g-recaptcha-response"];
    if(strlen($_POST["g-recaptcha-response"])==0)
    {
        return false;
    }
    $url = 'https://www.google.com/recaptcha/api/siteverify';
    $data = array(
        'secret' => '6LcSTrwUAAAAALht_jsVu65a2qBSNGUrojCnseQB',
        'response' => $_POST["g-recaptcha-response"]
    );
    $options = array(
        'http' => array (
            'method' => 'POST',
            'content' => http_build_query($data)
        )
    );
    $context  = stream_context_create($options);
    $verify = file_get_contents($url, false, $context);
    $captcha_success=json_decode($verify);
    if ($captcha_success->success==false) {
        return false;
    } else if ($captcha_success->success==true) {
        return true;
    }
}
?>
<?php
if(isset($_POST['submit'])){ 
    include_once 'config.php';
    
    $name=mysqli_real_escape_string($conn, $_POST['name']);
    $regno=mysqli_real_escape_string($conn, $_POST['regno']);
        $clgnm=mysqli_real_escape_string($conn, $_POST['clgnm']);
    $email=mysqli_real_escape_string($conn, $_POST['email']);
    $phone=mysqli_real_escape_string($conn, $_POST['phone']);
    $pwd=mysqli_real_escape_string($conn, $_POST['pwd']);
    $pass=password_hash($pwd, PASSWORD_DEFAULT); 
    $uid_query="SELECT regno FROM login WHERE regno='$regno'";
    $uid_result=mysqli_query($conn,$uid_query);
    $uid_row=mysqli_fetch_assoc($uid_result);
    $uid_count=mysqli_num_rows($uid_result);
    if(!isset($name) || $name=="")
        header("Location: signup.php?err=2");
    else if(!isset($regno) || $regno=="")
        header("Location: signup.php?err=4");
    else if(!isset($clgnm) || $clgnm=="")
        header("Location: signup.php?err=10");
    else if(!isset($phone) || $phone=="")
        header("Location: signup.php?err=7");
    else if(!isset($email) || $email=="")
        header("Location: signup.php?err=5");
    else if(!isset($pwd) || $pwd=="")
        header("Location: signup.php?err=6");
    else if($uid_count)
        header("Location: signup.php?err=1");
    else if(strlen($phone)!=10)
        header("Location: signup.php?err=8");
    else if(strlen($pwd)<6)
        header("Location: signup.php?err=9");
    else if(!check_captcha())
            {
                header("Location: signup.php?err=11");
            }   
    else{
        
        // $query="INSERT INTO login(Name, emailid, regno, pass, num,clgnm) VALUES ('{$name}','{$email}','{$regno}','{$pwd}','{$phone}','{$clgnm}')";
        
        $result = mysqli_query($conn, "INSERT INTO login(Name, emailid, regno, pass, num,clgnm) VALUES ('{$name}','{$email}','{$regno}','{$pwd}','{$phone}','{$clgnm}')");
        if($result)
        {
            header("Location: login.php");
            //
        }echo(mysql_error($conn));
    }echo "globe";
}
?>