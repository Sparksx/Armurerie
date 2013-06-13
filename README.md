Armurerie
=========

(c) 2012 Sparks
L'armurerie est gratuite

Introduction
------------

<p>La classe Armurerie est une classe utilisant plusieurs autres classes. Cette 
inter-connexion permet de créer un décodage des items et des statistiques 
des personnages. La conception de cette classe permet une utilisation simple 
et rapide.</p>

<p>Un rendu personnalisable est généré automatiquement à l'endroit ou vous voulez l'afficher.</p>       


Fichiers principaux
-------------------

Tout les fichiers se trouvent dans le dossier /armurerie/ son appellation 
seras donc omise ci-suivant.       

* <code>/class/Armurerie.class.php</code>	Class principal, affiche le rendu.      
* <code>/class/BddManager.class.php</code>	Class de connexion à la base de donnée       
* <code>/class/Item.class.php</code>		Class décodant les items du personnage       
* <code>/class/Panoplie.class.php</code>	Class décodant les panoplies        
* <code>/class/Personnage.class.php</code>	Class décodant les personnages        
* <code>/class/Stats.class.php</code>		Class décodant les statistiques (perso + item)        
* <code>loadArmurerie.php</code>			Appel des classes et fichiers de configuration ; Ce fichier est à inclure dans la page ou vous utilisez l'armurerie                
* <code>/params/config.php</code>			Fichier de configuration       

Installation
------------

L'installation de l'armurerie est simple :      

1ere étape :       
<p>Si votre table item template ne contient pas les gfx des items importez-y 
le fichier <code>/sql/updateItemTemplate.sql</code></p> 
             
2ème étape :        
<p>Placez le dossier <code>/armurerie/</code> et tout son contenu dans le ftp de votre site</p>        
         
3ème étape :        
<p>Avant le début du code html ajoutez :          
<code><?php include_once('path/to/armurerie/loadArmurerie.php'); ?></code>  (path/to/armurerie est bien évidement à changer)</p>      

4ème étape :        
<p>Dans le fichier <code>loadArmurerie.php</code> modifiez la variable <code>$pathToDossierArmurerie</code> afin qu'elle contienne le chemin relatif vers le dossier de l'armurerie<br />
par exemple : <code>$pathToDossierArmurerie = '../template/armurerie/';</code> si votre dossier armurerie se trouve dans le sous-dossier template</p>

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

<p>En cas d'erreur, de bugs, de questions, d'idée d'amélioration, postez une issue sur Github.</p>

Sparks
