<?php $this->view('includes/header') ?>
<?php $this->view('includes/nav') ?>

<div class="container-fluid p-4 shadow mx-auto" style="max-width:1000px">
    <?php $this->view('includes/crumbs') ?>
    <div class="card-group justify-content-center">
        <?php if ($rows): ?>
            <?php foreach ($rows as $row): ?>
                <div class="card m-2 shadow-sm" style="max-width: 14rem; min-width: 14rem">
                    <img src="<?= ASSETS ?>/user_female.jpg" class="d-block mx-auto card-img-top">
                    <div class="card-body">
                        <h5 class="card-title"><?= $row->firstname ?>         <?= $row->lastname ?></h5>
                        <p class="card-text">
                            <?= str_replace("_", " ", $row->authorization_level) ?>
                        </p>
                        <a href="#" class="btn btn-primary">Profile</a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

    <?php $this->view('includes/footer') ?>