<?php
require_once "../models/articles.php";
  session_start();
  if (isset($_SESSION["user-id"])) {
    $panier=$afficher_panier($_SESSION["user-id"]);
    $total = $afficher_prix_total($_SESSION["user-id"]);
    var_dump($total);
    require_once "../views/panier.php";
  } else {
    $panier=$afficher_panier('0');
    $total = $afficher_prix_total('0');
    require_once "../views/panier.php";
  }
?>
