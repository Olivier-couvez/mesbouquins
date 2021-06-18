using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;


namespace MesBouquins.Models
{
    class Collection
    {
        private Int16 id_Collection;
        private string collection_Nom;
        private Int16 id_Logo_Collection;

        public Int16 Id_Collection { get => id_Collection; set => id_Collection = value; }
        public string Collection_Nom { get => collection_Nom; set => collection_Nom = value; }
        public Int16 Id_Logo_Collection { get => id_Logo_Collection; set => id_Logo_Collection = value; }
    }
}
