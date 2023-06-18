<?php
$cnx=mysqli_connect("localhost","root","","siteecommerce");
if(!$cnx)
{
    echo "erreur de connexion";
    header('Location:../dberrors/errors.php');
    die();
}
?>