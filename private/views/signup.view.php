<?php $this->view('includes/header') ?>

<div class="container-fluid">
    <div class="p-4 mx-auto shadow rounded row d-flex justify-content-between"
        style="margin-top:50px; width:100%; max-width:340px;">
        <h2 class="text-center">My School</h2>
        <img src="<?= ROOT ?>/assets/logo.png" class="d-block mx-auto rounded-circle" style="width:100px;">
        <h3>Add User</h3>
        <input class="from-control" type="firstname" name="firstname" placeholder="First Name" autofocus>
        <input class="from-control" type="lastname" name="lastname" placeholder="Last Name" style="margin-top:5%;" autofocus>
        <input class="from-control" type="email" name="email" placeholder="Email" style="margin-top:5%;" autofocus>
        <select class="form-control" style="margin-top:5%;">
            <option>--Select a Gender--</option>
            <option>Male</option>
            <option>Female</option>
        </select>
        <select class="form-control" style="margin-top:5%;">
            <option value="">--Select a Rank--</option>
            <option value="student">Student</option>
            <option value="reception">Reception</option>
            <option value="lecturer">Lecturer</option>
            <option value="admin">Admin</option>
            <option value="super_admin">Super Admin</option>
        </select>

        <input class="from-control" type="text" name="password" placeholder="Password" style="margin-top:5%;" autofocus>
        <input class="from-control" type="text" name="password2" placeholder="Retype Password" style="margin-top:5%;"
            autofocus>
        <div class="d-flex justify-content-between">
        <button class="btn btn-danger" style="margin-top:12%">Cancel</button>
        <button class="btn btn-primary" style="margin-top:12%">Add User</button>
        
        </div>
    </div>
</div>
<?php $this->view('includes/footer') ?>