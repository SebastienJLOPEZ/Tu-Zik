<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Panier</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<?php include '../models/header.php'; ?>

<section class="produits shopping-panier">

   <h3 class="heading">Panier</h3>

   <?php
        if (isset($confirmation)) {
          echo $confirmation;
          echo "<br>";
        }
    ?>

   <div class="box-container">

   <?php
      /*function createSelectBox($optionCount){
         for($idx=1; $idx <= $optionCount; $idx++){
             $out .= '<option id="quantite" name="quantite" value='.$idx.' >' . $idx . '</option>';
         }
         return $out;};*/
      foreach ($panier as $PAN){
        echo '
        <form action="../controllers/supprimerArticlePanier.php" method="post" class="box">
           <input type="hidden" name="articleid" value="'.$PAN->id.'">
           <img src="../uploaded_img/" alt="">
           <div class="name">'.$PAN->Titre.'</div>
           <div class="flex">
           <div class="prixUnit">$/'.$PAN->PrixUnitaire.'</div>
           <div class="prixTot">$/'.$PAN->prixTotal.'</div>';
           //echo createSelectBox($PAN->Quantité);
           echo '<input type="number" name="Quantité" class="Quantité" min="'.$PAN->Quantité.'" max="0" onkeypress="if(this.value.length == 2) return false;" value="">
              <button type="submit" class="fas fa-edit" name="modification_qty"></button>
           </div>
           <div class="sub-total"> sub total : <span>$/-</span> </div>
           <input type="submit" value="supprimer" class="delete-btn" name="delete">
        </form>
        ';
      };
   ?>
  <!-- <form action="" method="post" class="box">
      <input type="hidden" name="panier_id" value="">
      <a href="fiche_produit.php?pid=" class="fas fa-eye"></a>
      <img src="../uploaded_img/" alt="">
      <div class="name"></div>
      <div class="flex">
         <div class="prix">$/-</div>
         <input type="number" name="qty" class="qty" min="1" max="99" onkeypress="if(this.value.length == 2) return false;" value="">
         <button type="submit" class="fas fa-edit" name="modification_qty"></button>
      </div>
      <div class="sub-total"> sub total : <span>$/-</span> </div>
      <input type="submit" value="delete item" onclick="return confirm('supprimer cela du panier ?');" class="delete-btn" name="delete">
   </form>-->

   </div>

   <div class="panier-total">
      <p>grand total : <span>$/<?php echo $total->prixTotal; ?></span></p> <!--Faudra faire que le prix soit plus gros, on le voit pas assez.-->
      <a href="../controllers/boutique.php" class="option-btn">continuer les achats</a>
      <a href="../controllers/supprimerpanier.php" class="delete-btn " onclick="return confirm('supprimer tout du panier ?');">supprimer tous les articles</a>
      <a href="../controllers/payer.php" class="btn ">passer à la caisse</a>
   </div>

</section>

<script src="../js/script.js"></script>

</body>
</html>
