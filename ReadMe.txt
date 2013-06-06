*******************************************************************************
*                                                                             *
*                                  Armurerie                                  *
*                                                                             *
* http://sparks.great-heberg.eu         mailto:contact@sparks.great-heberg.eu *
*******************************************************************************
* (c) 2012 Sparks                                                             *
* This file is encoded in UTF-8                                               *
*******************************************************************************

Introduction
------------

La classe Armurerie est une classe utilisant plusieurs autres classes. Cette 
inter-connexion permet de cr�er un d�codage des items et des statistiques 
des personnages. La conception de cette classe permet une utilisation simple 
et rapide.

La class ne contient pas encore de m�thode public mais cela tend � changer 
afin de permettre une configuration optimal du rendu.

Les classes fonctionnent avec des lien absolu et part du principe que 
votre site se trouve � la base de votre domaine (ou sous-domaine).
Exemple :
http://www.monsite.com/index.php  <- Fonctionne
http://www.monsite.com/site/index.php  <- Ne fonctionne pas

Fichiers
--------

Tout les fichiers se trouvent dans le dossier /armurerie/ son appellation 
seras donc omise ci-suivant.

/class/Armurerie.class.php	Class principal, affiche le rendu.
/class/BddManager.class.php	Class de connexion � la base de donn�e
/class/Item.class.php		Class d�codant les items du personnage
/class/Panoplie.class.php	Class d�codant les panoplies
/class/Personnage.class.php	Class d�codant les personnages
/class/Stats.class.php		Class d�codant les statistiques (perso + item)
loadArmurerie.php		Appel des class et fichiers de configuration
/params/config.php		Fichier de configuration

Installation
-----------

L'installation de l'armurerie est simple :

1ere �tape :
Si votre table item template ne contiens pas les gfx des items importez-y 
le fichier /sql/updateItemTemplate.sql
2�me �tape :
Placez le dossier /armurerie/ et tout son contenu � la RACINE de votre domaine
3�me �tape
Avant le d�but du code html ajoutez :
<?php
include_once('/armurerie/loadArmurerie.php');
?>

Utilisation
-----------
// Avant le d�but du code html
// Inclusion des class et configuration
include_once('armurerie/loadArmurerie.php');
// Une fois import�, l'armurerie est automatiquement instanci�
// L'instance est stock� dans la variable superglobal $GLOBAL['armurerie']
// Cela permet de pouvoir l'utiliser n'importe ou dans votre code.


// A l'int�rieur du code html
// Instanciation et affichage du rendu
try {
	// Chargement des personnages du compte 24
	$GLOBALS['armurerie']->load(24, true);
	// Chargement du personnages 361
	$GLOBALS['armurerie']->load(361);
	// Chargement du personnages 370, 376 et 245
	$GLOBALS['armurerie']->load(array(370, 376, 245));
	// Affiche de tout les personnages charg�.
	echo $GLOBALS['armurerie']->show();
} catch (Exception $e) {
	echo $e->__toString();
}

Astuce :
$GLOBALS['armurerie']->load(361);
echo $GLOBALS['armurerie']->show();
Reviens � faire :
echo $GLOBALS['armurerie']->show(361);


Contact
-------

En cas d'erreur, de bugs, de questions, d'id�e d'am�lioration n'h�sitez pas � 
me contacter par Email.

Sparks
http://sparks.great-heberg.eu
mailto:contact@sparks.great-heberg.eu

*******************************************************************************
*                                                                             *
*                                  Armurerie                                  *
*                                                                             *
* http://sparks.great-heberg.eu         mailto:contact@sparks.great-heberg.eu *
*******************************************************************************