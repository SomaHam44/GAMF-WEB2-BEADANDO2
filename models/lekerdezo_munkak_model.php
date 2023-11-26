<?php
class Lekerdezo_munkak_Model
{
	public function get_data($vars)
	{
		$retData['eredmeny'] = "";
		$retData['uzenet']="";
		$retData['lista']=array();
		try {
			$connection = Database::getConnection();
			$sql = "SELECT megnevezes.nev as 'munka', COUNT(megnevezes.id) as 'darab' FROM korlatozas 
				INNER JOIN megnevezes ON korlatozas.megnevid=megnevezes.id GROUP BY megnevezes.id ORDER BY darab DESC;";
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