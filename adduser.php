<?php
session_start();
include("Admin/config/connexion.php");
if(isset($_POST['Register'])){
    $email =mysqli_real_escape_string($cnx,$_POST['email']);
    $fname =mysqli_real_escape_string($cnx, $_POST['fname']);
    $lname = mysqli_real_escape_string($cnx, $_POST['lname']);
    $pass = md5(mysqli_real_escape_string($cnx,$_POST['pass']));
    $cpass = md5(mysqli_real_escape_string($cnx, $_POST['cpass']));

    if($pass== $cpass){
        $checkemail = "SELECT email FROM users WHERE email='$email'";
        $checkemail_run=mysqli_query($cnx, $checkemail);

        if(mysqli_num_rows($checkemail_run) > 0){
            $_SESSION['message'] = "This Email is already exists!!";
            header('Location:inscrire.php');
            exit(0);
        }
        else{
            $user_query = mysqli_query($cnx, "insert into users (fname, lname, email, password) values('$fname','$lname','$email','$pass');");

            if($user_query){
                $_SESSION['message'] = "Register successfully";
                header('Location:loginpage.php');
                exit(0);
            }
            else{
                $_SESSION['message'] = "Something went Wrong!!";
                header('Location:inscrire.php');
                exit(0);
            }
        }
    }else{
        $_SESSION['message']="Password and Confirm Password does not match!!";
        header('Location:inscrire.php');
        exit(0);
    }

}
else{
    header('Location: loginpage.php');
}



header("location:loginpage.php");
