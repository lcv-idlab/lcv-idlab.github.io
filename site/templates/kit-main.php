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

		<!-- temp for reference ...

		<nav id="categories-nav">
			<ul>
				<?php foreach (page()->children() as $cat): ?>
					<a href="#<?php echo str_replace(' ', '-', strtolower($cat->title())) ?>" class="<?php echo str_replace(' ', '-', strtolower($cat->title())) ?>"><li><span><?php echo ucfirst($cat->title()) ?></span></li></a>
				<?php endforeach ?>
			</ul>
		</nav>

		-->

		<!-- CATEGORIES WITH SINGLE KITS -->

		<div id="categories-container">

		<?php foreach ($page->children() as $cat): ?>

			<section id="<?php echo $cat->title('it') ?>" class="category-single">

				<!-- CATEGORY TITLE -->
				<header>
					<div class="cat-title-h-line"></div>
					<h2><?php echo ucfirst($cat->title()) ?></h2>
					<!--
					<div class="cat-button-open">
						<span class="cat-button-open-span"></span>
						<span class="cat-button-open-span"></span>
					</div>
					-->
				</header>

				<!-- SINGLE KITS -->
				<div class="category-container">
				<?php foreach ($cat->children()->visible() as $kit): ?>
				<a href="<?php echo $kit->url() ?>" class="single-kit">		
					<article>
						<aside>
							<?php if($kit->icon()->isNotEmpty()): ?>
							<img src="<?php echo $kit->image($kit->icon())->url() ?>">
							<?php else: ?>
								<img src="<?php echo ($kirby->urls()->assets()) ?>/icons/empty-kit-icon.png">
							<?php endif ?>
						</aside>
						<header>
							<h3><?php echo ucfirst($kit->title()) ?></h3>
							<p><?php echo shortstring($kit->description()->html(), 200) ?></p>
						</header>

					</article>
				</a>
				<?php endforeach ?>
				</div>
				
			</section>

		<?php endforeach ?>
		</div>

	</main>
</div>

<?php snippet('footer') ?>