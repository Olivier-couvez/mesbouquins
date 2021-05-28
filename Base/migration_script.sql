-- ----------------------------------------------------------------------------
-- MySQL Workbench Migration
-- Migrated Schemata: Gestion Biblio 2020
-- Source Schemata: Gestion Biblio 2020
-- Created: Thu May 27 00:32:51 2021
-- Workbench Version: 8.0.24
-- ----------------------------------------------------------------------------

SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------------------------------------------------------
-- Schema Gestion Biblio 2020
-- ----------------------------------------------------------------------------
DROP SCHEMA IF EXISTS `Gestion Biblio 2020` ;
CREATE SCHEMA IF NOT EXISTS `Gestion Biblio 2020` ;

-- ----------------------------------------------------------------------------
-- Table Gestion Biblio 2020.Tbl_ISO3166-1
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `Gestion Biblio 2020`.`Tbl_ISO3166-1` (
  `ISO_3166-1_Num` SMALLINT(5) NULL,
  `ISO_3166-1_Alpha3` VARCHAR(3) NULL,
  `ISO_3166-1_Alpha2` VARCHAR(2) NULL,
  `ISO_3166-1_Nom_Francais` VARCHAR(100) NULL,
  `ISO_3166-1_Nom` VARCHAR(100) NULL,
  UNIQUE INDEX `SO_3166-1_Num` (`ISO_3166-1_Num` ASC));

-- ----------------------------------------------------------------------------
-- Table Gestion Biblio 2020.Tbl_Dernieres_Fiches_Modifiees
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `Gestion Biblio 2020`.`Tbl_Dernieres_Fiches_Modifiees` (
  `Id_Fiche_Modifiee` INT(10) NOT NULL,
  `Id_Livre` INT(10) NULL,
  `Date_Modification` DATETIME(6) NULL,
  `Heure_Modification` DATETIME(6) NULL,
  PRIMARY KEY (`Id_Fiche_Modifiee`));

-- ----------------------------------------------------------------------------
-- Table Gestion Biblio 2020.Tbl_Edition
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `Gestion Biblio 2020`.`Tbl_Edition` (
  `Id_Edition` INT(10) NOT NULL,
  `Edition_Nom` VARCHAR(70) NULL,
  `Id_Logo_Edition` INT(10) NULL,
  `Site_Internet_Edition` VARCHAR(100) NULL,
  PRIMARY KEY (`Id_Edition`));

-- ----------------------------------------------------------------------------
-- Table Gestion Biblio 2020.Tbl_Oeuvre_Pseudos
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `Gestion Biblio 2020`.`Tbl_Oeuvre_Pseudos` (
  `Id_Oeuvre_Pseudo` INT(10) NOT NULL,
  `Id_Oeuvre` INT(10) NULL,
  `Id_Pseudo` INT(10) NULL,
  `Fonction` VARCHAR(50) NULL,
  PRIMARY KEY (`Id_Oeuvre_Pseudo`),
  CONSTRAINT `{9D3481E5-78D5-4415-958F-872C2D5E4F27}`
    FOREIGN KEY (`Id_Pseudo`)
    REFERENCES `Gestion Biblio 2020`.`Tbl_Pseudo` (`Id_Pseudo`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT,
  CONSTRAINT `{DF322F43-4AE6-417E-9CB1-E9894CB0172A}`
    FOREIGN KEY (`Id_Oeuvre`)
    REFERENCES `Gestion Biblio 2020`.`Tbl_Oeuvres` (`Id_Oeuvre`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT);

-- ----------------------------------------------------------------------------
-- Table Gestion Biblio 2020.Tbl_Mot_Cle
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `Gestion Biblio 2020`.`Tbl_Mot_Cle` (
  `Id_Mot_Cle` INT(10) NOT NULL,
  `Mot_Cle_Nom` VARCHAR(30) NULL,
  PRIMARY KEY (`Id_Mot_Cle`));

-- ----------------------------------------------------------------------------
-- Table Gestion Biblio 2020.Tbl_Auteur_Fonctions
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `Gestion Biblio 2020`.`Tbl_Auteur_Fonctions` (
  `Id_Auteur_Fonctions` INT(10) NOT NULL,
  `Id_Auteur` INT(10) NULL,
  `Id_Fonction` INT(10) NULL,
  PRIMARY KEY (`Id_Auteur_Fonctions`),
  CONSTRAINT `{99238FFC-1CC8-471D-9480-9B5D6A7CC3A7}`
    FOREIGN KEY (`Id_Auteur`)
    REFERENCES `Gestion Biblio 2020`.`Tbl_Auteurs` (`Id_Auteur`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT,
  CONSTRAINT `{C1AD01D3-60BF-4757-B598-43D670E86FBF}`
    FOREIGN KEY (`Id_Fonction`)
    REFERENCES `Gestion Biblio 2020`.`Tbl_Fonctions` (`Id_Fonction`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT);

-- ----------------------------------------------------------------------------
-- Table Gestion Biblio 2020.Tbl_Livre
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `Gestion Biblio 2020`.`Tbl_Livre` (
  `Id_Livre` INT(10) NOT NULL,
  `Id_Reference` INT(10) NULL,
  `Livre_Numero` VARCHAR(20) NULL,
  `Livre_Titre` VARCHAR(150) NULL,
  `Livre_Sous_Titre` VARCHAR(200) NULL,
  `Livre_Quantite` INT(10) NULL,
  `Id_Edition` INT(10) NULL,
  `Id_Collection` INT(10) NULL,
  `Livre_Parution` VARCHAR(4) NULL,
  `Livre_Cycle_Nom1` VARCHAR(80) NULL,
  `Livre_Cycle_Tome1` VARCHAR(10) NULL,
  `Livre_Cycle_Nom2` VARCHAR(80) NULL,
  `Livre_Cycle_Tome2` VARCHAR(5) NULL,
  `Livre_Cycle_Nom3` VARCHAR(80) NULL,
  `Livre_Cycle_Tome3` VARCHAR(5) NULL,
  `Livre_Infos` LONGTEXT NULL,
  `Id_Format` INT(10) NULL,
  `Livre_ISBN` VARCHAR(17) NULL,
  `Livre_EAN` VARCHAR(13) NULL,
  `Livre_Code_Prix` VARCHAR(20) NULL,
  `Livre_Pages` SMALLINT(5) NULL,
  `Livre_Couverture` VARCHAR(15) NULL,
  `Id_Langue` INT(10) NULL,
  `Livre_Appreciation` SMALLINT(5) NULL,
  `Livre_Controle` TINYINT(1) NOT NULL,
  `Livre_Titre_Original` VARCHAR(90) NULL,
  `Livre_Date_Creation` VARCHAR(4) NULL,
  `Id_Etat` INT(10) NULL,
  `Id_Statut` INT(10) NULL,
  `Livre_Details` LONGTEXT NULL,
  `Livre_Date_Achat` DATETIME(6) NULL,
  `Livre_Prix_Achat` DECIMAL(19,4) NULL,
  `Livre_Cote` DECIMAL(19,4) NULL,
  `Livre_Info_Achat` VARCHAR(100) NULL,
  `Livre_Lu` TINYINT(1) NOT NULL,
  `Livre_Date_Modification` DATETIME(6) NULL,
  `Id_Version` INT(10) NULL,
  `Id_Logo` INT(10) NULL,
  `Livre_Nouveau_Format` TINYINT(1) NOT NULL,
  `Notice_BNF` VARCHAR(60) NULL,
  `Livre_Absence_Couverture` TINYINT(1) NOT NULL,
  `Id_Stockage_Images` INT(10) NULL,
  `Livre_Fiche_A_Completer` TINYINT(1) NOT NULL,
  `Livre_Fiche_Ok` TINYINT(1) NOT NULL,
  `Numero_Notice` VARCHAR(13) NULL,
  `Livre_Num_Tri` INT(10) NULL,
  PRIMARY KEY (`Id_Livre`),
  INDEX `Numéro_Notice` (`Numero_Notice` ASC),
  INDEX `Tbl_LivreId_Titre` (`Id_Reference` ASC),
  CONSTRAINT `{1D2E9245-6973-4308-8C8D-CDB45E89C83A}`
    FOREIGN KEY (`Id_Logo`)
    REFERENCES `Gestion Biblio 2020`.`Tbl_Logo` (`Id_Logo`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT,
  CONSTRAINT `{1EC18C1E-E723-4B28-B05D-BEC3DDCDFFD0}`
    FOREIGN KEY (`Id_Etat`)
    REFERENCES `Gestion Biblio 2020`.`Tbl_Etat` (`Id_Etat`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT,
  CONSTRAINT `{228B292B-B08B-4AD2-894E-43E0BB0E4699}`
    FOREIGN KEY (`Id_Edition`)
    REFERENCES `Gestion Biblio 2020`.`Tbl_Edition` (`Id_Edition`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT,
  CONSTRAINT `{23F3C247-F9E5-4A94-9174-189DFB45BFA4}`
    FOREIGN KEY (`Id_Format`)
    REFERENCES `Gestion Biblio 2020`.`Tbl_Format` (`Id_Format`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT,
  CONSTRAINT `{2AEF1310-4E05-4A25-BBCD-5FBF8B125AAA}`
    FOREIGN KEY (`Id_Langue`)
    REFERENCES `Gestion Biblio 2020`.`Tbl_Langue` (`Id_Langue`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT,
  CONSTRAINT `{7CD973CB-7F5F-47C7-8768-A7FFE96E2902}`
    FOREIGN KEY (`Id_Collection`)
    REFERENCES `Gestion Biblio 2020`.`Tbl_Collection` (`Id_Collection`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT,
  CONSTRAINT `{91889A15-1869-45DB-93E5-85CBA908202C}`
    FOREIGN KEY (`Id_Statut`)
    REFERENCES `Gestion Biblio 2020`.`Tbl_Statut` (`Id_Statut`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT,
  CONSTRAINT `{C61DC877-73CE-47AF-A972-49BE9FBEF01B}`
    FOREIGN KEY (`Id_Version`)
    REFERENCES `Gestion Biblio 2020`.`Tbl_Version` (`Id_Version`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT,
  CONSTRAINT `{E3F116A9-E1CA-4289-A6DC-1DE010694E03}`
    FOREIGN KEY (`Id_Stockage_Images`)
    REFERENCES `Gestion Biblio 2020`.`Tbl_Stockage_Images` (`Id_Stockage_Images`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT);

-- ----------------------------------------------------------------------------
-- Table Gestion Biblio 2020.Tbl_Cycle
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `Gestion Biblio 2020`.`Tbl_Cycle` (
  `Id_Cycle` INT(10) NOT NULL,
  `Cycle_Nom` VARCHAR(80) NULL,
  `Cycle_Infos` VARCHAR(50) NULL,
  PRIMARY KEY (`Id_Cycle`));

-- ----------------------------------------------------------------------------
-- Table Gestion Biblio 2020.Tbl_Auteurs
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `Gestion Biblio 2020`.`Tbl_Auteurs` (
  `Id_Auteur` INT(10) NOT NULL,
  `Auteur_Prenom` VARCHAR(255) NULL,
  `Auteur_Nom` VARCHAR(255) NULL,
  `Auteur_Sexe` VARCHAR(1) NULL,
  `Id_Pays` INT(10) NULL,
  `Auteur_Date_Naissance` VARCHAR(255) NULL,
  `Auteur_Lieu_Naissance` VARCHAR(255) NULL,
  `Auteur_Date_Deces` VARCHAR(255) NULL,
  `Auteur_Lieu_Deces` VARCHAR(255) NULL,
  `Auteur_Notes` LONGTEXT NULL,
  `Auteur_Photo` VARCHAR(20) NULL,
  `Id_Reference` INT(10) NULL,
  `Auteur_Statut` VARCHAR(20) NULL,
  `Notice_BNF` VARCHAR(80) NULL,
  `Lien_Wiki` VARCHAR(80) NULL,
  `Auteur_Date_Modification` DATETIME(6) NULL,
  `Numero_Notice` VARCHAR(13) NULL,
  `Auteur_Nom_Particule` VARCHAR(15) NULL,
  PRIMARY KEY (`Id_Auteur`),
  INDEX `Numéro_Notice` (`Numero_Notice` ASC));

-- ----------------------------------------------------------------------------
-- Table Gestion Biblio 2020.Tbl_Mini_Icones
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `Gestion Biblio 2020`.`Tbl_Mini_Icones` (
  `Id_Mini_Icone` INT(10) NOT NULL,
  `Mini_Icone_Infos` VARCHAR(100) NULL,
  `Mini_Icone_Image` LONGBLOB NULL,
  PRIMARY KEY (`Id_Mini_Icone`));

-- ----------------------------------------------------------------------------
-- Table Gestion Biblio 2020.Tbl_Livre_Cycle
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `Gestion Biblio 2020`.`Tbl_Livre_Cycle` (
  `Id_Livre_Cycle` INT(10) NOT NULL,
  `Id_Livre` INT(10) NULL,
  `Id_Cycle` INT(10) NULL,
  `Cycle_Tome` VARCHAR(10) NULL,
  PRIMARY KEY (`Id_Livre_Cycle`),
  CONSTRAINT `{AE7CC954-DEE6-4127-AF3B-94CEA790B33D}`
    FOREIGN KEY (`Id_Livre`)
    REFERENCES `Gestion Biblio 2020`.`Tbl_Livre` (`Id_Livre`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT,
  CONSTRAINT `{BCA0F79B-5DB8-4F11-8790-23C345EBE604}`
    FOREIGN KEY (`Id_Cycle`)
    REFERENCES `Gestion Biblio 2020`.`Tbl_Cycle` (`Id_Cycle`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT);

-- ----------------------------------------------------------------------------
-- Table Gestion Biblio 2020.Tbl_Pseudo
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `Gestion Biblio 2020`.`Tbl_Pseudo` (
  `Id_Pseudo` INT(10) NOT NULL,
  `Pseudo_Prenom` VARCHAR(50) NULL,
  `Pseudo_Nom` VARCHAR(50) NULL,
  `Id_Auteur` INT(10) NULL,
  `Id_Pays` INT(10) NULL,
  `Pseudo_Statut` VARCHAR(20) NULL,
  `Pseudo_Sexe` VARCHAR(1) NULL,
  `Pseudo_Fonction_Principale` VARCHAR(30) NULL,
  `Pseudo_Naissance` VARCHAR(5) NULL,
  `Pseudo_Deces` VARCHAR(5) NULL,
  `Pseudo_Nom_Sans_Accents` VARCHAR(50) NULL,
  `Pseudo_Nom_Particule` VARCHAR(15) NULL,
  `Id_Mini_Icone` INT(10) NULL,
  PRIMARY KEY (`Id_Pseudo`));

-- ----------------------------------------------------------------------------
-- Table Gestion Biblio 2020.Tbl_Logo
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `Gestion Biblio 2020`.`Tbl_Logo` (
  `Id_Logo` INT(10) NOT NULL,
  `Logo_Infos` VARCHAR(100) NULL,
  `Logo_Image` LONGBLOB NULL,
  PRIMARY KEY (`Id_Logo`));

-- ----------------------------------------------------------------------------
-- Table Gestion Biblio 2020.Tbl_Etat
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `Gestion Biblio 2020`.`Tbl_Etat` (
  `Id_Etat` INT(10) NOT NULL,
  `Etat_Livre` VARCHAR(20) NULL,
  PRIMARY KEY (`Id_Etat`));

-- ----------------------------------------------------------------------------
-- Table Gestion Biblio 2020.Tbl_Livre_Pseudo
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `Gestion Biblio 2020`.`Tbl_Livre_Pseudo` (
  `Id_Livre_Pseudo` INT(10) NOT NULL,
  `Id_Livre` INT(10) NULL,
  `Id_Pseudo` INT(10) NULL,
  `Fonction` VARCHAR(50) NULL,
  PRIMARY KEY (`Id_Livre_Pseudo`),
  CONSTRAINT `{6BDDB2FA-A064-4929-8359-1767C3A582AC}`
    FOREIGN KEY (`Id_Livre`)
    REFERENCES `Gestion Biblio 2020`.`Tbl_Livre` (`Id_Livre`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT,
  CONSTRAINT `{EE7B2345-6162-424B-9847-7CA752924DE0}`
    FOREIGN KEY (`Id_Pseudo`)
    REFERENCES `Gestion Biblio 2020`.`Tbl_Pseudo` (`Id_Pseudo`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT);

-- ----------------------------------------------------------------------------
-- Table Gestion Biblio 2020.Tbl_Livre_Recompense
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `Gestion Biblio 2020`.`Tbl_Livre_Recompense` (
  `Id_Livre_Recompense` INT(10) NOT NULL,
  `Id_Livre` INT(10) NULL,
  `Id_Recompense` INT(10) NULL,
  `Categorie_Recompense` VARCHAR(50) NULL,
  `Annee_Recompense` VARCHAR(4) NULL,
  PRIMARY KEY (`Id_Livre_Recompense`),
  CONSTRAINT `{AA07C704-B665-4235-80FE-A9228C28E78E}`
    FOREIGN KEY (`Id_Recompense`)
    REFERENCES `Gestion Biblio 2020`.`Tbl_Recompense` (`Id_Recompense`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT,
  CONSTRAINT `{F7B33EA1-C7B8-4BFD-8A63-984F6A511F05}`
    FOREIGN KEY (`Id_Livre`)
    REFERENCES `Gestion Biblio 2020`.`Tbl_Livre` (`Id_Livre`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT);

-- ----------------------------------------------------------------------------
-- Table Gestion Biblio 2020.Tbl_Derniers_Pseudos_Utilises
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `Gestion Biblio 2020`.`Tbl_Derniers_Pseudos_Utilises` (
  `Id_Pseudo_Utilise` INT(10) NOT NULL,
  `Id_Pseudo` INT(10) NULL,
  `Date_Modification` DATETIME(6) NULL,
  `Heure_Modification` DATETIME(6) NULL,
  PRIMARY KEY (`Id_Pseudo_Utilise`),
  CONSTRAINT `{154A3273-B468-4F68-B73F-5F6005DAF605}`
    FOREIGN KEY (`Id_Pseudo`)
    REFERENCES `Gestion Biblio 2020`.`Tbl_Pseudo` (`Id_Pseudo`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT);

-- ----------------------------------------------------------------------------
-- Table Gestion Biblio 2020.Tbl_Fonctions
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `Gestion Biblio 2020`.`Tbl_Fonctions` (
  `Id_Fonction` INT(10) NOT NULL,
  `Fonction` VARCHAR(70) NULL,
  PRIMARY KEY (`Id_Fonction`));

-- ----------------------------------------------------------------------------
-- Table Gestion Biblio 2020.Tbl_Format
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `Gestion Biblio 2020`.`Tbl_Format` (
  `Id_Format` INT(10) NOT NULL,
  `Format_Livre` VARCHAR(25) NULL,
  `Image_Associee_Format` VARCHAR(20) NULL,
  PRIMARY KEY (`Id_Format`));

-- ----------------------------------------------------------------------------
-- Table Gestion Biblio 2020.Table_Recherche_Cles
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `Gestion Biblio 2020`.`Table_Recherche_Cles` (
  `Id_SC` INT(10) NOT NULL,
  `Id_Mot_Cle` INT(10) NULL,
  PRIMARY KEY (`Id_SC`),
  INDEX `Id_Mot_Clé` (`Id_Mot_Cle` ASC));

-- ----------------------------------------------------------------------------
-- Table Gestion Biblio 2020.Tbl_Sommaire_Pseudos
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `Gestion Biblio 2020`.`Tbl_Sommaire_Pseudos` (
  `Id_Sommaire_Pseudo` INT(10) NOT NULL,
  `Id_Sommaire` INT(10) NULL,
  `Id_Pseudo` INT(10) NULL,
  `Fonction` VARCHAR(50) NULL,
  PRIMARY KEY (`Id_Sommaire_Pseudo`));

-- ----------------------------------------------------------------------------
-- Table Gestion Biblio 2020.Tbl_Couverture_Pseudo
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `Gestion Biblio 2020`.`Tbl_Couverture_Pseudo` (
  `Id_Couverture_Pseudo` INT(10) NOT NULL,
  `Id_Pseudo` INT(10) NULL,
  `Id_Couverture` INT(10) NULL,
  `Fonction` VARCHAR(50) NULL,
  PRIMARY KEY (`Id_Couverture_Pseudo`),
  CONSTRAINT `{A79725E9-AF00-4207-9131-6A6D35CA863E}`
    FOREIGN KEY (`Id_Couverture`)
    REFERENCES `Gestion Biblio 2020`.`Tbl_Couverture` (`Id_Couverture`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT,
  CONSTRAINT `{F8F5E2FE-3996-4467-A01C-2402A1ECDAD7}`
    FOREIGN KEY (`Id_Pseudo`)
    REFERENCES `Gestion Biblio 2020`.`Tbl_Pseudo` (`Id_Pseudo`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT);

-- ----------------------------------------------------------------------------
-- Table Gestion Biblio 2020.Tbl_Oeuvres
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `Gestion Biblio 2020`.`Tbl_Oeuvres` (
  `Id_Oeuvre` INT(10) NOT NULL,
  `Oeuvre_Titre_Original` VARCHAR(120) NULL,
  `Oeuvre_Titre_Francais` VARCHAR(150) NULL,
  `Oeuvre_Date_Parution` VARCHAR(4) NULL,
  `Oeuvre_Type` VARCHAR(30) NULL,
  PRIMARY KEY (`Id_Oeuvre`));

-- ----------------------------------------------------------------------------
-- Table Gestion Biblio 2020.Tbl_Statut
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `Gestion Biblio 2020`.`Tbl_Statut` (
  `Id_Statut` INT(10) NOT NULL,
  `Statut_Livre` VARCHAR(20) NULL,
  `Statut_Couleur_Fond` INT(10) NULL,
  `Statut_Couleur_Texte` INT(10) NULL,
  `Image_Associee_Statut` VARCHAR(20) NULL,
  PRIMARY KEY (`Id_Statut`));

-- ----------------------------------------------------------------------------
-- Table Gestion Biblio 2020.Tbl_Pays
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `Gestion Biblio 2020`.`Tbl_Pays` (
  `Id_Pays` INT(10) NOT NULL,
  `Pays_Nom` VARCHAR(100) NULL,
  `Pays_Nom_Anglais` VARCHAR(100) NULL,
  `Image_Mini_Drapeau` LONGBLOB NULL,
  `ISO_3166-1_Num` SMALLINT(5) NULL,
  PRIMARY KEY (`Id_Pays`),
  CONSTRAINT `{61A3B51E-B1B2-4CB8-B2B0-A9197B45FFC9}`
    FOREIGN KEY (`ISO_3166-1_Num`)
    REFERENCES `Gestion Biblio 2020`.`Tbl_ISO3166-1` (`ISO_3166-1_Num`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT);

-- ----------------------------------------------------------------------------
-- Table Gestion Biblio 2020.Tbl_Recompense
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `Gestion Biblio 2020`.`Tbl_Recompense` (
  `Id_Recompense` INT(10) NOT NULL,
  `Recompense_Nom` VARCHAR(30) NULL,
  `Recompense_Infos` LONGTEXT NULL,
  `Recompense_Date_Creation` INT(10) NULL,
  `Recompense_Date_Fin` INT(10) NULL,
  `Recompense_Pays` INT(10) NULL,
  `Recompense_Image` VARCHAR(10) NULL,
  UNIQUE INDEX `Id_Auteur` (`Id_Recompense` ASC),
  PRIMARY KEY (`Id_Recompense`));

-- ----------------------------------------------------------------------------
-- Table Gestion Biblio 2020.Tbl_Liaison_Auteurs
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `Gestion Biblio 2020`.`Tbl_Liaison_Auteurs` (
  `Id_Liaison_Pseudo` INT(10) NOT NULL,
  `Id_Pseudo_Reference` INT(10) NULL,
  `Id_Pseudo` INT(10) NULL,
  `Champ1` INT(10) NULL,
  PRIMARY KEY (`Id_Liaison_Pseudo`));

-- ----------------------------------------------------------------------------
-- Table Gestion Biblio 2020.Tbl_Livre_Mot_Cle
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `Gestion Biblio 2020`.`Tbl_Livre_Mot_Cle` (
  `Id_Livre_Mot_Cle` INT(10) NOT NULL,
  `Id_Livre` INT(10) NULL,
  `Id_Mot_Cle` INT(10) NULL,
  PRIMARY KEY (`Id_Livre_Mot_Cle`),
  CONSTRAINT `{214E720F-5A1C-4C99-834A-7BAFBAEA5974}`
    FOREIGN KEY (`Id_Mot_Cle`)
    REFERENCES `Gestion Biblio 2020`.`Tbl_Mot_Cle` (`Id_Mot_Cle`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT,
  CONSTRAINT `{28C0BC76-A4F2-4D8F-82FB-1A42AA4494FD}`
    FOREIGN KEY (`Id_Livre`)
    REFERENCES `Gestion Biblio 2020`.`Tbl_Livre` (`Id_Livre`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT);

-- ----------------------------------------------------------------------------
-- Table Gestion Biblio 2020.Tbl_Stockage_Images
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `Gestion Biblio 2020`.`Tbl_Stockage_Images` (
  `Id_Stockage_Images` INT(10) NOT NULL,
  `Id_Edition` INT(10) NULL,
  `Id_Collection` INT(10) NULL,
  `Chemin_Stockage_Images` VARCHAR(80) NULL,
  `Nom_Stockage_Image` VARCHAR(15) NULL,
  `Numerotation_Nom_Stockage_Image` SMALLINT(5) NULL,
  `Infos_Stockage_Image` VARCHAR(100) NULL,
  `Type_Stockage_Image` VARCHAR(20) NULL,
  `Id_Logo` INT(10) NULL,
  PRIMARY KEY (`Id_Stockage_Images`),
  INDEX `Numérotation` (`Numerotation_Nom_Stockage_Image` ASC));

-- ----------------------------------------------------------------------------
-- Table Gestion Biblio 2020.Tbl_Couverture
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `Gestion Biblio 2020`.`Tbl_Couverture` (
  `Id_Couverture` INT(10) NOT NULL,
  `Couverture_ISBN_EAN` VARCHAR(17) NULL,
  `Couverture_ISBN` VARCHAR(10) NULL,
  `Couverture_Nom` VARCHAR(15) NULL,
  `Couverture_Annee_Creation` VARCHAR(4) NULL,
  `Couverture_Grand_Format` TINYINT(1) NOT NULL,
  `Couverture_Dos` TINYINT(1) NOT NULL,
  `Couverture_Verso` TINYINT(1) NOT NULL,
  `Couverture_Infos` VARCHAR(30) NULL,
  `Id_Version` INT(10) NULL,
  `Couverture_Quantite` SMALLINT(5) NULL,
  `Couverture_Stockage` VARCHAR(10) NULL,
  `Couverture_Date_DL` VARCHAR(7) NULL,
  `Couverture_Num_DL` VARCHAR(25) NULL,
  UNIQUE INDEX `Id_Auteur` (`Id_Couverture` ASC),
  PRIMARY KEY (`Id_Couverture`),
  CONSTRAINT `{178F7443-A83B-4F57-BDDC-A005A69BDDBE}`
    FOREIGN KEY (`Id_Version`)
    REFERENCES `Gestion Biblio 2020`.`Tbl_Version` (`Id_Version`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT);

-- ----------------------------------------------------------------------------
-- Table Gestion Biblio 2020.Tbl_Collection
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `Gestion Biblio 2020`.`Tbl_Collection` (
  `Id_Collection` INT(10) NOT NULL,
  `Collection_Nom` VARCHAR(65) NULL,
  `Id_Logo_Collection` INT(10) NULL,
  PRIMARY KEY (`Id_Collection`));

-- ----------------------------------------------------------------------------
-- Table Gestion Biblio 2020.Tbl_Livre_Sommaires
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `Gestion Biblio 2020`.`Tbl_Livre_Sommaires` (
  `Id_Sommaire` INT(10) NOT NULL,
  `Id_Livre` INT(10) NULL,
  `Position_Sommaire` SMALLINT(5) NULL,
  `Sommaire_Page_Debut` SMALLINT(5) NULL,
  `Sommaire_Page_Fin` SMALLINT(5) NULL,
  `Id_Oeuvre` INT(10) NULL,
  PRIMARY KEY (`Id_Sommaire`),
  CONSTRAINT `{39A54087-15E3-432E-9618-3B9F9643F49B}`
    FOREIGN KEY (`Id_Oeuvre`)
    REFERENCES `Gestion Biblio 2020`.`Tbl_Oeuvres` (`Id_Oeuvre`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT,
  CONSTRAINT `{465DD137-916A-4EC8-A491-63F3B906BB25}`
    FOREIGN KEY (`Id_Livre`)
    REFERENCES `Gestion Biblio 2020`.`Tbl_Livre` (`Id_Livre`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT);

-- ----------------------------------------------------------------------------
-- Table Gestion Biblio 2020.Tbl_Livre_Couverture
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `Gestion Biblio 2020`.`Tbl_Livre_Couverture` (
  `Id_Livre_Couverture` INT(10) NOT NULL,
  `Id_Livre` INT(10) NULL,
  `Id_Couverture` INT(10) NULL,
  PRIMARY KEY (`Id_Livre_Couverture`),
  CONSTRAINT `{2ADA91FF-0945-4EF4-AF3B-38A09390BC57}`
    FOREIGN KEY (`Id_Livre`)
    REFERENCES `Gestion Biblio 2020`.`Tbl_Livre` (`Id_Livre`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT,
  CONSTRAINT `{F4664395-C8BC-4D01-A014-B28D3D5775E5}`
    FOREIGN KEY (`Id_Couverture`)
    REFERENCES `Gestion Biblio 2020`.`Tbl_Couverture` (`Id_Couverture`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT);

-- ----------------------------------------------------------------------------
-- Table Gestion Biblio 2020.Tbl_Langue
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `Gestion Biblio 2020`.`Tbl_Langue` (
  `Id_Langue` INT(10) NOT NULL,
  `Langue` VARCHAR(30) NULL,
  PRIMARY KEY (`Id_Langue`));

-- ----------------------------------------------------------------------------
-- Table Gestion Biblio 2020.Tbl_Version
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `Gestion Biblio 2020`.`Tbl_Version` (
  `Id_Version` INT(10) NOT NULL,
  `Version_Livre` VARCHAR(50) NULL,
  PRIMARY KEY (`Id_Version`));

-- ----------------------------------------------------------------------------
-- Table Gestion Biblio 2020.Tbl_Livre_Importation
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `Gestion Biblio 2020`.`Tbl_Livre_Importation` (
  `Id_Livre` INT(10) NOT NULL,
  `Id_Reference` INT(10) NULL,
  `Livre_Numero` VARCHAR(20) NULL,
  `Livre_Titre` VARCHAR(150) NULL,
  `Livre_Sous_Titre` VARCHAR(200) NULL,
  `Livre_Quantite` INT(10) NULL,
  `Id_Edition` INT(10) NULL,
  `Id_Collection` INT(10) NULL,
  `Livre_Parution` VARCHAR(4) NULL,
  `Livre_Cycle_Nom1` VARCHAR(80) NULL,
  `Livre_Cycle_Tome1` VARCHAR(10) NULL,
  `Livre_Cycle_Nom2` VARCHAR(80) NULL,
  `Livre_Cycle_Tome2` VARCHAR(5) NULL,
  `Livre_Cycle_Nom3` VARCHAR(80) NULL,
  `Livre_Cycle_Tome3` VARCHAR(5) NULL,
  `Livre_Infos` LONGTEXT NULL,
  `Id_Format` INT(10) NULL,
  `Livre_ISBN` VARCHAR(17) NULL,
  `Livre_EAN` VARCHAR(13) NULL,
  `Livre_Code_Prix` VARCHAR(20) NULL,
  `Livre_Pages` SMALLINT(5) NULL,
  `Livre_Couverture` VARCHAR(15) NULL,
  `Id_Langue` INT(10) NULL,
  `Livre_Appreciation` SMALLINT(5) NULL,
  `Livre_Controle` TINYINT(1) NOT NULL,
  `Livre_Titre_Original` VARCHAR(90) NULL,
  `Livre_Date_Creation` VARCHAR(4) NULL,
  `Id_Etat` INT(10) NULL,
  `Id_Statut` INT(10) NULL,
  `Livre_Details` LONGTEXT NULL,
  `Livre_Date_Achat` DATETIME(6) NULL,
  `Livre_Prix_Achat` DECIMAL(19,4) NULL,
  `Livre_Cote` DECIMAL(19,4) NULL,
  `Livre_Info_Achat` VARCHAR(40) NULL,
  `Livre_Lu` TINYINT(1) NOT NULL,
  `Livre_Date_Modification` DATETIME(6) NOT NULL,
  `Id_Version` INT(10) NULL,
  `Id_Logo` INT(10) NULL,
  `Livre_Nouveau_Format` TINYINT(1) NOT NULL,
  `Notice_BNF` VARCHAR(60) NULL,
  `Livre_Absence_Couverture` TINYINT(1) NOT NULL,
  `Id_Stockage_Images` INT(10) NULL,
  `Livre_Fiche_A_Completer` TINYINT(1) NOT NULL,
  `Livre_Fiche_Ok` TINYINT(1) NOT NULL,
  `Numéro_Notice` VARCHAR(13) NULL,
  PRIMARY KEY (`Id_Livre`),
  INDEX `Numéro_Notice` (`Numéro_Notice` ASC),
  INDEX `Tbl_LivreId_Titre` (`Id_Reference` ASC));

-- ----------------------------------------------------------------------------
-- Table Gestion Biblio 2020.Tbl_Editions_Collections
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `Gestion Biblio 2020`.`Tbl_Editions_Collections` (
  `Id_Editions_Collections` INT(10) NOT NULL,
  `Id_Edition` INT(10) NULL,
  `Id_Collection` INT(10) NULL,
  `Date_Debut` VARCHAR(4) NULL,
  `Date_Fin` VARCHAR(4) NULL,
  `Statut_Collection` VARCHAR(15) NULL,
  `Quantite_Livres` SMALLINT(5) NULL,
  `Informations` LONGTEXT NULL,
  `Genre` VARCHAR(30) NULL,
  `Date_Modification` DATETIME(6) NULL,
  `Archivee` TINYINT(1) NOT NULL,
  `Livre_Couverture` VARCHAR(15) NULL,
  `Id_Format` INT(10) NULL,
  `Derniere_Modification` TINYINT(1) NOT NULL,
  `Id_Logo` INT(10) NULL,
  `Id_Stockage_Images` INT(10) NULL,
  `Numerotee` TINYINT(1) NOT NULL,
  `Non_Numerotee` TINYINT(1) NOT NULL,
  `Hors_Serie` TINYINT(1) NOT NULL,
  `Multi_Editions` TINYINT(1) NOT NULL,
  `Indice_Dewey` VARCHAR(20) NULL,
  `ISSN` VARCHAR(20) NULL,
  `Titre_Cle` VARCHAR(50) NULL,
  `Notice_BNF` VARCHAR(60) NULL,
  `Numero_Notice` VARCHAR(13) NULL,
  `BNF` TINYINT(1) NOT NULL,
  `Info_BNF` VARCHAR(50) NULL,
  `Info_Numerotation` VARCHAR(50) NULL,
  `Info_Hors_Serie` VARCHAR(50) NULL,
  `Info_Multi_Editions` VARCHAR(50) NULL,
  `Avancement_Collection` VARCHAR(150) NULL,
  PRIMARY KEY (`Id_Editions_Collections`),
  INDEX `Numéro_Notice` (`Numero_Notice` ASC),
  INDEX `Numérotée` (`Numerotee` ASC),
  INDEX `Titre_Clé` (`Titre_Cle` ASC),
  CONSTRAINT `{714F4561-089A-46A9-8C0A-7F3A135E578F}`
    FOREIGN KEY (`Id_Stockage_Images`)
    REFERENCES `Gestion Biblio 2020`.`Tbl_Stockage_Images` (`Id_Stockage_Images`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT,
  CONSTRAINT `{883D5D2D-4D16-4087-8145-FC8B3C26072C}`
    FOREIGN KEY (`Id_Collection`)
    REFERENCES `Gestion Biblio 2020`.`Tbl_Collection` (`Id_Collection`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT,
  CONSTRAINT `{F99745B6-205C-4080-9DBB-25A428BD45BC}`
    FOREIGN KEY (`Id_Edition`)
    REFERENCES `Gestion Biblio 2020`.`Tbl_Edition` (`Id_Edition`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT);
SET FOREIGN_KEY_CHECKS = 1;
