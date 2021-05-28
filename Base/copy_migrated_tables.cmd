REM Workbench Table Data copy script
REM Workbench Version: 8.0.24
REM 
REM Execute this to copy table data from a source RDBMS to MySQL.
REM Edit the options below to customize it. You will need to provide passwords, at least.
REM 
REM Source DB:  (Microsoft Access)
REM Target DB: Mysql@192.168.0.50:3306


@ECHO OFF
REM Source and target DB passwords
set arg_source_password=
set arg_target_password=Leslivre2021;
set arg_source_ssh_password=
set arg_target_ssh_password=


REM Set the location for wbcopytables.exe in this variable
set "wbcopytables_path=C:\Program Files\MySQL\MySQL Workbench 8.0 CE"

if not [%wbcopytables_path%] == [] set wbcopytables_path=%wbcopytables_path%
set wbcopytables=%wbcopytables_path%\wbcopytables.exe

if not exist "%wbcopytables%" (
	echo "wbcopytables.exe doesn't exist in the supplied path. Please set 'wbcopytables_path' with the proper path(e.g. to Workbench binaries)"
	exit 1
)

IF [%arg_source_password%] == [] (
    IF [%arg_target_password%] == [] (
        IF [%arg_source_ssh_password%] == [] (
            IF [%arg_target_ssh_password%] == [] (
                ECHO WARNING: All source and target passwords are empty. You should edit this file to set them.
            )
        )
    )
)
set arg_worker_count=2
REM Uncomment the following options according to your needs

REM Whether target tables should be truncated before copy
REM set arg_truncate_target=--truncate-target
REM Enable debugging output
REM set arg_debug_output=--log-level=debug3


REM Creation of file with table definitions for copytable

set table_file=%TMP%\wb_tables_to_migrate.txt
TYPE NUL > %TMP%\wb_tables_to_migrate.txt
ECHO 	"Tbl_ISO3166-1"	`Gestion Biblio 2020`	`Tbl_ISO3166-1`	-	-	"ISO_3166-1_Num", "ISO_3166-1_Alpha3", "ISO_3166-1_Alpha2", "ISO_3166-1_Nom_Fran�ais", "ISO_3166-1_Nom" >> %TMP%\wb_tables_to_migrate.txt
ECHO 	"Tbl_Mot_Cl�"	`Gestion Biblio 2020`	`Tbl_Mot_Cl�`	-	-	"Id_Mot_Cl�", "Mot_Cl�_Nom" >> %TMP%\wb_tables_to_migrate.txt
ECHO 	"Tbl_Edition"	`Gestion Biblio 2020`	`Tbl_Edition`	"Id_Edition"	`Id_Edition`	"Id_Edition", "Edition_Nom", "Id_Logo_Edition", "Site_Internet_Edition" >> %TMP%\wb_tables_to_migrate.txt
ECHO 	"Tbl_Oeuvre_Pseudos"	`Gestion Biblio 2020`	`Tbl_Oeuvre_Pseudos`	"Id_Oeuvre_Pseudo"	`Id_Oeuvre_Pseudo`	"Id_Oeuvre_Pseudo", "Id_Oeuvre", "Id_Pseudo", "Fonction" >> %TMP%\wb_tables_to_migrate.txt
ECHO 	"Tbl_Auteur_Fonctions"	`Gestion Biblio 2020`	`Tbl_Auteur_Fonctions`	"Id_Auteur_Fonctions"	`Id_Auteur_Fonctions`	"Id_Auteur_Fonctions", "Id_Auteur", "Id_Fonction" >> %TMP%\wb_tables_to_migrate.txt
ECHO 	"Tbl_Livre"	`Gestion Biblio 2020`	`Tbl_Livre`	"Id_Livre"	`Id_Livre`	"Id_Livre", "Id_R�f�rence", "Livre_Num�ro", "Livre_Titre", "Livre_Sous_Titre", "Livre_Quantit�", "Id_Edition", "Id_Collection", "Livre_Parution", "Livre_Cycle_Nom1", "Livre_Cycle_Tome1", "Livre_Cycle_Nom2", "Livre_Cycle_Tome2", "Livre_Cycle_Nom3", "Livre_Cycle_Tome3", "Livre_Infos", "Id_Format", "Livre_ISBN", "Livre_EAN", "Livre_Code_Prix", "Livre_Pages", "Livre_Couverture", "Id_Langue", "Livre_Appr�ciation", "Livre_Contr�le", "Livre_Titre_Original", "Livre_Date_Cr�ation", "Id_Etat", "Id_Statut", "Livre_D�tails", "Livre_Date_Achat", "Livre_Prix_Achat", "Livre_Cote", "Livre_Info_Achat", "Livre_Lu", "Livre_Date_Modification", "Id_Version", "Id_Logo", "Livre_Nouveau_Format", "Notice_BNF", "Livre_Absence_Couverture", "Id_Stockage_Images", "Livre_Fiche_A_Completer", "Livre_Fiche_Ok", "Num�ro_Notice", "Livre_Num_Tri" >> %TMP%\wb_tables_to_migrate.txt
ECHO 	"Tbl_Livre_R�compense"	`Gestion Biblio 2020`	`Tbl_Livre_R�compense`	-	-	"Id_Livre_R�compense", "Id_Livre", "Id_R�compense", "Cat�gorie_R�compense", "Ann�e_R�compense" >> %TMP%\wb_tables_to_migrate.txt
ECHO 	"Tbl_Cycle"	`Gestion Biblio 2020`	`Tbl_Cycle`	"Id_Cycle"	`Id_Cycle`	"Id_Cycle", "Cycle_Nom", "Cycle_Infos" >> %TMP%\wb_tables_to_migrate.txt
ECHO 	"Tbl_Auteurs"	`Gestion Biblio 2020`	`Tbl_Auteurs`	"Id_Auteur"	`Id_Auteur`	"Id_Auteur", "Auteur_Pr�nom", "Auteur_Nom", "Auteur_Sexe", "Id_Pays", "Auteur_Date_Naissance", "Auteur_Lieu_Naissance", "Auteur_Date_D�c�s", "Auteur_Lieu_D�c�s", "Auteur_Notes", "Auteur_Photo", "Id_R�f�rence", "Auteur_Statut", "Notice_BNF", "Lien_Wiki", "Auteur_Date_Modification", "Num�ro_Notice", "Auteur_Nom_Particule" >> %TMP%\wb_tables_to_migrate.txt
ECHO 	"Tbl_Mini_Icones"	`Gestion Biblio 2020`	`Tbl_Mini_Icones`	"Id_Mini_Icone"	`Id_Mini_Icone`	"Id_Mini_Icone", "Mini_Icone_Infos", "Mini_Icone_Image" >> %TMP%\wb_tables_to_migrate.txt
ECHO 	"Tbl_Livre_Cycle"	`Gestion Biblio 2020`	`Tbl_Livre_Cycle`	"Id_Livre_Cycle"	`Id_Livre_Cycle`	"Id_Livre_Cycle", "Id_Livre", "Id_Cycle", "Cycle_Tome" >> %TMP%\wb_tables_to_migrate.txt
ECHO 	"Tbl_Pseudo"	`Gestion Biblio 2020`	`Tbl_Pseudo`	"Id_Pseudo"	`Id_Pseudo`	"Id_Pseudo", "Pseudo_Pr�nom", "Pseudo_Nom", "Id_Auteur", "Id_Pays", "Pseudo_Statut", "Pseudo_Sexe", "Pseudo_Fonction_Principale", "Pseudo_Naissance", "Pseudo_D�c�s", "Pseudo_Nom_Sans_Accents", "Pseudo_Nom_Particule", "Id_Mini_Icone" >> %TMP%\wb_tables_to_migrate.txt
ECHO 	"Tbl_Logo"	`Gestion Biblio 2020`	`Tbl_Logo`	"Id_Logo"	`Id_Logo`	"Id_Logo", "Logo_Infos", "Logo_Image" >> %TMP%\wb_tables_to_migrate.txt
ECHO 	"Tbl_Derniers_Pseudos_Utilis�s"	`Gestion Biblio 2020`	`Tbl_Derniers_Pseudos_Utilis�s`	-	-	"Id_Pseudo_Utilis�", "Id_Pseudo", "Date_Modification", "Heure_Modification" >> %TMP%\wb_tables_to_migrate.txt
ECHO 	"Tbl_Etat"	`Gestion Biblio 2020`	`Tbl_Etat`	"Id_Etat"	`Id_Etat`	"Id_Etat", "Etat_Livre" >> %TMP%\wb_tables_to_migrate.txt
ECHO 	"Tbl_Livre_Pseudo"	`Gestion Biblio 2020`	`Tbl_Livre_Pseudo`	"Id_Livre_Pseudo"	`Id_Livre_Pseudo`	"Id_Livre_Pseudo", "Id_Livre", "Id_Pseudo", "Fonction" >> %TMP%\wb_tables_to_migrate.txt
ECHO 	"Tbl_Fonctions"	`Gestion Biblio 2020`	`Tbl_Fonctions`	"Id_Fonction"	`Id_Fonction`	"Id_Fonction", "Fonction" >> %TMP%\wb_tables_to_migrate.txt
ECHO 	"Tbl_Format"	`Gestion Biblio 2020`	`Tbl_Format`	"Id_Format"	`Id_Format`	"Id_Format", "Format_Livre", "Image_Associ�e_Format" >> %TMP%\wb_tables_to_migrate.txt
ECHO 	"Tbl_Derni�res_Fiches_Modifi�es"	`Gestion Biblio 2020`	`Tbl_Derni�res_Fiches_Modifi�es`	-	-	"Id_Fiche_Modifi�e", "Id_Livre", "Date_Modification", "Heure_Modification" >> %TMP%\wb_tables_to_migrate.txt
ECHO 	"Tbl_Sommaire_Pseudos"	`Gestion Biblio 2020`	`Tbl_Sommaire_Pseudos`	"Id_Sommaire_Pseudo"	`Id_Sommaire_Pseudo`	"Id_Sommaire_Pseudo", "Id_Sommaire", "Id_Pseudo", "Fonction" >> %TMP%\wb_tables_to_migrate.txt
ECHO 	"Tbl_Couverture_Pseudo"	`Gestion Biblio 2020`	`Tbl_Couverture_Pseudo`	"Id_Couverture_Pseudo"	`Id_Couverture_Pseudo`	"Id_Couverture_Pseudo", "Id_Pseudo", "Id_Couverture", "Fonction" >> %TMP%\wb_tables_to_migrate.txt
ECHO 	"Tbl_Oeuvres"	`Gestion Biblio 2020`	`Tbl_Oeuvres`	"Id_Oeuvre"	`Id_Oeuvre`	"Id_Oeuvre", "Oeuvre_Titre_Original", "Oeuvre_Titre_Fran�ais", "Oeuvre_Date_Parution", "Oeuvre_Type" >> %TMP%\wb_tables_to_migrate.txt
ECHO 	"Tbl_Statut"	`Gestion Biblio 2020`	`Tbl_Statut`	"Id_Statut"	`Id_Statut`	"Id_Statut", "Statut_Livre", "Statut_Couleur_Fond", "Statut_Couleur_Texte", "Image_Associ�e_Statut" >> %TMP%\wb_tables_to_migrate.txt
ECHO 	"Tbl_Pays"	`Gestion Biblio 2020`	`Tbl_Pays`	"Id_Pays"	`Id_Pays`	"Id_Pays", "Pays_Nom", "Pays_Nom_Anglais", "Image_Mini_Drapeau", "ISO_3166-1_Num" >> %TMP%\wb_tables_to_migrate.txt
ECHO 	"Tbl_R�compense"	`Gestion Biblio 2020`	`Tbl_R�compense`	-	-	"Id_R�compense", "R�compense_Nom", "R�compense_Infos", "R�compense_Date_Cr�ation", "R�compense_Date_Fin", "R�compense_Pays", "R�compense_Image" >> %TMP%\wb_tables_to_migrate.txt
ECHO 	"Tbl_Liaison_Auteurs"	`Gestion Biblio 2020`	`Tbl_Liaison_Auteurs`	"Id_Liaison_Pseudo"	`Id_Liaison_Pseudo`	"Id_Liaison_Pseudo", "Id_Pseudo_R�f�rence", "Id_Pseudo", "Champ1" >> %TMP%\wb_tables_to_migrate.txt
ECHO 	"Tbl_Stockage_Images"	`Gestion Biblio 2020`	`Tbl_Stockage_Images`	"Id_Stockage_Images"	`Id_Stockage_Images`	"Id_Stockage_Images", "Id_Edition", "Id_Collection", "Chemin_Stockage_Images", "Nom_Stockage_Image", "Num�rotation_Nom_Stockage_Image", "Infos_Stockage_Image", "Type_Stockage_Image", "Id_Logo" >> %TMP%\wb_tables_to_migrate.txt
ECHO 	"Tbl_Livre_Mot_Cl�"	`Gestion Biblio 2020`	`Tbl_Livre_Mot_Cl�`	-	-	"Id_Livre_Mot_Cl�", "Id_Livre", "Id_Mot_Cl�" >> %TMP%\wb_tables_to_migrate.txt
ECHO 	"Tbl_Couverture"	`Gestion Biblio 2020`	`Tbl_Couverture`	"Id_Couverture"	`Id_Couverture`	"Id_Couverture", "Couverture_ISBN_EAN", "Couverture_ISBN", "Couverture_Nom", "Couverture_Ann�e_Cr�ation", "Couverture_Grand_Format", "Couverture_Dos", "Couverture_Verso", "Couverture_Infos", "Id_Version", "Couverture_Quantit�", "Couverture_Stockage", "Couverture_Date_DL", "Couverture_Num_DL" >> %TMP%\wb_tables_to_migrate.txt
ECHO 	"Tbl_Collection"	`Gestion Biblio 2020`	`Tbl_Collection`	"Id_Collection"	`Id_Collection`	"Id_Collection", "Collection_Nom", "Id_Logo_Collection" >> %TMP%\wb_tables_to_migrate.txt
ECHO 	"Tbl_Livre_Sommaires"	`Gestion Biblio 2020`	`Tbl_Livre_Sommaires`	"Id_Sommaire"	`Id_Sommaire`	"Id_Sommaire", "Id_Livre", "Position_Sommaire", "Sommaire_Page_D�but", "Sommaire_Page_Fin", "Id_Oeuvre" >> %TMP%\wb_tables_to_migrate.txt
ECHO 	"Tbl_Livre_Couverture"	`Gestion Biblio 2020`	`Tbl_Livre_Couverture`	"Id_Livre_Couverture"	`Id_Livre_Couverture`	"Id_Livre_Couverture", "Id_Livre", "Id_Couverture" >> %TMP%\wb_tables_to_migrate.txt
ECHO 	"Table_Recherche_Cl�s"	`Gestion Biblio 2020`	`Table_Recherche_Cl�s`	-	-	"Id_SC", "Id_Mot_Cl�" >> %TMP%\wb_tables_to_migrate.txt
ECHO 	"Tbl_Langue"	`Gestion Biblio 2020`	`Tbl_Langue`	"Id_Langue"	`Id_Langue`	"Id_Langue", "Langue" >> %TMP%\wb_tables_to_migrate.txt
ECHO 	"Tbl_Version"	`Gestion Biblio 2020`	`Tbl_Version`	"Id_Version"	`Id_Version`	"Id_Version", "Version_Livre" >> %TMP%\wb_tables_to_migrate.txt
ECHO 	"Tbl_Livre_Importation"	`Gestion Biblio 2020`	`Tbl_Livre_Importation`	"Id_Livre"	`Id_Livre`	"Id_Livre", "Id_R�f�rence", "Livre_Num�ro", "Livre_Titre", "Livre_Sous_Titre", "Livre_Quantit�", "Id_Edition", "Id_Collection", "Livre_Parution", "Livre_Cycle_Nom1", "Livre_Cycle_Tome1", "Livre_Cycle_Nom2", "Livre_Cycle_Tome2", "Livre_Cycle_Nom3", "Livre_Cycle_Tome3", "Livre_Infos", "Id_Format", "Livre_ISBN", "Livre_EAN", "Livre_Code_Prix", "Livre_Pages", "Livre_Couverture", "Id_Langue", "Livre_Appr�ciation", "Livre_Contr�le", "Livre_Titre_Original", "Livre_Date_Cr�ation", "Id_Etat", "Id_Statut", "Livre_D�tails", "Livre_Date_Achat", "Livre_Prix_Achat", "Livre_Cote", "Livre_Info_Achat", "Livre_Lu", "Livre_Date_Modification", "Id_Version", "Id_Logo", "Livre_Nouveau_Format", "Notice_BNF", "Livre_Absence_Couverture", "Id_Stockage_Images", "Livre_Fiche_A_Completer", "Livre_Fiche_Ok", "Num�ro_Notice" >> %TMP%\wb_tables_to_migrate.txt
ECHO 	"Tbl_Editions_Collections"	`Gestion Biblio 2020`	`Tbl_Editions_Collections`	"Id_Editions_Collections"	`Id_Editions_Collections`	"Id_Editions_Collections", "Id_Edition", "Id_Collection", "Date_D�but", "Date_Fin", "Statut_Collection", "Quantit�_Livres", "Informations", "Genre", "Date_Modification", "Archiv�e", "Livre_Couverture", "Id_Format", "Derni�re_Modification", "Id_Logo", "Id_Stockage_Images", "Num�rot�e", "Non_Num�rot�e", "Hors_S�rie", "Multi_Editions", "Indice_Dewey", "ISSN", "Titre_Cl�", "Notice_BNF", "Num�ro_Notice", "BNF", "Info_BNF", "Info_Num�rotation", "Info_Hors_S�rie", "Info_Multi_Editions", "Avancement_Collection" >> %TMP%\wb_tables_to_migrate.txt


"%wbcopytables%" ^
 --odbc-source="DSN=biblio 64" ^
 --source-rdbms-type=MsAccess ^
 --target="leslivres@192.168.0.50:3306" ^
 --source-password="%arg_source_password%" ^
 --target-password="%arg_target_password%" ^
 --table-file="%table_file%" ^
 --target-ssh-port="22" ^
 --target-ssh-host="" ^
 --target-ssh-user="" ^
 --source-ssh-password="%arg_source_ssh_password%" ^
 --target-ssh-password="%arg_target_ssh_password%" --thread-count=%arg_worker_count% ^
 %arg_truncate_target% ^
 %arg_debug_output%

REM Removes the file with the table definitions
DEL %TMP%\wb_tables_to_migrate.txt


