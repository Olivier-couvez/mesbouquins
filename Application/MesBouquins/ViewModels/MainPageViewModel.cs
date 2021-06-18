﻿using System;
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


        private async void InitialiseListLivre()
        {

            Livres livres = new Livres();
            List<Livres> ListLivres = new List<Livres>();
            DbLivres dbLivre = new DbLivres();
            var reader = dbLivre.Lecture("SELECT COUNT(*) FROM tbl_livre");


            reader.Read();

            int NbEnregistrement = reader.GetInt32(0);

            reader = dbLivre.Lecture("SELECT Livre_Titre FROM `tbl_livre`");

            reader.Read();

            

            





            while (await reader.ReadAsync())
            {
                ListLivres.Add(new Livres()
                {
                    
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


    }
}
