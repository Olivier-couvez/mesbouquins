<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\MrechercheResultat;
use \CodeIgniter\Exceptions\PageNotFoundException;

class Crecherche extends Controller
{
	public function index()
	{
		$model = new MrechercheResultat();
		$data['result'] = $model->getAll();
		$data['page_title']="Recherche";
		$data['page_titre1']="Recherche précise :";
        $data['heading'] ="Page détaillée ";
        $page['titrePage']="Page détaillée ";
		$page['meta']="Ceci est une recherch détaillée";
		$data['pager'] = $model->pager;
		$page['contenu'] = view('Recherche/v_liste_recherche_resultat', $data);
		return view('Commun/v_template', $page);
	}
	public function detail($prmId = null)
    {
        if ($prmId != null) {
            $model = new MrechercheResultat();
            $data['result'] = $model->getDetail($prmId);
            if (count($data['result']) != 0) {
                $data['title'] = "Détail d'un conteneur";
                $data['heading'] = "Conteneur ID = " . $prmId;

                $page['contenu'] = view('Recherche/v_detail_recherche', $data);
                return view('Commun/v_template', $page);
            } else {
                throw PageNotFoundException::forPageNotFound("cette recherche n'existe pas");
            }
        } else {
            throw PageNotFoundException::forPageNotFound("il faut choisir une autre recherhce");
        }
    }
	
}
