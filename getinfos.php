<?php
include_once('connexion.php');
$prod = mysqli_query($cnx, "select * from produit");
$categ = mysqli_query($cnx, "select * from categorie");

?>