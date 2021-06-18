<?php

namespace App\Models;

use CodeIgniter\Model;

class MrechercheResultat extends Model
{	
	protected $table = 'tbl_Livre';
	protected $primaryKey = 'Id_Livre';	
	protected $returnType= 'array';
	
	public function getAll(){
		$requete = $this->select('*');
		// return $requete->findAll();
		return $requete->paginate(20);
	}
	
	public function getDetailCollection($prmId){
		$requete = $this->select('*')->where(['Id_Livre' => $prmId]);
		return $requete->findAll();
	}
	
}
