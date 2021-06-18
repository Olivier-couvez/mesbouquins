using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace MesBouquins.Models
{
    public class Edition
    {
        private Int16 id_Edition;
        private string edition_Nom;
        private Int16 id_Logo_Edition;
        private string site_Internet_Edition;

        public short Id_Edition { get => id_Edition; set => id_Edition = value; }
        public string Edition_Nom { get => edition_Nom; set => edition_Nom = value; }
        public short Id_Logo_Edition { get => id_Logo_Edition; set => id_Logo_Edition = value; }
        public string Site_Internet_Edition { get => site_Internet_Edition; set => site_Internet_Edition = value; }
    }
}
