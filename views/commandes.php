<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>commandes</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<?php include '../models/header.php'; ?>

<section class="commandes">

   <h1 class="heading">commandes placées</h1>

   <div class="box-container">

   <?php
//Pour l'affichage des commandes, ce serait mieux que ce soit qu'en ligne, avec un lien cliquable sur l'ID pour afficher une page où se trouve la facture.
   foreach ($mesCommandes as $MC) {
   echo '
   <div class="box">
      <p>Id : <span>'.$MC->Id.'</span></p>
      <p>Date : <span>'.$MC->Date.'</span></p>
      <p>Vendeur : <span>'.$MC->Vendeur.'</span></p>
      <p>Total : <span>'.$MC->Total.'</span></p>
      <p>Status : <span>'.$MC->Statue.'</span></p>
   </div>';
      }
   ?>

   </div>

</section>

<script src="../js/script.js"></script>

</body>
</html>
