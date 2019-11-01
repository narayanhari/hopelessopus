<?php

session_start();

if(isset($_POST['submit'])){ 
    include_once '../config.php';
    $regno= mysqli_real_escape_string($conn, $_POST['regno']);
    $pwd=mysqli_real_escape_string($conn, $_POST['pwd']);
    // $pwd=$_POST['pwd'];
    $sql = "SELECT * FROM login WHERE regno='$regno' and pass='$pwd' ";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);

        if($resultCheck < 1){
            header("Location: ../login.php?login=error");
            exit();
        }else{
                    $_SESSION['regno']= $regno;
                    $_SESSION['log']=911;
                    // $_SESSION['email']= $row['email'];
                    // $_SESSION['phone']= $row['phone'];
                    // $_SESSION['score']= $row['score'];
                    // $_SESSION['status']= $row['status'];
                    header("Location: ../story.php");
                    exit();
            // if($row = mysqli_fetch_assoc($result)){
            //     $hashedPwdCheck= password_verify($pwd, $row['pass']);
            //     if($hashedPwdCheck == false){
            //         header("Location: ../login.php?login=ersror");
            //         exit();
            //     }elseif($hashedPwdCheck == true){
            //         $_SESSION['name']= $row['name'];
            //         $_SESSION['regno']= $row['regno'];
            //         // $_SESSION['email']= $row['email'];
            //         // $_SESSION['phone']= $row['phone'];
            //         // $_SESSION['score']= $row['score'];
            //         // $_SESSION['status']= $row['status'];
            //         header("Location: ../login.php?login=success");
            //         exit();
            //     }
            // }
        }
    
}else{
    header("Location: ../index.php?login=error");
    exit();
}