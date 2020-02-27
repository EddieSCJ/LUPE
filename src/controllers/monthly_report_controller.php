<?php
// ini_set('display_errors',1);
// ini_set('display_startup_erros',1);
// error_reporting(E_ALL);

session_start();
requireValidSession();

$user = $_SESSION['user'];

$wh =  WorkingHours::loadFromUserAndData(1, (new DateTime())->format('Y-m-d'));

$registries = $wh->getMonthlyReport($user->id, (new DateTime())->format('Y-m-d'));

$report = [];
$worked_days = 0;
$sum_of_worked_time = 0;
$lastDay = getLastDayOfMonthh(new DateTime())->format('d');

for ($day = 1; $day <= $lastDay; $day++) {
    $date = (new DateTime())->format('Y-m') . "-" . sprintf('%02d', $day);
    $registry = $registries[$date];

    if (isPastWorkDay($date)) {
        $worked_days++;
    }
    if ($registry) {
        $sum_of_worked_time += $registry->worked_time;
        array_push($report, $registry);
    } else {
        array_push($report, new WorkingHours([
            'work_date' => $date,
            'worked_time' => 0,
        ]));
    }
}

$expected_time = $worked_days * DAILY_TIME;

$balance = getTimeStringFromSeconds(($sum_of_worked_time - $expected_time));

loadTemplateView('monthly_report', [
    'monthly_reports' => $report,
    'total_worked_time' => $sum_of_worked_time,
    'balance' => $balance,
    'expected_time' => $expected_time
]);
