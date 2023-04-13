<?php

/*
    Main conntroller class

    */

class Controller 
{
    public function view($view,$data = array())
    {
        extract($data);
        

        if(file_exists("../private/views/".$view.".view.php"))
        {
            /*return file_get_contents*/require("../private/views/".$view.".view.php");
        }else
        {
            /*return file_get_contents*/require("../private/views/404.view.php");
        }
    }
}