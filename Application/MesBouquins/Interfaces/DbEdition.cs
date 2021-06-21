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
    class DbEdition
    {
        MySqlDataReader reader;
        Dbconnect Connex;

        public DbEdition()
        {
        }

        public bool AjouterEdition(Edition UnEdition)
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

                if (Connex.OuvrirConnexion())
                {
                    string requete = "INSERT INTO `tbl_collection` (`Edition_Nom`, `Id_Logo_Edition`, `Site_Internet_Edition`) " +
                        "VALUES (" + UnEdition.Edition_Nom + "', '" + UnEdition.Id_Logo_Edition + "', '" + UnEdition.Site_Internet_Edition + "')";
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

        public (bool, string) ModifierCollection(Edition UnEdition, int IdEdition)
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
                    string requete = "UPDATE tbl_Edition SET `Edition_Nom = '" + UnEdition.Edition_Nom + "', `Id_Logo_Edition`= '" + UnEdition.Id_Logo_Edition + "', `Site_Internet_Edition`= '" + UnEdition.Site_Internet_Edition + "' WHERE Id_Edition = " + IdEdition + "";
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

        public (bool, string) SupprimerEdition(Edition UnEdition, int IdEdition)
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
                if (Connex.OuvrirConnexion())
                {
                    string requete = "DELETE FROM tbl_edition WHERE Id_edition = " + IdEdition;
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


        public MySqlDataReader LecturetoutEdition()
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
                if (Connex.OuvrirConnexion())
                {
                    string requete = "SELECT * FROM tbl_edition";
                    return Connex.RequeteSql(requete);
                }
            }
            catch(Exception e)
            {
                return reader;
            }
            Connex.FermerConnexion();
            return reader;
        }

        public MySqlDataReader LectureUnEdition(int Id)
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
                if (Connex.OuvrirConnexion())
                {
                    string requete = "SELECT * FROM tbl_edition WHERE Id_Edition = " + Id;
                    return Connex.RequeteSql(requete);
                }
            }
            catch (Exception e)
            {
                return reader;
            }
            Connex.FermerConnexion();
            return reader;
        }


        public MySqlDataReader Lecture(string requete)
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
                if (Connex.OuvrirConnexion())
                {
                    return Connex.RequeteSql(requete);
                }
            }
            catch (Exception e)
            {
                return reader;
            }
            Connex.FermerConnexion();
            return reader;
        }
    }
}

