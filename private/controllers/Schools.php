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

        $crumbs[] = ['Dashboard',''];
        $crumbs[] = ['School','schools'];

        $this->view('schools', ['crumbs' => $crumbs,'rows' => $data]);
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
        $crumbs[] = ['Dashboard',''];
        $crumbs[] = ['School','schools'];
        $crumbs[] = ['Add','schools/add'];

        $this->view('schools.add', ['errors' => $errors, 'crumbs' => $crumbs]);


    }

    public function edit($id = null)
    {
        if (!Auth::logged_in()) {
            $this->redirect('Login');
        }

        $school = new School();
        $errors = array();
        if (count($_POST) > 0) {

            if ($school->validate($_POST)) {

                $school->update($id, $_POST);

                $this->redirect('Schools');
            } else {
                $errors = $school->errors;
            }
        }
        $row = $school->where('id', $id);

        $crumbs[] = ['Dashboard',''];
        $crumbs[] = ['School','schools'];
        $crumbs[] = ['Edit','schools/edit'];

        $this->view('schools.edit', ['row' => $row, 'errors' => $errors,'crumbs' => $crumbs]);


    }

    public function delete($id = null)
    {
        if (!Auth::logged_in()) {
            $this->redirect('Login');
        }
        $school = new School();

        $errors = array();
        if (count($_POST) > 0) {

            $school->delete($id);
            $this->redirect('Schools');
        }
        $row = $school->where('id',$id);
        
        $crumbs[] = ['Dashboard',''];
        $crumbs[] = ['School','schools'];
        $crumbs[] = ['Delete','schools/delete'];
        
        $this->view('schools.delete', ['row' => $row,'crumbs' => $crumbs]);


    }
}