<style>
  nav ul li a{
    width: 110px;
    text-align:center;
    
  }
  nav ul li a:hover{
    background-color: gray;
    color: white !important;
  }
</style>
<nav class="navbar navbar-expand-lg bg-body-tertiary w-100 p-2">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="<?= ROOT ?>/assets/logo.png" class="" style="width:70px;">
      My School
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
      aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav w-100">
        <li class="nav-item ">
          <a class="nav-link active" aria-current="page" href="<?=ROOT?>">DASHBOARD</a>
        </li>
        <li class="nav-item border-end border-start">
          <a class="nav-link" href="<?=ROOT?>/Users">USERS</a>
        </li>
        <li class="nav-item border-end">
          <a class="nav-link" href="<?=ROOT?>/Classes">CLASSES</a>
        </li>
        <li class="nav-item border-end">
          <a class="nav-link" href="<?=ROOT?>/Tests">TESTS</a>
        </li>
        <div class="navbar-collapse justify-content-end">
        <li class="nav-item dropdown ">
          <a class="nav-link dropdown-toggle border-start" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            USER
          </a>
          <ul class="dropdown-menu dropdown-menu-end ">
            <li><a class="dropdown-item" href="<?=ROOT?>/Profile">Profile</a></li>
            <li><a class="dropdown-item" href="<?=ROOT?>">Dashboard</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="<?=ROOT?>/Logout">Logout</a></li>
          </ul>
        </li>
        </div>
      </ul>
    </div>
  </div>
</nav>