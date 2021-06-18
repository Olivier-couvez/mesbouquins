<?php

namespace App\Models;

use CodeIgniter\Model;

class MrechercheAuteur extends Model
{	
	protected $table = 'tbl_Pseudo';
	protected $primaryKey = 'Id_Pseudo';	
	protected $returnType= 'array';
	
	public function getAll(){
		$requete = $this->select('*');
		// return $requete->findAll();
		return $requete->paginate(20);
	}
	
	public function getDetail($prmId){
		$requete = $this->select('*')->where(['Id_Pseudo' => $prmId]);
		return $requete->findAll();
	}
}
