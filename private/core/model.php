<?php

/*
Main model 
*/

class Model extends Database
{

    function __construct()
    {

        if (!property_exists($this, 'table')) {
            $this->table = strtoLower($this::class) . "s";
        }
    }

    public function where($column, $value)
    {
        $column = addslashes($column);
        $query = "select * from $this->table where $column LIKE '$value'"; //Search object based on given column and value.
        return $this->query($query, ['value' => $value]);

    }

    public function insert($data)
    {
        $keys = array_keys($data);
        $columns = implode(',', $keys);
        $values = implode("',':", $keys);
        var_dump($columns,$values);
        $query = "insert into $this->table ($columns) values (':$values')"; //
        return $this->query($query, $data);

    }

    public function update($id, $data)
    {
        $column = addslashes($column);
        $query = "select * from $this->table where $column LIKE '$value'"; //
        return $this->query($query, ['value' => $value]);

    }

    public function delete($id)
    {
        $column = addslashes($column);
        $query = "select * from $this->table where $column LIKE '$value'"; //
        return $this->query($query, ['value' => $value]);

    }

    public function findAll()
    {
        $query = "select * from $this->table ";
        return $this->query($query);

    }
}