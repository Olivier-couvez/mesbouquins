using System;
using System.Collections.Generic;
using System.Text;
using System.Text.RegularExpressions;

namespace MesBouquins.Models
{
    class GestionCodeBarre
    {
		// Ne conserve que les chiffres d'une chaine de caractères
		public static string ChiffresSeulement(string chaine)
		{
			string resultat = "";
			foreach (char c in chaine)
			{
				if (c >= '0' && c <= '9')
				{
					resultat += c;
				}
			}
			return resultat;
		}

		// *** Calcule la clé d'un ISBN10 ***
		// ISBN10 utilisé jusqu'en 2007, puis passage à l'EAN13
		public static string CalculerCleISBN10(string isbn)
		{
			int somme = 0;
			int reste = 0;
			string resultat = "";

			if (isbn.Length > 8)
			{
				resultat = isbn.Substring(0, 9);
				for (int i = 0; i < 9; i++)
				{
					somme += (i + 1) * int.Parse(isbn[i].ToString());
				}
				reste = somme % 11;
				if (reste == 10)
					resultat = resultat + "X";
				else
					resultat = resultat + reste.ToString();
			}
			return resultat;
		}

		// *** Transforme ISBN10 en EAN13 ***
		// voir https://www.afnil.org/autre-media/ pour 978-2 et ensuite 979-10...
		public static string TransformerISBNenEAN13(string chaine)
		{
			string resultat = "";
			string calcul = "";
			if (chaine.Length > 8)
			{
				calcul = "978";
				calcul += chaine.Substring(0, 9);
				resultat = CalculerCleEAN13(calcul);
			}
			return resultat;
		}

		// *** Modifie un EAN13 pour généner un chaine compatible avec la police EAN13 ***
		// https://grandzebu.net/informatique/codbar/ean13.htm
		public static string AfficheEan13AvecPolice(string chaine)
		{
			int i;
			int first;
			int checksum = 0;
			string CodeBarre = "";
			bool tableA;

			if (Regex.IsMatch(chaine, "^\\d{13}$"))
			{
				checksum = Convert.ToInt32(chaine.Substring(12, 1));
				chaine += (10 - checksum % 10) % 10;
				//Le premier chiffre est pris tel quel, le deuxième vient de la table A
				//The first digit is taken just as it is, the second one come from table A
				CodeBarre = chaine.Substring(0, 1) + (char)(65 + Convert.ToInt32(chaine.Substring(1, 1)));
				first = Convert.ToInt32(chaine.Substring(0, 1));
				for (i = 2; i <= 6; i++)
				{
					tableA = false;
					switch (i)
					{
						case 2:
							if (first >= 0 && first <= 3) tableA = true;
							break;
						case 3:
							if (first == 0 || first == 4 || first == 7 || first == 8) tableA = true;
							break;
						case 4:
							if (first == 0 || first == 1 || first == 4 || first == 5 || first == 9) tableA = true;
							break;
						case 5:
							if (first == 0 || first == 2 || first == 5 || first == 6 || first == 7) tableA = true;
							break;
						case 6:
							if (first == 0 || first == 3 || first == 6 || first == 8 || first == 9) tableA = true;
							break;
					}
					if (tableA)
						CodeBarre += (char)(65 + Convert.ToInt32(chaine.Substring(i, 1)));
					else
						CodeBarre += (char)(75 + Convert.ToInt32(chaine.Substring(i, 1)));
				}
				CodeBarre += "*"; //Ajout séparateur central / Add middle separator
				for (i = 7; i <= 12; i++)
				{
					CodeBarre += (char)(97 + Convert.ToInt32(chaine.Substring(i, 1)));
				}
				CodeBarre += "+"; //Ajout de la marque de fin / Add end mark
			}
			return CodeBarre;
		}

		// *** Calcule la clé d'un EAN13 ***
		public static string CalculerCleEAN13(string chaine)
		{
			int iSum = 0;
			int iDigit = 0;
			string resultat = "";

			if (chaine.Length > 11)
			{
				resultat = chaine.Substring(0, 12);
				for (int i = 12; i >= 1; i--)
				{
					iDigit = Convert.ToInt32(chaine.Substring(i - 1, 1));
					if (i % 2 == 0)
					{ // odd  
						iSum += iDigit * 3;
					}
					else
					{ // even
						iSum += iDigit * 1;
					}
				}
				int iCheckSum = (10 - (iSum % 10)) % 10;
				resultat += iCheckSum.ToString();
			}
			return resultat;
		}
	}

}
