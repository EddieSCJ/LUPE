<?php

session_start();
requireValidSession();

$iActiveUserCount = User::getActiveUsersCount();
$aAbsentUsers = WorkingHours::getAbsentUsers();

$rDate = (new DateTime())->format("Y-m");
$iTotalWorkedSeconds = WorkingHours::getTotalMonthlyWorkedTime($rDate[0], $rDate[2]);
$iTime = getTimeStringFromSeconds($iTotalWorkedSeconds);
loadTemplateView('manager_report',[
    "iActiveUsersCount" => $iActiveUserCount,
    "aAbsentUsers" => $aAbsentUsers,
    "iTotalWorkedTime" => $iTime
]);