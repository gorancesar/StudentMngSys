<?php $this->view('includes/header') ?>
<div class="container-fluid">
    <form method="post">
        <div class="p-4 mx-auto shadow rounded row " style="margin-top:50px; width:100%; max-width:340px;">
            <h2 class="text-center">My School</h2>
            <img src="<?= ROOT ?>/assets/logo.png" class="d-block mx-auto rounded-circle" style="width:100px;">
            <h3>Add User</h3>
            <?php if (count($errors) > 0): ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Errors:</strong>
                    <?php foreach ($errors as $error): ?>
                        <br>
                        <?= $error ?>
                    <?php endforeach; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
            <input class="from-control" type="firstname" name="firstname" placeholder="First Name" autofocus
                value="<?= get_var('firstname') ?>">
            <input class="from-control" type="lastname" name="lastname" placeholder="Last Name" style="margin-top:5%;"
                value="<?= get_var('lastname') ?>" autofocus>
            <input class="from-control" type="email" name="email" placeholder="Email" style="margin-top:5%;"
                value="<?= get_var('email') ?>" autofocus>
            <select class="form-control" style="margin-top:5%;" name="gender">
                <option <?= get_select('gender', '') ?> value="">--Select a Gender--</option>
                <option <?= get_select('gender', 'male') ?> value="male">Male</option>
                <option <?= get_select('gender', 'female') ?> value="female">Female</option>
            </select>
            <select class="form-control" style="margin-top:5%;" name="authorization_level">
                <option <?= get_select('authorization_level', '') ?> value="">--Select a Rank--</option>
                <option <?= get_select('authorization_level', 'student') ?> value="student">Student</option>
                <option <?= get_select('authorization_level', 'reception') ?> value="reception">Reception</option>
                <option <?= get_select('authorization_level', 'lecturer') ?> value="lecturer">Lecturer</option>
                <option <?= get_select('authorization_level', 'admin') ?> value="admin">Admin</option>
                <?php if (Auth::getAuthorization_level() == 'super_admin'): ?>
                    <option <?= get_select('authorization_level', 'super_admin') ?> value="super_admin">Super Admin</option>
                <?php endif; ?>
            </select>

            <input class="from-control" <?= get_var('password') ?> type="text" name="password" placeholder="Password"
                style="margin-top:5%;" autofocus>
            <input class="from-control" <?= get_var('password2') ?> type="text" name="password2"
                placeholder="Retype Password" style="margin-top:5%;" autofocus>
            <div class="d-flex justify-content-between">
                <a href="<?= ROOT ?>/Users">
                    <button type="button" class="btn btn-danger" style="margin-top:40%">Cancel</button>
                </a>
                <button class="btn btn-primary " style="margin-top:10%">Add User</button>
            </div>
        </div>
    </form>
</div>
<?php $this->view('includes/footer') ?>