<?php

class Nyomtat2_Model
{
	public function get_data()
	{		
        $retData['eredmeny'] = "";
        $login=$_SESSION['login'];
        $ido=date("Y.m.d H:i:s");
        echo $login;
		try {		                    
            $connection = Database::getConnection();    
            $sql = "SELECT distinct utszam from korlatozas order by utszam";
			$stmt = $connection->query($sql);
			$retData['utszamlista'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
			$sql2 = "SELECT distinct telepules from korlatozas order by telepules";
			$stmt2 = $connection->query($sql2);
			$retData['telepuleslista'] = $stmt2->fetchAll(PDO::FETCH_ASSOC);
			$sql3 = "SELECT id, nev from megnevezes order by id";
			$stmt3 = $connection->query($sql3);
			$retData['megnevlista'] = $stmt3->fetchAll(PDO::FETCH_ASSOC);
		}
		catch (PDOException $e) {
					$retData['eredmény'] = "ERROR";
					$retData['uzenet'] = "Adatbázis hiba: ".$e->getMessage()."!";
		}
		return $retData;
        echo $retData;
	}
}
?>