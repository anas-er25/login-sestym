<?php
session_start();

if (isset($_SESSION['auth'])) {
    if (!isset($_SESSION['message'])) {
        $_SESSION['message'] = 'You are already Logged In';
    }

    header('Location: Admin/index.php');
    exit(0);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="shortcut icon" type='x-icon' href="Admin/images/icons/websitekibi.png">
    <link rel="stylesheet" href="Admin/csss/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script>
        function affiche() {
            window.location = "inscrire.php"
        }
    </script>
</head>

<body>
    <?php
    include('message.php');
    ?>

    <div class="container">
        <div class="screen">
            <div class="screen__content">
                <form class="login" action='login.php' method="POST">
                    <div class="login__field">
                        <i class="login__icon fas fa-user"></i>
                        <input type="email" class="login__input" name="email" id="user" placeholder="Email" required>
                    </div>
                    <div class="login__field">
                        <i class="login__icon fas fa-lock"></i>
                        <input type="password" class="login__input" name="pass" id="password" placeholder="Password" required>
                    </div>

                    <button class="button login__submit" name="valider" type='submit'>
                        <span class="button__text">Log In Now</span>
                    </button>
                    <button class="button login__submit" name="signup" id="signup" onclick="affiche()" type='submit'>
                        <span class="button__text">Sign Up</span>
                    </button>
                </form>

            </div>
            <div class="screen__background">
                <span class="screen__background__shape screen__background__shape4"></span>
                <span class="screen__background__shape screen__background__shape3"></span>
                <span class="screen__background__shape screen__background__shape2"></span>
                <span class="screen__background__shape screen__background__shape1"></span>
            </div>
        </div>
    </div>

</body>

</html>