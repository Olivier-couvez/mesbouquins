using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace MesBouquins.Models
{
    class Langues
    {
        private Int16 id_Langue;
        private string langue;
        public Int16 Id_Langue { get => id_Langue; set => id_Langue = value; }
        public string Langue { get => langue; set => langue = value; }
    }
}
