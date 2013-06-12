<?php

$pathToDossierArmurerie = 'armurerie/';

//error_reporting( E_ALL);
//header('Content-type: text/html; charset=utf-8');
$OS2 = array();


require $pathToDossierArmurerie.'params/define.php';
require $pathToDossierArmurerie.'params/config.php';


echo '<link rel="stylesheet" href="'.$pathToDossierArmurerie.'styles/qtip.css" />';
echo '<link rel="stylesheet" href="'.$pathToDossierArmurerie.'styles/static.css" />';

echo '<script type="text/javascript" src="'.$pathToDossierArmurerie.'jQuery/jquery.min.js"></script>';
echo '<script type="text/javascript" src="'.$pathToDossierArmurerie.'jQuery/jquery.qtip.min.js"></script>';
echo '<script type="text/javascript" src="'.$pathToDossierArmurerie.'jQuery/jQuery-OS2.js"></script>';
echo '<script type="text/javascript" src="'.$pathToDossierArmurerie.'jQuery/jQuery-silver.js"></script>';



function edebug($var, $echo = true) {
	Armurerie::edebug($var, $echo);
}

function __autoload($class) {
	global $pathToDossierArmurerie;
	
	$repertoires = array(
		$pathToDossierArmurerie.'Library/',
		$pathToDossierArmurerie.'Plugin/'
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

