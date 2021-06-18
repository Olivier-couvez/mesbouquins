<?php

namespace App\Controllers;
use CodeIgniter\Controller;

use \CodeIgniter\Exceptions\PageNotFoundException;

class Cmentions extends Controller
{
	public function index()
	{
		
		
		
		$data['heading']="Mentions légales";
		$page['titrePage']="Mentions légales";
		$page['meta']="Mentions légales du site Mes Bouquins.net :";
		$page['contenu'] = view('Conteneurs/v_mentions_legales', $data);
		return view('Commun/v_template', $page);
	}
}