<?php
session_start();
requireValidSession(true);


$exception = null;
if(isset($_GET['delete'])) {
    try {
        User::deleteById($_GET['delete']);
        addSuccessMsg('Usuário excluído com sucesso.');
    } catch(Exception $e) {
        if(stripos($e->getMessage(), 'FOREIGN KEY')) {
            addErrorMsg('Não é possível excluir o usuário com registros de ponto.');
        } else {
            $exception = $e;
        }
    }
}

$loUsers = User::get();
foreach($loUsers as $oUsers) {
    $oUsers->start_date = (new DateTime($oUsers->start_date))->format('d/m/Y');    
    if($oUsers->end_date) {
        $oUsers->end_date = (new DateTime($oUsers->end_date))->format('d/m/Y');
    }
}

loadTemplateView('users', [
    'loUsers' => $loUsers,
    'exception' => $exception
]);