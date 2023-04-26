<?php
/**
 * Home controller.
 */
class Home extends Controller 
{
    function index()
    {   
        $user = new User();

        

        //$data =$user->where('firstname','Ivana');
        $arr['firstname'] = 'Pero';
        $arr['lastname'] = 'Peric';
        $arr['creation_date'] = '2023-04-25 16:42:06';
        $arr['user_id'] = '23456';
        $arr['gender'] = 'Male';
        $arr['school_id'] = '33333aaa';
        $arr['authorization_level'] = 'student';
        $user->insert($arr);
        //$user->update(id,$data);
        //$user->delete(id);
        $data = $user->findAll();

         $this->view('home',['rows'=>$data]);
    }
}
