<?php

function getDateAsDateTime($date)
{
    return is_string($date) ? new DateTime($date) : $date;
}

function isWeekend($date)
{
    $inputDate = getDateAsDateTime($date);
    return $inputDate->format('N') >= 6;
}

function isBefore($date1, $date2)
{
    $inputDate1 = getDateAsDateTime($date1);
    $inputDate2 = getDateAsDateTime($date2);

    return $inputDate1 <= $inputDate2;
}

function getNextDay($date1)
{
    $inputDate1 = getDateAsDateTime($date1);
    $inputDate1->modify('+1 day');

    return $inputDate1;
}


function sumInterval($interval1, $interval2)
{
    $date = new DateTime("00:00:00");
    $date->add($interval1);
    $date->add($interval2);
    return (new DateTime('00:00:00'))->diff($date);
}

function subtractInterval($i1, $i2)
{
    $date = new DateTime("00:00:00");
    $date->add($i1);
    $date->sub($i2);
    return (new DateTime("00:00:00"))->diff($date);
}

function intervalToDate($interval)
{
    return new DateTimeImmutable($interval->format("%H:%i:%s"));
}

function stringToDate($string)
{
    return DateTimeImmutable::createFromFormat('H:i:s', $string);
}

function getLastDayOfMonthh($date)
{
    $date = getDateAsDateTime($date)->getTimestamp();
    return getDateAsDateTime(date('Y-m-t', $date));
}

function getFirstDayOfMonthh($date)
{
    $date = getDateAsDateTime($date)->getTimestamp();
    return getDateAsDateTime(date('Y-m-1', $date));
}

function isPastWorkDay($date)
{
    return !isWeekend($date) and isBefore($date, new DateTime());
}

function getTimeStringFromSeconds($seconds)
{
    $h = intdiv($seconds, 3600);
  
    $min = intdiv($seconds % 3600, 60);
    $min = $min<0 ? $min*-1 : $min;
  
    $s = ($seconds % 3600) % 60;
    $s = $s<0 ? $s*-1 : $s;

    return sprintf("%02d:%02d:%02d", $h, $min, $s);
}

function prepareDataToVisu($monthly_reports)
{
    foreach ($monthly_reports as $registry) {
        $registry->work_date = ucwords(formatDateWithLocale($registry->work_date, "%d de %B de %Y, %a"));
        $registry->worked_time = getTimeStringFromSeconds($registry->worked_time);
    }
}

function formatDateWithLocale($date, $pattern)
{
    $time = getDateAsDateTime($date)->getTimestamp();
    return strftime($pattern, $time);
}
