<?php ob_start(); ?>

<div class="row">
    <div class="embed-responsive embed-responsive-16by9">
        <iframe class="embed-responsive-item" allowfullscreen="" frameborder="0" src="<?= $media["movie_url"]; ?>"></iframe>


    </div>

</div>


<?php $content = ob_get_clean(); ?>

<?php require('dashboard.php'); ?>