<?php

class Database
{

    private function connect()
    {
        $string = DBDRIVER . ":host=".DBHOST.";dbname=".DBNAME;
        if (!$connection = new PDO($string,DBUSER, DBPASS)) {
            die("could not connect to database!");
        }
        return $connection;
    }

    public function query($query, $data = array(),$data_type="object")
    {
        $connection=$this->connect();
        $stm=$connection->prepare($query);               // Prepare statement using query.
        
        if($stm){
            $check=$stm->execute();
            
            if($check){
                if($data_type=="object"){                           //
                    $data = $stm->fetchAll(PDO::FETCH_OBJ);  
                         //
                }else{                                              //
                    $data = $stm->fetchAll(PDO::FETCH_ASSOC);       //Security check.
                }
                if(is_array($data)&& count($data)>0){
                    return $data;
                    
                }
            }
        }
        
        return false;
        
    }
    
}