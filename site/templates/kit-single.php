<?php snippet('header') ?>

<div id="kit">
	<main id="kit-single" class="<?php echo page()->parent()->title() ?>">
		<div id="title-bar">
			<header>
				<div id="back-icon">
					<a href="/kit">
						
						<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
						width="154.024px" height="100px" viewBox="-161.111 0 154.024 100" enable-background="new -161.111 0 154.024 100"
						xml:space="preserve">
							<line fill="none" stroke="#555555" stroke-width="13.3791" stroke-linecap="round" stroke-linejoin="round" x1="-18.367" y1="50.002" x2="-138.267" y2="50.002"/>
							<polyline fill="none" stroke="#555555" stroke-width="13.3791" stroke-linecap="round" stroke-linejoin="round" points="-98.09,91.874 -149.83,50.002 -98.096,8.126 "/>
						</svg>

					</a>
				</div>

				<div id="center-titles">
					<h2><?php echo page()->parent()->title() ?></h2>
					<h1 ><?php echo page()->title()->html() ?></h1>
					
				</div>

				<div id="kit-icon">
					<?php if (page()->icon()->isNotEmpty() ): ?>
						<img src="<?php echo page()->image(page()->icon())->url() ?>">
					<?php else: ?>
						<img src="<?php echo ($kirby->urls()->assets()) ?>/icons/empty-kit-icon.png">
					<?php endif ?>
				</div>

				<!--
				<div>
					<div>
					<?php if (page()->icon()->isNotEmpty() ): ?>
						<img src="<?php echo page()->image(page()->icon())->url() ?>">
					<?php else: ?>
						<img src="<?php echo ($kirby->urls()->assets()) ?>/icons/empty-kit-icon.png">
					<?php endif ?>
					</div>
					<?php echo page()->description()->kt() ?>
				</div>
				-->
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
				<h2  id="<?php echo str_replace(' ', '-', strtolower($article->section_title())) ?>"><?php echo $article->section_title() ?></h2>
				<?php echo $article->content()->kt()->html() ?>
			<?php endforeach ?>
			<!-- end: CONTENT -->
			</div>

		</article>

		<!-- end: MAIN ARTICLE -->

		<!-- MORE -->
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
				<div>
					<h2><?php echo l::get('more') ?></h2>
					
					<ul>
						<?php foreach( $coll as $kit): ?>
							<a href="<?php echo $kit->url() ?>">
								<li>
									<div class="box-text">
										<h3><?php echo $kit->title() ?></h3>
										<?php echo $kit->description()->kt() ?>
									</div>

									<div class="box-image">
									<?php if ($kit->icon()->isNotEmpty() ): ?>
										<img src="<?php echo $kit->image($kit->icon())->url() ?>">
									<?php else: ?>
										<img src="<?php echo ($kirby->urls()->assets()) ?>/icons/empty-kit-icon.png">
									<?php endif ?>
									</div>
								</li>
							</a>
						<?php endforeach ?>

						<?php if (count($coll) < 3): ?>
						
						<?php endif ?>
					</ul>
				</div>

			</div>

		<?php endif ?>
		<!-- end: MORE -->

	</main>
</div>

<?php snippet('footer') ?>