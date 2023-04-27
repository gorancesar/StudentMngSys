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
        $valuesfromdata=array_values($data);
        $keys = array_keys($data);
        $columns = implode(',', $keys);
        $valuesfromdata=implode("','",$valuesfromdata);
        var_dump($valuesfromdata);
        $query = "insert into $this->table ($columns) values ('$valuesfromdata')"; //
        
        return $this->query($query, $data);

    }

    public function update($id, $data)
    {
        $str = "";

        foreach($data as $key => $value){
            $str .=$key. "="."'$value'".",";
        }
        $str = trim($str,",");
        $data['id'] = $id;

        $query = "update $this->table set $str where id='$id'"; //
        //echo $query;
        echo $str;
        return $this->query($query, $data);

    }

    public function delete($id)
    {
        
        $query = "delete from $this->table where id ='$id'"; //
        $data['id']=$id;
        return $this->query($query, $data);

    }

    public function findAll()
    {
        $query = "select * from $this->table ";
        return $this->query($query);

    }
}