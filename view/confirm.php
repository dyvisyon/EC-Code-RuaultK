<?php ob_start(); ?>

<div class="row">
    <div class="col-md-12 text-center">
        <p><?= isset( $alert ) ? $alert : null; ?></p>
        <button style="margin-top: 30px" type="button" class="btn btn-info" onclick="window.location = 'index.php?action=login'">Se connecter</button>
    </div>
    
</div>

<?php $content = ob_get_clean(); ?>

<?php require('dashboard.php'); ?>