<?php

class Regisztracio_Model
{
	public function get_data($vars)
	{
		$retData['eredmeny'] = "";
		try {
			$connection = Database::getConnection();
			$sql = "select * from felhasznalok where bejelentkezes='".$vars['login']."'";
			$stmt = $connection->query($sql);
			$felhasznalo = $stmt->fetchAll(PDO::FETCH_ASSOC);
			switch(count($felhasznalo)) {				
				case 0:
                    $sqlInsert = "insert into felhasznalok(id, csaladi_nev, utonev, bejelentkezes, jelszo)
                        values(0, :csaladi_nev, :utonev, :login, :password)";
                    $stmt = $connection->prepare($sqlInsert); 
                    $stmt->execute(array(':csaladi_nev' => $vars['csaladi_nev'], ':utonev' => $vars['utonev'],
                                               ':login' => $vars['login'], ':password' => sha1($vars['password'])));
					$retData['eredmeny'] = "OK";
					$retData['uzenet'] = "A regisztráció sikeres. Kérjük, jelentkezzen be!";					
					Menu::setMenu();
					break;
				default:
					$retData['eredmény'] = "ERROR";
					$retData['uzenet'] = "A felhasználónév már létezik!";
			}
		}
		catch (PDOException $e) {
					$retData['eredmény'] = "ERROR";
					$retData['uzenet'] = "Adatbázis hiba: ".$e->getMessage()."!";
		}
		return $retData;
	}
}

?>