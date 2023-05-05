<?php
/**
 * Signup (Add user) controller
 */
class Signup extends Controller
{
    function index()
    {
        $errors = array();
        if (count($_POST) > 0) {
            $user = new User();
            if ($user->validate($_POST)) {
            
                $_POST['creation_date'] = date("Y-m-d H:i:s");

                $user->insert($_POST);
                $this->redirect('Users');
            } else {
                $errors = $user->errors;
            }
        }
        $this->view('signup', ['errors' => $errors]);
    }
}