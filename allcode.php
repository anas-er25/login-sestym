<?php
session_start();
if(isset($_POST['logoutbtn'])){
    unset($_SESSION['auth']);
    unset($_SESSION['auth_role']);
    unset($_SESSION['auth_user']);

    $_SESSION['message']='Logged Out Successfully';
    header('Location: loginpage.php');
    exit(0);

}elseif(isset($_POST['login'])){
    $_SESSION['message']='Welcome to Login Page';
    header('Location: loginpage.php');
    exit(0);

}

?>