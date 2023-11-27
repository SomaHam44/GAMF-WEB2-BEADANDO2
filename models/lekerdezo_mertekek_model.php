<?php

class Merteklekerdezo_Model
{
	public function get_data($vars)
	{
		$retData['eredmeny'] = "";
		$retData['uzenet']="";
		$retData['lista']=array();
		try {
			$connection = Database::getConnection();
			$sql = "SELECT * FROM mertek"; 
			$stmt = $connection->query($sql);
			$retData['lista'] = $stmt->fetchAll(PDO::FETCH_ASSOC);			
			}
		
		catch (PDOException $e) {
					$retData['eredmeny'] = "ERROR";
					$retData['uzenet'] = "Adatbázis hiba: ".$e->getMessage()."!";
		}
		return $retData;
		
	}
    
}

?>