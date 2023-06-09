<?php $this->view('includes/header') ?>
<?php $this->view('includes/nav') ?>

<div class="container-fluid p-4 shadow mx-auto" style="max-width:1000px">
<?php $this->view('includes/crumbs',['crumbs'=>$crumbs]) ?>
    <a href="<?= ROOT ?>/Signup">
        <button class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add New</button>
    </a>
    <div class="card-group justify-content-center">
        <?php if ($rows): ?>
            <?php foreach ($rows as $row): ?>
                <?php
                $image = get_image($row->image,$row->gender);
                
                ?>
                <div class="card m-2 shadow-sm" style="max-width: 14rem; min-width: 14rem">
                    <img src="<?=$image?>" class="d-block mx-auto card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">
                            <?= $row->firstname ?>
                            <?= $row->lastname ?>
                        </h5>
                        <p class="card-text">
                            <?= str_replace("_", " ", $row->authorization_level) ?>
                        </p>
                        <a href="<?=ROOT?>/Profile/<?=$row->user_id?>" class="btn btn-primary">Profile</a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <h4>No staf members were found</h4>
        <?php endif; ?>
    </div>

    <?php $this->view('includes/footer') ?>