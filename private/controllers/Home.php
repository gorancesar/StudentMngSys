<?php
/**
 * Home controller.
 */
class Home extends Controller 
{
    function index()
    {   
        $user = new User();

        
        $user->delete(9);
        $data = $user->findAll();

         $this->view('home',['rows'=>$data]);
    }
}
