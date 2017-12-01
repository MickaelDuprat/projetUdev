<?php

	include_once '/includes/models/DAO.php';

class Cpville{

	private $cp, $ville, $id;

	function getCp(){
		return $this->cp;
	}

	function getVille(){
		return $this->ville;
	}

	function getId(){
		return $this->id;
	}

	static function getListe(){
		$SQLStmt = DAO::getInstance()->prepare("SELECT * FROM cpvilles");
		$SQLResult = $SQLStmt->execute();
		while($SQLRow = $SQLResult->fetchObject()){
			$retval[] = new Cpville($SQLRow->cp_id,
									$SQLRow->cp_code,
									$SQLRow->cp_ville);
		}
		$SQLStmt->closeCursor();
		return $retval;
	}

	static function getById($id){
		
	}

}

?>