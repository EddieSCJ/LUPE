<?php

session_start();
requireValidSession();

$iActiveUserCount = User::getActiveUsersCount();
$aAbsentUsers = WorkingHours::getAbsentUsers();

$date = (new DateTime())->format("Y-m");
$iTotalWorkedSeconds = WorkingHours::getTotalMonthlyWorkedTime($date[0], $date[2]);
$iTime = getTimeStringFromSeconds($iTotalWorkedSeconds);
loadTemplateView('manager_report',[
    "iActiveUsersCount" => $iActiveUserCount,
    "aAbsentUsers" => $aAbsentUsers,
    "iTotalWorkedTime" => $iTime
]);