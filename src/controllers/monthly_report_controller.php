<?php 

session_start();
requireValidSession();

loadModel("User");

$oUser = $_SESSION['user'];

$iSelectedUser = $_POST['selectedUser']  ? $_POST['selectedUser'] : $oUser->id;

$oWh =  WorkingHours::loadFromUserAndData($iSelectedUser, (new DateTime())->format('Y-m-d'));
$bSelectedUserAdmin = (boolean)$oUser->is_admin;

$aPeriods = [];
$sSelectedPeriod = $_POST['periods'] ? $_POST['periods'] : (new DateTime())->format("Y-m");
$sSelectedPeriod = explode("-" , $sSelectedPeriod);
$sSelectedPeriod = sprintf("%02d-%02d", $sSelectedPeriod[0], $sSelectedPeriod[1]);
$oUser = new User([]);
$loUsers = $oUser->getAll("name, id");

for($iYearDiff = 0; $iYearDiff<=10; $iYearDiff++){
    $iYear = date("Y")-$iYearDiff;
    for($iMonth = 1; $iMonth<=12; $iMonth++ ){
        
        $iMonthFinal = date("$iMonth");
        $sDateStr = sprintf("%02d-%02d", $iYear, $iMonth);
        
        $tDateTimeStamp = (new DateTime($sDateStr))->getTimestamp();
        $sDate = ucfirst(strftime("%B de %Y", $tDateTimeStamp));

        $aPeriods[$sDateStr] = $sDate;
    }
}

$loRegistries = $oWh->getMonthlyReport($iSelectedUser, $sSelectedPeriod);

$loReport = [];
$iWorked_days = 0;
$iSum_of_worked_time = 0;
$iLastDay = getLastDayOfMonthh($sSelectedPeriod)->format('d');

for ($iDay = 1; $iDay <= $iLastDay; $iDay++) {
    $sDate = $sSelectedPeriod . "-" . sprintf('%02d', $iDay);
   

    $oRegistry = $loRegistries[$sDate];
    if (isPastWorkDay($sDate)) {
        $iWorked_days++;
    }
    if ($oRegistry) {
        $iSum_of_worked_time += $oRegistry->worked_time;
        array_push($loReport, $oRegistry);
    } else {
        array_push($loReport, new WorkingHours([
            'work_date' => $sDate,
            'worked_time' => 0,
        ]));
    }
}


$iExpected_time = $iWorked_days * iDAILY_TIME;

$sBalance = getTimeStringFromSeconds(($iSum_of_worked_time - $iExpected_time));

loadTemplateView('monthly_report', [
    'loMonthly_reports' => $loReport,
    'iTotal_worked_time' => $iSum_of_worked_time,
    'sBalance' => $sBalance,
    'iExpected_time' => $iExpected_time,
    'aPeriods' => $aPeriods,
    'loUsers' => $loUsers,
    'sSelectedPeriod' => $sSelectedPeriod,
    'iSelectedUser' => $iSelectedUser,
    'bSelectedUserAdmin' => $bSelectedUserAdmin,
    ]);
