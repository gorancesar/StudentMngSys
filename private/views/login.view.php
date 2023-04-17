<?php $this->view('includes/header')?>
    
    <div class="container-fluid">
        <div class="p-4 mx-auto shadow rounded row d-flex justify-content-center" style="margin-top:50px; width:100%; max-width:340px;">
        <h2 class="text-center">My School</h2>
        <img src="<?=ROOT?>/assets/logo.png" class="d-block mx-auto rounded-circle" style="width:100px;">
        <h3>Login</h3>
        <input class="from-control" type="email" name="email" placeholder="Email"  autofocus >
        <input class="from-control" type="password" name="password" placeholder="Password" style="margin-top:5%;" autofocus>
        <button class="btn btn-primary" style="margin-top:5%">Login</button>
        </div>
    </div>
<?php $this->view('includes/footer')?>