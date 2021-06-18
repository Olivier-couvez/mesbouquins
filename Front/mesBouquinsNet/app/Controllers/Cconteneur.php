<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\Mconteneur;
use \CodeIgniter\Exceptions\PageNotFoundException;

class Cconteneur extends Controller
{
	public function index()
	{
		$model = new Mconteneur();
		$data['result'] = $model->getAll();
		$data['pager'] = $model->pager;
        $data['heading'] ="Page détaillée ";
        $page['titrePage']="Page détaillée ";
		$page['meta']="Page détaillée";
		$page['contenu'] = view('Conteneurs/v_liste_conteneurs', $data);
		return view('Commun/v_template', $page);
	}
	public function detail($prmId = null)
    {
        if ($prmId != null) {
            $model = new Mconteneur();
            $data['result'] = $model->getDetail($prmId);
            if (count($data['result']) != 0) {
                $data['title'] = "Détail d'un conteneur";
                $data['heading'] = "Conteneur ID = " . $prmId;

                $page['contenu'] = view('Conteneurs/v_detail_conteneur', $data);
                return view('Commun/v_template', $page);
            } else {
                throw PageNotFoundException::forPageNotFound("ce conteneur n existe pas");
            }
        } else {
            throw PageNotFoundException::forPageNotFound("il faut choisir un autre conteneur");
        }
    }
	
}
