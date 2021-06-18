<?php

namespace App\Models;

use CodeIgniter\Model;

class Mconteneur extends Model
{	
	protected $table = 'conteneur';
	protected $primaryKey = 'id';	
	protected $returnType= 'array';
	
	public function getAll(){
		$requete = $this->select('Id, AddrEmplacement');
		// return $requete->findAll();
		return $requete->paginate(10);
	}
	
	public function getDetail($prmId){
	$requete = $this->select('*')
	->where(['Id' => $prmId]);
	return $requete->findAll();
	}

	
}
