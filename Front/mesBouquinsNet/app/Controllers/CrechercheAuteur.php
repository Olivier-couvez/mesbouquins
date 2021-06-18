<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\MrechercheAuteur;
use \CodeIgniter\Exceptions\PageNotFoundException;

class CrechercheAuteur extends Controller
{
	public function index()
	{
		$model = new MrechercheAuteur();
		$data['result'] = $model->getAll();
		$data['page_title']="Auteurs";
		$data['page_titre1']="Tout les Auteurs :";
        $data['heading'] ="Page détaillée ";
        $page['titrePage']="Page détaillée ";
		$page['meta']="Ceci est une recherche d'auteurs";
		$data['pager'] = $model->pager;
		$page['contenu'] = view('Recherche/v_liste_recherche_auteur', $data);
		return view('Commun/v_template', $page);
	}
	public function detail($prmId = null)
    {
        if ($prmId != null) {
            $model = new MrechercheAuteur();
            $data['result'] = $model->getDetailEdition($prmId);
            if (count($data['result']) != 0) {
                $data['title'] = "Liste des auteurs";
                $data['heading'] = "Conteneur ID = " . $prmId;

                $page['contenu'] = view('Recherche/v_detail_recherche_auteur', $data);
                return view('Commun/v_template', $page);
            } else {
                throw PageNotFoundException::forPageNotFound("cette recherche n'existe pas");
            }
        } else {
            throw PageNotFoundException::forPageNotFound("il faut choisir une autre recherhce");
        }
    }
	
}
