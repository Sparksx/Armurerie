Armurerie
=========

(c) 2012 Sparks
L'armurerie est gratuite

Introduction
------------

La classe Armurerie est une classe utilisant plusieurs autres classes. Cette 
inter-connexion permet de créer un décodage des items et des statistiques 
des personnages. La conception de cette classe permet une utilisation simple 
et rapide.

Un rendu personnalisable est généré automatiquement à l'endroit ou vous voulez l'afficher    


Fichiers principaux
-------------------

Tout les fichiers se trouvent dans le dossier /armurerie/ son appellation 
seras donc omise ci-suivant.       

* `/class/Armurerie.class.php`	Class principal, affiche le rendu.      
* `/class/BddManager.class.php`	Class de connexion à la base de donnée       
* `/class/Item.class.php`		Class décodant les items du personnage       
* `/class/Panoplie.class.php`	Class décodant les panoplies        
* `/class/Personnage.class.php`	Class décodant les personnages        
* `/class/Stats.class.php`		Class décodant les statistiques (perso + item)        
* `loadArmurerie.php`			Appel des class et fichiers de configuration ; Ce fichier est à inclure dans la page ou vous utilisez l'armurerie                
* `/params/config.php`			Fichier de configuration       

Installation
------------

L'installation de l'armurerie est simple :      

1ere étape :       
Si votre table item template ne contient pas les gfx des items importez-y 
le fichier <pre>/sql/updateItemTemplate.sql</pre>   
             
2ème étape :        
Placez le dossier <pre>/armurerie/</pre> et tout son contenu dans le ftp de votre site        
         
3ème étape :        
Avant le début du code html ajoutez :          
<pre><?php include_once('path/to/armurerie/loadArmurerie.php'); ?></pre>  (path/to/armurerie est bien évidement à changer)      

4ème étape :        
Dans le fichier `loadArmurerie.php` modifiez la variable `$pathToDossierArmurerie` afin qu'elle contienne le chemin relatif vers le dossier de l'armurerie
par exemple : `$pathToDossierArmurerie = '../template/armurerie/';` si votre dossier armurerie se trouve dans le sous-dossier template

Utilisation
-----------
<pre>
	// Avant le début du code html    
	// Inclusion des class et configuration    
	include_once('path/to/armurerie/loadArmurerie.php');    
	// Une fois importé, l'armurerie est automatiquement instancié    
	// L'instance est stocké dans la variable superglobal $GLOBAL['armurerie']    
	// Cela permet de pouvoir l'utiliser n'importe ou dans votre code.
	// A l'intèrieur du code html    
	// Instanciation et affichage du rendu    
	try {    
		// Chargement des personnages du compte 24    
		$GLOBALS['armurerie']->load(24, true);    
		// Chargement du personnages 361    
		$GLOBALS['armurerie']->load(361);    
		// Chargement du personnages 370, 376 et 245    
		$GLOBALS['armurerie']->load(array(370, 376, 245));    
		// Affiche de tout les personnages chargé.    
		echo $GLOBALS['armurerie']->show();    
	} catch (Exception $e) {    
		echo $e->__toString();    
	}
</pre> 

Astuce :
<pre>
	$GLOBALS['armurerie']->load(361);
	echo $GLOBALS['armurerie']->show();
</pre>
      
Reviens à faire :       
<pre>echo $GLOBALS['armurerie']->show(361);</pre>      


Contact
-------

En cas d'erreur, de bugs, de questions, d'idée d'amélioration n'hésitez pas ! 
me contacter par Email.

Sparks
