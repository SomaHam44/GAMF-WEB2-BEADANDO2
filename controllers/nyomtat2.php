<?php

class Nyomtat2_Controller
{
	public $baseName = 'nyomtat2';  //meghat�rozni, hogy melyik oldalon vagyunk
	public function main(array $vars) // a router �ltal tov�bb�tott param�tereket kapja
	{
		$nyomtat2_Model = new nyomtat2_Model;  //az osztályhoz tartozó modell
		//a modellben belépteti a felhasználót
		$retData = $nyomtat2_Model->get_data();	
		//betöltjük a nézetet
		$view = new View_Loader($this->baseName.'_main');
		//átadjuk a lekérdezett adatokat a nézetnek
		foreach($retData as $name => $value)
			$view->assign($name, $value);
	}
	
}

?>