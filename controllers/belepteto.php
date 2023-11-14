<?php

class Belepteto_Controller
{
	public $baseName = 'belepteto';  //meghatározni, hogy melyik oldalon vagyunk
	public function main(array $vars) // a router által továbbított paramétereket kapja
	{
		$beleptetoModel = new Belepteto_Model;  //az osztályhoz tartozó modell
		//a modellben belépteti a felhasználót
		$retData = $beleptetModel->get_data($vars);
		if($retData['eredmeny'] == "ERROR")
			$this->baseName = "bejelentkezes";
		//betöltjük a nézetet
		$view = new View_Loader($this->baseName.'_main');
		//átadjuk a lekérdezett adatokat a nézetnek
		foreach($retData as $name => $value)
			$view->assign($name, $value);
	}
}

?>