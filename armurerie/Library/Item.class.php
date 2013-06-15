<?php

class Item {

    private static $panoInstances = array();
    private $guid = 0;
    private $template = 0;
    private $name = null;
    private $type = 1;
    private $gfx = -1;
    private $pos = -1;
    private $level = 0;
    private $statsTemplate = null;
    private $stats = null;
    private $pod = 0;
    private $panoplie = -1;
    private $prix = 0;
    private $points = 0;
    private $conditions = null;
    private $armesInfos = null;

    public function __construct($donnees, $bdd) {
        foreach ($donnees as $key => $value) {
            if ($key == 'panoplie') {
                if ($value != -1) {
                    if (array_key_exists($value, $this->getInstances())) {
                        $this->setPanoplie(self::$panoInstances[$value]);
                    } else {
                        $pano = $bdd->getPanoplie((int) $value);
                        $this->setPanoplie($pano);
                        self::$panoInstances[$value] = $pano;
                    }
                }
            } else {
                $method = 'set' . ucfirst($key);
                if (method_exists($this, $method)) {
                    $this->$method($value);
                }
            }
        }
    }

    public function getStats($type) {
        if (!isset($this->stats))
            throw new Exception('Les stats de l\'objet n\'on pas été déclaré');
        if (!is_string($type))
            throw new Exception('Le paramètre doit être une chaine de caractère');
		
		
		
		$idType = array_search(ucfirst($type), stats::$tabType);
		$idsType = array_keys(stats::$tabType, ucfirst($type));
		
		$total = 0;
		
		foreach($idsType as $idType) {
			if(isset($this->stats->$idType)) {
				$total += $this->stats->$idType;
			}
        }
        
        return $total;
    }

    public function getThisStats() {
        return $this->stats;
    }

    public function getPos() {
        return $this->pos;
    }
    public function getName() {
        return $this->name;
    }
    public function getGuid() {
        return $this->guid;
    }
    public function getType() {
        return $this->type;
    }
    public function getGfx() {
        return $this->gfx;
    }
    public static function getInstances($key = NULL) {
        if (isset($key))
            return self::$panoInstances[$key];
        return self::$panoInstances;
    }

    public function getPanoplie() {
        return $this->panoplie;
    }

    //	---------------------------------------------------------------------------
    // Setters
    public function setGuid($value = null) {
        if (!is_numeric($value))
            throw new Exception('Le paramètre doit être un nombre');
        $this->guid = (int) $value;
    }

    public function setTemplate($value = null) {
        if (!is_numeric($value))
            throw new Exception('Le paramètre doit être un nombre');
        $this->template = (int) $value;
    }

    public function setId($value = null) {
        if (!is_numeric($value))
            throw new Exception('Le paramètre doit être un nombre');
        $this->template = (int) $value;
    }

    public function setPos($value = null) {
        if (!is_numeric($value))
            throw new Exception('Le paramètre doit être un nombre');
        $this->pos = (int) $value;
    }

    public function setName($value = null) {
        if (!is_string($value))
            throw new Exception('Le paramètre doit être une chaine de caractère');

        $this->name = utf8_encode($value);
    }

    public function setType($value = null) {
        if (!is_numeric($value))
            throw new Exception('Le paramètre doit être un nombre');

        $this->type = (int) $value;
    }

    public function setGfx($value = null) {
        if (!is_numeric($value))
            throw new Exception('Le paramètre doit être un nombre');

        $this->gfx = (int) $value;
    }

    public function setLevel($value = null) {
        if (!is_numeric($value))
            throw new Exception('Le paramètre doit être un nombre');

        $this->level = (int) $value;
    }

    public function setStatsTemplate($value = null) {
        if (!is_string($value))
            throw new Exception('Le paramètre doit être une chaine de caractère');

        $this->statsTemplate = new Stats(-1, $value);
    }

    public function setStats($value = null) {
        if (!is_string($value))
            throw new Exception('Le paramètre doit être une chaine de caractère');

        $this->stats = new Stats(-1, $value);
    }

    public function setPod($value = null) {
        if (!is_numeric($value))
            throw new Exception('Le paramètre doit être un nombre');

        $this->pod = (int) $value;
    }

    public function setPanoplie($value = null) {
        if (!($value instanceof Panoplie))
            throw new Exception('Le paramètre doit être un objet Panoplie');

        $this->panoplie = $value;
    }

    public function setPrix($value = null) {
        if (!is_numeric($value))
            throw new Exception('Le paramètre doit être un nombre');

        $this->prix = (int) $value;
    }

    public function setPoints($value = null) {
        if (!is_numeric($value))
            throw new Exception('Le paramètre doit être un nombre');

        $this->points = (int) $value;
    }

    public function setConditions($value = null) {
        if (!is_string($value))
            throw new Exception('Le paramètre doit être une chaine de caractère');

        $this->conditions = $value;
    }

    public function setArmesInfos($value = null) {
        if (!is_string($value))
            throw new Exception('Le paramètre doit être une chaine de caractère');

        $this->armesInfos = $value;
    }

    //	---------------------------------------------------------------------------

}