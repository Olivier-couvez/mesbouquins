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
    class DbPseudo
    {
        MySqlDataReader reader;
        Dbconnect Connex;

        public DbPseudo()
        {
        }

        public bool AjoutersPeudo(Pseudo UnPseudo)
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
                    string requete = "INSERT INTO `tbl_livre` (`Id_Reference`, `Livre_Numero`, `Livre_Titre`) " +
                        "VALUES ('" + UnPseudo.pseudo_Nom + "', '" + UnPseudo.pseudo_Nom_Particule + "', '" + UnPseudo.pseudo_Prenom + "')";
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

        public (bool, string) ModifierPseudo(Pseudo UnPseudo, int IdPseudo)
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
                    string requete = "UPDATE tbl_livre SET `Id_Reference`= '" + UnPseudo.pseudo_Prenom + "', `Livre_Numero`= '" + UnPseudo.pseudo_Nom + "', `Livre_Titre`= '" + UnPseudo.pseudo_Nom_Particule + "' WHERE Id_Livre = " + IdPseudo + "";
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

        public (bool, string) SupprimerPseudo(Pseudo UnPseudo, int IdPseudo)
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
                    string requete = "DELETE FROM tbl_Pseudo WHERE Id_Pseudo = " + IdPseudo;
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


        public MySqlDataReader LecturetoutPseudo()
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
                    string requete = "SELECT * FROM tbl_Pseudo";
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

        public MySqlDataReader LectureUnPseudo(int Id)
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
                    string requete = "SELECT * FROM tbl_pseudo WHERE Id_Pseudo = "+Id;
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


        public MySqlDataReader LectureUnAuteur(int idLivre)
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
                    string requete = "SELECT tbl_pseudo.Pseudo_Nom FROM tbl_pseudo, tbl_livre_pseudo WHERE tbl_livre_pseudo.Id_Livre = " + idLivre + " AND tbl_pseudo.id_Pseudo = tbl_livre_pseudo.Id_Pseudo";
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

