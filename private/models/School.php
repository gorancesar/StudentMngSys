<?php
class School extends Model
{
     protected $allowedColumns = ['school_name', 'date'];

     protected $beforeInsert = ['make_school_id', 'make_user_id'];
     public function validate($DATA)
     {
          $this->errors = array();

          //check for first name.
          if (empty($DATA['school_name']) || !preg_match('/^[a-zA-Z]+$/', $DATA['school_name'])) {
               $this->errors['school_name'] = "Only letters allowed in school name";
          }

          if (count($this->errors) == 0) {
               return true;
          }
          return false;
     }

     public function make_user_id($data)
     {
          if (isset($_SESSION['USER']->user_id)) {
               $data['user_id'] = $_SESSION['USER']->user_id;

          }
          return $data;
     }
     public function make_school_id($data)
     {

          $data['school_id'] = random_string(60);
          return $data;

     }

}