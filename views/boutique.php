<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>boutique</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/style.css">

</head>
<body>

<?php include '../models/header.php'; ?>

<section class="produits">

   <h1 class="heading">Nouveauté</h1>

   </form>
   <?php
    require_once "../models/articles.php";
    $catégorie = $afficher_catégorie();
    echo '<form action="../controllers/boutique.php" method="post">';
    foreach($catégorie as $cat) {
      echo '<input type="radio" id="categorie" name="categorie" value="'.$cat->id.'">
      <label for="categorie">'.$cat->Titre.'</label>';
    }
    echo '  <button type="submit" name="search" value="search">Rechercher</button></form></br>';
  ?>


   <!--div class="box-container">

  <form action="../controllers/ajoutpanier.php" method="post" class="box">
  <!--  <input type="hidden" name="pid" value="<?= $fetch_product['id']; ?>">

  </select>
    <input type="hidden" name="name" value="<?= $fetch_product['name']; ?>"> <select class="" name="">

    </select>
    <input type="hidden" name="prix" value="<?= $fetch_product['prix']; ?>">
    <input type="hidden" name="image" value="<?= $fetch_product['image_01']; ?>">-->
   <?php
   //l'oeil était de trop, c'est mieux de faire que le titre du produit soit aussi un lien cliquable pour aller voir plus précisément le produit MAIS, comme manque de temps, on ne le fera pas.
   //Et pour l'image, j'ai pas encore fait, donc on ce sera le dernier truc que je ferai lundi.
   function createSelectBox($optionCount){
      for($idx=1; $idx <= $optionCount; $idx++){
          $out .= '<option id="quantite" name="quantite" value='.$idx.' >' . $idx . '</option>';
      }
      return $out;}
   foreach ($articles as $AR) {
   echo '<div class="box-container">
   <form action="../controllers/ajoutpanier.php" method="post" class="box">
   <div class="box">
   <input type="hidden" id="titre" name="titre" value="'.$AR->id.'"/>'.$AR->Titre.'
   <br><select class="quantite" name="quantite">';
    echo createSelectBox($AR->quantite);
    echo '</select>
    <button class="fas fa-heart" type="submit" name="ajouter_au_liste_de_souhaits"></button>
    <img src="../uploaded_img/" alt="">
    <div class="name"></div>
    <div class="flex">
       <div class="prix"><span>€</span><span>/'.$AR->prix.'</span></div>
       <input type="number" name="qty" class="qty" min="1" max="99" onkeypress="if(this.value.length == 2) return false;" value="1">
    </div>
   <input type="submit" value="ajouter au panier" class="btn" name="ajouter_au_panier">
   </form>
   </div>';
      }
   ?>
      <!--<button class="fas fa-heart" type="submit" name="ajouter_au_liste_de_souhaits"></button>
      <a href="fiche_produit.php?pid=<?= $fetch_product['id']; ?>" class="fas fa-eye"></a>
      <img src="../uploaded_img/<?= $fetch_product['image_01']; ?>" alt="">
      <div class="name"><?= $fetch_product['name']; ?></div>
      <div class="flex">
         <div class="prix"><span>$</span><?= $fetch_product['prix']; ?><span>/-</span></div>
         <input type="number" name="qty" class="qty" min="1" max="99" onkeypress="if(this.value.length == 2) return false;" value="1">
      </div>
      <input type="submit" value="ajouter au panier" class="btn" name="ajouter_au_panier">-->

   <!--?php
      }
   }else{
      echo '<p class="empty">aucun produit trouvé !</p>';
   }
   ?-->

</section>

<script src="../js/script.js"></script>

</body>
</html>
