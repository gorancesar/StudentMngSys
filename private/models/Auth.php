<?php

class Auth
{
    public static function authenticate($row)
    {
        $_SESSION['USER'] = $row;
    }
    public static function logout()
    {
        if (isset($_SESSION['USER'])) {
            unset($_SESSION['USER']);
        }
    }
    public static function logged_in()
    {
        if (isset($_SESSION['USER'])) {
            return true;
        }
        return false;
    }
    public static function user()
    {
        if (isset($_SESSION['USER'])) {
            return $_SESSION['USER']->firstname;
        }
        return false;
    }

    public static function __callStatic($method, $params)
    {
        $prop = strtoLower(str_replace("get", "", $method));

        if (isset($_SESSION['USER']->$prop)) //handle undifined methods
        {
            return $_SESSION['USER']->$prop;
        }
        return 'Unknown';
    }

    public static function switch_school($id)
    {
        if (isset($_SESSION['USER']) && $_SESSION['USER']->authorization_level == 'super_admin') {
            $user = new User();
            $school = new School();

            if ($row = $school->where('id', $id)) {
                $row = $row[0];
                $arr['school_id'] = $row->school_id;
                $user->update($_SESSION['USER']->id, $arr);
                $_SESSION['USER']->school_id = $row->school_id;
                $_SESSION['USER']->schoolname = $row->school_name;

            }

            return true;
        }
        return false;
    }
}

?>