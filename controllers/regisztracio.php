<?php

class Regisztracio_Controller
{
	public $baseName = 'regisztracio';  //meghatározni, hogy melyik oldalon vagyunk
	public function main(array $vars) // a router által továbbított paramétereket kapja
	{
		$regisztracioModel = new Regisztracio_Model;  //az osztályhoz tartozó modell
		//a modellben belépteti a felhasználót
		$retData = $regisztracioModel->get_data($vars);
		if($retData['eredmeny'] == "ERROR")
			$this->baseName = "belepes";
		//betöltjük a nézetet
		$view = new View_Loader($this->baseName.'_main');
		//átadjuk a lekérdezett adatokat a nézetnek
		foreach($retData as $name => $value)
			$view->assign($name, $value);
	}
}

?>