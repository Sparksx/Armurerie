<?php

// stats utilisables
define('PA', 'pa');
define('PM', 'pm');
define('PO', 'po');


define('DOM', 'dom');
define('PDOM', 'perdom');
define('SOIN', 'soin');
define('CC', 'cc');
define('EC', 'ec');


define('POD', 'pod');
define('INI', 'ini');
define('PP', 'pros');


define('VITA', 'vitalite');
define('FO', 'force');
define('SAG', 'sagesse');
define('INT', 'intelligence');
define('CHA', 'chance');
define('AGI', 'agilite');


// Position des items sur le personnage
define('POSAMU', 0);
define('POSARME', 1);
define('POSANO1', 2);
define('POSCEINT', 3);
define('POSANO2', 4);
define('POSBOT', 5);
define('POSCOIF', 6);
define('POSCAP', 7);
define('POSFAM', 8);
define('POSDOF1', 9);
define('POSDOF2', 10);
define('POSDOF3', 11);
define('POSDOF4', 12);
define('POSDOF5', 13);
define('POSDOF6', 14);
define('POSBOU', 15);


// Constantes d'affichage de l'armurerie
define('ALL', -2);
define('CHARGE', -1);



/*
 * Constantes des noms de champs de la base de donnée
 */

// Table des comptes
define('TABLECOMPTES', 'accounts');
define('COID', 'guid');				// Identifiant unique du compte

// Table des personnages :
define('TABLEPERSO', 'personnages');
define('PEID', 'guid');				// Identifiant unique du personnage
define('PENOM', 'name');			// Nom du personnage
define('PECOMPTE', 'account');		// Référence au compte du personnage

// Table des items
define('TABLEITEMS', 'items');
define('ITMID', 'guid');			// Identifiant unique d'un item
define('ITMPOS', 'pos');			// Position de l'item sur le personnage
define('ITMSTATS', 'stats');		// Statistique de l'item du personnage
define('ITMTEMPLATE', 'template');	// Référence au template de l'item

// Table des panoplies
define('TABLEPANO', 'itemsets');
define('PAID', 'id');				// Identifiant unique d'une panoplie

// Table des templates d'items
define('TABLEITEMTEMPLATE', 'item_template');
define('ITID', 'id');				// Identifiant unique d'une template
define('ITTYPE', 'type');			// Type d'item
define('IFGFX', 'gfx');				// Gfx de l'item
define('ITNOM', 'name');			// Nom de l'item
define('ITLEVEL', 'level');			// Niveau de l'item
define('ITPOID', 'pod');			// Poid de l'item
define('ITPANO', 'panoplie');		// Référence a la panoplie de l'item
define('ITCONDITION', 'condition');	// Conditions pour équiper l'item
define('ITINFOS', 'armesInfos');		// Information des armes

