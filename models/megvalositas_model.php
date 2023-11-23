<?php

class Megvalositas_Model
{
	public function get_data($vars)
	{
		$retData['eredmeny'] = "";
		$retData['uzenet']="";
		$retData['lista']=array();
		try {
			$connection = Database::getConnection();
			$sql = "SELECT korlatozas.utszam, korlatozas.kezdet, korlatozas.veg, korlatozas.telepules, korlatozas.mettol, korlatozas.meddig, megnevezes.nev, mertek.nev as nev2, korlatozas.sebesseg from korlatozas inner join mertek on mertek.id=korlatozas.mertekid inner join megnevezes on megnevezes.id = korlatozas.megnevid";
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