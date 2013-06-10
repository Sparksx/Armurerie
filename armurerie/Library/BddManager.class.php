<?php

/**
 * Description of BddManager
 *
 * @author Hollisprice
 */
class BddManager extends Securisation {

    //use config;

    private $_db; // Instance de PDO
    private $OS2 = array();

    public function __construct($OS2) {

        try {
            $pdo_options = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            );
            
            $other = new PDO('mysql:dbname=' . $OS2['other'] . ';host=' . $OS2['hote'], $OS2['user'], $OS2['pass'], $pdo_options);
            $this->setDb($other);
            $this->OS2 = $OS2;
        } catch (Exception $e) {
            throw new Exception('SqlErreur : ' . $e->getMessage());
        }
    }

    public function select_all_other($select = null, $table = null, $line = null, $value = null) { // fonction de vérification d'une ligne dans une table choisi, a une ligne choisit pour une collone choisit avec une certaine valeur
        if (!isset($select) || !isset($table) || !isset($line) || !isset($value))
            throw new Exception('Les 4 arguments sont obligatoire');
        
        $requete = $this->getDb()->prepare('SELECT ' . $this->secu($select) . '
		FROM ' . $this->secu($table) . '
		WHERE
		' . $this->secu($line) . ' = :value');

        $requete->bindValue('value', $this->secu($value));
        $requete->execute();

        if ($result = $requete->fetch(PDO::FETCH_ASSOC)) {

            $requete->closeCursor();
            return $result;
        }
        return false;
    }

    public function getPersonnage($id = null) {
        if (!isset($id) || !is_int($id))
            throw new Exception('L\'argument $id est obligatoire et doit être un nombre');

        $requete = $this->getDb()->query('SELECT * FROM personnages WHERE guid = ' . $this->secu($id));
        $donnees = $requete->fetch(PDO::FETCH_ASSOC);
        if (empty($donnees)) {
            return false;
        }
        $requete->closeCursor();
        return new Personnage($donnees, $this);
    }

    public function loadPersonnages($compte = null) {
        if (!($compte instanceof Compte))
            throw new Exception('L\'argument doit être une instance de la classe Compte');

        $requete = $this->getDb()->query('SELECT * FROM personnages WHERE account = ' . $this->secu($compte->getGuid()));
        $donnees = $requete->fetchAll(PDO::FETCH_ASSOC);
        if (empty($donnees)) {
            return false;
        }
        else {
            foreach($donnees as $perso) {
                $compte->addPersonnage(new Personnage($perso, $this));
            }
        }
        $requete->closeCursor();
    }

    public function getCompte($id = null) {
        if (!isset($id) || !is_int($id))
            throw new Exception('L\'argument $id est obligatoire et doit être un nombre');

        $requete = $this->getDb()->query('SELECT * FROM accounts WHERE guid = ' . $this->secu($id));
        $donnees = $requete->fetch(PDO::FETCH_ASSOC);
        if (empty($donnees)) {
            return false;
        }
        $requete->closeCursor();
        return new Compte($donnees, $this);
    }

    public function searchPersonnage($st) {
        if (!isset($st) || !is_string($st))
            throw new Exception('L\'argument $st est obligatoire et doit être une string');
        
        $result = $this->select_all_other('*', 'personnages', 'name', $st);
        if($result) {
            return new Personnage($result, $this);
        }
        else {
            if(empty($this->OS2['nbResultSearch']) || !is_int($this->OS2['nbResultSearch']))
                throw new Exception('Le paramètre nbResultSearch present dans la configuration doit être déclaré et un nombre');
            
            $requete = $this->getDb()->prepare('SELECT * FROM personnages 
            WHERE 
            name LIKE "%'.$this->secu($st).'%"
            LIMIT 0,'.$this->OS2['nbResultSearch']);
            $requete->execute();
            $personnages = $requete->fetchAll();

            return $personnages;
        }
    }

    public function getPanoplie($id = null) {
        if (!isset($id) || !is_int($id))
            throw new Exception('L\'argument $id est obligatoire et doit être un nombre');

        $requete = $this->getDb()->query('SELECT * FROM itemsets WHERE id = ' . $id);
        $donnees = $requete->fetch(PDO::FETCH_ASSOC);
        if (empty($donnees)) {
            throw new Exception('Aucuns panoplie ne possède l\'id ' . $id);
        }
        $requete->closeCursor();
        return new Panoplie($donnees);
    }

    public function loadItems($liste = null) {
        if (!isset($liste) || !is_string($liste))
            throw new Exception('L\'argument $id est obligatoire et doit être une string');
        //*
        $requete = $this->getDb()->query('SELECT i.guid, i.pos, i.stats, i.template, t.type, t.gfx, t.name, t.level, t.pod, t.panoplie, t.condition, t.armesInfos
            FROM items AS i, item_template AS t
            WHERE 
                i.template = t.id
                AND
                i.pos != -1
                AND
                i.guid IN( ' . $liste . ')'
        );
        //*/
        //$r = $this->getDb()->query('SELECT * FROM items WHERE guid = '.$id);
        $donnees = $requete->fetchAll(PDO::FETCH_ASSOC);
        $requete->closeCursor();
        return $donnees;
    }

    public function setDb(PDO $db) {
        $this->_db = $db;
    }

    public function getDb() {
        return $this->_db;
    }
}
