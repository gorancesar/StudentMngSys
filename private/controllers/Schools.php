<?php
/**
 * Schools controller.
 */
class Schools extends Controller
{
    public function index()
    {
        if (!Auth::logged_in()) {
            $this->redirect('Login');
        }

        $school = new School();

        $data = $school->findAll();

        $this->view('schools', ['rows' => $data]);
    }

    public function add()
    {
        if (!Auth::logged_in()) {
            $this->redirect('Login');
        }
        $errors = array();
        if (count($_POST) > 0) {
            $school = new School();
            if ($school->validate($_POST)) {

                $_POST['date'] = date("Y-m-d H:i:s");

                $school->insert($_POST);
                $this->redirect('Schools');
            } else {
                $errors = $school->errors;
            }
        }
        $this->view('schools.add', ['errors' => $errors]);


    }
}