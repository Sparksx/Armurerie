<?php
error_reporting( E_ALL);
header('Content-type: text/html; charset=utf-8');
$OS2 = array();


require 'params/define.php';
require 'params/config.php';

if(!class_exists('Securisation'))
    require_once 'Library/Securisation.class.php';
if(!class_exists('BddManager'))
    require_once 'Library/BddManager.class.php';
if(!class_exists('Personnage'))
    require_once 'Library/Personnage.class.php';
if(!class_exists('Compte'))
    require_once 'Library/Compte.class.php';
if(!class_exists('Stats'))
    require_once 'Library/Stats.class.php';
if(!class_exists('Item'))
    require_once 'Library/Item.class.php';
if(!class_exists('Panoplie'))
    require_once 'Library/Panoplie.class.php';


if(!class_exists('Armurerie'))
    require_once 'Plugin/Armurerie.class.php';

$GLOBALS['armurerie'] = new Armurerie($OS2);