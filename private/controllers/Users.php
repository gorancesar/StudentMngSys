<?php
/**
 * Home controller.
 */
class Users extends Controller 
{
    function index()
    {   
        if(!Auth::logged_in())
        {
            $this->redirect('Login');
        }

        $user = new User();
        
        $data = $user->findAll();

         $this->view('users',['rows'=>$data]);
    }
}