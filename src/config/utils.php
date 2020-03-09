<?php

function getDateAsDateTime($rDate)
{
    return is_string($rDate) ? new DateTime($rDate) : $rDate;
}

function isWeekend($rDate)
{
    $rInputDate = getDateAsDateTime($rDate);
    return $rInputDate->format('N') >= 6;
}

function isBefore($rDate1, $rDate2)
{
    $rInputDate1 = getDateAsDateTime($rDate1);
    $rInputDate2 = getDateAsDateTime($rDate2);

    return $rInputDate1 <= $rInputDate2;
}

function getNextDay($rDate1)
{
    $rInputDate1 = getDateAsDateTime($rDate1);
    $rInputDate1->modify('+1 day');

    return $rInputDate1;
}


function sumInterval($rInterval1, $rInterval2)
{
    $rDate = new DateTime("00:00:00");
    $rDate->add($rInterval1);
    $rDate->add($rInterval2);
    return (new DateTime('00:00:00'))->diff($rDate);
}

function subtractInterval($rInterval1, $rInterval2)
{
    $rDate = new DateTime("00:00:00");
    $rDate->add($rInterval1);
    $rDate->sub($rInterval2);
    return (new DateTime("00:00:00"))->diff($rDate);
}

function intervalToDate($rInterval)
{
    return new DateTimeImmutable($rInterval->format("%H:%i:%s"));
}

function stringToDate($sString)
{
    return DateTimeImmutable::createFromFormat('H:i:s', $sString);
}

function getLastDayOfMonthh($rDate)
{
    $tDate = getDateAsDateTime($rDate)->getTimestamp();
    return getDateAsDateTime(date('Y-m-t', $tDate));
}

function getFirstDayOfMonthh($rDate)
{
    $tDate = getDateAsDateTime($rDate)->getTimestamp();
    return getDateAsDateTime(date('Y-m-1', $tDate));
}

function isPastWorkDay($rDate)
{
    return !isWeekend($rDate) and isBefore($rDate, new DateTime());
}

function getTimeStringFromSeconds($iSeconds)
{
    $iH = intdiv($iSeconds, 3600);
  
    $iMin = intdiv($iSeconds % 3600, 60);
    $iMin = $iMin<0 ? $iMin*-1 : $iMin;
  
    $iS = ($iSeconds % 3600) % 60;
    $iS = $iS<0 ? $iS*-1 : $iS;

    return sprintf("%02d:%02d:%02d", $iH, $iMin, $iS);
}

function prepareDataToVisu($loMonthly_reports)
{
    foreach ($loMonthly_reports as $oRegistry) {
        $oRegistry->work_date = ucwords(formatDateWithLocale($oRegistry->work_date, "%d de %B de %Y, %a"));
        $oRegistry->worked_time = getTimeStringFromSeconds($oRegistry->worked_time);
    }
}

function formatDateWithLocale($rDate, $sPattern)
{
    $tTime = getDateAsDateTime($rDate)->getTimestamp();
    return strftime($sPattern, $tTime);
}

function addSuccessMsg($msg) {
    $_SESSION['message'] = [
        'type' => 'success',
        'message' => $msg
    ];
}

function addErrorMsg($msg) {
    $_SESSION['message'] = [
        'type' => 'error',
        'message' => $msg
    ];
}