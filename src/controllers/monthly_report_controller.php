<?php
session_start();
requireValidSession();

$user = $_SESSION['user'];

$wh =  WorkingHours::loadFromUserAndData(1,(new DateTime())->format('Y-m-d'));

$registries = $wh->getMonthlyReport($user->id, (new DateTime())->format('Y-m-d'));


loadTemplateView('monthly_report', [
    'monthly_reports' => $registries
]);

?>