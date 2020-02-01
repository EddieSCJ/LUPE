<?php 


date_default_timezone_set('America/Sao_Paulo');
setlocale(LC_TIME, 'pt_BR.uft-8', 'portuguese');

//folders

define('MODEL_PATH', realpath(dirname(__FILE__) .  '/../models'));
define('VIEW_PATH', realpath(dirname(__FILE__) .  '/../views'));
define('CONTROLLER_PATH', realpath(dirname(__FILE__) .  '/../controllers'));
define('EXCEPTION_PATH', realpath(dirname(__FILE__) .  '/../exceptions'));

require_once(realpath(dirname(__FILE__) . '/Database.php'));
require_once(realpath(dirname(__FILE__) . '/loader.php'));
require_once(realpath(EXCEPTION_PATH . '/AppException.php'));

loadModel('Model');
?>