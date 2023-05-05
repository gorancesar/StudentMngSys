<?php

/*
Main model 
*/

class Model extends Database
{
    public $errors = array();
    public function __construct()
    {

        if (!property_exists($this, 'table')) {
            $this->table = strtoLower($this::class) . "s";
        }
    }
    // Only first item in row 
    public function first($column, $value)
    {
        $column = addslashes($column);
        $query = "select * from $this->table where $column LIKE '$value'"; //Search object based on given column and value.
        $data = $this->query($query, ['value' => $value]);

        if (is_array($data)) {
            if (property_exists($this, 'afterSelect')) {
                foreach ($this->afterSelect as $func) {
                    $data = $this->$func($data);
                }
            }
        }
        if (is_array($data)) {
            $data = $data[0];
        }
        return $data;

    }

    public function where($column, $value)
    {
        $column = addslashes($column);
        $query = "select * from $this->table where $column LIKE '$value'";
        $data = $this->query($query, ['value' => $value]);

        if (is_array($data)) {
            if (property_exists($this, 'afterSelect')) {
                foreach ($this->afterSelect as $func) {
                    $data = $this->$func($data);
                }
            }
        }
        return $data;

    }

    public function insert($data)
    {
        // remove unwanted colums
        if (property_exists($this, 'allowedColumns')) {
            foreach ($data as $key => $column) {

                if (!in_array($key, $this->allowedColumns)) {
                    unset($data[$key]);
                }
            }
        }
        //run functions before insert
        if (property_exists($this, 'beforeInsert')) {
            foreach ($this->beforeInsert as $func) {
                $data = $this->$func($data);
            }
        }
        $valuesfromdata = array_values($data);
        $keys = array_keys($data);
        $columns = implode(',', $keys);
        $valuesfromdata = implode("','", $valuesfromdata);
        var_dump($valuesfromdata);
        $query = "insert into $this->table ($columns) values ('$valuesfromdata')"; //

        return $this->query($query, $data);

    }

    public function update($id, $data)
    {
        $str = "";

        foreach ($data as $key => $value) {
            $str .= $key . "=" . "'$value'" . ",";
        }
        $str = trim($str, ",");
        $data['id'] = $id;

        $query = "update $this->table set $str where id='$id'"; //
        //echo $query;
        echo $str;
        return $this->query($query, $data);

    }

    public function delete($id)
    {

        $query = "delete from $this->table where id ='$id'"; //
        $data['id'] = $id;
        return $this->query($query, $data);

    }

    public function findAll()
    {
        $query = "select * from $this->table ";
        $data = $this->query($query);

        //run func ater select
        if (is_array($data)) {
            if (property_exists($this, 'afterSelect')) {
                foreach ($this->afterSelect as $func) {
                    $data = $this->$func($data);
                }
            }
        }
        return $data;
    }


}