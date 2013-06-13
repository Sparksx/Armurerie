<?php

class Stats {

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

    private static $tabType = array(
        91 => 'setVolE',
        92 => 'setVolT',
        93 => 'setVolA',
        94 => 'setVolF',
        95 => 'setVolN',
        96 => 'setDomE',
        97 => 'setDomT',
        98 => 'setDomA',
        99 => 'setDomF',
        100 => 'setDomN',
        108 => 'setPvr',
        110 => 'addVitalite',
        111 => 'addPa',
        112 => 'addDom',
        115 => 'addCc',
        117 => 'addPo',
        118 => 'addForce',
        119 => 'addAgilite',
        121 => 'addDom',
        122 => 'addEc',
        123 => 'addChance',
        124 => 'addSagesse',
        125 => 'addVitalite',
        126 => 'addIntelligence',
        128 => 'addPm',
        138 => 'addPerdom',
        152 => 'remChance',
        153 => 'remVitalite',
        154 => 'remAgilite',
        155 => 'remIntelligence',
        156 => 'remSagesse',
        157 => 'remForce',
        158 => 'addPod',
        159 => 'remPod',
        174 => 'addIni',
        175 => 'remIni',
        176 => 'addPros',
        177 => 'remPros',
        182 => 'addInvoc',
        210 => 'setPerResT',
        211 => 'setPerResE',
        212 => 'setPerResA',
        213 => 'setPerResF',
        214 => 'setPerResN',
        215 => 'setperFebT',
        216 => 'setperFebE',
        217 => 'setperFebA',
        218 => 'setperFebF',
        219 => 'setperFebN',
        240 => 'setResF',
        241 => 'setResN',
        242 => 'setResT',
        243 => 'setResE',
        244 => 'setResA',
        245 => 'setFebF',
        246 => 'setFebN',
        247 => 'setFebT',
        248 => 'setFebE',
        249 => 'setFebA',
    );
    
    private static $typeToString = array(
        'dom' => 'dommages',
        'perdom' => '% dommages',
        'cc' => 'coups critiques',
        'ec' => 'echecs critiques',
        'ini' => 'initiative',
        'invoc' => 'créatures invocables',
        'pros' => 'prospection',
        'resN' => 'resistance Neutre',
        'resT' => 'resistance Terre',
        'resF' => 'resistance Feu',
        'resA' => 'resistance Air',
        'resE' => 'resistance Eau',
        'perResN' => '% resistance Neutre',
        'perResT' => '% resistance Terre',
        'perResF' => '% resistance Feu',
        'perResA' => '% resistance Air',
        'perResE' => '% resistance Eau',
        'febN' => 'faiblesse Neutre',
        'febT' => 'faiblesse Terre',
        'febF' => 'faiblesse Feu',
        'febA' => 'faiblesse Air',
        'febE' => 'faiblesse Eau',
        'perFebN' => '% faiblesse Neutre',
        'perFebT' => '% faiblesse Terre',
        'perFebF' => '% faiblesse Feu',
        'perFebA' => '% faiblesse Air',
        'perFebE' => '% faiblesse Eau',
        'domN' => 'dommages Neutre',
        'domT' => 'dommages Terre',
        'domF' => 'dommages Feu',
        'domA' => 'dommages Air',
        'domE' => 'dommages Eau',
        'volN' => 'Vol de vie Neutre : ',
        'volT' => 'Vol de vie Terre : ',
        'volF' => 'Vol de vie Feu : ',
        'volA' => 'Vol de vie Air : ',
        'volE' => 'Vol de vie Eau : '
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

    public function readStringStats($string = null) {
        if (!isset($string))
            throw new Exception('L\'argument $string doit être précisé');

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
        if (array_key_exists($type, self::$tabType)) {
            $method = self::$tabType[$type];
            if (method_exists($this, $method))
                $this->$method($var);
            else
                throw new Exception('La méthode n\'éxiste pas');
        }
    }

    public function getAllStats()
    {
    	
        $allStats = array();
        foreach ($this as $attribut => $valeur) {
            if(array_key_exists('min', $valeur)) {
                if($valeur['min'] != 0 || $valeur['max'] != 0) {
                    if($valeur['max'] == 0)
                        $val = $this->parseStats($attribut, $valeur['min']);
                    else
                         $val = $this->parseStats($attribut, $valeur['min'], $valeur['max']);
                    $allStats[] = $val.'<img src="/armurerie/images/elements/'.$attribut.'.png" alt="'.$attribut.'" style="float:right;height:20px;" />';
                }
            }
        }
        return $allStats;
    }

    private function parseStats($type = null, $min = null, $max = null) {
        if(!isset($type) || !isset($min))
            throw new Exception('Les arguments $type et $min doivent être précisés');
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
        
        if(array_key_exists($type, self::$typeToString))
            $op3 = self::$typeToString[$type];
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
        if ($this->pa['max'] != 0)
            return $this->pa;
        return $this->pa['min'];
    }

    public function getPm() {
        if ($this->pm['max'] != 0)
            return $this->pm;
        return $this->pm['min'];
    }

    public function getPo() {
        if ($this->po['max'] != 0)
            return $this->po;
        return $this->po['min'];
    }

    public function getDom() {
        if ($this->dom['max'] != 0)
            return $this->dom;
        return $this->dom['min'];
    }

    public function getSoin() {
        if ($this->soin['max'] != 0)
            return $this->soin;
        return $this->soin['min'];
    }

    public function getVitalite() {
        if ($this->vitalite['max'] != 0)
            return $this->vitalite;
        return $this->vitalite['min'];
    }

    public function getSagesse() {
        if ($this->sagesse['max'] != 0)
            return $this->sagesse;
        return $this->sagesse['min'];
    }

    public function getForce() {
        if ($this->force['max'] != 0)
            return $this->force;
        return $this->force['min'];
    }

    public function getIntelligence() {
        if ($this->intelligence['max'] != 0)
            return $this->intelligence;
        return $this->intelligence['min'];
    }

    public function getChance() {
        if ($this->chance['max'] != 0)
            return $this->chance;
        return $this->chance['min'];
    }

    public function getAgilite() {
        if ($this->agilite['max'] != 0)
            return $this->agilite;
        return $this->agilite['min'];
    }

    //	---------------------------------------------------------------------------
    protected function addPa($add = null) {
        if (is_array($add)) {
            $this->pa['min'] = $add[0];
            $this->pa['max'] = $add[1];
        } elseif (is_int($add)) {
            $this->pa['min'] += $add;
        } else {
            throw new Exception('Le paramètre doit être un nombre ou un tableau');
        }
    }

    protected function addPm($add = null) {
        if (is_array($add)) {
            $this->pm['min'] = $add[0];
            $this->pm['max'] = $add[1];
        } elseif (is_int($add)) {
            $this->pm['min'] += $add;
        } else {
            throw new Exception('Le paramètre doit être un nombre ou un tableau');
        }
    }

    protected function addPo($add = null) {
        if (is_array($add)) {
            $this->po['min'] = $add[0];
            $this->po['max'] = $add[1];
        } elseif (is_int($add)) {
            $this->po['min'] += $add;
        } else {
            throw new Exception('Le paramètre doit être un nombre ou un tableau');
        }
    }

    protected function addDom($add = null) {
        if (is_array($add)) {
            $this->dom['min'] = $add[0];
            $this->dom['max'] = $add[1];
        } elseif (is_int($add)) {
            $this->dom['min'] += $add;
        } else {
            throw new Exception('Le paramètre doit être un nombre ou un tableau');
        }
    }

    protected function addPerdom($add = null) {
        if (is_array($add)) {
            $this->perdom['min'] = $add[0];
            $this->perdom['max'] = $add[1];
        } elseif (is_int($add)) {
            $this->perdom['min'] += $add;
        } else {
            throw new Exception('Le paramètre doit être un nombre ou un tableau');
        }
    }

    protected function addCc($add = null) {
        if (is_array($add)) {
            $this->cc['min'] = $add[0];
            $this->cc['max'] = $add[1];
        } elseif (is_int($add)) {
            $this->cc['min'] += $add;
        } else {
            throw new Exception('Le paramètre doit être un nombre ou un tableau');
        }
    }

    protected function addEc($add = null) {
        if (is_array($add)) {
            $this->ec['min'] = $add[0];
            $this->ec['max'] = $add[1];
        } elseif (is_int($add)) {
            $this->ec['min'] += $add;
        } else {
            throw new Exception('Le paramètre doit être un nombre ou un tableau');
        }
    }

    protected function addSoin($add = null) {
        if (is_array($add)) {
            $this->soin['min'] = $add[0];
            $this->soin['max'] = $add[1];
        } elseif (is_int($add)) {
            $this->soin['min'] += $add;
        } else {
            throw new Exception('Le paramètre doit être un nombre ou un tableau');
        }
    }

    protected function addPod($add = null) {
        if (is_array($add)) {
            $this->pod['min'] = $add[0];
            $this->pod['max'] = $add[1];
        } elseif (is_int($add)) {
            $this->pod['min'] += $add;
        } else {
            throw new Exception('Le paramètre doit être un nombre ou un tableau');
        }
    }

    protected function addIni($add = null) {
        if (is_array($add)) {
            $this->ini['min'] = $add[0];
            $this->ini['max'] = $add[1];
        } elseif (is_int($add)) {
            $this->ini['min'] += $add;
        } else {
            throw new Exception('Le paramètre doit être un nombre ou un tableau');
        }
    }

    protected function addInvoc($add = null) {
        if (is_array($add)) {
            $this->invoc['min'] = $add[0];
            $this->invoc['max'] = $add[1];
        } elseif (is_int($add)) {
            $this->invoc['min'] += $add;
        } else {
            throw new Exception('Le paramètre doit être un nombre ou un tableau');
        }
    }

    protected function addPros($add = null) {
        if (is_array($add)) {
            $this->pros['min'] = $add[0];
            $this->pros['max'] = $add[1];
        } elseif (is_int($add)) {
            $this->pros['min'] += $add;
        } else {
            throw new Exception('Le paramètre doit être un nombre ou un tableau');
        }
    }

    protected function addVitalite($add = null) {
        if (is_array($add)) {
            $this->vitalite['min'] = $add[0];
            $this->vitalite['max'] = $add[1];
        } elseif (is_int($add)) {
            $this->vitalite['min'] += $add;
        } else {
            throw new Exception('Le paramètre doit être un nombre ou un tableau');
        }
    }

    protected function addSagesse($add = null) {
        if (is_array($add)) {
            $this->sagesse['min'] = $add[0];
            $this->sagesse['max'] = $add[1];
        } elseif (is_int($add)) {
            $this->sagesse['min'] += $add;
        } else {
            throw new Exception('Le paramètre doit être un nombre ou un tableau');
        }
    }

    protected function addForce($add = null) {
        if (is_array($add)) {
            $this->force['min'] = $add[0];
            $this->force['max'] = $add[1];
        } elseif (is_int($add)) {
            $this->force['min'] += $add;
        } else {
            throw new Exception('Le paramètre doit être un nombre ou un tableau');
        }
    }

    protected function addIntelligence($add = null) {
        if (is_array($add)) {
            $this->intelligence['min'] = $add[0];
            $this->intelligence['max'] = $add[1];
        } elseif (is_int($add)) {
            $this->intelligence['min'] += $add;
        } else {
            throw new Exception('Le paramètre doit être un nombre ou un tableau');
        }
    }

    protected function addChance($add = null) {
        if (is_array($add)) {
            $this->chance['min'] = $add[0];
            $this->chance['max'] = $add[1];
        } elseif (is_int($add)) {
            $this->chance['min'] += $add;
        } else {
            throw new Exception('Le paramètre doit être un nombre ou un tableau');
        }
    }

    protected function addAgilite($add = null) {
        if (is_array($add)) {
            $this->agilite['min'] = $add[0];
            $this->agilite['max'] = $add[1];
        } elseif (is_int($add)) {
            $this->agilite['min'] += $add;
        } else {
            throw new Exception('Le paramètre doit être un nombre ou un tableau');
        }
    }

    //	---------------------------------------------------------------------------
    protected function remPa($rem = null) {
        if (is_array($rem)) {
            $this->pa['min'] = $rem[0];
            $this->pa['max'] = $rem[1];
        } elseif (is_int($rem)) {
            $this->pa['min'] -= $rem;
        } else {
            throw new Exception('Le paramètre doit être un nombre ou un tableau');
        }
    }

    protected function remPm($rem = null) {
        if (is_array($rem)) {
            $this->pm['min'] = $rem[0];
            $this->pm['max'] = $rem[1];
        } elseif (is_int($rem)) {
            $this->pm['min'] -= $rem;
        } else {
            throw new Exception('Le paramètre doit être un nombre ou un tableau');
        }
    }

    protected function remPo($rem = null) {
        if (is_array($rem)) {
            $this->po['min'] = $rem[0];
            $this->po['max'] = $rem[1];
        } elseif (is_int($rem)) {
            $this->po['min'] -= $rem;
        } else {
            throw new Exception('Le paramètre doit être un nombre ou un tableau');
        }
    }

    protected function remDom($rem = null) {
        if (is_array($rem)) {
            $this->dom['min'] = $rem[0];
            $this->dom['max'] = $rem[1];
        } elseif (is_int($rem)) {
            $this->dom['min'] -= $rem;
        } else {
            throw new Exception('Le paramètre doit être un nombre ou un tableau');
        }
    }

    protected function remSoin($rem = null) {
        if (is_array($rem)) {
            $this->soin['min'] = $rem[0];
            $this->soin['max'] = $rem[1];
        } elseif (is_int($rem)) {
            $this->soin['min'] -= $rem;
        } else {
            throw new Exception('Le paramètre doit être un nombre ou un tableau');
        }
    }

    protected function remPod($rem = null) {
        if (is_array($rem)) {
            $this->pod['min'] = $rem[0];
            $this->pod['max'] = $rem[1];
        } elseif (is_int($rem)) {
            $this->pod['min'] -= $rem;
        } else {
            throw new Exception('Le paramètre doit être un nombre ou un tableau');
        }
    }

    protected function remIni($rem = null) {
        if (is_array($rem)) {
            $this->ini['min'] = $rem[0];
            $this->ini['max'] = $rem[1];
        } elseif (is_int($rem)) {
            $this->ini['min'] -= $rem;
        } else {
            throw new Exception('Le paramètre doit être un nombre ou un tableau');
        }
    }
    protected function remPros($rem = null) {
        if (is_array($rem)) {
            $this->pros['min'] = $rem[0];
            $this->pros['max'] = $rem[1];
        } elseif (is_int($rem)) {
            $this->pros['min'] -= $rem;
        } else {
            throw new Exception('Le paramètre doit être un nombre ou un tableau');
        }
    }

    protected function remVitalite($rem = null) {
        if (is_array($rem)) {
            $this->vitalite['min'] = $rem[0];
            $this->vitalite['max'] = $rem[1];
        } elseif (is_int($rem)) {
            $this->vitalite['min'] -= $rem;
        } else {
            throw new Exception('Le paramètre doit être un nombre ou un tableau');
        }
    }

    protected function remSagesse($rem = null) {
        if (is_array($rem)) {
            $this->sagesse['min'] = $rem[0];
            $this->sagesse['max'] = $rem[1];
        } elseif (is_int($rem)) {
            $this->sagesse['min'] -= $rem;
        } else {
            throw new Exception('Le paramètre doit être un nombre ou un tableau');
        }
    }

    protected function remForce($rem = null) {
        if (is_array($rem)) {
            $this->force['min'] = $rem[0];
            $this->force['max'] = $rem[1];
        } elseif (is_int($rem)) {
            $this->force['min'] -= $rem;
        } else {
            throw new Exception('Le paramètre doit être un nombre ou un tableau');
        }
    }

    protected function remIntelligence($rem = null) {
        if (is_array($rem)) {
            $this->intelligence['min'] = $rem[0];
            $this->intelligence['max'] = $rem[1];
        } elseif (is_int($rem)) {
            $this->intelligence['min'] -= $rem;
        } else {
            throw new Exception('Le paramètre doit être un nombre ou un tableau');
        }
    }

    protected function remChance($rem = null) {
        if (is_array($rem)) {
            $this->chance['min'] = $rem[0];
            $this->chance['max'] = $rem[1];
        } elseif (is_int($rem)) {
            $this->chance['min'] -= $rem;
        } else {
            throw new Exception('Le paramètre doit être un nombre ou un tableau');
        }
    }

    protected function remAgilite($rem = null) {
        if (is_array($rem)) {
            $this->agilite['min'] = $rem[0];
            $this->agilite['max'] = $rem[1];
        } elseif (is_int($rem)) {
            $this->agilite['min'] -= $rem;
        } else {
            throw new Exception('Le paramètre doit être un nombre ou un tableau');
        }
    }


    protected function setDomE($add = null) {
        if (is_array($add)) {
            $this->domE['min'] = $add[0];
            $this->domE['max'] = $add[1];
        } else {
            throw new Exception('Le paramètre doit être un tableau');
        }
    }
    protected function setDomT($add = null) {
        if (is_array($add)) {
            $this->domT['min'] = $add[0];
            $this->domT['max'] = $add[1];
        } else {
            throw new Exception('Le paramètre doit être un tableau');
        }
    }
    protected function setDomA($add = null) {
        if (is_array($add)) {
            $this->domA['min'] = $add[0];
            $this->domA['max'] = $add[1];
        } else {
            throw new Exception('Le paramètre doit être un tableau');
        }
    }
    protected function setDomF($add = null) {
        if (is_array($add)) {
            $this->domF['min'] = $add[0];
            $this->domF['max'] = $add[1];
        } else {
            throw new Exception('Le paramètre doit être un tableau');
        }
    }
    protected function setDomN($add = null) {
        if (is_array($add)) {
            $this->domN['min'] = $add[0];
            $this->domN['max'] = $add[1];
        } else {
            throw new Exception('Le paramètre doit être un tableau');
        }
    }

    protected function setVolE($add = null) {
        if (is_array($add)) {
            $this->volE['min'] = $add[0];
            $this->volE['max'] = $add[1];
        } else {
            throw new Exception('Le paramètre doit être un tableau');
        }
    }
    protected function setVolT($add = null) {
        if (is_array($add)) {
            $this->volT['min'] = $add[0];
            $this->volT['max'] = $add[1];
        } else {
            throw new Exception('Le paramètre doit être un tableau');
        }
    }
    protected function setVolA($add = null) {
        if (is_array($add)) {
            $this->volA['min'] = $add[0];
            $this->volA['max'] = $add[1];
        } else {
            throw new Exception('Le paramètre doit être un tableau');
        }
    }
    protected function setVolF($add = null) {
        if (is_array($add)) {
            $this->volF['min'] = $add[0];
            $this->volF['max'] = $add[1];
        } else {
            throw new Exception('Le paramètre doit être un tableau');
        }
    }
    protected function setVolN($add = null) {
        if (is_array($add)) {
            $this->volN['min'] = $add[0];
            $this->volN['max'] = $add[1];
        } else {
            throw new Exception('Le paramètre doit être un tableau');
        }
    }


    protected function setPerResN($add = null) {
        if (is_array($add)) {
            $this->perResN['min'] = $add[0];
            $this->perResN['max'] = $add[1];
        } elseif (is_int($add)) {
            $this->perResN['min'] += $add;
        } else {
            throw new Exception('Le paramètre doit être un nombre ou un tableau');
        }
    }
    protected function setPerResT($add = null) {
        if (is_array($add)) {
            $this->perResT['min'] = $add[0];
            $this->perResT['max'] = $add[1];
        } elseif (is_int($add)) {
            $this->perResT['min'] += $add;
        } else {
            throw new Exception('Le paramètre doit être un nombre ou un tableau');
        }
    }
    protected function setPerResF($add = null) {
        if (is_array($add)) {
            $this->perResF['min'] = $add[0];
            $this->perResF['max'] = $add[1];
        } elseif (is_int($add)) {
            $this->perResF['min'] += $add;
        } else {
            throw new Exception('Le paramètre doit être un nombre ou un tableau');
        }
    }
    protected function setPerResE($add = null) {
        if (is_array($add)) {
            $this->perResE['min'] = $add[0];
            $this->perResE['max'] = $add[1];
        } elseif (is_int($add)) {
            $this->perResE['min'] += $add;
        } else {
            throw new Exception('Le paramètre doit être un nombre ou un tableau');
        }
    }
    protected function setPerResA($add = null) {
        if (is_array($add)) {
            $this->perResA['min'] = $add[0];
            $this->perResA['max'] = $add[1];
        } elseif (is_int($add)) {
            $this->perResA['min'] += $add;
        } else {
            throw new Exception('Le paramètre doit être un nombre ou un tableau');
        }
    }

    protected function setResN($add = null) {
        if (is_array($add)) {
            $this->resN['min'] = $add[0];
            $this->resN['max'] = $add[1];
        } elseif (is_int($add)) {
            $this->resN['min'] += $add;
        } else {
            throw new Exception('Le paramètre doit être un nombre ou un tableau');
        }
    }
    protected function setResT($add = null) {
        if (is_array($add)) {
            $this->resT['min'] = $add[0];
            $this->resT['max'] = $add[1];
        } elseif (is_int($add)) {
            $this->resT['min'] += $add;
        } else {
            throw new Exception('Le paramètre doit être un nombre ou un tableau');
        }
    }
    protected function setResF($add = null) {
        if (is_array($add)) {
            $this->resF['min'] = $add[0];
            $this->resF['max'] = $add[1];
        } elseif (is_int($add)) {
            $this->resF['min'] += $add;
        } else {
            throw new Exception('Le paramètre doit être un nombre ou un tableau');
        }
    }
    protected function setResE($add = null) {
        if (is_array($add)) {
            $this->resE['min'] = $add[0];
            $this->resE['max'] = $add[1];
        } elseif (is_int($add)) {
            $this->resE['min'] += $add;
        } else {
            throw new Exception('Le paramètre doit être un nombre ou un tableau');
        }
    }
    protected function setResA($add = null) {
        if (is_array($add)) {
            $this->resA['min'] = $add[0];
            $this->resA['max'] = $add[1];
        } elseif (is_int($add)) {
            $this->resA['min'] += $add;
        } else {
            throw new Exception('Le paramètre doit être un nombre ou un tableau');
        }
    }


    protected function setperFebN($add = null) {
        if (is_array($add)) {
            $this->perFebN['min'] = $add[0];
            $this->perFebN['max'] = $add[1];
        } elseif (is_int($add)) {
            $this->perFebN['min'] += $add;
        } else {
            throw new Exception('Le paramètre doit être un nombre ou un tableau');
        }
    }
    protected function setperFebT($add = null) {
        if (is_array($add)) {
            $this->perFebT['min'] = $add[0];
            $this->perFebT['max'] = $add[1];
        } elseif (is_int($add)) {
            $this->perFebT['min'] += $add;
        } else {
            throw new Exception('Le paramètre doit être un nombre ou un tableau');
        }
    }
    protected function setperFebF($add = null) {
        if (is_array($add)) {
            $this->perFebF['min'] = $add[0];
            $this->perbebF['max'] = $add[1];
        } elseif (is_int($add)) {
            $this->perFebF['min'] += $add;
        } else {
            throw new Exception('Le paramètre doit être un nombre ou un tableau');
        }
    }
    protected function setperFebE($add = null) {
        if (is_array($add)) {
            $this->perFebE['min'] = $add[0];
            $this->perFebE['max'] = $add[1];
        } elseif (is_int($add)) {
            $this->perFebE['min'] += $add;
        } else {
            throw new Exception('Le paramètre doit être un nombre ou un tableau');
        }
    }
    protected function setperFebA($add = null) {
        if (is_array($add)) {
            $this->perFebA['min'] = $add[0];
            $this->perFebA['max'] = $add[1];
        } elseif (is_int($add)) {
            $this->perFebA['min'] += $add;
        } else {
            throw new Exception('Le paramètre doit être un nombre ou un tableau');
        }
    }

    protected function setFebN($add = null) {
        if (is_array($add)) {
            $this->febN['min'] = $add[0];
            $this->febN['max'] = $add[1];
        } elseif (is_int($add)) {
            $this->febN['min'] += $add;
        } else {
            throw new Exception('Le paramètre doit être un nombre ou un tableau');
        }
    }
    protected function setFebT($add = null) {
        if (is_array($add)) {
            $this->febT['min'] = $add[0];
            $this->febT['max'] = $add[1];
        } elseif (is_int($add)) {
            $this->febT['min'] += $add;
        } else {
            throw new Exception('Le paramètre doit être un nombre ou un tableau');
        }
    }
    protected function setFebF($add = null) {
        if (is_array($add)) {
            $this->febF['min'] = $add[0];
            $this->febF['max'] = $add[1];
        } elseif (is_int($add)) {
            $this->febF['min'] += $add;
        } else {
            throw new Exception('Le paramètre doit être un nombre ou un tableau');
        }
    }
    protected function setFebE($add = null) {
        if (is_array($add)) {
            $this->febE['min'] = $add[0];
            $this->febE['max'] = $add[1];
        } elseif (is_int($add)) {
            $this->febE['min'] += $add;
        } else {
            throw new Exception('Le paramètre doit être un nombre ou un tableau');
        }
    }
    protected function setFebA($add = null) {
        if (is_array($add)) {
            $this->febA['min'] = $add[0];
            $this->febA['max'] = $add[1];
        } elseif (is_int($add)) {
            $this->febA['min'] += $add;
        } else {
            throw new Exception('Le paramètre doit être un nombre ou un tableau');
        }
    }

}
