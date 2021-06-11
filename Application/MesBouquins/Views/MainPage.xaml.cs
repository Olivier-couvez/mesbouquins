using MySql.Data.MySqlClient;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows;
using System.Windows.Controls;
using System.Windows.Data;
using System.Windows.Documents;
using System.Windows.Input;
using System.Windows.Media;
using System.Windows.Media.Imaging;
using System.Windows.Shapes;
using MesBouquins.ViewModels;
using MesBouquins.Models;

namespace MesBouquins.Views
{
    /// <summary>
    /// Logique d'interaction pour Bouquins.xaml
    /// </summary>
    public partial class Bouquins : Window
    {
  
        DbLivres BaseLivres;
        int IdLivre;
        public Bouquins()
        {
            InitializeComponent();
            DataContext = new MainPageViewModel();
        }

        private void Button_Click(object sender, RoutedEventArgs e)
        {
            IdLivre = 1500;
            Livre livre = new Livre(IdLivre);
            var result = livre.ShowDialog();
            livre.Close();          
        }

        /*
        private void MajGrid()
        {

            // lecture table complète de la base.
            BaseLivres = new DbLivres();
            MySqlDataReader reader = BaseLivres.LecturetoutLivre();

            if (reader != null)          // on teste si la requete a bien retournéer un résultat
            {

                // Vérifie si des données sont présente dans reader

                if (reader.HasRows)
                {
                    int i = 0;
                    while (reader.Read())
                    {
                        // Ajout de la ligne au gridview.

                        //DataGridViewCategories.Rows.Insert(i, Convert.ToInt16(reader.GetString(0)), reader.GetString(1), reader.GetString(2), reader.GetString(3), reader.GetString(4));

                        i++;
                    }
                }
            }
        }

        private void Window_Loaded(object sender, RoutedEventArgs e)
        {
            MajGrid();
        }
        */
    }
}
