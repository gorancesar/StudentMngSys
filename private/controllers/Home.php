<?php
/**
 * Home controller.
 */
class Home extends Controller 
{
    function index()
    {   
        if(!Auth::logged_in())
        {
            $this->redirect('Login');
        }

        $user = new User();
        
        $data = $user->findAll();

         $this->view('home',['rows'=>$data]);
    }
}
