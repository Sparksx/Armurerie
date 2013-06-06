<?php

/**
 * Description of Panoplie
 *
 * @author Sparks
 */
class Panoplie {
    
    private $id = 0;
	private $name = null;
	private $bonus = array();
	
	public function __construct($donnees) {
        foreach ($donnees as $key => $value)
        {
            $method = 'set'.ucfirst($key);
            if (method_exists($this, $method))
            {
                $this->$method($value);
            }
        }
	}
    public function getId() {
        return $this->id;
    }
    public function getName() {
        return $this->name;
    }
    public function getBonus($nbItem) {
        if(array_key_exists($nbItem, $this->bonus))
            return $this->bonus[$nbItem];
        return null;
    }
    
    private function setId($var) {
        if(!is_numeric($var))
			throw new Exception('Le paramètre doit être un nombre');
		$this->id = (int) $var;
    }
    private function setName($var) {
        if(!is_string($var))
			throw new Exception('Le paramètre doit être un nombre');
		$this->name = (int) $var;
    }
    
    private function setBonus($var) {
        if(!is_string($var))
			throw new Exception('Le paramètre doit être un nombre');
        
        $bonusNbItem = explode(';', $var);
        $nbItem = 2;
        foreach ($bonusNbItem as $bonusNbItemSeparate) {
            if(strlen($bonusNbItemSeparate) > 4) {
                $this->bonus[$nbItem] = new Stats;
                $bonusString = explode(',', $bonusNbItemSeparate);
                foreach ($bonusString as $bonusStringSeparate) {
                    $bon = explode(':', $bonusStringSeparate);
                    $this->bonus[$nbItem]->parseType((int) $bon[0], (int) $bon[1]);
                }
            }
            $nbItem++;
        }
    }
}


