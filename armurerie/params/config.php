<?php

// Configuration de la bdd principale
$OS2['hote'] = 'localhost';
$OS2['other'] = 'Fraternity-use';
$OS2['user'] = 'root';
$OS2['pass'] = 'root';


// Nom du serveur
$OS2['nameServer'] = 'Fraternity';
// Activation du module de recherche (à true ou false)
$OS2['rechercheMod'] = true;
// Nombre de résultat maxi affiché
$OS2['nbResultSearch'] = 5;

// -----------------------------------------------------------------------------
// Gestion du style

// Position de la colonne des stats : right ou left
$OS2['posColStats'] = 'right';

// Thème de l'armurerie
// Les thèmes disponible se trouvent dans la variable $OS2['themes']
$OS2['themeArm'] = 'dark';
// Aucun thème ne doit/peux s'appeller OS2, cela créer un "bug" normal.
// Liste des thèmes
$OS2['themes'] = array('dark', 'silver', 'purple');
// 
// 
// -----------------------------------------------------------------------------
//
// -----------------------------------------------------------------------------
//    La gestion des variable ci-dessous est réservé au utilisateurs avertis
// -----------------------------------------------------------------------------
//
// -----------------------------------------------------------------------------
// 
// 
// Liste de stats affiché dans le panneau stats (utilisez les constantes)
$OS2['statsBase'] = array(PA, PM, VITA, SAG, FO, INT, CHA, AGI);

// Positions des différents items
$OS2['dofus'] = array(POSDOF1, POSDOF2, POSDOF3, POSDOF4, POSDOF5, POSDOF6);
$OS2['onPerso'] = array(POSBOU, POSARME, POSAMU, POSANO1, POSCEINT, POSANO2, POSBOT);
$OS2['itemRight'] = array(POSCOIF, POSCAP, POSFAM);

$OS2['titre'] = array (
            2 => "Vampyre",
            3 => "Vampyre Sanglant",
            4 => "Vampyre Maudyt",
            5 => "Vampyre Ultyme",
            6 => "Vampyre Démonyaque",
            7 => "Vampyre Runyque",
            8 => "Pourfendeur de Bworker",
            9 => "Pourfendeur du Sphincter Cell",
            10 => "Pourfendeur du Koulosse",
            11 => "Pourfendeur du Wa Wabbit",
            12 => "Pourfendeur du Kimbo",
            13 => "Pourfendeur du Minotoror",
            14 => "Pourfendeur du Dragon Cochon",
            15 => "Roxxeuse de poney",
            16 => "Pourfendeur du Moon",
            17 => "Pourfendeur du Dark Vlad",
            18 => "Héros Bicentenaire",
            19 => "Chevalier Hispanique",
            20 => "Terreur de la Presqu'île",
            21 => "Dékrokilliseur",
            22 => "Bûcheron Primordial",
            23 => "Forgeur d'Epées Primordial",
            24 => "Sculpteur d'Arcs Primordial",
            25 => "Forgeur de Marteaux Primordial",
            26 => "Cordonnier Primordial",
            27 => "Bijoutier Primordial",
            28 => "Forgeur de Dagues Primordial",
            29 => "Sculpteur de Bâtons Primordial",
            30 => "Sculpteur de Baguettes Primordial",
            31 => "Forgeur de Pelles Primordial",
            32 => "Mineur Primordial",
            33 => "Boulanger Primordial",
            34 => "Alchimiste Primordial",
            35 => "Tailleur Primordial",
            36 => "Paysan Primordial",
            37 => "Forgeur de Haches Primordial",
            38 => "Pêcheur Primordial",
            39 => "Chasseur Primordial",
            40 => "Forgemage de Dagues Primordial",
            41 => "Forgemage d'Epées Primordial",
            42 => "Forgemage de Marteaux Primordial",
            43 => "Forgemage de Pelles Primordial",
            44 => "Forgemage de Haches Primordial",
            45 => "Sculptemage d'Arcs Primordial",
            46 => "Sculptemage de Baguettes Primordial",
            47 => "Sculptemage de Bâtons Primordial",
            48 => "Boucher Primordial",
            49 => "Poissonnier Primordial",
            50 => "Forgeur de Boucliers Primordial",
            51 => "Cordomage Primordial",
            52 => "Joaillomage Primordial",
            53 => "Costumage Primordial",
            54 => "Bricoleur Primordial",
            60 => "Créateur",
            61 => "Co-Créateur/Bourreau",
            62 => "Administrateur/Pedobear",
            63 => "Modérateur",
            64 => "Animateur",
            65 => "En Test",
            66 => "Maitre du Jeu",
            67 => "Codeur Java",
            68 => "Leadder One",
            69 => "Boulet",
            70 => "Geekounet",
            71 => "Maitre du Quizz",
            72 => "Maitre du Cache-cache",
            73 => "Maitre du Morph",
            74 => "Maitre du Chapeau",
            75 => "Souffre douleur",
            76 => "Radin en puissance",
            77 => "Maitre du vote",
            78 => "1er Level 2000",
            79 => "Maitre du PVP",
            80 => "Chef Animateur",
            82 => "1er Level 1000",
            83 => "1er Level 3000",
            84 => "No-Life",
            85 => "Tapette",
            86 => "Graphiste",
            87 => "Animateur/Graphiste",
            88 => "Pedo-Victim",
            89 => "Mappeur",
            97 => "Animatrice",
            98 => "Kaliméro",
            99 => "Psychopate",
            100 => "Fraternien",
            101 => "Kikoulol",
            102 => "Geek",
            103 => "Céréales Killer",
            104 => "Kikou Alcolique",
            105 => "Roi des Newbies",
            106 => "Beau Gosse",
            107 => "Céréales Farmer",
            108 => "Belle Gosse",
            109 => "J'aime les Pâtes",
            110 => "Wesh Wesh",
            111 => "Petit Biscuit",
            112 => "Padawan",
            113 => "Hobbit Joufflu",
            114 => "Jedi",
            115 => "J'aime pas Travailler",
            116 => "Eleveur de Pokemons",
            117 => "René la Taupe",
            118 => "Pom-Pot",
            119 => "Anonymous",
            120 => "Monsieur Patate",
            121 => "Madame Patate",
            122 => "Nyan Cat",
            123 => "Banana Split",
            124 => "Harry Potter",
            125 => "Voldemort",
            126 => "Takalatomie",
            127 => "Hamtaro",
            // Ne gère pas au dessus de 127
	);






$OS2['version'] = 1.20;