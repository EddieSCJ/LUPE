<?php 
// ini_set("display_errors",1);
// ini_set("display_startup_erros",1);
// error_reporting(E_ALL);
require_once(dirname(__FILE__, 2) . "/src/config/config.php");

// $aParametros = $_GET;

// $sControlador = $aParametros['controller'];
// $sId = $aParametros['id'];
// $sAcao = $aParametros['action'];

$sUri = urldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
);

if($sUri === '/' || $sUri === '') {
    $sUri = '/day_records_controller.php';
}

require_once(sCONTROLLER_PATH . "/{$rUri}");

?>




