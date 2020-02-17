<?php

loadModel('WorkingHours');

Database::executeSQL('DELETE FROM working_hours', 'working_hours');
Database::executeSQL('DELETE FROM users WHERE id>5', 'users');

function getDayByOdds($regularRate, $extraRate, $lazyRate){

    $regularDay = [
        'time1' => '08:00:00',
        'time2' => '12:00:00',
        'time3' => '13:00:00',
        'time4' => '17:00:00',
        'worked_time' => DAILY_TIME
    ];
    
    $extraHour = [
        'time1' => '08:00:00',
        'time2' => '12:00:00',
        'time3' => '13:00:00',
        'time4' => '18:00:00',
        'worked_time' => DAILY_TIME + (60*60)
    ];
    
    $LazyHour = [
        'time1' => '08:30:00',
        'time2' => '12:00:00',
        'time3' => '13:00:00',
        'time4' => '18:00:00',
        'worked_time' => DAILY_TIME - (60*60)/2
    ];

    $value = rand(0,100);
    if($value<=$regularRate){
        return $regularDay;
    }else if($value<=$regularRate + $extraRate){
        return $extraHour;
    }else{
        return $LazyHour;
    }
}

function populateWorkingHours($userId, $initialDate, $regularRate, $extraRate, $lazyRate){
    $currentDate = $initialDate;
    $today = new DateTime();
    $columns = [
        'user_id' => $userId,
        'work_date' => $currentDate
    ];

    while(isBefore($currentDate, $today)){
        if(!isWeekend($currentDate)){
            $template = getDayByOdds($regularRate, $extraRate, $lazyRate);
            $columns = array_merge($columns, $template);
            $working_hours = new WorkingHours($columns);
            $working_hours->save(); 
        }
        $currentDate = getNextDay($currentDate)->format('Y-m-d');
        $columns['work_date'] = $currentDate;
    }
}

populateWorkingHours(1, date('Y-m-1'), 70, 20, 10);
populateWorkingHours(3, date('Y-m-1'), 10, 80, 10);
populateWorkingHours(4, date('Y-m-1'), 20, 20, 60);


echo "Enois tio";
?>