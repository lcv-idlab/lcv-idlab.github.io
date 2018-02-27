<?php snippet('header') ?>

<div id="kit">
	<main id="kit-single" class="path-single-container">
		<div class="path-single">
			<div id="kit-title">
				
				<?php $backUrl = '/'.$site->language().'/kit/percorsi/#'.str_replace(" ", "-", strtolower($page->title())); ?>

				<?php snippet('back-link-with-arrow', array('backUrl' => $backUrl)) ?>

				<h1 class="title"><?php echo page()->title()->html() ?></h1>
				<!-- <div></div> -->
			</div>

			<!-- CONTENT -->
			<article>
				<div id="single-article-container">

				<?php $array_length = count(page()->article()->yaml()); $i = 1; ?>	<!-- necessary to close the ul at the last item on the foreach loop if end of a list -->

				<div id="main_description">
					<?php echo page()->description()->kt() ?>
				</div>

				<?php $prev = ""; foreach (page()->article()->toStructure() as $item): ?>

					<?php if($item->option_type() == "plain"): ?>

						<?php if($prev == "list") echo "</ul>"; ?>

					<div class="section-container">
						<?php echo $item->content()->kt() ?>
					</div>

					<?php elseif($item->option_type() == "list"): ?>

						<?php if($prev != "list"): ?>
							<ul class="content-list">
						<?php endif ?>

							<li>
								<div class="bullet"></div>
								<h4><?php echo $item->section_title() ?></h4>
								<?php echo $item->content()->kt() ?>
							</li>

						<?php if($prev == "list" && $i == $array_length): ?> 	<!-- close the ul if necessary -->
							</ul>
						<?php endif ?>

					<?php endif ?>

					<?php $prev = $item->option_type(); $i += 1; ?>

				<?php endforeach ?>

				</div>

			</article>

			<!-- end -->


			<!-- KIT CONNECTED TO THE PATH -->
			<?php if(page()->links_to_kit()->isNotEmpty()): ?>
			<section id="related-kits">

				<h2><?php echo l::get('related-kits') ?></h2>
					<?php
						//--- SORT THE LINKED KITS of the path ---//

						echo "<ul class='single-kit'>";
						foreach (page()->links_to_kit()->toStructure() as $uid) {

							foreach (page('kit')->children()->visible() as $main_item) {
								foreach ($main_item->children()->visible() as $item) {

									if($item->uid() == $uid) {
										echo "<li><a href='".$item->url()."'>";
										echo "<div class='kit-icon'><img src='".$item->image($item->icon())->url()."'></div>";
										echo "<h3><span>".$item->title()."</span></h3>";
										echo "<p class='kit-description'>".shortstring($item->description()->html(), 200)."</p></a></li>";
									}
								}
							}
						}
						echo "</ul>";
					?>
			</section>
			<?php endif ?>
			<!-- end -->

			<!-- RESOURCES CONNECTED TO THE PATH -->

			<?php if(page()->links_to_resources()->isNotEmpty()): ?>
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
			<?php endif ?>
			<!-- end -->

			<?php snippet('back-link-with-arrow', array('backUrl' => $backUrl)) ?>

		</div>

	</main>
</div>


<?php snippet('footer') ?>