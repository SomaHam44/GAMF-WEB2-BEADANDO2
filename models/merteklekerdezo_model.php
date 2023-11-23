<?php

class Merteklekerdezo_Model
{
	public function get_data()
	{
		$retData['eredmeny'] = "";
		$retData['uzenet']="";
		$retData['lista']=array();
		try {
			$connection = Database::getConnection();
			$sql = "SELECT mertek.nev from mertek";
			$stmt = $connection->query($sql);
			$retData['lista'] = $stmt->fetchAll(PDO::FETCH_ASSOC);			
			}
		
		catch (PDOException $e) {
					$retData['eredmeny'] = "ERROR";
					$retData['uzenet'] = "Adatbázis hiba: ".$e->getMessage()."!";
		}
		return $retData;
		
	}

    public function insert_data($vars)
    {
        $retData['eredmeny'] = "";
		try {
			$connection = Database::getConnection();
            $sqlInsert = "INSERT into mertek(id, nev)
                        values(0, :mertek_nev)";
            $stmt = $connection->prepare($sqlInsert); 
            $stmt->execute(array(':mertek_nev' => $vars['nev']));
			$retData['eredmeny'] = "OK";
			$retData['uzenet'] = "A hozzáadás sikeres";
        }
		
		catch (PDOException $e) {
					$retData['eredmény'] = "ERROR";
					$retData['uzenet'] = "Adatbázis hiba: ".$e->getMessage()."!";
		}
		return $retData;
    }

    public function edit_data($vars)
    {
        $retData['eredmeny'] = "";
		try {
			$connection = Database::getConnection();
            $sqlUpdate = "UPDATE mertek where nev =
                        :mertek_nev";
            $stmt = $connection->prepare($sqlUpdate); 
            $stmt->execute(array(':mertek_nev' => $vars['nev']));
			$retData['eredmeny'] = "OK";
			$retData['uzenet'] = "A módosítás sikeres";					
			}
		catch (PDOException $e) {
					$retData['eredmény'] = "ERROR";
					$retData['uzenet'] = "Adatbázis hiba: ".$e->getMessage()."!";
		}
		return $retData;
    }

    public function delete_data()
    {
        $retData['eredmeny'] = "";
		try {
			$connection = Database::getConnection();
            $sql = "DELETE from mertek where id
                        :id";
            $stmt = $connection->prepare($sql); 
            $stmt->execute(array(':id' => $vars['id']));
			$retData['eredmeny'] = "OK";
			$retData['uzenet'] = "A törlés sikeres";					
			}
		catch (PDOException $e) {
					$retData['eredmény'] = "ERROR";
					$retData['uzenet'] = "Adatbázis hiba: ".$e->getMessage()."!";
		}
		return $retData;

    }
    
}

?>