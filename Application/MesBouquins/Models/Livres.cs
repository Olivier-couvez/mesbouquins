using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace MesBouquins.Models
{
    class Livres
    {
        private Int16 id_Livre;
        private Int16 id_Reference;
        private string livre_Numero;
        private string livre_Titre;


        public Livres(Int16 _id_Livre, Int16 _id_Reference, string _livre_Numero, string _livre_Titre)
        {
            Id_Livre = _id_Livre;
            id_Reference = _id_Reference;
            livre_Numero = _livre_Numero;
            livre_Titre = _livre_Titre;
        }

        public short Id_Livre { get => id_Livre; set => id_Livre = value; }
        public short Id_Reference { get => id_Reference; set => id_Reference = value; }
        public string Livre_Numero { get => livre_Numero; set => livre_Numero = value; }
        public string Livre_Titre { get => livre_Titre; set => livre_Titre = value; }
    }
}
