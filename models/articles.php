<?php
  require_once "connexion.php";

  $afficher_articles_all = function () use ($db) {
    $statement = $db->prepare("SELECT * FROM article;");
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_OBJ);
    return $result;
  };

  $afficher_articles_précis = function (string $catégorie) use ($db) {
    $statement = $db->prepare("SELECT * FROM article ORDER BY id DESC;");
    $statement->execute([$catégorie]);
    $result = $statement->fetchAll(PDO::FETCH_OBJ);
    return $result;
  };

  $afficher_articles_last = function () use ($db) {
    $statement = $db->prepare("SELECT * FROM article;");
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_OBJ);
    return $result;
  };

  $afficher_catégorie = function () use ($db) {
    $statement = $db->prepare("SELECT * FROM categorie;");
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_OBJ);
    return $result;
  };

  $afficher_commandes = function (string $UserID) use ($db) {
    $statement = $db->prepare("SELECT CO.sessionId AS Id, CO.total AS Total, CO.dateCommande AS 'Date', CO.shippingStatus AS Statue, AR.Titre AS Titre,
      AR.prix AS Prix, CAR.quantite AS Quantité, UT.Prenom AS Prenom, UT.email AS Email, UT2.Prenom AS Vendeur, UT2.id as VenderId
      FROM utilisateur AS UT LEFT JOIN commande AS CO ON  UT.id = CO.utilisateurId
      LEFT JOIN commande_article AS CAR ON CO.id = CAR.CommandeId
      LEFT JOIN article AS AR ON CAR.produitId = AR.id
      LEFT JOIN utilisateur AS UT2 ON AR.utilisateurId = UT2.id
      WHERE UT.id = ? ;");
    $statement->execute([$UserID]);
    $result = $statement->fetchAll(PDO::FETCH_OBJ);
    return $result;
  };

  $afficher_produit_achetes= function (string $UID) use ($db) {
    $statement = $db->prepare();
    $statement->execute($UID);
    $result = $statement->fetchAll(PDO::FETCH_OBJ);
    return $result;
  };

  $ajouter_panier = function (string $Titre, string $Quantite, string $CID) use ($db) {
    $statement = $db->prepare("INSERT INTO panier_article(produitId, quantite, utilisateurId) VALUES (?, ?, ?);");
    $statement->execute([$Titre, $Quantite, $CID]);
  };

  $afficher_panier = function (string $UID) use ($db) {
    if ($UID !== NULL){
    $statement = $db->prepare("SELECT PA.produitId AS id, PA.quantite AS Quantité, AR.Titre AS Titre, AR.prix AS PrixUnitaire,
      (PA.quantite*AR.prix) AS prixTotal, CA.Titre AS Catégorie
      FROM panier_article AS PA LEFT JOIN article AS AR ON PA.produitId = AR.id
      LEFT JOIN categorie AS CA ON AR.idCategorie = CA.id
      WHERE PA.utilisateurId = ?;");
    $statement->execute([$UID]);
  	$result = $statement->fetchAll(PDO::FETCH_OBJ);
  	return $result;
  } else {
    $statement = $db->prepare("SELECT PA.produitId AS id, PA.quantite AS Quantité, AR.Titre AS Titre, AR.prix AS PrixUnitaire,
      (PA.quantite*AR.prix) AS prixTotal, CA.Titre AS Catégorie
      FROM panier_article AS PA LEFT JOIN article AS AR ON PA.produitId = AR.id
      LEFT JOIN categorie AS CA ON AR.idCategorie = CA.id
      WHERE utilisateurId = '0'");
    $statement->execute([$UID]);
  	$result = $statement->fetchAll(PDO::FETCH_OBJ);
  	return $result;
  };
  };

  $affecter_user_panier = function(string $UID) {
    $statement = $db->prepare("UPDATE `panier_article` SET `utilisateurId`= ? WHERE `utilisateurId` = 0");
    $statement->execute([$UID]);
  };

  $afficher_prix_total = function (string $UID) use ($db) {
    $statement = $db->prepare("SELECT sum(PA.quantite*AR.prix) AS prixTotal
      FROM panier_article AS PA LEFT JOIN article AS AR ON PA.produitId = AR.id
      WHERE PA.utilisateurId = ?;");
    $statement->execute([$UID]);
    $result=$statement->fetch(PDO::FETCH_OBJ);
    return $result;
  }
 ?>
