<?php

class Lekerdezo_listazo_Controller
{
	public $baseName = 'lekerdezo_listazo';  //meghatározni, hogy melyik oldalon vagyunk
	public function main($vars) // a router által továbbított paramétereket kapja
	{		
		$lekerdezo_listazoModel = new Lekerdezo_listazo_Model;  //az osztályhoz tartozó modell
		//a modellben belépteti a felhasználót
		$retData = $lekerdezo_listazoModel->get_data($vars);
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