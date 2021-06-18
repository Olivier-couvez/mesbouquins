using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace MesBouquins.Models
{
    class Pseudo
    {
        private Int16 Id_Format;
        private string Pseudo_Prenom;
        private string Pseudo_Nom;
        private Int16 Id_Auteur;
        private Int16 Id_Pays;
        private string Pseudo_Statut;
        private string Pseudo_Sexe;
        private string Pseudo_Fonction_Principale;
        private string Pseudo_Naissance;
        private string Pseudo_Deces;
        private string Pseudo_Nom_Sans_Accents;
        private string Pseudo_Nom_Particule;
        private Int16 Id_Mini_Icone;

        public Int16 id_Format { get => Id_Format; set => Id_Format = value; }
        public Int16 id_Auteur { get => Id_Auteur; set => Id_Auteur = value; }
        public Int16 id_Pays { get => Id_Pays; set => Id_Pays = value; }
        public Int16 id_Mini_Icone { get => Id_Mini_Icone; set => Id_Mini_Icone = value; }
        public string pseudo_Prenom { get => Pseudo_Prenom; set => Pseudo_Prenom = value; }
        public string pseudo_Nom { get => Pseudo_Nom; set => Pseudo_Nom = value; }
        public string pseudo_Statut { get => Pseudo_Statut; set => Pseudo_Statut = value; }
        public string pseudo_Sexe { get => Pseudo_Sexe; set => Pseudo_Sexe = value; }
        public string pseudo_Fonction_Principale { get => Pseudo_Fonction_Principale; set => Pseudo_Fonction_Principale = value; }
        public string pseudo_Naissance { get => Pseudo_Naissance; set => Pseudo_Naissance = value; }
        public string pseudo_Deces { get => Pseudo_Deces; set => Pseudo_Deces = value; }
        public string pseudo_Nom_Sans_Accents { get => Pseudo_Nom_Sans_Accents; set => Pseudo_Nom_Sans_Accents = value; }
        public string pseudo_Nom_Particule { get => Pseudo_Nom_Particule; set => Pseudo_Nom_Particule = value; }
    }
}
