<?php

namespace App\Models;

use CodeIgniter\Model;

class MrechercheCollection extends Model
{	
	protected $table = 'tbl_Collection';
	protected $primaryKey = 'Id_Collection';	
	protected $returnType= 'array';
	
	public function getAll(){
		$requete = $this->select('*');
		// return $requete->findAll();
		return $requete->paginate(20);
	}
	
	public function getDetail($prmId){
		$requete = $this->select('*')->where(['Id_Collection' => $prmId]);
		return $requete->findAll();
	}
}
