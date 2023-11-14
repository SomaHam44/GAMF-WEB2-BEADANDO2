<?php

class Kijelentkezes_Model
{
	public function get_data()
	{
		$retData['eredmény'] = "OK";
		$retData['uzenet'] = "Visszontlátásra kedves ".$_SESSION['userlastname']." ".$_SESSION['userfirstname']."!";
		$_SESSION['userid'] =  0;
		$_SESSION['userlastname'] =  "";
		$_SESSION['userfirstname'] =  "";
		$_SESSION['userlevel'] = "1__";
		$_SESSION['login'] = "";
		Menu::setMenu();
		return $retData;
	}
}

?>