using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace MesBouquins.ViewModels
{
    class MainPageViewModel: INotifyPropertyChanged
    {
        

        public MainPageViewModel()
        {
            DbLivres dbLivre = new DbLivres();

            dbLivre.LecturetoutLivre();
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
