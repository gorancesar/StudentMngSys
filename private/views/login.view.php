<?php $this->view('includes/header') ?>

<div class="container-fluid">
    <form method="post">
        <div class="p-4 mx-auto shadow rounded row d-flex justify-content-center"
            style="margin-top:50px; width:100%; max-width:340px;">
            <h2 class="text-center">My School</h2>
            <img src="<?= ROOT ?>/assets/logo.png" class="d-block mx-auto rounded-circle" style="width:100px;">
            <h3>Login</h3>
            <?php if(count($errors) > 0):?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Errors:</strong> 
                <?php foreach($errors as $error):?>
                <br><?=$error?>
                <?php endforeach;?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php endif;?>
            <input class="from-control" value="<?= get_var('email') ?>" type="email" name="email" placeholder="Email" autofocus>
            <input class="from-control" value="<?= get_var('password') ?>" type="password" name="password" placeholder="Password" style="margin-top:5%;"
                autofocus>
            <button class="btn btn-primary" style="margin-top:5%">Login</button>
        </div>
    </form>
</div>
<?php $this->view('includes/footer') ?>