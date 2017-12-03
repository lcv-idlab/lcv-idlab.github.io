<?php snippet('header') ?>

<main>
	<h1 class="title title-project"><?php echo page()->title()->html() ?></h1>

	<ul class="project-partner">
		<?php foreach ( page()->partners()->toStructure() as $partner ): ?>
			<li>
				<article id="<?php echo str_replace(' ', '_', strtolower($partner->name()->html())) ?>">
				<?php if($logo = $page->image($partner->logo())): ?>
					<a href="<?php echo $partner->url()->toURL() ?>" target="_blank"><img src="<?php echo $logo->url() ?>" alt="<?php echo $partner->name()->html() ?>"></a>
				<?php endif ?>
					<div>
						<h2 class="headline"><?php echo $partner->name()->html() ?></h2><span><?php echo $partner->place()->html() ?></span>
						<div class="content"><?php echo $partner->description()->kt()->html() ?></div>
					</div>
				</article>
			</li>
		<?php endforeach ?>
	</ul>
</main>

<?php snippet('footer') ?>