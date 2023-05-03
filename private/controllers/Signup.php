<?php
/**
 * Signup (Add user) controller
 */
class Signup extends Controller 
{
    function index()
    {
        $errors = array();
        if(count($_POST)>0)
        {
            $user=new User();
            if($user->validate($_POST))
            {
                $arr['firstname']= $_POST['firstname'];
                $arr['lastname']= $_POST['lastname'];
                $arr['gender']= $_POST['gender'];
                $arr['authorization_level']= $_POST['rank'];
                $arr['password']= password_hash($_POST['password'],PASSWORD_DEFAULT);
                $arr['creation_date']= date("Y-m-d H:i:s");
                $user->insert($arr);
                $this->redirect('Login');
            }else
            {
                $errors = $user->errors;
            }
        }
        $this->view('signup',['errors'=>$errors]);
    }
}
