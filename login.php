<?php
session_start();

include("Admin/config/connexion.php");
if(isset($_POST['valider'])){
   
            $email = mysqli_real_escape_string($cnx, $_POST['email']);
            $pass =md5(mysqli_real_escape_string($cnx, $_POST['pass']));
        
            
            $login_query= mysqli_query($cnx, "SELECT * from users where email='$email' and password='$pass' LIMIT 1");

            if (mysqli_num_rows($login_query) > 0) {
                foreach($login_query as $data){
                        $user_id= $data['id'];
                        $user_name = $data['fname'].' '. $data['lname'];
                        $user_email = $data['email'];
                        $role_as = $data['role_as'];
                }


                $_SESSION['auth'] = true;
                $_SESSION['auth_role'] = "$role_as";//1=admin et 0=user
                $_SESSION['auth_user'] = [
                    'user_id'=>$user_id,
                    'user_name' => $user_name,
                    'user_email' => $user_email
                ];

                if( $_SESSION['auth_role'] == '1'){
                    $_SESSION['message'] = "Welcome to Dashboard";
                    header('Location: Admin/index.php');
                    exit(0);
                }
                elseif($_SESSION['auth_role'] == '0'){
            $_SESSION['message'] = "You are logged In";
            header('Location: includes/index.php');
            exit(0);
                }

            } else {
                $_SESSION['message'] = "Invalid Email or Password!";
                header('Location: loginpage.php');
                exit(0);
            }
}else{
    $_SESSION['message']="You are not allowed to access to this file!!";
    header('Location: loginpage.php');
    exit(0);
}

