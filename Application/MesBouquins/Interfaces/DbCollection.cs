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
    class DbCollection
    {
        MySqlDataReader reader;
        Dbconnect Connex;

        public DbCollection()
        {
        }

        public bool AjouterCollection(Collection UnCollection)
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
                    string requete = "INSERT INTO `tbl_collection` (`Collection_Nom`, `Id_Logo_Collection`) " +
                        "VALUES (" + UnCollection.Collection_Nom + "', '" + UnCollection.Id_Logo_Collection + "')";
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

        public (bool, string) ModifierCollection(Collection UnCollection, int IdCollection)
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
                    string requete = "UPDATE tbl_collection SET `Collection_Nom = '" + UnCollection.Collection_Nom + "', `Id_Logo_Collection`= '" + UnCollection.Id_Logo_Collection + "' WHERE Id_Collection = " + IdCollection + "";
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

        public (bool, string) SupprimerCollection(Livres UnLivre, int IdCollection)
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
                    string requete = "DELETE FROM tbl_collection WHERE Id_Collection = " + IdCollection;
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


        public MySqlDataReader LecturetoutCollection()
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
                    string requete = "SELECT * FROM tbl_collection";
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

        public MySqlDataReader LectureUnCollection(int Id)
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
                    string requete = "SELECT * FROM tbl_collection WHERE Id_collection = "+Id;
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

