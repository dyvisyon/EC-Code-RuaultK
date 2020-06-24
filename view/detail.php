<?php ob_start(); ?>


<!-- <div class="row">
                <div class="media_infos col-lg-12 col-md-12 col-sm-12 text-center">
                    <iframe style='width:640px; height:368px' allowfullscreen="" frameborder="0"
                            src="<?= $data['trailer_url']; ?>" ></iframe>
                    <h1 class="media_title"><?php echo $data['title'] ?></h1>
                    <p class="media_type"><?php echo $data['type'] ?> / <?php echo $data['name'] ?></p>
                    <p class="media_status"> <?php echo $data['status'] ?> le <?php echo $data['release_date'] ?></p>
                    <p class="media_summary col-md-10 offset-1 text-justify"> <?php echo $data['summary'] ?></p>
                    
                </div>

            </div> -->




<div class="row">
    <div class="col-md-12 text-center">
        <h1><?= $media["title"]; ?></h1>
        <iframe style='width:560px; height:268px' allowfullscreen="" frameborder="0" src="<?= $media["trailer_url"]; ?>"></iframe>
        <p><?= $media["name"]?> / <?= $media["type"]?> / <?= $media["release_date"]?></p>
        <h2>Synopsis :</h2>
        <p class="col-md-10 offset-1 text-justify"><?= $media["summary"]?></p>
    </div>
    
</div>
 


<!-- <section >
    <div>
        <h2>Les détails du film</h2>
        <div><span>Genre : <span></div>
        <div><span>Type : <span></div>
        <div><span>Sortie : <span></div>
    </div>
    <div>
        <h2>Synopsis :</h2>
        <?= $media["summary"]?>
    </div>
  </section> -->



<?php
$content = ob_get_clean();

?>


<?php require('dashboard.php'); ?>