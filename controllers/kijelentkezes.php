<?php

class Kijelentkezes_Controller
{
	public $baseName = 'kijelentkezes';  //meghatározni, hogy melyik oldalon vagyunk
	public function main(array $vars) // a router által továbbított paramétereket kapja
	{
		$kijelentkezesModel = new Kijelentkezes_Model;  //az osztályhoz tartozó modell
		//a modellben belépteti a felhasználót
		$retData = $kijelentkezesModel->get_data(); 
		//betöltjük a nézetet
		$view = new View_Loader($this->baseName.'_main');
		//átadjuk a lekérdezett adatokat a nézetnek
		foreach($retData as $name => $value)
			$view->assign($name, $value);
	}
}

?>