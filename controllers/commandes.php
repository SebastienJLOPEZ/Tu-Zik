<?php

  session_start();
  require_once "../models/articles.php";
  $mesCommandes = $afficher_commandes($_SESSION["user-id"]);
  /*$mesArticlesVendu = $afficher_produit_achetes($_SESSION["user-id"]);*/

  require_once "../views/commandes.php";

?>
