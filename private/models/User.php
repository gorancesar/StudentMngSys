<?php
class User extends Model 
{
     public function validate($DATA)
     {
          $this->errors = array();

          //check for first name.
          if(empty($DATA['firstname']) || !preg_match('/^[a-zA-Z]+$/',$DATA['firstname']))
          {
               $this->errors['firstname']= "Only letters allowed in first name";
          }
          //check for last name.
          if(empty($DATA['lastname']) || !preg_match('/^[a-zA-Z]+$/',$DATA['lastname']))
          {
               $this->errors['lastname']= "Only letters allowed in last name";
          }
          //check for email name.
          if(empty($DATA['email']) || !filter_var($DATA['email'],FILTER_VALIDATE_EMAIL))
          {
               $this->errors['email']= "Email is not valid";
          }
          //check for password name.
          if(empty($DATA['password']) || $DATA['password']!=$DATA['password2'])
          {
               $this->errors['password']= "The passwords do not match";
          }
          if(strlen($DATA['password'])<8)
          {
               $this->errors['password']= "Password must be at least 8 characters long";
          }

          $genders=['female','male'];
          if(empty($DATA['gender']) || !in_array($DATA['gender'],$genders))
          {
               $this->errors['gender']= "Gender not selected";
          }
          $ranks=['student','reception','lecturer','admin','super_admin'];
          if(empty($DATA['rank']) || !in_array($DATA['rank'],$ranks))
          {
               $this->errors['rank']= "Rank not selected";
          }

          if(count($this->errors)==0)
          {
               return true;
          }
          return false;
     }
}
