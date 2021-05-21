using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using MySql.Data.MySqlClient;
using System.Configuration;
using MesBouquins.Models;

namespace MesBouquins
{
    class DbLivres
    {
        MySqlDataReader reader;
        Dbconnect Connex;

        public DbLivres()
        {
        }

        public bool AjouterClub(Livres UnClub)
        {
            bool opeOK = false;
            try
            {
                var ConnectionStrings = ConfigurationManager.ConnectionStrings;
                string bddServeur = Convert.ToString(ConnectionStrings["serveur"]);
                string sBddPort = Convert.ToString(ConnectionStrings["port"]);
                int bddPort = Convert.ToInt16(sBddPort);
                string bddBase = Convert.ToString(ConnectionStrings["base"]);
                string bddIdent = Convert.ToString(ConnectionStrings["identificateur"]);
                string bddMdp = Convert.ToString(ConnectionStrings["mdp"]);

                Connex = new Dbconnect(bddServeur, bddPort, bddBase, bddIdent, bddMdp);
                //Connex = new Dbconnect("secuoli.freeboxos.fr", 3306, "gestioncourses", "amoi", "");
                if (Connex.OuvrirConnexion())
                {
                    string requete = "INSERT INTO `club` (`Nom`, `Adresse`, `CodePostal`, `Ville`) " +
                        "VALUES ('" + UnClub.Nom + "', '" + UnClub.Adresse + "', '" + UnClub.Cp + "', '" + UnClub.Ville + "')";
                    Connex.RequeteNoData(requete);
                    opeOK = true;
                }
            }
            catch
            {
                opeOK = false;
            }
            Connex.FermerConnexion();
            return opeOK;
        }

        public (bool, string) ModifierClub(Livres UnClub, int IdClub)
        {
            bool opeOK = false;
            int ligneMod = 0;
            string messErreur = "";
            try
            {
                var ConnectionStrings = ConfigurationManager.ConnectionStrings;
                string bddServeur = Convert.ToString(ConnectionStrings["serveur"]);
                string sBddPort = Convert.ToString(ConnectionStrings["port"]);
                int bddPort = Convert.ToInt16(sBddPort);
                string bddBase = Convert.ToString(ConnectionStrings["base"]);
                string bddIdent = Convert.ToString(ConnectionStrings["identificateur"]);
                string bddMdp = Convert.ToString(ConnectionStrings["mdp"]);

                Connex = new Dbconnect(bddServeur, bddPort, bddBase, bddIdent, bddMdp);
                //Connex = new Dbconnect("secuoli.freeboxos.fr", 3306, "gestioncourses", "amoi", "");
                if (Connex.OuvrirConnexion())
                {
                    string requete = "UPDATE club SET `Nom`= '" + UnClub.Nom + "', `Adresse`= '" + UnClub.Adresse + "', `CodePostal`= '" + UnClub.Cp + "', `Ville`= '" + UnClub.Ville + "' WHERE IdClub = " + IdClub + "";
                    ligneMod = Connex.RequeteNoData(requete);
                    if (ligneMod == 0)
                    {
                        messErreur = Connex.Erreur;
                        opeOK = false;
                    }
                    else
                    {
                        opeOK = true;
                    }
                }
            }
            catch
            {
                opeOK = false;
                messErreur = "Erreur de connexion !";
            }
            Connex.FermerConnexion();
            return (opeOK, messErreur);
        }

        public (bool, string) SupprimerClub(Livres UnLivre, int IdLivre)
        {
            bool opeOK = false;
            int ligneMod = 0;
            string messErreur = "";

            try
            {
                var ConnectionStrings = ConfigurationManager.ConnectionStrings;
                string bddServeur = Convert.ToString(ConnectionStrings["serveur"]);
                string sBddPort = Convert.ToString(ConnectionStrings["port"]);
                int bddPort = Convert.ToInt16(sBddPort);
                string bddBase = Convert.ToString(ConnectionStrings["base"]);
                string bddIdent = Convert.ToString(ConnectionStrings["identificateur"]);
                string bddMdp = Convert.ToString(ConnectionStrings["mdp"]);

                Connex = new Dbconnect(bddServeur, bddPort, bddBase, bddIdent, bddMdp);
                //Connex = new Dbconnect("secuoli.freeboxos.fr", 3306, "gestioncourses", "amoi", "");
                if (Connex.OuvrirConnexion())
                {
                    string requete = "DELETE FROM club WHERE IdClub = " + IdClub;
                    ligneMod = Connex.RequeteNoData(requete);
                    if (ligneMod == 0)
                    {
                        messErreur = Connex.Erreur;
                        opeOK = false;
                    }
                    else
                    {
                        opeOK = true;
                    }
                }
            }
            catch
            {
                opeOK = false;
                messErreur = "Erreur de connexion !";
            }
            Connex.FermerConnexion();
            return (opeOK, messErreur);
        }


        public MySqlDataReader LecturetoutClub()
        {
            try
            {
                var ConnectionStrings = ConfigurationManager.ConnectionStrings;
                string bddServeur = Convert.ToString(ConnectionStrings["serveur"]);
                string sBddPort = Convert.ToString(ConnectionStrings["port"]);
                int bddPort = Convert.ToInt16(sBddPort);
                string bddBase = Convert.ToString(ConnectionStrings["base"]);
                string bddIdent = Convert.ToString(ConnectionStrings["identificateur"]);
                string bddMdp = Convert.ToString(ConnectionStrings["mdp"]);

                Connex = new Dbconnect(bddServeur, bddPort, bddBase, bddIdent, bddMdp);
                //Connex = new Dbconnect("secuoli.freeboxos.fr", 3306, "gestioncourses", "amoi", "");
                if (Connex.OuvrirConnexion())
                {
                    string requete = "SELECT * FROM club";
                    reader = Connex.RequeteSql(requete);
                    return reader;
                }
            }
            catch
            {
                return reader;
            }
            Connex.FermerConnexion();
            return reader;
        }
    }
}

