using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace MesBouquins.Models
{

    /// <summary>
    /// Classe contenant les informations présentes dans le menu 
    /// Les infirmations sont directements requêté sur la bdd au sein de MainPageViewModel
    /// </summary>
    class InfoMenu
    {
        string titre;
        string auteur;
        string collection;
        string edition;
        DateTime date;
        int numero;

        public string Titre { get => titre; set => titre = value; }
        public string Auteur { get => auteur; set => auteur = value; }
        public string Collection { get => collection; set => collection = value; }
        public string Edition { get => edition; set => edition = value; }
        public DateTime Date { get => date; set => date = value; }
        public int Numero { get => numero; set => numero = value; }
    }
}
