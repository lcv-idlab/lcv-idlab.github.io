<?php snippet('header') ?>

<main>
	<h1 class="title title-project"><?php echo page()->title()->html() ?></h1>

	<ul class="project-partner">
		<?php foreach ( page()->promotori()->toStructure() as $item ): ?>
			<li>
				<article id="<?php echo str_replace(' ', '_', strtolower($item->name()->html())) ?>">
				<?php if($logo = $page->image($item->logo())): ?>
					<a href="<?php echo $item->url()->toURL() ?>" target="_blank"><img src="<?php echo $logo->url() ?>" alt="<?php echo $item->name()->html() ?>"></a>
				<?php endif ?>
					<div>
						<h2 class="headline"><?php echo $item->name()->html() ?></h2><span><?php echo $item->place()->html() ?></span>
						<div class="content"><?php echo $item->description()->kt()->html() ?></div>
					</div>
				</article>
			</li>
		<?php endforeach ?>
	</ul>
</main>

<?php snippet('footer') ?>