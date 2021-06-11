<?php

namespace App\Controllers;
use CodeIgniter\Controller;

class Caccueil extends Controller
{
	public function index()
	{
		$data['page_title']="Accueil du site";
		$data['page_titre1']="mes-bouquins.net : Site pour passionés de la littérature populaire";
		$page['contenu'] = view('v_accueil', $data);
		return view('Commun/v_template', $page);
	}
}
