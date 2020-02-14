<?php


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
?>