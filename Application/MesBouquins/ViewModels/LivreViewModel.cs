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
        public class Auteur
        {
            public Auteur(string name, string matches)
            {
                Nom = nom;
            }

            public string Non { get; set; }
        }

        public class ItemHandler
        {
            public ItemHandler()
            {
                Auteurs = new List<Auteur>();
            }

            public List<Auteur> Auteurs { get; private set; }

            public void Add(Auteur auteur)
            {
                Auteurs.Add(auteur);
            }
        }
        public List<Auteur> Auteurs
        {
            get { return _itemHandler.Auteurs; }
        }

        private readonly ItemHandler _itemHandler;

        private string tempAuteur;


        DbLivres BaseLivre;
        DbCollection BaseCollection;
        DbEdition BaseEdition;
        DbLangues BaseLangue;
        DbPseudo BasePseudo;


        private string titre;
        private string titreOri;
        private string numero;
        private string premParution;
        private string ean13;
        private string ean13Txt;
        private string isbn;
        private string collection;
        private string couverture;
        public string nomImage;
        public string parution;
        public string langue;
        private string edition;


        private string idCollection;
        private string idEdition;
        private string idlangue;

        private int IdDuLivre;
        public string Titre { get => titre; set { titre = value; OnPropertyChanged("Titre"); } }
        public string TitreOri { get => titreOri; set { titreOri = value; OnPropertyChanged("TitreOri"); } }
        public string Numero { get => numero; set { numero = value; OnPropertyChanged("Numero"); } }
        public string PremParution { get => premParution; set { premParution = value; OnPropertyChanged("PremParution"); } }
        public string Ean13 { get => ean13; set { ean13 = value; OnPropertyChanged("Ean13"); } }
        public string Isbn { get => isbn; set { isbn = value; OnPropertyChanged("Isbn"); } }
        public string Collection { get => collection; set { collection = value; OnPropertyChanged("Collection"); } }
        public string Ean13Txt { get => ean13Txt; set { ean13Txt = value; OnPropertyChanged("Ean13Txt"); } }
        public string Parution { get => parution; set { parution = value; OnPropertyChanged("Parution"); } }
        public string Edition { get => edition; set { edition = value; OnPropertyChanged("Edition"); } }
        public string Langue { get => langue; set { langue = value; OnPropertyChanged("Langue"); } }
        public string NomImage { get => nomImage; set { nomImage = value; } }

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
                    Numero = reader.IsDBNull(2) ? string.Empty : reader.GetString(2);
                    PremParution = reader.IsDBNull(26) ? string.Empty : reader.GetString(26);
                    Ean13 = reader.IsDBNull(18) ? string.Empty : reader.GetString(18);
                    Isbn = reader.IsDBNull(17) ? string.Empty : reader.GetString(17);
                    couverture = reader.IsDBNull(21) ? string.Empty : reader.GetString(21);
                    Parution = reader.IsDBNull(8) ? string.Empty : reader.GetString(8);

                    Ean13Txt = GestionCodeBarre.AfficheEan13AvecPolice(Ean13);

                    idCollection = reader.IsDBNull(7) ? string.Empty : reader.GetString(7);
                    idEdition = reader.IsDBNull(6) ? string.Empty : reader.GetString(6);
                    idlangue = reader.IsDBNull(22) ? string.Empty : reader.GetString(22);

                    NomImage = @"E:\photos\" + couverture + ".jpg";



                    // recherche collection

                    BaseCollection = new DbCollection();
                    MySqlDataReader readerCol = BaseCollection.LectureUnCollection(Convert.ToInt16(idCollection));
                    

                    if (readerCol != null)          // on teste si la requete a bien retournéer un résultat
                    {

                        // Vérifie si des données sont présente dans reader

                        if (readerCol.HasRows)
                        {

                            readerCol.Read();
                            Collection = readerCol.IsDBNull(1) ? string.Empty : readerCol.GetString(1);

                        }
                    }

                    // recherche Edition

                    BaseEdition = new DbEdition();
                    MySqlDataReader readerEdi = BaseEdition.LectureUnEdition(Convert.ToInt16(idEdition));


                    if (readerEdi != null)          // on teste si la requete a bien retournéer un résultat
                    {

                        // Vérifie si des données sont présente dans reader

                        if (readerEdi.HasRows)
                        {

                            readerEdi.Read();
                            Edition = readerEdi.IsDBNull(1) ? string.Empty : readerEdi.GetString(1);

                        }
                    }

                    // recherche Langue

                    BaseLangue = new DbLangues();
                    MySqlDataReader readerlan = BaseLangue.LectureUnLangues(Convert.ToInt16(idlangue));


                    if (readerlan != null)          // on teste si la requete a bien retournéer un résultat
                    {

                        // Vérifie si des données sont présente dans reader

                        if (readerlan.HasRows)
                        {

                            readerlan.Read();
                            Langue = readerlan.IsDBNull(1) ? string.Empty : readerlan.GetString(1);

                        }
                    }

                    // recherche Pseudo

                    _itemHandler = new ItemHandler();

                    BasePseudo = new DbPseudo();
                    MySqlDataReader readerpse = BasePseudo.LectureUnAuteur(Convert.ToInt16(IdDuLivre));


                    if (readerlan != null)          // on teste si la requete a bien retournéer un résultat
                    {

                        // Vérifie si des données sont présente dans reader

                        if (readerlan.HasRows)
                        {
                            while (readerpse.Read())
                            {
                                tempAuteur = readerlan.IsDBNull(0) ? string.Empty : readerlan.GetString(0)
                                _itemHandler.Add(new Auteur(tempAuteur));
                            }

                        }
                    }

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
