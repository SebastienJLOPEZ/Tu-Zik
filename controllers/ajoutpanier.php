<?php
  require_once "../models/articles.php";
  session_start();
  if (ISSET($_SESSION["user-id"])){
    $ajouter_panier($_POST["titre"], $_POST["quantite"], $_SESSION["user-id"]);
    header("location:javascript://history.go(-1)");
  } else {
    $ajouter_panier($_POST["titre"], $_POST["quantite"], '0');
    header("location:javascript://history.go(-1)");
  }

 ?>
