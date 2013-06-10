<?php

/**
 * Description of Armurerie
 *
 * @author Sparks
 */
class Armurerie extends Securisation {
    
    private static $instances = 0;
    private $personnage = array();
    private $compte = array();
    private $baseDeDonnee = null;
    private $maj = null;
    private $OS2 = array();
    
    public function __construct($OS2 = null) {
        if(!isset($OS2) || empty($OS2) || !is_array($OS2))
            throw new Exception('La configuration est érroné ou manquante');
        
        $this->OS2 = $OS2;
        $this->baseDeDonnee = new BddManager($OS2);
        $this->maj = $this->haveMaj();
        $this->sendRequest();
        self::$instances++;
    }
	
	public static function edebug($var, $echo) {
		$s = "<pre>".print_r($var, true)."</pre>";
		if(!$echo) return $s;
		echo $s;
	}
    
    // -------------------------------------------------------------------------
    // Fonctions publique
    
    public function load($param = null, $compte = false) {
        
        if(is_int($param)) {
            if($compte) {
                if(!array_key_exists($param, $this->compte)) {
                    $com = $this->baseDeDonnee->getCompte($param);
                    if($com !== FALSE) {
                        $this->compte[$param] = $com;
                    }
                }
            }
            else {
                if(!array_key_exists($param, $this->personnage)) {
                    $personnage = $this->baseDeDonnee->getPersonnage($param);
                    if($personnage !== FALSE) {
                        $this->personnage[$param] = $personnage;
                    }
                }
            }
        }
        elseif(is_array($param)) {
            if($compte) {
                foreach($param as $idCom) {
                    if(is_int($idCom)) {
                        if(!array_key_exists($idCom, $this->compte)) {
                            $com = $this->baseDeDonnee->getCompte($idCom);
                            if($com !== FALSE) {
                                $this->compte[$com->getGuid()] = $com;
                            }
                        }
                    }
                }
            }
            else {
                foreach($param as $idPer) {
                    if(is_int($idPer)) {
                        if(!array_key_exists($idPer, $this->personnage)) {
                            $personnage = $this->baseDeDonnee->getPersonnage($idPer);
                            if($personnage !== FALSE) {
                                $this->personnage[$personnage->getGuid()] = $personnage;
                            }
                        }
                    }
                }
            }
        }
        
        return;
    }
    
    public function show($param = -1, $compte = false) {
        
        $resultSearch = '';
        
		$this->load($param, $compte);
        
        
        if($this->OS2['rechercheMod']) {
            if(isset($_GET['tx']) && !empty($_GET['tx'])) {
                $ret = $this->baseDeDonnee->searchPersonnage($_GET['tx']);
                if($ret instanceof Personnage) {
                    $this->personnage[$ret->getGuid()] = $ret;
                }
                elseif (is_array($ret)) {
                    $resultSearch = $this->creatRechercheResult($ret);
                }
            }
        }
        
        
        // On génère le html :
        $html = '';
        
        
        $html .= $this->openArmurerie();
        
        
        if($this->OS2['rechercheMod']) {
            $html .= $this->setRecherche();
            $html .= $resultSearch;
        }
        
        
        if(!empty($this->personnage) || !empty($this->compte)) {
			$html .= '<div id="onePerso">';
				foreach($this->personnage as $personnage) {
					$html .= $this->creatArmurerie($personnage);
				}
			$html .= '</div>';
        }
        
        
        $html .= $this->closeArmurerie();
        
        return $html;
    }
    
    // -------------------------------------------------------------------------
    // Fonctions privé
    
    private function creatArmurerie($personnage = null) {
        if(!($personnage instanceof Personnage))
            throw new Exception('Le paramètre doit être déclaré et une instance de la classe Personnage');
        // On génère le html :
        $html = '';
        
        $html .= $this->openVue();
        
        $html .= $this->setBandeau($personnage);

        $html .= $this->startCentre();
		
        $html .= $this->setViewItem($personnage);
        $html .= $this->setColonneStats($personnage);
		
        $html .= $this->endCentre();

        $html .= $this->setPopItem($personnage);
        
        $html .= $this->closeVue();
        
        return $html;
    }
    private function creatRechercheResult($persoFind = null) {
        if(!isset($persoFind))
            throw new Exception('Le paramètre doit être déclaré');
        
        $html = $this->openShowRecherche();
        
        if(count($persoFind) == 0)
            $html .= '<p class="noResult">Auncun résultat trouvé pour "'.$_GET['tx'].'"</p>';
        else
            foreach ($persoFind as $perso)
                $html .= $this->showRecherche($perso);
        
        $html .= $this->closeShowRecherche();
        
        return $html;
    }
    
    private function setRecherche() {
        $html = '<div id="recherche">';
        $html .=    '<form method="GET" action="'.$this->curPageURL().'">';
        $html .=        '<label for="cherche">Vous cherchez quelqu\'un ?</label>&nbsp;<input type="text" name="tx" id="cherche" maxlength="20" size="20" placeholder="Jean Jacques" />&nbsp;<input type="submit" value="Valider" />';
        $html .=    '</form>';
        $html .= '</div>';
        
        return $html;
    }
    
    
    private function openShowRecherche() {
        $html = '<div id="resultRecherche">';
        
        return $html;
    }
    private function showRecherche($perso) {
        $url = stristr($this->curPageURL(), "tx=", true);
        
        $html = '<a href="'.$url.'tx='.$perso['name'].'">';
        $html .=    '<div class="affResult">';
        $html .=        '<img src="/armurerie/images/avatar/'.$perso['class'].$perso['sexe'].'.jpg" />';
        $html .=        '<p>'.  ucfirst($perso['name']).' - Niveau '.$perso['level'].'</p>';
        $html .=    '</div>';
        $html .= '</a>';
        
        return $html;
    }
    private function closeShowRecherche() {
        
        $html = '</div>';
        
        return $html;
    }

    private function setBandeau($personnage = null) {
        if(!($personnage instanceof Personnage))
            throw new Exception('Le paramètre doit être déclaré et une instance de la classe Personnage');
        
        $xpPlus = $this->baseDeDonnee->select_all_other('perso', 'experience', 'lvl', ($personnage->getLevel() + 1));
        $xpMoin = $this->baseDeDonnee->select_all_other('perso', 'experience', 'lvl', $personnage->getLevel());

        $xpActu  = $personnage->getXp() - $xpMoin['perso'];
        $difMax = $xpPlus['perso'] - $xpMoin['perso'];
        $PercenXp = ceil(($xpActu * 100) / $difMax);

        
        $html =     '<div id="infosPerso">';
        
        $html .=        '<img src="/armurerie/images/avatar/'.$personnage->getClass().$personnage->getSexe().'.jpg" title="'.$personnage->getName().'" class="avatar" />';
        $html .=        '<div id="personnalisation">';
                        if($this->maj !== false)
        $html .=            '<a href="http://armurerie.sparks.great-heberg.eu" target="_blank"><img src="/armurerie/images/elements/maintenance.png" class="tooltip" title="Version actuel : '.$this->OS2['version'].' - Mise à jour disponible : '.$this->maj.'" alt="Maj dispo" /></a>';
        
                        foreach($this->OS2['themes'] as $theme) {
        $html .=            '<div class="'.$theme.'">';
        $html .=                '';
        $html .=            '</div>';
                        }
        $html .=        '</div>';
        
        $html .=        '<div id="name">'.ucfirst($personnage->getName()).'</div>';
        $html .=        '<div id="niveau" tooltip="divSta'.$personnage->getGuid().'">';
        $html .=            '<div class="right">'.($personnage->getLevel() + 1).'</div>';
        $html .=            ''.$personnage->getLevel().'';
        $html .=            '<div id="extBarre">';
        $html .=                '<div id="intBarre" style="width:'.$PercenXp.'%;">';
        $html .=                    ''.$this->splitNumber($personnage->getXp()).'';
        $html .=                '</div>';
        $html .=            '</div>';
        $html .=        '</div>';
        $html .=        '<div id="titre">';
                        if($personnage->getTitle() != 0)
        $html .=            ''.$this->parseTitre($personnage->getTitle());
                        else
        $html .=            'Pas de titre';
        $html .=        '</div>';
        
        $html .=        '<div id="popStats" style="display:none;">';
        $html .=            '<div id="divSta'.$personnage->getGuid().'" class="divSta">';
        $html .=                '<div id="extBarre2">';
        $html .=                    '<div id="separate" class="separate"></div>';
        $html .=                    '<div id="total">'.$PercenXp.'%</div>';
        $html .=                    '<div id="after">'.$this->splitNumber($xpMoin['perso']).'</div>';
        $html .=                    '<div id="before">'.$this->splitNumber($xpPlus['perso']).'</div>';
        $html .=                    '<div id="intBarre2" style="width:'.$PercenXp.'%;">';
        $html .=                        ''.$this->splitNumber($personnage->getXp()).'';
        $html .=                    '</div>';
        $html .=                    '<div id="reste" style="width:'.(100 - $PercenXp).'%;">'.$this->splitNumber($difMax - $xpActu).'</div>';
        $html .=                '</div>';
        $html .=            '</div>';
        $html .=        '</div>';
        $html .=    '</div>';

        return $html;
    }
	
	
    private function setColonneStats($personnage = null) {
        if(!($personnage instanceof Personnage))
            throw new Exception('Le paramètre doit être déclaré et une instance de la classe Personnage');
        
        $html = '<div id="statsPanel" class="'.$this->OS2['posColStats'].'">';
        $html .=    '<p class="stati titre">Statistiques</p>';
        $html .=    '<p class="stati mini">';
        $html .=        '<span class="tooltip" title="(Base + Equipements)">';
        $html .=            'Total';
        $html .=        '</span>';
        $html .=    '</p>';
                foreach($this->OS2['statsBase'] as $type) {
        $html .=    '<p class="stati">';
        $html .=        '<span class="tooltip" title="'.ucfirst($type).' : '.$personnage->getStatsBase($type).' + '.$personnage->getStatsEquipe($type).'">';
        $html .=            '<img src="/armurerie/images/elements/'.$type.'.png" alt="'.ucfirst($type).'" />';
        $html .=            ''.$personnage->getStatsTotal($type).'';
        $html .=        '</span>';
        $html .=    '</p>';
                }
                
        $html .=    '<div id="copyright">';
        $html .=        '<a href="http://sparks.great-heberg.eu" target="_blank"><p>Par Sparks ©</p></a>';
        $html .=        '<p>Pour '.$this->OS2['nameServer'].'</p>';
        $html .=        '<p style="font-size:0.6em;">V'.$this->OS2['version'].'</p>';
        $html .=    '</div>';
        $html .= '</div>';

        return $html;
    }
	
	
    private function setViewItem($personnage = null) {
        if(!($personnage instanceof Personnage))
            throw new Exception('Le paramètre doit être déclaré et une instance de la classe Personnage');
        
        $html = '<div id="armurerie">';
        $html .=    '<br />';

        $html .=    '<div id="dofus">';
                foreach($this->OS2['dofus'] as $pos) {
                    $item = $personnage->getItemPos($pos);
                    if($item != NULL) {
        $html .=        '<div class="item dof" tooltip="'.$item->getGuid().'">';
        $html .=            '<img src="/armurerie/images/Gfx/'.$item->getType().'/'.$item->getGfx().'.png" />';
        $html .=        '</div>';
                    }
                    else {
        $html .=        '<div class="item dof" tooltip="">';
        $html .=            '<img src="/armurerie/images/Gfx/1/vide.png" />';
        $html .=        '</div>';
                    }
                }
        $html .=    '</div>';

        $html .=    '<div id="onPerso">';
                foreach($this->OS2['onPerso'] as $pos) {
                    $item = $personnage->getItemPos($pos);
                    if($item != NULL) {
        $html .=        '<div class="item pos'.$pos.'" tooltip="'.$item->getGuid().'">';
        $html .=            '<img src="/armurerie/images/Gfx/'.$item->getType().'/'.$item->getGfx().'.png" />';
        $html .=        '</div>';
                    }
                    else {
        $html .=        '<div class="item pos'.$pos.'" tooltip="">';
        $html .=            '<img src="/armurerie/images/Gfx/1/vide.png" />';
        $html .=        '</div>';
                    }
                }
        $html .=    '</div>';

        $html .=    '<div id="itemRight">';
                foreach($this->OS2['itemRight'] as $pos) {
                    $item = $personnage->getItemPos($pos);
                    if($item != NULL) {
        $html .=        '<div class="item pos'.$pos.'" tooltip="'.$item->getGuid().'">';
        $html .=            '<img src="/armurerie/images/Gfx/'.$item->getType().'/'.$item->getGfx().'.png" />';
        $html .=        '</div>';
                    }
                    else {
        $html .=        '<div class="item pos'.$pos.'" tooltip="">';
        $html .=            '<img src="/armurerie/images/Gfx/1/vide.png" />';
        $html .=        '</div>';
                    }
                }
        $html .=    '</div>';
        
        $html .= '</div>';

        return $html;
    }
    private function setPopItem($personnage = null) {
        if(!($personnage instanceof Personnage))
            throw new Exception('Le paramètre doit être déclaré et une instance de la classe Personnage');
        
        $html = '<div id="statsItem" style="display:none;">';
                foreach ($personnage->getObjets() as $item) {
                    $pano = '';
                    if($item->getPanoplie() instanceof Panoplie)
                        $pano = ' style="color:#598f96;"';
        $html .=    '<div class="itemStats" id="b'.$item->getGuid().'">';
        $html .=        '<div class="nameItem" style="width:350px;text-align:center;font-size:1.2em;font-family:footer,Georgia;border-bottom:1px solid black;">';
        $html .=            '<span '.$pano.'>';
        $html .=                ''.$item->getName().'';
        $html .=            '<span>';
        $html .=        '</div>';
        $html .=        '<img src="/armurerie/images/Gfx/'.$item->getType().'/'.$item->getGfx().'.png" style="float:left;width:100px;" alt="Image manquante" />';
        $html .=        '<div class="thisStats" style="display:inline-block;width:240px;height:100%;">';
                    foreach($item->getThisStats()->getAllStats() as $statsString)
        $html .=            '<p class="staItm" style="width:100%;margin:2px 0;padding-left:10px;">' . $statsString . '</p>';
        
        $html .=        '</div>';
        $html .=    '</div>';
                }
        $html .=    '<div id="b" style="width:100%;text-align:center;">Aucun item équipé</div>';
        $html .= '</div>';

        return $html;
    }
    private function openArmurerie() {
        $html = '<div id="OS2_armurerie">';

        return $html;
    }
    private function closeArmurerie() {
        $html = '</div>';

        return $html;
    }
    private function openVue() {
        $html = '<div class="vueArmurerie">';

        return $html;
    }
    private function closeVue() {
        $html = '</div>';

        return $html;
    }
	
    private function startCentre() {
        $html = '<div id="statsPerso">';

        return $html;
    }
    private function endCentre() {
        $html = '</div>';

        return $html;
    }

    protected function splitNumber($num) {
        $invNumTab = str_split($num, 1);
        $invNum = "";
        for($i = (count($invNumTab) - 1); $i >= 0 ;$i--)
            $invNum .= $invNumTab[$i];
        $numSplit = str_split($invNum, 3);
        $point = '';
        foreach($numSplit as $small)
            $point .= $small.".";
        $NumTab = str_split($point, 1);
        $return = "";
        for($i = (count($NumTab) - 1); $i >= 0 ;$i--)
            $return .= $NumTab[$i];
        $return = substr($return, 1);
        return $return;
    }

    private function parseTitre($t) {
        if(array_key_exists($t, $this->OS2['titre']))
            return $this->OS2['titre'][$t];
        else
            return 'Pas de titre';
    }

	
	
	
	
	
    private function haveMaj() {
        $lastVer = $this->UrlGetContentsCurl("http://plugins.fraternity-serveur.eu/armurerie/?version", 2, true);
        if(!$lastVer)
            return false;
        if($lastVer > $this->OS2['version'])
            return $lastVer;
        return FALSE;
    }

    private function sendRequest() {
        $url = urlencode($_SERVER['SERVER_NAME']);
        $req = $this->UrlGetContentsCurl('http://plugins.fraternity-serveur.eu/armurerie/?req='.$url, 2, false);
        return true;
    }
    
    private function curPageURL() {
        $pageURL = 'http';
        if (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on") {
            $pageURL .= "s";
        }
        $pageURL .= "://";
        if ($_SERVER["SERVER_PORT"] != "80") {
            $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
        } else {
            $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
        }
        return $pageURL;
    }
}



