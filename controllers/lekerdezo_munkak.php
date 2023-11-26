<?php

class Lekerdezo_munkak_Controller
{
	public $baseName = 'lekerdezo_munkak';  //meghatározni, hogy melyik oldalon vagyunk
	public function main($vars) // a router által továbbított paramétereket kapja
	{		
		$lekerdezo_munkakModel = new Lekerdezo_munkak_Model;  //az osztályhoz tartozó modell
		//a modellben belépteti a felhasználót
		$retData = $lekerdezo_munkakModel->get_data($vars);
		if($retData['eredmeny'] == "ERROR")
			echo "Hiba";
		//betöltjük a nézetet
		$view = new View_Loader($this->baseName.'_main');
		//átadjuk a lekérdezett adatokat a nézetnek
		foreach($retData as $name => $value)
			$view->assign($name, $value);
	}
}

?>