<?php snippet('header') ?>

<div id="kit">
	<main id="kit-path-main">
		<div id="kit-title">
			<h1 class="title"><?php echo page()->title()->html() ?></h1>
			<!-- <div></div> -->
		</div>
		<header id="main-header">
			<div><?php echo page()->description()->kt() ?></div>
		</header>

		<section id="paths-container">
			
			<ul>
			<?php foreach ($page->children() as $path): ?>

				<li id="<?php echo $path->title('it') ?>" class="path-single">
					<a href="<?php echo $path->url() ?>">
						<h2><?php echo ucfirst($path->title()) ?></h2>
						<div class="description"><?php echo shortstring($path->description()->html(), 300) ?></div>

						<div class="path-related-images">
						<?php foreach($path->images() as $img): ?>
							<img src="<?php echo $img->url() ?>">
						<?php endforeach ?>
						</div>
					</a>
				</li>

			<?php endforeach ?>

			
			</ul>
		</section>

	</main>
</div>

<?php snippet('footer') ?>