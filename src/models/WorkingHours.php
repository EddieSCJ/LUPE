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
        if($registry === null){
            $registry = new WorkingHours(
                ['user_id' => $userId,
                 'work_date'=> $work_date,
                 'worked_time' => 0
                ] 
                );

        }

        return $registry;
    }

    public function getNextTime(){
        if(!$this->time1) return 'time1';
        if(!$this->time2) return 'time2';
        if(!$this->time3) return 'time3';
        if(!$this->time4) return 'time4'; 
        return null;
    }

    public function getActiveClock(){
        $nextTime = $this->getNextTime();
        if($nextTime=='time1' or $nextTime == 'time3') return 'exitTime';
        if($nextTime=='time2' or $nextTime == 'time4') return 'workTime';
        return 'stop';
    
    }
 
    public function batimento($time) {
        
        $timeColumn = $this->getNextTime();

        if(!$timeColumn){
            throw new AppException("Você já realizou os 4 batimentos do dia!");
        }
        $this->$timeColumn = $time;
        $d1 = new DateTimeImmutable();
        $d2 = (new DateTime())->add($this->getWorkedInterval());
        
        $this->worked_time = ($d1->getTimestamp() - $d2->getTimestamp()) ;

        if($this->id){
            $this->update(); 
        }else{
            $this->save();
        }
    }

    public function getWorkedInterval(){
        $times = $this->getTimes();

        $period1 = new DateInterval('PT0S');
        $period2 = new DateInterval('PT0S');

        if($times[0]) $period1 = $times[0]->diff(new DateTime()); 
        if($times[1]) $period1 = $times[1]->diff($times[0]);
        if($times[2]) $period2 = (new DateTime())->diff($times[2]); 
        if($times[3]) $period2 = $times[3]->diff($times[2]); 
        return sumInterval($period1, $period2);
    }

    public function getBreakInterval(){
        $times = $this->getTimes();

        $lunch = new DateInterval('PT0S');
        
        if($times[1]){
            $lunch = (new DateTime())->diff($times[1]);
            if($times[2]){
                $lunch = $times[1]->diff($times[2]);
            }
        }

        return $lunch;

    }

    public function getMonthlyReport($userId, $date){
        $registries = [];
        $startDate = getFirstDayOfMonthh($date)->format('Y-m-d');
        $endDate = getLastDayOfMonthh($date)->format('Y-m-d');

        $result = static::getResultFromSelect('*', [
            'user_id' => $userId,
            'raw' => "work_date between '{$startDate}' AND '{$endDate}'"
        ]
        );

        if($result !== NULL){
            while($row = $result->fetchObject()){
                $registries[$row->work_date] = new WorkingHours($row);
            }
        }


        return $registries;
    }

    private function getTimes(){
        $times = [];

        $this->time1 
        ? array_push($times, stringToDate($this->time1))
        : array_push($times, null);

        $this->time2 
        ? array_push($times, stringToDate($this->time2))
        : array_push($times, null);

        $this->time3 
        ? array_push($times, stringToDate($this->time3))
        : array_push($times, null);

        $this->time4 
        ? array_push($times, stringToDate($this->time4))
        : array_push($times, null);

        return $times;
    }

    public function getExitTime(){
        $times = $this->getTimes();
        $workDay = new DateInterval("PT8H");
        if(!$times[0]){
            return (new DateTimeImmutable())->add($workDay);
        }elseif($times[3]){
            return $times[3];
        }else{
            return $times[0]->add(sumInterval($workDay, $this->getBreakInterval()));
        }
    }
    
}




?>