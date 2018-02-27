<?php snippet('header') ?>

<main>
	<h1 class="title title-project"><?php echo page()->title()->html() ?></h1>
	<ul class="project-team">
		<?php foreach ( page()->people()->toStructure() as $people ): ?>
			<li>
				<article>
					<div>
						<h2 id="<?php echo strtolower($people->name()->html()) ?>_<?php echo str_replace(' ', '_', strtolower($people->surname())) ?>"><?php echo $people->name()->html() ?> <?php echo $people->surname() ?></h2>
						<p class="affiliation"><?php echo $people->affiliation()->html() ?></p>
					</div>
					<div class="biography"><?php echo $people->biography()->kt()->html() ?></div>
				</article>
			</li>
		<?php endforeach ?>
	</ul>
</main>

<?php snippet('footer') ?>