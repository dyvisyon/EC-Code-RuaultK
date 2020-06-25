<?php ob_start(); ?>



<div class="row">
    <div class="col-2" style="padding-bottom: 200px">
    	
    	<?php foreach( $media as $medias ): ?>
    		<?php $url = $medias['episode_url'] ?>
    		<a style="margin-bottom: 5px" class="btn btn-danger btn-sm" href=javascript:void(0);  onclick="selectedSeries('<?php echo($url) ?>')">
    			<p>Saison <?= $medias['season_num'] ?> / Episode <?= $medias["episode_num"] ?></p>
        	</a>

    	<?php endforeach; ?>
    </div>

    <div class="col-10">
    	<iframe src="" id="frame" width="100%" height="50%"  allowfullscreen="" frameborder="0"></iframe>
    </div>

</div>

<script>

	function selectedSeries( newsrc ) {
		var locsrc = newsrc
		document.getElementById('frame').setAttribute('src',locsrc);
	}
</script>
<?php $content = ob_get_clean(); ?>

<?php require('dashboard.php'); ?>