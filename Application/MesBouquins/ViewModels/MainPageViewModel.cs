using System;
using MesBouquins.Models;
using System.Collections.Generic;
using System.ComponentModel;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Reflection;
using MesBouquins.Views;

namespace MesBouquins.ViewModels
{
    class MainPageViewModel: INotifyPropertyChanged
    {
        int IdLivre;
        string titre;
        string auteur;
        string collection;
        string edition;
        DateTime date;
        int numero;
        

        public MainPageViewModel()
        {

            InfoMenu livres = new InfoMenu();
            List <InfoMenu> ListInfoMenu = new List<InfoMenu>();
            DbLivres Requete = new DbLivres();

            

            //ListInfoMenu.Add(new InfoMenu());

            InitialiseListLivre();

        }


        private void InitialiseListLivre()
        {

            Livres livres = new Livres();
            List<Livres> ListLivres = new List<Livres>();
            DbLivres dbLivre = new DbLivres();

            List<string> titreLivre = new List<string>();
            List<string> numeroLivre = new List<string>();
            List<DateTime> dateLivre = new List<DateTime>();

            var reader = dbLivre.Lecture("SELECT COUNT(*) FROM tbl_livre");


            reader.Read();

            int NbEnregistrement = reader.GetInt32(0);

            ////Livre_Titre
            //reader = dbLivre.Lecture("SELECT Livre_Titre FROM `tbl_livre`");

            //reader.Read();
            
            //while(reader.HasRows)
            //{
            //    if(!reader.IsDBNull(0) == false)
            //        titreLivre.Add(reader.GetString(0));
            //    else
            //        titreLivre.Add("");
            //    reader.Read();
            //}

            ////Livre_Numero
            //reader = dbLivre.Lecture("SELECT Livre_Numero FROM `tbl_livre`");

            //reader.Read();

            //while (reader.HasRows)
            //{
            //    numeroLivre.Add(reader.GetString(0));
            //    reader.Read();
            //}

            ////Livre_Date
            //reader = dbLivre.Lecture("SELECT `Livre_Parution` FROM `tbl_livre`");

            //reader.Read();

            //while (reader.HasRows)
            //{
            //    dateLivre.Add(reader.GetDateTime(0));
            //    reader.Read();
            //}






            //? Link pour recherche
            //? List<Livres> l = new List<Livres>();
            //? l.Where(x => x.Livre_Titre == "livre");
        }












        //while (await reader.ReadAsync())
        //{
        //    ListLivres.Add(new Livres()
        //    {
        //        Livre_Titre = !reader.IsDBNull(reader.GetOrdinal("Livre_Titre")) ? reader.GetFieldValue<string>(reader.GetOrdinal("Livre_Titre")) : string.Empty,
        //        Livre_Numero = !reader.IsDBNull(reader.GetOrdinal("Livre_Numero")) ? reader.GetFieldValue<string>(reader.GetOrdinal("Livre_Numero")) : string.Empty,
        //        //auteur

        //        //Livre_Numero =  !reader.IsDBNull(reader.GetOrdinal("Livre_Numero")) ? reader.GetFieldValue<string>(reader.GetOrdinal("Livre_Numero")) : string.Empty,

        //        //Livre_Sous_Titre = !reader.IsDBNull(reader.GetOrdinal("Livre_Sous_Titre")) ?  reader.GetFieldValue<string>(reader.GetOrdinal("Livre_Sous_Titre")) : string.Empty,
        //    });

        //};


        private static PropertyInfo[] GetProperties(object obj)
        {
            return obj.GetType().GetProperties();
        }

        public event PropertyChangedEventHandler PropertyChanged;

        private void OnPropertyChanged(string propertyName)
        {
            if (PropertyChanged != null)
            {
                PropertyChanged(this, new PropertyChangedEventArgs(propertyName));
            }
        }







        private void clickChoix()
        { 
        IdLivre = 1500;
            Livre livre = new Livre(IdLivre);
        var result = livre.ShowDialog();
        livre.Close();
        }


    }
}
