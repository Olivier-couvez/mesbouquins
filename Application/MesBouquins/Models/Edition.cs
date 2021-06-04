using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace MesBouquins.Models
{
    class Edition
    {
        private Int16 id_Edition;
        private string Edition_Nom;
        private Int16 Id_Logo_Edition;
        private string Site_Internet_Edition;

        public short Id_Edition { get => id_Edition; set => id_Edition = value; }
        public string Edition_Nom1 { get => Edition_Nom; set => Edition_Nom = value; }
        public short Id_Logo_Edition1 { get => Id_Logo_Edition; set => Id_Logo_Edition = value; }
        public string Site_Internet_Edition1 { get => Site_Internet_Edition; set => Site_Internet_Edition = value; }
    }
}
