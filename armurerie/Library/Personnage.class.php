<?php

/**
 * Description of Personnage
 *
 * @author Hollisprice
 */
class Personnage {

    private $id = 0;
    private $name = null;
    private $sexe = 0;
    private $class = 0;
    private $level = 0;
    private $xp = 0;
    private $title = 0;
    private $account = 0;
    private $stats = null;
    private $objets = array();

    public function __construct($donnees, $bdd) {
        if (!is_array($donnees))
            throw new Exception('Le paramètre doit être un array');

        $this->stats = new Stats($donnees['level']);
        $this->stats->setStatsPerso('vitalite', (50 + (($donnees['level'] - 1) * 5)));
        foreach ($donnees as $key => $value) {
            if ($key == 'objets') {
                if(!empty($value)) {
                    $liste = str_replace('|', ', ', $value);
                    if(strrpos($liste, ', ') == (strlen($liste) - 2))
                        $liste = substr($liste, 0, -2);

                    if (is_string($liste)) {
                        $itms = $bdd->loadItems($liste);
                        if(is_array($itms)) {
                            foreach($itms as $itm) {
                                $this->objets[] = new Item($itm, $bdd);
                            }
                        }
                    }
                }
            }
            elseif ($key == 'vitalite' || $key == 'force' || $key == 'sagesse' || $key == 'intelligence' || $key == 'chance' || $key == 'agilite') {
                $this->stats->setStatsPerso($key, $value);
            } else {
            	$this->$key = $value;
				
				/*
                $method = 'set' . ucfirst($key);
                if (method_exists($this, $method)) {
                    $this->$method($value);
                }
                //*/
            }
        }
    }

    public function getStatsBase($stats) {
        $method = 'get' . ucfirst($stats);
        if (method_exists($this->stats, $method)) {
            return $this->stats->$method();
        } else {
            throw new Exception('La méthode ' . $method . ' est inéxistante');
        }
    }

    public function getStatsEquipe($stats) {
        $tot = 0;
        $panoEquiped = array();
        foreach ($this->objets as $item) {
            $tot += $item->getStats($stats);
            if ($item->getPanoplie() instanceof Panoplie) {
                if (array_key_exists($item->getPanoplie()->getId(), $panoEquiped)) {
                    $panoEquiped[$item->getPanoplie()->getId()]++;
                } else {
                    $panoEquiped[$item->getPanoplie()->getId()] = 1;
                }
            }
        }
        foreach ($panoEquiped as $idPano => $nbItem) {
            if ($nbItem >= 2) {
                $panoplie = Item::getInstances($idPano);
                $bonus = $panoplie->getBonus($nbItem);
                if ($bonus instanceof Stats) {
                    $method = 'get' . ucfirst(strtolower($stats));
                    if (method_exists($bonus, $method)) {
                        $tot += $bonus->$method();
                    } else {
                        throw new Exception('La statistique ' . $stats . ' n\'éxiste pas');
                    }
                }
            }
        }

        return $tot;
    }

    public function getStatsTotal($stats = null) {
        return $this->getStatsBase($stats) + $this->getStatsEquipe($stats);
    }

    //	---------------------------------------------------------------------------
    // getters
    public function getGuid() {
        return $this->id;
    }

    public function getItemPos($pos = NULL) {
        if(!isset($pos) || !is_int($pos))
            throw new Exception('L\'argument $pos est obligatoire et doit être un nombre (int)');

        foreach ($this->objets as $item) {
            if($item->getPos() == $pos)
                return $item;
        }
        return NULL;
    }

    public function getObjets() {
        return $this->objets;
    }

    public function getName() {
        return $this->name;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getSexe() {
        return $this->sexe;
    }

    public function getClass() {
        return $this->class;
    }

    public function getLevel() {
        return $this->level;
    }

    public function getXp() {
        return $this->xp;
    }

    public function getAccount() {
        return $this->account;
    }

    //	---------------------------------------------------------------------------
    // setters
    private function setGuid($var) {
        if (!is_numeric($var))
            throw new Exception('Le paramètre doit être un nombre');
        $this->id = (int) $var;
    }

    private function setTitle($var) {
        if (!is_numeric($var))
            throw new Exception('Le paramètre doit être un nombre');
        $this->title = (int) $var;
    }

    private function setName($var) {
        if (!is_string($var))
            throw new Exception('Le paramètre doit être une chaine de caractère');
        $this->name = $var;
    }

    private function setSexe($var) {
        if (!is_numeric($var))
            throw new Exception('Le paramètre doit être un nombre');
        $this->sexe = (int) $var;
    }

    private function setClass($var) {
        if (!is_numeric($var))
            throw new Exception('Le paramètre doit être un nombre');
        $this->class = (int) $var;
    }

    private function setLevel($var) {
        if (!is_numeric($var))
            throw new Exception('Le paramètre doit être un nombre');
        $this->level = (int) $var;
    }

    private function setXp($var) {
        if (!is_numeric($var))
            throw new Exception('Le paramètre doit être un nombre');
        $this->xp = (int) $var;
    }

    private function setAccount($var) {
        if (!is_numeric($var))
            throw new Exception('Le paramètre doit être un nombre');
        $this->account = (int) $var;
    }

}

