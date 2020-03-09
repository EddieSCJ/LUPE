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

    public function save()
    {

        $sql =  "INSERT INTO " . static::$tableName . " (" .
            implode(',', static::$columns) . ") VALUES (";
        foreach (static::$columns as $col) {
            $sql .= static::getFormated($this->$col) . ", ";
        }

        $sql[strlen($sql) - 2] = ")";

        $id = Database::executeSQL($sql, self::$tableName);
        return $id;
    }

    public function update()
    {
        $sql  = "UPDATE " . static::$tableName . " SET";
        foreach (static::$columns as $col) {
            $sql .= " ${col} = " . static::getFormated($this->$col) . ",";
        }
        $sql[strlen($sql) - 1] = " ";
        $sql .= "WHERE id = " . $this->id . ";";
        $id = Database::executeSQL($sql, static::$tableName);
    }

    public static function getCount($filters = [])
    {
        $result = static::getResultFromSelect("count(*) as count", $filters);
        return $result->fetchObject()->count;
    }
    public static function get($filters = [], $columns = '*')
    {
        $objects = [];
        $result = static::getResultFromSelect($columns, $filters);
        if ($result) {
            $class = get_called_class();
            while ($row = $result->fetchObject()) {
                array_push($objects, new $class($row));
            }
        }
        return $objects;
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

    public static function getOne($columns = "*", $filters = [])
    {
        $class = get_called_class();
        $result = static::getResultFromSelect($columns, $filters);
        return $result ? new $class($result->fetchObject()) : null;
    }

    public static function getResultFromSelect($columns = '*', $filters = [])
    {
        $sql = " SELECT $columns FROM " . static::$tableName . static::getFilters($filters);
        echo $sql;
        $result = Database::getResultFromQuery($sql);

        if ($result->rowCount() == null) {
            return null;
        } else {
            return $result;
        }
    }
    public function getValues() {
        return $this->values;
    }

    private static function getFilters($filters)
    {
        $sql = '';
        if (count($filters) > 0) {
            $sql .= " WHERE 1 = 1";
            foreach ($filters as $key => $value) {
                if ($key == 'raw') {
                    $sql .= " AND {$value}";
                } else {
                    $sql .= " AND $key = " . static::getFormated($value);
                }
            }

        $sql .= ';';
        }

        return $sql;
    }

    public function delete() {
        static::deleteById($this->id);
    }

    public static function deleteById($id) {
        $sql = "DELETE FROM " . static::$tableName . " WHERE id = {$id}";
        Database::executeSQL($sql, static::$tableName);
    }

    private static function getFormated($value)
    {

        if (is_string($value)) {
            return "'$value'";
        } elseif (is_null($value)) {
            return "null";
        } else {
            return number_format($value, 2, '.', '');
        }
    }
    public function insert() {
        $sql  = "INSERT INTO " . static::$tableName . " ("
            . implode(",", static::$columns) . ") VALUES (";
        foreach(static::$columns as $col) {
            $sql .= static::getFormated($this->$col) . ",";
        }
        $sql[strlen($sql) - 1] = ')';
        $id = Database::executeSQL($sql,static::$tableName);
        $this->id = $id;
    }
}

