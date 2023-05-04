<?php
function get_var($key)
{
    if(isset($_POST[$key]))
    {
        return $_POST[$key];
    }
    return "";
}

function get_select($key,$value)
{
    if(isset($_POST[$key]))
    {
        if($_POST[$key]== $value)
        {
            return "selected";
        }
    }
    return ""; 
}

//escape special Html car..
function esc($var)
{
return htmlspecialchars($var);
}

function random_string($length)
     {
          $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
          $string = '';
      
          for ($i = 0; $i < $length; $i++) {
              $string .= $characters[mt_rand(0, strlen($characters) - 1)];
          }
      
          return $string;
     }
?>