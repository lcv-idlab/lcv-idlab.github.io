<?php snippet('header') ?>

<div id="kit">
	<main id="kit-single" class="<?php echo page()->parent()->title('it') ?>">
		<div id="title-bar">
			
			<a href="/<?php echo $site->language() ?>/kit" class="back-button"><?php echo "< ".l::get('back')?></a>

			<header>
				<div id="kit-title">
					<h1 ><?php echo page()->title()->html()->html() ?></h1>
					<h2><?php echo page()->parent()->title()->html() ?></h2>
				</div>


				<div id="kit-icon">
					<?php if (page()->icon()->isNotEmpty() ): ?>
						<img src="<?php echo page()->image(page()->icon())->url() ?>">
					<?php else: ?>
						<img src="<?php echo ($kirby->urls()->assets()) ?>/icons/empty-kit-icon.png">
					<?php endif ?>
				</div>

				<div id="main-description">
					<div><?php echo $page->description()->kt()?></div>
				</div>

			</header>
		</div>

		<!-- MAIN ARTICLE -->

		<article>

			<!-- INDEX -->
			<aside>
				<div>
					<h2>
						<?php echo l::get('index') ?>
					</h2>
					<ul>
					<?php foreach (page()->article()->toStructure() as $article): ?>
						<li><a href="#<?php echo str_replace(' ', '-', strtolower($article->section_title())) ?>"><?php echo $article->section_title() ?></a></li>
					<?php endforeach ?>
					</ul>
				</div>
			</aside>
			<!-- end: INDEX -->

			<header class="visuallyhidden">
				<h1><?php echo page()->title() ?></h1>	
			</header>

			<!-- CONTENT -->
			<div id="single-article-container">
			<?php foreach (page()->article()->toStructure() as $article): ?>
				<div class="section-h-line"></div>
				<div class="section-container">
					<h2  id="<?php echo str_replace(' ', '-', strtolower($article->section_title())) ?>"><?php echo $article->section_title() ?></h2>
					<?php echo $article->content()->kt() ?>
				</div>
			<?php endforeach ?>
			<!-- end: CONTENT -->

			<!-- PDF of the article -->
			<?php if(page()->pdf_article()->isNotEmpty()): ?>
				<div id="container-button-article-pdf">
					<a href="<?php echo page()->document(page()->pdf_article())->url() ?>" target="_blank"><div class="button"><?php echo l::get('pdf-article') ?></div></a>
				</div>
			<?php endif ?>
			</div>


		</article>

		<!-- end: MAIN ARTICLE -->


		<!-- MORE READING NEXT KITS -->
		<?php 		
			$offset = 1 + $page->siblings(false)->visible()->indexOf($page);
			$coll = $page->siblings(false)->visible()->offset($offset)->limit(3);
			if ($coll->count() < 3) {
				$coll2 = $page->siblings(false)->visible()->limit(3 - $coll->count());
				$coll = $coll->merge($coll2);
			}
		?>
		<?php if ($coll->count()): ?>
				
			<div id="more-articles">
					<h2><?php echo l::get('more') ?></h2>
					
					<ul class="single-kit">
						<?php foreach( $coll as $kit): ?>
						<li>
							<a href="<?php echo $kit->url() ?>">	
								<?php if($kit->icon()->isNotEmpty()): ?>
								<div class="kit-icon">
									<img src="<?php echo $kit->image($kit->icon())->url() ?>">
									<?php else: ?>
										<img src="<?php echo ($kirby->urls()->assets()) ?>/icons/empty-kit-icon.png">
									<?php endif ?>
								</div>
								
								<h3><?php echo ucfirst($kit->title()) ?></h3>
								<p class="kit-description"><?php echo shortstring($kit->description()->html(), 200) ?></p>
							</a>
						</li>

						<?php endforeach ?>

						<?php if (count($coll) < 3): ?>
						
						<?php endif ?>
					</ul>
			</div>

		<?php endif ?>
		<!-- end: MORE -->

	</main>
</div>

<?php snippet('footer') ?>