<?php

$pathToDossierArmurerie = '';

//error_reporting( E_ALL);
//header('Content-type: text/html; charset=utf-8');
$OS2 = array();


require $pathToDossierArmurerie.'armurerie/params/define.php';
require $pathToDossierArmurerie.'armurerie/params/config.php';





function __autoload($class) {
	global $pathToDossierArmurerie;
	
	$repertoires = array(
		$pathToDossierArmurerie.'armurerie/Library/',
		$pathToDossierArmurerie.'armurerie/Plugin/'
	);
	
	foreach ($repertoires as $repertoire) {
		// On gère la casse (Seul la première lettre en maj)
		if(file_exists($repertoire.ucfirst(strtolower($class)).'.class.php')) {
			include_once($repertoire.$class.'.class.php');
			return;
		}
	}
}

$GLOBALS['armurerie'] = new Armurerie($OS2);