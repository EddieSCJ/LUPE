<?php


loadModel('WorkingHours');

// Database::executeSQL('DELETE FROM working_hours ', 'working_hours');
// Database::executeSQL('DELETE FROM users WHERE id>5 ', 'users');

function getDayByOdds($iRegularRate, $iExtraRate, $iLazyRate)
{

    $aRegularDay = [
        'time1' => '08:00:00',
        'time2' => '12:00:00',
        'time3' => '13:00:00',
        'time4' => '17:00:00',
        'worked_time' => iDAILY_TIME
    ];

    $aExtraHour = [
        'time1' => '08:00:00',
        'time2' => '12:00:00',
        'time3' => '13:00:00',
        'time4' => '18:00:00',
        'worked_time' => iDAILY_TIME + (60 * 60)
    ];

    $aLazyHour = [
        'time1' => '08:30:00',
        'time2' => '12:00:00',
        'time3' => '13:00:00',
        'time4' => '18:00:00',
        'worked_time' => iDAILY_TIME - (60 * 60) / 2
    ];

    $iValue = rand(0, 100);
    if ($iValue <= $iRegularRate) {
        return $aRegularDay;
    } else if ($iValue <= $iRegularRate + $iExtraRate) {
        return $aExtraHour;
    } else {
        return $aLazyHour;
    }
}

function populateWorkingHours($iUserId, $rInitialDate, $iRegularRate, $iExtraRate, $iLazyRate)
{
    $rCurrentDate = $rInitialDate;
    $rToday = new DateTime();
    $aColumns = [
        'user_id' => $iUserId,
        'work_date' => $rCurrentDate
    ];

    while (isBefore($rCurrentDate, $rToday)) {
        if (!isWeekend($rCurrentDate)) {
            $aTemplate = getDayByOdds($iRegularRate, $iExtraRate, $iLazyRate);
            $aColumns = array_merge($aColumns, $aTemplate);
            $oWorking_hours = new WorkingHours($aColumns);
            $oWorking_hours->save();
        }
        $rCurrentDate = getNextDay($rCurrentDate)->format('Y-m-d');
        $aColumns['work_date'] = $rCurrentDate;
    }
}




// $iLastDay = getLastDayOfMonthh("2020-01")->format('d');


// for ($iDay = 1; $iDay <= $iLastDay; $day++) {
//     $sDate = "2020-01" . "-" . sprintf('%02d', $iDay);
   
//         populateWorkingHours(1, $sDate, 70, 20, 10);
//         populateWorkingHours(3, $sDate, 10, 80, 10);
//         populateWorkingHours(4, $sDate, 20, 20, 60);
    
// }

