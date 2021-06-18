<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\MrechercheEdition;
use \CodeIgniter\Exceptions\PageNotFoundException;

class CrechercheEdition extends Controller
{
	public function index()
	{
		$model = new MrechercheEdition();
		$data['result'] = $model->getAll();
		$data['page_title']="Editions";
		$data['page_titre1']="Recherche précise :";
        $data['heading'] ="Page détaillée ";
        $page['titrePage']="Page détaillée ";
		$page['meta']="Ceci est une recherche d'éditions";
		$data['pager'] = $model->pager;
		$page['contenu'] = view('Recherche/v_liste_recherche_edition', $data);
		return view('Commun/v_template', $page);
	}
	public function detail($prmId = null)
    {
        if ($prmId != null) {
            $model = new MrechercheEdition();
            $data['result'] = $model->getDetailEdition($prmId);
            if (count($data['result']) != 0) {
                $data['title'] = "Détail d'un conteneur";
                $data['heading'] = "Conteneur ID = " . $prmId;

                $page['contenu'] = view('Recherche/v_detail_recherche_edition', $data);
                return view('Commun/v_template', $page);
            } else {
                throw PageNotFoundException::forPageNotFound("cette recherche n'existe pas");
            }
        } else {
            throw PageNotFoundException::forPageNotFound("il faut choisir une autre recherhce");
        }
    }
	
}
