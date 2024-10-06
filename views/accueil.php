<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>accueil</title>
   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link rel="stylesheet" href="../css/style.css">

</head>
<body>
   <!-- barre de navigation ---->
   <section style="background-color: #FFFFFF;">
      <nav>
         <div class="navbar">
            <!--- logo --->
            <div class="logo">
               <img src="/images/newtuzik.png" alt="" />
            </div>
            <!---- barre de navigation---->
          <!--  <div class="menu-bar">
               <ul id="menu-items">
                  <li><a href="/views/accueil.php">Accueil</a></li>
                  <li><a href="/controllers/afficherFabricants">Fabricants</a></li>
                  <li><a href="/controllers/afficherMusicien">Musiciens</a></li>
                  <li><a href="#!">Messagerie</a></li>
                  <li><a href="/controllers/espace_membres.php">Espace Membre</a></li>
                  <li><a href="/controllers/panier.php">Panier</a></li>
                  <li><a href="/views/pageDemande.php">Ajouter un article</a></li>
-->
                  <?php include '../models/header.php'; ?>

<div class="accueil-bg">

<section class="accueil">

   <div class="swiper accueil-slider">

   <div class="swiper-wrapper">
     <div class="swiper-slide slide">
       <div class="content">
       </div>
     </div>

    <!--  <div class="swiper-slide slide">
         <div class="image">
            <img src="../images/accueil-img-1.png" alt="">
         </div>
         <div class="content">
            <span>Sur les derniers guitares</span>
            <h3>jusqu'à 50% de réduction</h3>
            <a href="../controllers/boutique.php" class="btn">Acheter maintenant</a>
         </div>
      </div>

      <div class="swiper-slide slide">
         <div class="image">
            <img src="../images/accueil-img-2.png" alt="">
         </div>
         <div class="content">
            <span>Sur les derniers violons</span>
            <h3>jusqu'à 40% de réduction</h3>
            <a href="../controllers/boutique.php" class="btn">Acheter maintenant</a>
         </div>
      </div>

      <div class="swiper-slide slide">
         <div class="image">
            <img src="../images/accueil-img-3.png" alt="">
         </div>
         <div class="content">
            <span>Sur les derniers flutes</span>
            <h3>jusqu'à 30% de réduction</h3>
            <a href="../controllers/boutique.php" class="btn">Acheter maintenant</a>
         </div>
      </div>-->

   </div>

      <div class="swiper-pagination"></div>

   </div>

</section>

</div>

<section class="categorie">

   <h1 class="heading">acheter par catégorie</h1>

   <div class="swiper categorie-slider">

   <div class="swiper-wrapper">
   <?php
      require_once "../models/articles.php";
      $catégorie = $afficher_catégorie();
      foreach($catégorie as $cat) {
        echo '<a href="../controllers/boutique.php?categorie='.$cat->id.'" class="swiper-slide slide">
           <img src="../images/'.$cat->Titre.'.png" alt="">
           <h3>'.$cat->Titre.'</h3>
        </a>';
      }
   ?>
   </div>

   <div class="swiper-pagination"></div>

   </div>

</section>

<section class="accueil-produits">

   <h1 class="heading">Nouveauté</h1>

   <div class="swiper produits-slider">

   <div class="swiper-wrapper">

   <!--?php
     $select_produits = $db->prepare("SELECT * FROM `produits` LIMIT 3");
     $select_produits->execute();
     if($select_produits->rowCount() > 0){
      while($fetch_produits = $select_produits->fetch(PDO::FETCH_ASSOC)){
   ?--> <!// $produit>

   <?php
   require_once "../models/articles.php";
   $articles = $afficher_articles_last();
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
   };
    ?>
   <!--?php
      }
   }else{
      echo '<p class="empty">aucun produit a encore été ajouté !</p>';
   }
   ?-->

   </div>

   <div class="swiper-pagination"></div>

   </div>

</section>

<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<script src="../js/script.js"></script>

<script>

/*var swiper = new Swiper(".accueil-slider", {
   loop:true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
    },
});*/

 var swiper = new Swiper(".categorie-slider", {
   loop:false,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
   },
   breakpoints: {
      0: {
         slidesPerView: 2,
       },
      650: {
        slidesPerView: 3,
      },
      768: {
        slidesPerView: 4,
      },
      1024: {
        slidesPerView: 5,
      },
   },
});

var swiper = new Swiper(".produits-slider", {
   loop:true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
   },
   breakpoints: {
      550: {
        slidesPerView: 2,
      },
      768: {
        slidesPerView: 2,
      },
      1024: {
        slidesPerView: 3,
      },
   },
});

</script>

</body>
</html>
