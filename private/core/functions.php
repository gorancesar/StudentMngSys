<?php
function get_var($key,$default="")
{
    if(isset($_POST[$key]))
    {
        return $_POST[$key];
    }
    return $default;
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

function get_date($date)
{
    return date("jS F, Y",strtotime($date));
}

function get_image($image,$gender = 'male')
{
    if(!file_exists($image))
                {
                    $image=ASSETS.'/user_female.jpg';
                    if($gender == 'male'){
                        $image=ASSETS.'/user_male.jpg';
                    }
                }
                return $image;
}
?>