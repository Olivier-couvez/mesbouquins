<?php

namespace App\Controllers;
use CodeIgniter\Controller;

class Caccueil extends Controller
{
	public function index()
	{
		
		$data['heading']="";
		$page['titrePage']="Accueil mes-bouquins.net";
		$page['meta']="mes-bouquins.net : Site pour passionés de la littérature populaire";
		$page['contenu'] = view('v_accueil', $data);
		return view('Commun/v_template', $page);
	}
}
