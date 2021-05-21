using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using MySql.Data.MySqlClient;


namespace GestionCourses
{
    class BddMysqlCourses
    {
        private MySqlConnection Connexion;
        private string AdrServeur, NomBdd, Utilisateur, MotPasse;
        private int NumPort;
        private string ChaineConnexion;
        private string _erreur;
        private bool EstConnecte;

        public BddMysqlCourses(string Serv, int Port, string Bdd, string User, string Pass)
        {
            AdrServeur = Serv;
            NomBdd = Bdd;
            Utilisateur = User;
            MotPasse = Pass;
            NumPort = Port;
            ChaineConnexion = "Server=" + AdrServeur +
                                ";Database=" + NomBdd +
                                ";port=" + NumPort +
                                ";User Id=" + Utilisateur +
                                ";password=" + MotPasse;
            Connexion = new MySqlConnection(ChaineConnexion);   // création de l'objet connnexion
            EstConnecte = false;      // connexion fermée par défaut

        }

        public bool OuvrirConnexion()
        {
            try
            {
                Connexion.Open();
                EstConnecte = true;
            }
            catch (Exception Er)
            {
                _erreur = Er.Message;
            }
            return EstConnecte;
        }


        public bool FermerConnexion()
        {
            try
            {
                Connexion.Close();
                EstConnecte = false;
            }
            catch (Exception Er)
            {
                _erreur = Er.Message;
            }
            return EstConnecte;
        }

        public string Erreur
        {
            get { return _erreur; }
        }

        public MySqlDataReader RequeteSql(string Requete)
        {
            MySqlCommand CmdSql = new MySqlCommand(Requete, Connexion);
            MySqlDataReader Reader = null;
            if (EstConnecte == true)
            {
                try
                {
                    Reader = CmdSql.ExecuteReader();
                }
                catch (Exception Er)
                {
                    _erreur = Er.Message;
                }
            }
            return Reader;
        }


        public int RequeteNoData(string Requete)
        {
            MySqlCommand CmdSqlNoData = new MySqlCommand(Requete, Connexion);
            int NbrLigneMofidifiees = 0;

            if (EstConnecte == true)
            {
                try
                {
                    NbrLigneMofidifiees = CmdSqlNoData.ExecuteNonQuery();
                }
                catch (MySqlException Er)
                {
                    _erreur = Er.Message;
                }
            }
            return NbrLigneMofidifiees;
        }
    }
}

