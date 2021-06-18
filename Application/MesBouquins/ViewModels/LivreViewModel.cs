using MesBouquins.Models;
using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Input;
using System.Windows;
using System.Windows.Media;
using MySql.Data.MySqlClient;

namespace MesBouquins.ViewModels
{
    class LivreViewModel : INotifyPropertyChanged
    {
        DbLivres BaseLivre;
        private string titre;
        private string titreOri;

        private int IdDuLivre;
        public string Titre { get => titre; set { titre = value; OnPropertyChanged("Titre"); } }
        public string TitreOri { get => titreOri; set { titreOri = value; OnPropertyChanged("TitreOri"); } }

        public ICommand QuitterAppli { get; set; }
        public Action CloseAction { get; internal set; }

        public event PropertyChangedEventHandler PropertyChanged;

        public LivreViewModel(int IdLivre)
        {
            QuitterAppli = new Command(QuitterAppliAction);

            IdDuLivre = IdLivre;

            LectureLivre();
        }
        private void OnPropertyChanged(string propertyName)
        {
            if (PropertyChanged != null)
            {
                PropertyChanged(this, new PropertyChangedEventArgs(propertyName));
            }
        }

        private void LectureLivre()
        {
            // lecture table complète de la base.
            BaseLivre = new DbLivres();
            MySqlDataReader reader = BaseLivre.LectureUnLivre(IdDuLivre);

            if (reader != null)          // on teste si la requete a bien retournéer un résultat
            {

                // Vérifie si des données sont présente dans reader

                if (reader.HasRows)
                {

                    reader.Read();

                    // Gestion  affichage du livre

                    Titre = reader.GetString(3);
                    TitreOri = reader.IsDBNull(4) ? string.Empty : reader.GetString(4);


                    //DataGridViewCategories.Rows.Insert(i, Convert.ToInt16(reader.GetString(0)), reader.GetString(1), reader.GetString(2), reader.GetString(3), reader.GetString(4));

                }
            }
        }




        private void QuitterAppliAction(object sender)
        {
            CloseAction(); // Calls Close() method of the View
        }

    }
}
