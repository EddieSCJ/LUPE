<?php

class WorkingHours extends Model{
    protected static $tableName = 'working_hours';
    protected static $columns = [ 
        'user_id',
        'work_date', 
        'time1', 
        'time2', 
        'time3', 
        'time4',
        'worked_time'
    ];
    public static function loadFromUserAndData($userId, $work_date){
        $registry = self::getOne("*",['user_id' => $userId, 'work_date'=> $work_date]);
        if(!$registry){
            $registry = new WorkingHours(
                ['user_id' => $userId,
                 'work_date'=> $work_date,
                 'worked_time' => 0
                ] 
                );
        }
        return $registry;
    }
}



?>