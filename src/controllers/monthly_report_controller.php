<?php
session_start();
requireValidSession();

loadModel("User");

$user = $_SESSION['user'];

$selectedUser = $_POST['selectedUser']  ? $_POST['selectedUser'] : $user->id;

$wh =  WorkingHours::loadFromUserAndData($selectedUser, (new DateTime())->format('Y-m-d'));

$periods = [];
$selectedPeriod = $_POST['periods'] ? $_POST['periods'] : (new DateTime())->format("Y-m");
$selectedPeriod = explode("-" , $selectedPeriod);
$selectedPeriod = sprintf("%02d-%02d", $selectedPeriod[0], $selectedPeriod[1]);
$user = new User([]);
$users = $user->getAll("name, id");

for($yearDiff = 0; $yearDiff<=10; $yearDiff++){
    $year = date("Y")-$yearDiff;
    for($month = 1; $month<=12; $month++ ){
        
        $monthFinal = date("$month");
        $dateStr = sprintf("%02d-%02d", $year, $month);
        
        $dateTimeStamp = (new DateTime($dateStr))->getTimestamp();
        $date = utf8_encode(ucfirst(strftime("%B de %Y", $dateTimeStamp)));

        $periods[$dateStr] = $date;
    }
}

$registries = $wh->getMonthlyReport($selectedUser, $selectedPeriod);

$report = [];
$worked_days = 0;
$sum_of_worked_time = 0;
$lastDay = getLastDayOfMonthh($selectedPeriod)->format('d');

for ($day = 1; $day <= $lastDay; $day++) {
    $date = $selectedPeriod . "-" . sprintf('%02d', $day);
   
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
    'expected_time' => $expected_time,
    'periods' => $periods,
    'users' => $users,
    'selectedPeriod' => $selectedPeriod,
    'selectedUser' => $selectedUser
    ]);
