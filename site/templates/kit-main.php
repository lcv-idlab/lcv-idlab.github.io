<?php snippet('header') ?>

<div id="kit">
	<main>
		
		<div id="kit-title">
			<h1 class="title"><?php echo page()->title()->html() ?></h1>
			<!-- <div></div> -->
		</div>

		<header id="main-header">
			<div class="decoration-wrapper">

					<div id="kit-description" class="description-open"><?php echo page()->description()->kt() ?></div>

					<div id="more-text"><span><?php echo l::get('more-text') ?></span><span class="hidden-item"><?php echo l::get('less-text') ?></span></div>
					
					<div class="linear-gradient"></div>

					

			</div>
		</header>

		<div id="categories-container">

		<?php foreach ($page->children() as $cat): ?>

			<?php if ($cat->intendedTemplate() == "kit-category"): ?>

			<section id="<?php $url = $cat->url(); $pos = strripos($url, '/'); echo substr($url, $pos+1); ?>" class="category-single">

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
					<ul class="single-kit">
					<?php foreach ($cat->children()->visible() as $kit): ?>
						<li>
							<a href="<?php echo $kit->url() ?>">	
								<?php if($kit->icon()->isNotEmpty()): ?>
								<div class="kit-icon">
									<img src="<?php echo $kit->image($kit->icon())->url() ?>" alt="<?php ucfirst($kit->title()) ?>">
									<?php else: ?>
										<img src="<?php echo ($kirby->urls()->assets()) ?>/icons/empty-kit-icon.png">
									<?php endif ?>
								</div>
								
								<h3><?php echo ucfirst($kit->title()) ?></h3>
								<p class="kit-description"><?php echo shortstring($kit->description()->html(), 200) ?></p>
							</a>
						</li>
					<?php endforeach ?>
					</ul>
				</div>
				
			</section>

			<?php endif ?>

		<?php endforeach ?>
		</div>


		<section id="documents-download">
			<div id="download-div-line"></div>
			<h2>Download</h2>

			<ul>
				<?php foreach(page()->download()->toStructure() as $item) : ?>
					<li>
						<a href="<?php echo page()->document($item->doc())->url() ?>" target="_blank">
							<img src="<?php echo page()->image($item->img())->url() ?>">
							<h3><?php echo $item->name() ?></h3>
						</a>
					</li>
				<?php endforeach ?>
			</ul>
		</section>

	</main>
</div>

<?php snippet('footer') ?>