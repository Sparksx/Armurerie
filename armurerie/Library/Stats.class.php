<?php

class Stats {
	
	/*
	
    private $pa = array('min' => 0, 'max' => 0);
    private $pm = array('min' => 0, 'max' => 0);
    private $po = array('min' => 0, 'max' => 0);

    private $volN = array('min' => 0, 'max' => 0);
    private $volT = array('min' => 0, 'max' => 0);
    private $volF = array('min' => 0, 'max' => 0);
    private $volE = array('min' => 0, 'max' => 0);
    private $volA = array('min' => 0, 'max' => 0);

    private $domN = array('min' => 0, 'max' => 0);
    private $domT = array('min' => 0, 'max' => 0);
    private $domF = array('min' => 0, 'max' => 0);
    private $domE = array('min' => 0, 'max' => 0);
    private $domA = array('min' => 0, 'max' => 0);

    private $pvr = array('min' => 0, 'max' => 0);

    private $dom = array('min' => 0, 'max' => 0);
    private $perdom = array('min' => 0, 'max' => 0);

    private $soin = array('min' => 0, 'max' => 0);

    private $cc = array('min' => 0, 'max' => 0);
    private $ec = array('min' => 0, 'max' => 0);

    private $vitalite = array('min' => 0, 'max' => 0);
    private $sagesse = array('min' => 0, 'max' => 0);
    private $force = array('min' => 0, 'max' => 0);
    private $intelligence = array('min' => 0, 'max' => 0);
    private $chance = array('min' => 0, 'max' => 0);
    private $agilite = array('min' => 0, 'max' => 0);

    private $pod = array('min' => 0, 'max' => 0);
    private $ini = array('min' => 0, 'max' => 0);
    private $pros = array('min' => 0, 'max' => 0);
    private $invoc = array('min' => 0, 'max' => 0);

    private $resN = array('min' => 0, 'max' => 0);
    private $resT = array('min' => 0, 'max' => 0);
    private $resF = array('min' => 0, 'max' => 0);
    private $resE = array('min' => 0, 'max' => 0);
    private $resA = array('min' => 0, 'max' => 0);

    private $perResN = array('min' => 0, 'max' => 0);
    private $perResT = array('min' => 0, 'max' => 0);
    private $perResF = array('min' => 0, 'max' => 0);
    private $perResE = array('min' => 0, 'max' => 0);
    private $perResA = array('min' => 0, 'max' => 0);

    private $febN = array('min' => 0, 'max' => 0);
    private $febT = array('min' => 0, 'max' => 0);
    private $febF = array('min' => 0, 'max' => 0);
    private $febE = array('min' => 0, 'max' => 0);
    private $febA = array('min' => 0, 'max' => 0);

    private $perFebN = array('min' => 0, 'max' => 0);
    private $perFebT = array('min' => 0, 'max' => 0);
    private $perFebF = array('min' => 0, 'max' => 0);
    private $perFebE = array('min' => 0, 'max' => 0);
    private $perFebA = array('min' => 0, 'max' => 0);
    
    */
    

    public static $tabType = array(
        91 => 'Vol de vie Eau : ',
        92 => 'Vol de vie Terre : ',
        93 => 'Vol de vie Air : ',
        94 => 'Vol de vie Feu : ',
        95 => 'Vol de vie Neutre : ',
        96 => 'dommages Eau',
        97 => 'dommages Terre',
        98 => 'dommages Air',
        99 => 'dommages Feu',
        100 => 'dommages Neutre',
        108 => 'Points de vies rendu',
        110 => 'Vitalite',
        111 => 'Pa',
        112 => 'Dommages',
        115 => 'Coups critiques',
        117 => 'portée',
        118 => 'Force',
        119 => 'Agilite',
        121 => 'Dommages',
        122 => 'Echecs critiques',
        123 => 'Chance',
        124 => 'Sagesse',
        125 => 'Vitalite',
        126 => 'Intelligence',
        128 => 'Pm',
        138 => '% dommages',
        152 => 'Chance',
        153 => 'Vitalite',
        154 => 'Agilite',
        155 => 'Intelligence',
        156 => 'Sagesse',
        157 => 'Force',
        158 => 'pods',
        159 => 'pods',
        174 => 'Initiative',
        175 => 'Initiative',
        176 => 'Prospection',
        177 => 'Prospection',
        178 => 'Soins',
        179 => 'Soins',
        182 => 'Créatures invocables',
        210 => '% resistance Terre',
        211 => '% resistance Eau',
        212 => '% resistance Air',
        213 => '% resistance Feu',
        214 => '% resistance Neutre',
        215 => '% faiblesse Terre',
        216 => '% faiblesse Eau',
        217 => '% faiblesse Air',
        218 => '% faiblesse Feu',
        219 => '% faiblesse Neutre',
        240 => 'Resistance Feu',
        241 => 'Resistance Neutre',
        242 => 'Resistance Terre',
        243 => 'Resistance Eau',
        244 => 'Resistance Air',
        245 => 'Faiblesse Feu',
        246 => 'Faiblesse Neutre',
        247 => 'Faiblesse Terre',
        248 => 'Faiblesse Eau',
        249 => 'Faiblesse Air',
    );

    public function __construct($lvl = -1, $stats = null) {
        if ($lvl != -1) {
            if ($lvl >= 100)
                $this->addPa(7);
            else
                $this->addPa(6);
            $this->addPm(3);
        }
        if (isset($stats))
            $this->readStringStats($stats);
    }

    public function readStringStats($string) {

        $stats = explode(',', $string);
        $maxStats = count($stats);
        $numero = 0;
        while ($numero < $maxStats) {
            if (strlen($stats[$numero]) > 4) {
                $bonus = explode('#', $stats[$numero]);
                $typeBonus = hexdec($bonus[0]);
                if (hexdec($bonus[2]) == 0) {
                    $valueBonus = hexdec($bonus[1]);
                } else {
					$valueBonus = array();
                    $valueBonus[0] = hexdec($bonus[1]);
                    $valueBonus[1] = hexdec($bonus[2]);
                }
                $this->parseType($typeBonus, $valueBonus);
            }
            $numero++;
        }
    }

    public function setStatsPerso($string = null, $value = null) {
        if (!isset($string))
            throw new Exception('L\'argument $string doit être précisé');
        if (!isset($value))
            throw new Exception('L\'argument $value doit être précisé');
        $method = 'add' . ucfirst($string);
        if (method_exists($this, $method)) {
            $this->$method((int) $value);
        }
    }

    public function parseType($type = null, $var = null) {
        if (!isset($type))
            throw new Exception('L\'argument $type doit être précisé');
        if (!isset($var))
            throw new Exception('L\'argument $var doit être précisé');
        
        $this->$type = $var;
        
    }

    public function getAllStats() {
    	$allStats = array();
        foreach ($this as $attribut => $valeur) {
        	if(is_array($valeur)) {
	        	$val = $this->parseStats($attribut, $valeur[0], $valeur[1]);
        	}
        	elseif(is_numeric($valeur)) {
	        	$val = $this->parseStats($attribut, $valeur);
        	}
        	else {
	        	throw new Exception('Valeur non reconnue');
        	}
        	$allStats[] = $val.'<img src="/armurerie/images/elements/'.$attribut.'.png" alt="'.$attribut.'" style="float:right;height:20px;" />';
        }
        return $allStats;
    }

    private function parseStats($type, $min, $max = null) {
    
        $nega = false;
        if($min < 0) {
            $op1 = '- ';
            $nega = true;
            $min *= -1;
            if(isset($max))
                $max *= -1;
        }
        else
            $op1 = '+ ';

        if(!isset($max))
            $op2 = $min;
        else
            $op2 = $min.' à '. $max;
        
        if(array_key_exists($type, self::$tabType))
            $op3 = self::$tabType[$type];
        else
            $op3 = $type;
        
        if(strrpos($op3, 'dommages ') !== false)
            $op1 = '';
        if(strrpos($op3, 'Vol de vie ') !== false) {
            $op1 = $op3;
            $op3 = $op2;
            $op2 = $op1;
            $op1 = '';
        }

        return $op1.$op2.' '.$op3;
    }

    //	---------------------------------------------------------------------------
    // getters
    public function getPa() {
    	if(!isset($this->pa)) return 0;
        if (isset($this->pa['max']))
            return $this->pa;
        return $this->pa['min'];
    }

    public function getPm() {
    	if(!isset($this->pm)) return 0;
        if (isset($this->pm['max']))
            return $this->pm;
        return $this->pm['min'];
    }

    public function getPo() {
    	if(!isset($this->po)) return 0;
        if (isset($this->po['max']))
            return $this->po;
        return $this->po['min'];
    }

    public function getDom() {
    	if(!isset($this->dom)) return 0;
        if (isset($this->dom['max']))
            return $this->dom;
        return $this->dom['min'];
    }

    public function getSoin() {
    	if(!isset($this->soin)) return 0;
        if (isset($this->soin['max']))
            return $this->soin;
        return $this->soin['min'];
    }

    public function getVitalite() {
		if(!isset($this->vitalite)) return 0;
        if (isset($this->vitalite['max']))
            return $this->vitalite;
        return $this->vitalite['min'];
    }

    public function getSagesse() {
    if(!isset($this->sagesse)) return 0;
        if (isset($this->sagesse['max']))
            return $this->sagesse;
        return $this->sagesse['min'];
    }

    public function getForce() {
    if(!isset($this->force)) return 0;
        if (isset($this->force['max']))
            return $this->force;
        return $this->force['min'];
    }

    public function getIntelligence() {
    	if(!isset($this->intelligence)) return 0;
        if (isset($this->intelligence['max']))
            return $this->intelligence;
        return $this->intelligence['min'];
    }

    public function getChance() {
    if(!isset($this->chance)) return 0;
        if (isset($this->chance['max']))
            return $this->chance;
        return $this->chance['min'];
    }

    public function getAgilite() {
    if(!isset($this->agilite)) return 0;
        if (isset($this->agilite['max']))
            return $this->agilite;
        return $this->agilite['min'];
    }

    //	---------------------------------------------------------------------------
    protected function addPa($add = null) {
        if (is_array($add)) {
            $this->pa['min'] = $add[0];
            $this->pa['max'] = $add[1];
        } elseif (is_int($add)) {
        	$this->pa['min'] = (isset($this->pa['min'])?$this->pa['min']:0) + $add;
        } else {
            throw new Exception('Le paramètre doit être un nombre ou un tableau');
        }
    }

    protected function addPm($add = null) {
        if (is_array($add)) {
            $this->pm['min'] = $add[0];
            $this->pm['max'] = $add[1];
        } elseif (is_int($add)) {
            $this->pm['min'] = (isset($this->pm['min'])?$this->pm['min']:0) + $add;
        } else {
            throw new Exception('Le paramètre doit être un nombre ou un tableau');
        }
    }

    protected function addVitalite($add = null) {
        if (is_array($add)) {
            $this->vitalite['min'] = $add[0];
            $this->vitalite['max'] = $add[1];
        } elseif (is_int($add)) {
            $this->vitalite['min'] = (isset($this->vitalite['min'])?$this->vitalite['min']:0) + $add;
        } else {
            throw new Exception('Le paramètre doit être un nombre ou un tableau');
        }
    }

    protected function addSagesse($add = null) {
        if (is_array($add)) {
            $this->sagesse['min'] = $add[0];
            $this->sagesse['max'] = $add[1];
        } elseif (is_int($add)) {
            $this->sagesse['min'] = (isset($this->sagesse['min'])?$this->sagesse['min']:0) + $add;
        } else {
            throw new Exception('Le paramètre doit être un nombre ou un tableau');
        }
    }

    protected function addForce($add = null) {
        if (is_array($add)) {
            $this->force['min'] = $add[0];
            $this->force['max'] = $add[1];
        } elseif (is_int($add)) {
            $this->force['min'] = (isset($this->force['min'])?$this->force['min']:0) + $add;
        } else {
            throw new Exception('Le paramètre doit être un nombre ou un tableau');
        }
    }

    protected function addIntelligence($add = null) {
        if (is_array($add)) {
            $this->intelligence['min'] = $add[0];
            $this->intelligence['max'] = $add[1];
        } elseif (is_int($add)) {
            $this->intelligence['min'] = (isset($this->intelligence['min'])?$this->intelligence['min']:0) + $add;
        } else {
            throw new Exception('Le paramètre doit être un nombre ou un tableau');
        }
    }

    protected function addChance($add = null) {
        if (is_array($add)) {
            $this->chance['min'] = $add[0];
            $this->chance['max'] = $add[1];
        } elseif (is_int($add)) {
            $this->chance['min'] = (isset($this->chance['min'])?$this->chance['min']:0) + $add;
        } else {
            throw new Exception('Le paramètre doit être un nombre ou un tableau');
        }
    }

    protected function addAgilite($add = null) {
        if (is_array($add)) {
            $this->agilite['min'] = $add[0];
            $this->agilite['max'] = $add[1];
        } elseif (is_int($add)) {
            $this->agilite['min'] = (isset($this->agilite['min'])?$this->agilite['min']:0) + $add;
        } else {
            throw new Exception('Le paramètre doit être un nombre ou un tableau');
        }
    }

    //	---------------------------------------------------------------------------

}
