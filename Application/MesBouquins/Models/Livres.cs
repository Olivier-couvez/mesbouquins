using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace MesBouquins.Models
{
    class Livres
    {
        private int id;
        private string nom;


        public Livres(int _id, string _nom)
        {
            Id = _id;
            Nom = _nom;

        }

        public Livres(string _nom)
        {
            Nom = _nom;

        }

        public int Id { get => id; set => id = value; }
        public string Nom { get => nom; set => nom = value; }

    }
}
