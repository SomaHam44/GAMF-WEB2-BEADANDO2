<?php
class Lekerdezo_listazo_Model
{
	public function get_data()
	{
		$retData['eredmeny'] = "";
		$retData['uzenet']="";
		$retData['lista']=array();
		$retData['telepuleslista']=array();
		try {
			$connection = Database::getConnection();
			$sql = "SELECT korlatozas.telepules, korlatozas.utszam, korlatozas.kezdet, korlatozas.veg, megnevezes.nev as megnevezes, mertek.nev as mérték, korlatozas.sebesseg, korlatozas.mettol, korlatozas.meddig FROM `korlatozas` 
				INNER JOIN megnevezes on korlatozas.megnevid=megnevezes.id INNER JOIN mertek ON korlatozas.mertekid=mertek.id 
				";
			$stmt = $connection->query($sql);
			$retData['lista'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
			$sql2 = "SELECT distinct telepules from korlatozas order by telepules";
			$stmt2 = $connection->query($sql2);
			$retData['telepuleslista'] = $stmt2->fetchAll(PDO::FETCH_ASSOC);		
			}
		
		catch (PDOException $e) {
					$retData['eredmeny'] = "ERROR";
					$retData['uzenet'] = "Adatbázis hiba: ".$e->getMessage()."!";
		}
		return $retData;
		
	}
}

?>