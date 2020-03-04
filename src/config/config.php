<?php 
setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');

//folders

define('sMODEL_PATH', realpath(dirname(__FILE__) .  '/../models'));
define('sVIEW_PATH', realpath(dirname(__FILE__) .  '/../views'));
define('sTEMPLATE_PATH', realpath(dirname(__FILE__) .  '/../views/template'));
define('sCONTROLLER_PATH', realpath(dirname(__FILE__) .  '/../controllers'));
define('sEXCEPTION_PATH', realpath(dirname(__FILE__) .  '/../exceptions'));
define('iDAILY_TIME', 60*60*8);

require_once(realpath(dirname(__FILE__) . '/Database.php'));
require_once(realpath(dirname(__FILE__) . '/utils.php'));
require_once(realpath(dirname(__FILE__) . '/loader.php'));
require_once(realpath(dirname(__FILE__) . '/session.php'));
require_once(realpath(sEXCEPTION_PATH . '/AppException.php'));
require_once(realpath(sEXCEPTION_PATH . '/ValidationException.php'));

loadModel('Model');
loadModel('WorkingHours');
require_once(sMODEL_PATH . "/User.php");
?>