<?php
class User extends Model
{
     protected $allowedColumns = ['firstname', 'lastname', 'email','password','gender','authorization_level','creation_date'];

     protected $beforeInsert = ['make_user_id', 'make_school_id', 'hash_password'];
     public function validate($DATA)
     {
          $this->errors = array();

          //check for first name.
          if (empty($DATA['firstname']) || !preg_match('/^[a-zA-Z]+$/', $DATA['firstname'])) {
               $this->errors['firstname'] = "Only letters allowed in first name";
          }
          //check for last name.
          if (empty($DATA['lastname']) || !preg_match('/^[a-zA-Z]+$/', $DATA['lastname'])) {
               $this->errors['lastname'] = "Only letters allowed in last name";
          }
          //check for email name.
          if (empty($DATA['email']) || !filter_var($DATA['email'], FILTER_VALIDATE_EMAIL)) {
               $this->errors['email'] = "Email is not valid";
          }
          //check if email exists.
          if ($this->where('email',$DATA['email'])) {
               $this->errors['email'] = "Email alredy exists.";
          }
          //check for password name.
          if (empty($DATA['password']) || $DATA['password'] != $DATA['password2']) {
               $this->errors['password'] = "The passwords do not match";
          }
          if (strlen($DATA['password']) < 8) {
               $this->errors['password'] = "Password must be at least 8 characters long";
          }

          $genders = ['female', 'male'];
          if (empty($DATA['gender']) || !in_array($DATA['gender'], $genders)) {
               $this->errors['gender'] = "Gender not selected";
          }
          $ranks = ['student', 'reception', 'lecturer', 'admin', 'super_admin'];
          if (empty($DATA['authorization_level']) || !in_array($DATA['authorization_level'], $ranks)) {
               $this->errors['authorization_level'] = "Authorization level not selected";
          }

          if (count($this->errors) == 0) {
               return true;
          }
          return false;
     }

     

     public function make_user_id($data)
     {
          $data['user_id']=random_string(60);
          return $data;
     }
     public function make_school_id($data)
     {
          if(isset($_SESSION['USER']->school_id))
          {
          $data['school_id']=$_SESSION['USER']->school_id;
          
          }
          return $data;
     }
     public function hash_password($data)
     {
          $data['password']=password_hash($data['password'],PASSWORD_DEFAULT);
          return $data;
     }

}

