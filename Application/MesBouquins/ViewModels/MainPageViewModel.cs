﻿using System;
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

                    Livre_Numero =  !reader.IsDBNull(reader.GetOrdinal("Livre_Numero")) ? reader.GetFieldValue<string>(reader.GetOrdinal("Livre_Numero")) : string.Empty,
                    Livre_Titre = !reader.IsDBNull(reader.GetOrdinal("Livre_Titre")) ?  reader.GetFieldValue<string>(reader.GetOrdinal("Livre_Titre")) : string.Empty,
                    Livre_Sous_Titre = !reader.IsDBNull(reader.GetOrdinal("Livre_Sous_Titre")) ?  reader.GetFieldValue<string>(reader.GetOrdinal("Livre_Sous_Titre")) : string.Empty,
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







        private void clickChoix()
        { 
        IdLivre = 1500;
            Livre livre = new Livre(IdLivre);
        var result = livre.ShowDialog();
        livre.Close();
        }


    }
}
