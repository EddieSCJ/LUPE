<?php

class Model
{
    protected static $tableName = '';
    protected static $columns = [];
    protected $values = [];

    function __construct($array)
    {
        $this->loadFromArray($array);
    }

    public function loadFromArray($array)
    {
        if ($array) {
            foreach ($array as $key => $value) {
                $this->$key = $value;
            }
        }
    }

    public function save(){
      
        $sql =  "INSERT INTO " . static::$tableName . " (" . 
        implode(',', static::$columns) . ") VALUES (" ;
        foreach(static::$columns as $col){
            $sql.= static::getFormated($this->$col) . ", ";
        }
    
        $sql[strlen($sql)-2] = ")";

        $id = Database::executeSQL($sql, self::$tableName);
        return $id;
    }

    public function update(){
        $sql = "UPDATE" . static::$tableName . "SET";
        foreach(static::$columns as $col){
            $sql.= " ${col} = " . static::getFormated($this->$col) . ",";
        }
        $sql[strlen($sql)-2] = "WHERE id = " . $this->id . ";";
        Database::executeSQL($sql, static::$tableName);
    }

    public function __get($key)
    {
        return $this->values[$key];
    }

    public function __set($key, $value)
    {
        $this->values[$key] = $value;
    }

    public function getAll($columns = '*', $filters = [])
    {
        $objects = [];
        $results = static::getResultFromSelect($columns, $filters);
        if (!is_null($results)) {
            $class = get_called_class();
            while ($row = $results->fetchObject()) {
                array_push($objects, new $class($row));
            }
        }
        return $objects;
    }

    public static function getOne($columns="*", $filters = [])
    {
        $class = get_called_class();
        $result = static::getResultFromSelect($columns, $filters);
        return $result ? new $class($result->fetchObject()) : null;
    }

    private static function getResultFromSelect($columns = '*', $filters = [])
    {
        $sql = " SELECT $columns FROM " . static::$tableName . static::getFilters($filters);

        $result = Database::getResultFromQuery($sql);
        if ($result->num_rows === 0) {
            return null;
        } else {
            return $result;
        }
    }

    private static function getFilters($filters)
    {
        $sql = '';
        if (count($filters) > 0) {
            $sql .= " WHERE 1 = 1";
            foreach ($filters as $key => $value) {
                $sql .= " AND $key = " . static::getFormated($value);
            }
        }
        $sql .= ';';

        return $sql;
    }

    private static function getFormated($value)
    {

        if (is_string($value)) {
            return "'$value'";
        } elseif (is_null($value)) {
            return "null";
        } else {
            return "$value";
        }
    }
}
