<?php ob_start(); ?>



<div class="row">
    <div class="col-2">
    	
    	<?php foreach( $media as $medias ): ?>
    		<?php $url = $medias['episode_url'] ?>
    		<button class="btn_series" onclick="selectedSeries('<?php echo($url) ?>')">
    			<p>Saison <?= $medias['season_num'] ?> / Episode <?= $medias["episode_num"] ?></p>
        	</button>

    	<?php endforeach; ?>
    </div>

    <div class="col-10">
    	<iframe src="" id="frame" width="720" height="440" allowfullscreen="" frameborder="0"></iframe>
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