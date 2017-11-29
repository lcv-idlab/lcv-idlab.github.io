<?php snippet('header') ?>

<div id="kit">
	<main>
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
					</a>
				</li>

			<?php endforeach ?>

			</ul>
		</section>

	</main>
</div>

<?php snippet('footer') ?>