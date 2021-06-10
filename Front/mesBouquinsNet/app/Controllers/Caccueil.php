<?php

namespace App\Controllers;
use CodeIgniter\Controller;

class Caccueil extends Controller
{
	public function index()
	{
		$data['page_title']="Le Relais";
		$data['page_titre1']="Un projet pilote de borne connectée";
		$page['contenu'] = view('v_accueil', $data);
		return view('Commun/v_template', $page);
	}
}
