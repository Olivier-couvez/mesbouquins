using MesBouquins.Models;
using MesBouquins.ViewModels;
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

namespace MesBouquins.Views
{
    /// <summary>
    /// Logique d'interaction pour Livre.xaml
    /// </summary>
    public partial class Livre : Window
    {
        public Livre(int IDLivre)
        {
            InitializeComponent();
            DataContext = new LivreViewModel(IDLivre);
            LivreViewModel vm = new LivreViewModel(IDLivre);
            this.DataContext = vm;
            if (vm.CloseAction == null)
                vm.CloseAction = new Action(this.Close);
        }
    }
}
