<?php

require_once "../models/articles.php";
if (!isset($_GET['categorie']) && !isset($_POST['categorie'])){
  echo "1";
  $articles = $afficher_articles_all();
  require_once "../views/boutique.php";
} else if (isset($_GET['categorie'])) {
  echo "2";
  $articles = $afficher_articles_précis($_GET['categorie']);
  require_once "../views/boutique.php";
} else {
  echo "3";
  $articles = $afficher_articles_précis($_POST['categorie']);
  require_once "../views/boutique.php";
}

?>
