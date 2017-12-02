<?php snippet('header') ?>

<div id="kit">
	<main id="kit-single" class="path-single-container">
		<div class="path-single">
			<div id="kit-title">
				<a href="/<?php echo $site->language() ?>/kit/percorsi" class="back-button"><?php echo "< ".l::get('back')?></a>

				<h1 class="title"><?php echo page()->title()->html() ?></h1>
				<!-- <div></div> -->
			</div>

			<!-- CONTENT -->
			<article>
				<div id="single-article-container">
				<?php foreach (page()->article()->toStructure() as $article): ?>
					<div class="section-container">
						<?php echo $article->content()->kt() ?>
					</div>
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
										echo "<h3>".$item->title()."</h3>";
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
									echo "<h3>".$item->title()."</h3>";
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

		</div>

	</main>
</div>


<?php snippet('footer') ?>