<?php
/**
 * Description of Compte
 *
 * @author Hollisprice
 */
class Compte {
    
    private $id = 0;
    private $account = null;
    //private $pass = 0;
    private $level = 0;
    private $vip = 0;
    private $pseudo = 0;
    private $personnages = array();
    
    
    public function __construct($donnees, $bdd) {
        if (!is_array($donnees))
            throw new Exception('Le paramètre doit être un array');

        foreach ($donnees as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
        
        $bdd->loadPersonnages($this);
    }
    
    //	---------------------------------------------------------------------------
    // getters
    public function getGuid() {
        return $this->id;
    }
    public function getAllPerso() {
        return $this->personnages;
    }
    
    //	---------------------------------------------------------------------------
    // setters
    private function setGuid($var) {
        if (!is_numeric($var))
            throw new Exception('Le paramètre doit être un nombre');
        $this->id = (int) $var;
    }

    private function setAccount($var) {
        if (!is_string($var))
            throw new Exception('Le paramètre doit être une chaine de caractère');
        $this->account = $var;
    }
    
    private function setLevel($var) {
        if (!is_numeric($var))
            throw new Exception('Le paramètre doit être un nombre');
        $this->level = (int) $var;
    }
    
    private function setVip($var) {
        if (!is_numeric($var))
            throw new Exception('Le paramètre doit être un nombre');
        $this->vip = (int) $var;
    }

    private function setPseudo($var) {
        if (!is_string($var))
            throw new Exception('Le paramètre doit être une chaine de caractère');
        $this->pseudo = $var;
    }

    public function addPersonnage($var) {
        if (!($var instanceof Personnage))
            throw new Exception('Le paramètre doit être une instance de la classe Personnage');
        $this->personnages[$var->getGuid()] = $var;
    }
    
}

