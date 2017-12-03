<!-- ENTI SOSTENITORI --> 

<section class="enti">
    <h2 class="title-enti">Enti sostenitori</h2>
    <ul>
	<?php foreach( page('footer/enti-sostenitori')->sostenitori()->toStructure() as $ente): ?>
		<li>
		<?php $image = $ente->logo() ?>
				<img src="<?php echo page('footer/enti-sostenitori')->image($image)->url() ?>" alt="Logo <?php echo $ente->name()->html() ?>">
		</li>
	<?php endforeach ?>
	</ul>
</section>

<!-- end: ENTI SOSTENITORI --> 