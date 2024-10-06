<?php
  require_once "../models/articles.php";
  session_start();
  $supprimer = $supprimer_article_panier($_POST["articleid"], $_POST["Quantité"]);
  $confirmation ="Article Supprimer.";
  require_once "../controllers/panier.php";
 ?>
