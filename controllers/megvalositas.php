<?php

class Megvalositas_Controller
{
	public $baseName = 'megvalositas';  //meghatározni, hogy melyik oldalon vagyunk
	public function main($vars) // a router által továbbított paramétereket kapja
	{		
		$megvalositasModel = new Megvalositas_Model;  //az osztályhoz tartozó modell
		//a modellben belépteti a felhasználót
		$retData = $megvalositasModel->get_data($vars);
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