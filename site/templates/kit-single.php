<?php snippet('header') ?>

<div id="kit">
	<main id="kit-single" class="<?php echo page()->parent()->title('it') ?>">
		<div id="title-bar">
			
			<!-- The url of the parent page with the right hight positon -->
			<?php $url = $page->parent()->url(); $backUrl = '/'.$site->language().'/kit/#'.substr($url, (strripos($url, '/'))+1 ); ?>


			<?php snippet('back-link-with-arrow', array('backUrl' => $backUrl)) ?>


			<header>
				<div id="kit-title">
					<h1 ><?php echo page()->title()->html() ?></h1>
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
				<div id="technical-content">&nbsp;</div>
				<div id="index_menu">
					<h2>
						<?php echo l::get('index') ?>
					</h2>
					<ul>
					<?php $prev = ""; $ul_count = 0; foreach (page()->article()->toStructure() as $item): ?>
					<?php if($prev == "one" && $prev != $item->option_type() || $prev == "two" && $prev != $item->option_type()): ?><?php $ul_count++ ?><ul class="ul_<?php echo $item->option_type() ?>">
					<?php elseif($prev == "three" && $prev != $item->option_type()): ?><?php $ul_count--?></li></ul></li>
						<?php if($item->option_type() == "one" && $ul_count == 1): ?></ul>
						<?php elseif($item->option_type() == "one" && $ul_count == 2): ?></ul></li></ul>
						<?php endif ?>
					<?php elseif($prev == $item->option_type()):?></li>
					<?php endif ?><li class="<?php echo $item->option_type() ?>"><a href="#<?php echo str_replace(' ', '-', strtolower($item->section_title())) ?>"><?php if($item->option_type() == "three"): ?><div class="bullet"></div><?php elseif($item->option_type() == "one"): ?><div class="section-h-line"></div><?php endif ?><?php echo $item->section_title()->kt() ?></a><?php $prev = $item->option_type(); ?>
					<?php endforeach ?>
					<?php if($ul_count == 2): ?></ul></li></ul></li>
					<?php elseif($ul_count == 1): ?>
						<?php if($prev == "three") echo "</ul></li>"; ?>
					<?php endif ?>

						<li class="one"><a href="#evaluate"><div class="section-h-line"></div><?php echo l::get('evaluate') ?></a></li>
					</ul>
					<div class="back_button_index">
						<div class="h-line-index-back"></div>
						<?php snippet('back-link-with-arrow', array('backUrl' => $backUrl)) ?>
					</div>
				</div>
			</aside>
			<!-- end: INDEX -->

			<header class="visuallyhidden">
				<h1><?php echo page()->title() ?></h1>	
			</header>

			<!-- CONTENT -->

			<!-- NEW STRUCTURE -->

			<div id="single-article-container">
			<?php $array_length = count(page()->article()->yaml()); $i = 1; ?>	<!-- necessary to close the ul at the last item on the foreach loop if end of a list -->
			<?php $prev = ""; foreach (page()->article()->toStructure() as $item): ?>

				<?php if($item->option_type() == "one"): ?>

					<?php if($prev == "three") echo "</ul>"; ?>

					<?php if($prev != "") echo "</div>"; ?> <!-- closing the "section-container" div -->

					<div id="<?php echo str_replace(' ', '-', strtolower($item->section_title())) ?>" class="section-h-line"></div>
					<div class="section-container">
					<h2><?php echo $item->section_title() ?></h2>
					<?php echo $item->content()->kt() ?>

				<?php elseif($item->option_type() == "two"): ?>

					<?php if($prev == "three") echo "</ul>"; ?>
				
					<h3 id="<?php echo str_replace(' ', '-', strtolower($item->section_title())) ?>"><?php echo $item->section_title() ?></h3>
					<?php echo $item->content()->kt() ?>

				<?php elseif($item->option_type() == "three"): ?>

					<?php if($prev != "three"): ?>
						<?php echo "<ul class='content-list'>" ?>
					<?php endif ?>

						<li>
							<div class="bullet"></div>
							<h4 id="<?php echo str_replace(' ', '-', strtolower($item->section_title())) ?>"><?php echo $item->section_title() ?></h4>
							<?php echo $item->content()->kt() ?>
						</li>

						<?php if($prev == "three" && $i == $array_length) echo "</ul>"; ?> 	<!-- close the ul if necessary -->
							
				<?php endif ?>

				<?php $prev = $item->option_type(); $i += 1; ?>

			<?php endforeach ?>

			</div>

			<!-- evaluation block -->
			<div id="evaluate" class="section-h-line"></div>
			<div class="section-container evaluate">
				<h2><?php echo l::get('evaluate') ?></h2>
				<?php echo page()->parent()->verify()->kt() ?>
				<div id="article_end"></div>
			</div>

			<!-- end: CONTENT -->

			<!-- PDF of the article -->
			<?php if(page()->pdf_article()->isNotEmpty()): ?>
				<div class="section-h-line"></div>
				<div class="section-container" id="container-button-article-pdf">
					<h2><?php echo l::get('download-pdf-kit-single') ?></h2>
					<a href="<?php echo page()->document(page()->pdf_article())->url() ?>" target="_blank"><div class="button"><?php echo page()->title() ?></div></a>
				</div>
			<?php endif ?>
			</div>

		</article>

		<!-- end: MAIN ARTICLE -->


		<!-- RESOURCES CONNECTED TO THE PATH -->

		<?php if(page()->links_to_resources()->isNotEmpty()): ?>
			<div class="path-single">
				<section id="related-resources">
					<h2><?php echo l::get('related-resources') ?></h2>
						<?php
							//--- SORT THE LINKED KITS of the path ---//

							echo "<ul id='single-resources'>";
							foreach (page()->links_to_resources()->toStructure() as $uid) {

								foreach (page('risorse')->children()->visible() as $item) {

									if($item->uid() == $uid) {
										echo "<li><a href='".$item->url()."'>";
										echo "<h3><span>".$item->title()."</span></h3>";
										echo "<p class='resource-description'>".shortstring($item->short()->html(), 300)."</p>";
										echo "<div class='resource-image'><img src='".$item->image($item->main_image())->url()."'></div>";
										echo "</a></li>";
									}
								}
							}
							echo "</ul>";
						?>
				</section>
		</div>
		<?php endif ?>
		<!-- end -->


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

		<?php snippet('back-link-with-arrow', array('backUrl' => $backUrl)) ?>

		<!-- load the lightbox script -->
		<?php echo js('assets/js/lightbox.js'); ?>

	</main>
</div>

<?php snippet('footer') ?>