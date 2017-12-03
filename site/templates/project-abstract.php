<?php snippet('header') ?>

<main>
	<h1 class="title title-project"><?php echo page()->parent()->title()->html() ?></h1>

	<div class="abstract-lang-nav">
		<h2 class="visuallyhidden">Scelta della lingua del testo descrittivo</h2>
		<ul aria-label="Scegli la lingua del testo che descrive il progetto tra quelle elencate">
		<?php foreach ( page('progetto/abstract')->children()->visible() as $lang ): ?>
			<li>
				<a href="<?php echo $lang->url() ?>" class="<?php e( $lang->isOpen(), 'active'); ?>"><span><?php echo $lang->title() ?></span></a>
			</li>
		<?php endforeach ?>
		</ul>
	</div>

	<div class="abstact-content">
	<?php foreach ( page()->paragraphs()->toStructure() as $content): ?>
		<section>
			<h3><?php echo $content->header()->html() ?></h3>
			<div><?php echo $content->content()->kt()->html() ?></div>
		</section>
	<?php endforeach ?>
	</div>
		
<?php snippet('enti-sostenitori') ?>

</main>

<?php snippet('footer') ?>