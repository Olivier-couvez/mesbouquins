using System;
using MesBouquins.Models;
using System.Collections.Generic;
using System.ComponentModel;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Reflection;

namespace MesBouquins.ViewModels
{
    class MainPageViewModel: INotifyPropertyChanged
    {

        string titre;
        string auteur;
        string collection;
        string edition;
        

        public MainPageViewModel()
        {
            

            List <Livres> ListLivres = new List<Livres>();


            InitialiseListLivre();




        }


        private async void InitialiseListLivre()
        {

            Livres livres = new Livres();
            List<Livres> ListLivres = new List<Livres>();
            DbLivres dbLivre = new DbLivres();
            var reader = dbLivre.LecturetoutLivre();


            while (await reader.ReadAsync())
            {

                

                ListLivres.Add(new Livres()
                {
                    Id_Livre = reader.GetFieldValue<int>(reader.GetOrdinal("Id_Livre")),
                    Id_Reference = reader.GetFieldValue<int>(reader.GetOrdinal("id_Reference")),
                    //Livre_Numero = reader.GetFieldValue<string>(reader.GetOrdinal("Livre_Numero")),
                    //Livre_Titre = reader.GetFieldValue<string>(reader.GetOrdinal("Livre_Titre")),
                    //Livre_Sous_Titre = reader.GetFieldValue<string>(reader.GetOrdinal("Livre_Sous_Titre")),
            });
                
            };
        }

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


    }
}
