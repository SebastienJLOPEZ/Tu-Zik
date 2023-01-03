-- MySQL Script generated by MySQL Workbench
-- Thu Dec 15 20:39:03 2022
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema TuZik?
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema TuZik?
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `TuZik?` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ;
USE `TuZik?` ;

-- -----------------------------------------------------
-- Table `TuZik?`.`utilisateur`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `TuZik?`.`utilisateur` ;

CREATE TABLE IF NOT EXISTS `TuZik?`.`utilisateur` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `Nom` VARCHAR(50) NULL DEFAULT NULL,
  `Prenom` VARCHAR(50) NULL DEFAULT NULL,
  `telephone` VARCHAR(15) NULL DEFAULT NULL,
  `email` VARCHAR(50) NOT NULL,
  `motdepasse` VARCHAR(80) NOT NULL,
  `Num Magasin` VARCHAR(45) NULL DEFAULT 0,
  `Num Fabricant` VARCHAR(45) NULL DEFAULT 0,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `TuZik?`.`profilMagasin`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `TuZik?`.`profilMagasin` ;

CREATE TABLE IF NOT EXISTS `TuZik?`.`profilMagasin` (
  `NumMagasin` INT NOT NULL auto_increment,
  `adresse` VARCHAR(45) NOT NULL,
  `nom` VARCHAR(45) NOT NULL,
  `horaires` VARCHAR(45) NOT NULL,
  `utilisateur_id` BIGINT NOT NULL,
  PRIMARY KEY (`NumMagasin`),
  CONSTRAINT `fk_profilMagasin_utilisateur`
    FOREIGN KEY (`utilisateur_id`)
    REFERENCES `TuZik?`.`utilisateur` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



-- -----------------------------------------------------
-- Table `TuZik?`.`profil fabricant`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `TuZik?`.`profil fabricant` ;

CREATE TABLE IF NOT EXISTS `TuZik?`.`profilFabricant` (
  `NumFabricant` INT NOT NULL auto_increment,
  `adresse` VARCHAR(45) NULL,
  `Nom` VARCHAR(45) NOT NULL,
  `specialite` VARCHAR(45) NULL DEFAULT NULL,
  `prix` FLOAT NULL DEFAULT NULL,
  `utilisateurid` BIGINT NOT NULL,
  PRIMARY KEY (`NumFabricant`),
  CONSTRAINT `utilisateurid`
    FOREIGN KEY (`utilisateurid`)
    REFERENCES `TuZik?`.`utilisateur` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



-- -----------------------------------------------------
-- Table `TuZik?`.`categorie`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `TuZik?`.`categorie` ;

CREATE TABLE IF NOT EXISTS `TuZik?`.`categorie` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `parentId` BIGINT NULL,
  `Titre` VARCHAR(75) NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `parentid`
    FOREIGN KEY (`parentId`)
    REFERENCES `TuZik?`.`categorie` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



-- -----------------------------------------------------
-- Table `TuZik?`.`produit`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `TuZik?`.`produit` ;

CREATE TABLE IF NOT EXISTS `TuZik?`.`produit` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `utilisateur_Id` BIGINT NOT NULL,
  `Titre` VARCHAR(75) NOT NULL,
  `type` SMALLINT(6) NOT NULL DEFAULT 0,
  `prix` FLOAT NOT NULL DEFAULT 0,
  `idCategorie` BIGINT NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_produit_utilisateur`
    FOREIGN KEY (`utilisateur_Id`)
    REFERENCES `TuZik?`.`utilisateur` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `idCategorie`
    FOREIGN KEY (`idCategorie`)
    REFERENCES `TuZik?`.`categorie` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



-- -----------------------------------------------------
-- Table `TuZik?`.`panier_objet`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `TuZik?`.`panier_objet` ;

CREATE TABLE IF NOT EXISTS `TuZik?`.`panier_objet` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `produitId` BIGINT NOT NULL,
  `userId` BIGINT NOT NULL,
  `quantite` FLOAT NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_panier_objet_produit`
    FOREIGN KEY (`produitId`)
    REFERENCES `TuZik?`.`produit` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `userId`
    FOREIGN KEY (`userId`)
    REFERENCES `TuZik?`.`utilisateur` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



-- -----------------------------------------------------
-- Table `TuZik?`.`Commande`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `TuZik?`.`Commande` ;

CREATE TABLE IF NOT EXISTS `TuZik?`.`Commande` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `userId` BIGINT NOT NULL,
  `sessionId` VARCHAR(100) NOT NULL,
  `shipping` FLOAT NOT NULL DEFAULT 0,
  `total` FLOAT NOT NULL DEFAULT 0,
  `grandTotal` FLOAT NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_Commande_utilisateur`
    FOREIGN KEY (`userId`)
    REFERENCES `TuZik?`.`utilisateur` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);



-- -----------------------------------------------------
-- Table `TuZik?`.`Commande_objet`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `TuZik?`.`Commande_objet` ;

CREATE TABLE IF NOT EXISTS `TuZik?`.`Commande_objet` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `produitId` BIGINT NOT NULL,
  `CommandeId` BIGINT NOT NULL,
  `quantité` FLOAT NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_Commande_objet_produit`
    FOREIGN KEY (`produitId`)
    REFERENCES `TuZik?`.`produit` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Commande_objet_Commande`
    FOREIGN KEY (`CommandeId`)
    REFERENCES `TuZik?`.`Commande` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);



-- -----------------------------------------------------
-- Table `TuZik?`.`paiement`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `TuZik?`.`paiement` ;

CREATE TABLE IF NOT EXISTS `TuZik?`.`paiement` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `CommandeId` BIGINT NOT NULL,
  `code` VARCHAR(100) NOT NULL,
  `type` SMALLINT(6) NOT NULL DEFAULT 0,
  `mode` SMALLINT(6) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`, `code`, `type`),
  CONSTRAINT `fk_paiement_commande`
    FOREIGN KEY (`CommandeId`)
    REFERENCES `TuZik?`.`Commande` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);



-- -----------------------------------------------------
-- Table `TuZik?`.`photo_produit`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `TuZik?`.`photo_produit` ;

CREATE TABLE IF NOT EXISTS `TuZik?`.`photo_produit` (
  `id` BIGINT NOT NULL,
  `produitId` BIGINT NOT NULL,
  `image` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `produitId`
    FOREIGN KEY (`produitId`)
    REFERENCES `TuZik?`.`produit` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
