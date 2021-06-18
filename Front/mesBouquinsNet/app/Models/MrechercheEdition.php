<?php

namespace App\Models;

use CodeIgniter\Model;

class MrechercheEdition extends Model
{	
	protected $table = 'tbl_Edition';
	protected $primaryKey = 'Id_Edition';	
	protected $returnType= 'array';
	
	public function getAll(){
		$requete = $this->select('*');
		// return $requete->findAll();
		return $requete->paginate(20);
	}
	
	public function getDetail($prmId){
		$requete = $this->select('*')->where(['Id_Edition' => $prmId]);
		return $requete->findAll();
	}
}
