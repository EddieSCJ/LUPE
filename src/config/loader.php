<?php

function loadModel($sModelName){
    require_once(sMODEL_PATH . "/" . $sModelName . ".php");
}

function loadView($sViewName, $aParams = array()){
    if(count($aParams) > 0){
        foreach($aParams as $key => $value){
            if(strlen($key)>0){
                ${$key} = $value;
            }
        }
    }
    require_once(sVIEW_PATH . "/" . $sViewName . ".php");
} 

function loadTemplateView($sViewName, $aParams = array()){
    if(count($aParams) > 0){
        foreach($aParams as $key => $value){
            if(strlen($key)>0){
                ${$key} = $value;
            }
        }
    }
    require_once(sTEMPLATE_PATH . "/header.php");
    require_once(sTEMPLATE_PATH . "/" . "left.php");
    require_once(sVIEW_PATH . "/" . $sViewName . ".php");
    require_once(sTEMPLATE_PATH . "/footer.php");
    
} 

function loadController($sControllerName){
    require_once(sCONTROLLER_PATH . "/" . $sControllerName . ".php");
}

function render_title($sTitle, $sSubtitle, $rIcon=null){
    require_once(sTEMPLATE_PATH . "/title.php");
}





?>