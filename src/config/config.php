<?php 
setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');

//folders

define('MODEL_PATH', realpath(dirname(__FILE__) .  '/../models'));
define('VIEW_PATH', realpath(dirname(__FILE__) .  '/../views'));
define('TEMPLATE_PATH', realpath(dirname(__FILE__) .  '/../views/template'));
define('CONTROLLER_PATH', realpath(dirname(__FILE__) .  '/../controllers'));
define('EXCEPTION_PATH', realpath(dirname(__FILE__) .  '/../exceptions'));
define('DAILY_TIME', 60*60*8);

require_once(realpath(dirname(__FILE__) . '/Database.php'));
require_once(realpath(dirname(__FILE__) . '/utils.php'));
require_once(realpath(dirname(__FILE__) . '/loader.php'));
require_once(realpath(dirname(__FILE__) . '/session.php'));
require_once(realpath(EXCEPTION_PATH . '/AppException.php'));
require_once(realpath(EXCEPTION_PATH . '/ValidationException.php'));

loadModel('Model');
loadModel('WorkingHours');
require_once(MODEL_PATH . "/User.php");
?>