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

namespace MesBouquins.ViewModels
{
    class LivreViewModel : INotifyPropertyChanged
    {
        private string titre;
        public string Titre { get => titre; set { titre = value; OnPropertyChanged("Titre"); } }

        public ICommand QuitterAppli { get; set; }
        public Action CloseAction { get; internal set; }

        public event PropertyChangedEventHandler PropertyChanged;


        public LivreViewModel()
        {
            QuitterAppli = new Command(QuitterAppliAction);
        }


        private void OnPropertyChanged(string propertyName)
        {
            if (PropertyChanged != null)
            {
                PropertyChanged(this, new PropertyChangedEventArgs(propertyName));
            }
        }

        private void QuitterAppliAction(object sender)
        {
            CloseAction(); // Calls Close() method of the View
        }


    }
}
