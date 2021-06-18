using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace MesBouquins.Models
{
    class Livres
    {
        private int id_Livre;
        private int id_Reference;
        private string livre_Numero;
        private string livre_Titre;
        private string livre_Sous_Titre;
        private int livre_Quantite;
        private int Id_Edition;
        private int Id_Collection;
        private string livre_Parution;
        private string livre_Cycle_nom1;
        private string livre_Cycle_Tome1;
        private string livre_Cycle_nom2;
        private string livre_Cycle_Tome2;
        private string livre_Cycle_nom3;
        private string livre_Cycle_Tome3;
        private string livre_infos;
        private int Id_format;
        private string livre_ISBN;
        private string livre_EAN;
        private string livre_Code_Prix;
        private int livre_Pages;
        private string livre_Couverture;
        private int Id_Langue;
        private int livre_Appreciation;
        private Boolean livre_Controle;
        private string livre_Titre_Original;
        private string livre_Date_Creation;
        private int Id_Etat;
        private int Id_Statut;
        private string livre_Details;
        private DateTime livre_Date_Achat;
        private double livre_Prix_Achat;
        private double livre_Cote;
        private string livre_Info_Achat;
        private Boolean livre_Lu;
        private DateTime livre_Date_Modification;
        private int Id_Version;
        private int Id_Logo;
        private Boolean livre_Nouveau_format;
        private string notice_BNF;
        private Boolean livre_Absence_Couverture;
        private int Id_Stockage_Images;
        private Boolean livre_Fiche_A_Completer;
        private Boolean livre_Fiche_OK;
        private string numero_notice;
        private int livre_Num_Tri;
        private DateTime livre_Date_Parution;


        public int Id_Livre { get => id_Livre; set => id_Livre = value; }
        public int Id_Reference { get => id_Reference; set => id_Reference = value; }
        public string Livre_Numero { get => livre_Numero; set => livre_Numero = value; }
        public string Livre_Titre { get => livre_Titre; set => livre_Titre = value; }
        public string Livre_Sous_Titre { get => livre_Sous_Titre; set => livre_Sous_Titre = value; }
        public int Livre_Quantite { get => livre_Quantite; set => livre_Quantite = value; }
        public int Id_Edition1 { get => Id_Edition; set => Id_Edition = value; }
        public int Id_Collection1 { get => Id_Collection; set => Id_Collection = value; }
        public string Livre_Parution { get => livre_Parution; set => livre_Parution = value; }
        public string Livre_Cycle_nom1 { get => livre_Cycle_nom1; set => livre_Cycle_nom1 = value; }
        public string Livre_Cycle_Tome1 { get => livre_Cycle_Tome1; set => livre_Cycle_Tome1 = value; }
        public string Livre_Cycle_nom2 { get => livre_Cycle_nom2; set => livre_Cycle_nom2 = value; }
        public string Livre_Cycle_Tome2 { get => livre_Cycle_Tome2; set => livre_Cycle_Tome2 = value; }
        public string Livre_Cycle_nom3 { get => livre_Cycle_nom3; set => livre_Cycle_nom3 = value; }
        public string Livre_Cycle_Tome3 { get => livre_Cycle_Tome3; set => livre_Cycle_Tome3 = value; }
        public string Livre_infos { get => livre_infos; set => livre_infos = value; }
        public int Id_format1 { get => Id_format; set => Id_format = value; }
        public string Livre_ISBN { get => livre_ISBN; set => livre_ISBN = value; }
        public string Livre_EAN { get => livre_EAN; set => livre_EAN = value; }
        public string Livre_Code_Prix { get => livre_Code_Prix; set => livre_Code_Prix = value; }
        public int Livre_Pages { get => livre_Pages; set => livre_Pages = value; }
        public string Livre_Couverture { get => livre_Couverture; set => livre_Couverture = value; }
        public int Id_Langue1 { get => Id_Langue; set => Id_Langue = value; }
        public int Livre_Appreciation { get => livre_Appreciation; set => livre_Appreciation = value; }
        public bool Livre_Controle { get => livre_Controle; set => livre_Controle = value; }
        public string Livre_Titre_Original { get => livre_Titre_Original; set => livre_Titre_Original = value; }
        public string Livre_Date_Creation { get => livre_Date_Creation; set => livre_Date_Creation = value; }
        public int Id_Etat1 { get => Id_Etat; set => Id_Etat = value; }
        public int Id_Statut1 { get => Id_Statut; set => Id_Statut = value; }
        public string Livre_Details { get => livre_Details; set => livre_Details = value; }
        public DateTime Livre_Date_Achat { get => livre_Date_Achat; set => livre_Date_Achat = value; }
        public double Livre_Prix_Achat { get => livre_Prix_Achat; set => livre_Prix_Achat = value; }
        public double Livre_Cote { get => livre_Cote; set => livre_Cote = value; }
        public string Livre_Info_Achat { get => livre_Info_Achat; set => livre_Info_Achat = value; }
        public bool Livre_Lu { get => livre_Lu; set => livre_Lu = value; }
        public DateTime Livre_Date_Modification { get => livre_Date_Modification; set => livre_Date_Modification = value; }
        public int Id_Version1 { get => Id_Version; set => Id_Version = value; }
        public int Id_Logo1 { get => Id_Logo; set => Id_Logo = value; }
        public bool Livre_Nouveau_format { get => livre_Nouveau_format; set => livre_Nouveau_format = value; }
        public string Notice_BNF { get => notice_BNF; set => notice_BNF = value; }
        public bool Livre_Absence_Couverture { get => livre_Absence_Couverture; set => livre_Absence_Couverture = value; }
        public int Id_Stockage_Images1 { get => Id_Stockage_Images; set => Id_Stockage_Images = value; }
        public bool Livre_Fiche_A_Completer { get => livre_Fiche_A_Completer; set => livre_Fiche_A_Completer = value; }
        public bool Livre_Fiche_OK { get => livre_Fiche_OK; set => livre_Fiche_OK = value; }
        public string Numero_notice { get => numero_notice; set => numero_notice = value; }
        public int Livre_Num_Tri { get => livre_Num_Tri; set => livre_Num_Tri = value; }
        public DateTime Livre_Date_Parution { get => livre_Date_Parution; set => livre_Date_Parution = value; }
    }
}
