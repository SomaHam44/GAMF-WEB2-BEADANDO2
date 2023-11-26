<?php

class Admintorol_Controller
{	
    public $baseName = 'admin';  //meghatározni, hogy melyik oldalon vagyunk
	public function main(array $vars) // a router által továbbított paramétereket kapja
	{		
		$admintorolModel = new Admintorol_Model;  		     
        $retData = $admintorolModel->get_data($vars);
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