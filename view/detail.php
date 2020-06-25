<?php ob_start(); ?>

<div class="row">
    <div class="col-md-12 text-center">
        <h1><?= $media["title"]; ?></h1>
        <iframe style='width:560px; height:268px' allowfullscreen="" frameborder="0" src="<?= $media["trailer_url"]; ?>"></iframe>
        <p><?= $media["name"]?> / <?= $media["type"]?> / <?= $media["release_date"]?></p>
        <h2>Synopsis :</h2>
        <p class="col-md-10 offset-1 text-justify"><?= $media["summary"]?></p>

        <?php if($media['type'] == 'Film'): ?>
        	<a href="index.php?watchMovie=<?= $media['title']; ?>">Regarder <?= $media['title'] ?></a>
        <?php else: ?>
        	<a href="index.php?Series=<?= $media['title']; ?>">Regarder <?= $media['title'] ?></a>
		<?php endif; ?>

    </div>
    
</div>

<?php
$content = ob_get_clean();

?>


<?php require('dashboard.php'); ?>