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
        $school_id=Auth::getSchool_id();
        $data = $user->query("select * from users where school_id LIKE '$school_id'",['school_id'=>$school_id]);

        $crumbs[] = ['Dashboard',''];
        $crumbs[] = ['Staff','users'];

         $this->view('users',['rows'=>$data,'crumbs'=>$crumbs]);
    }
}