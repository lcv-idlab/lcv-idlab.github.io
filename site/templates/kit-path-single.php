<?php snippet('header') ?>

<div id="kit">
	<main id="path-single">
		<div id="kit-title">
			<h1 class="title"><?php echo page()->title()->html() ?></h1>
			<!-- <div></div> -->
		</div>
		<header id="main-header">
			<div><?php echo page()->description()->kt() ?></div>
		</header>


		<article id="article-container">
			<div><?php echo page()->article()->kt() ?></div>
		</article>

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
									echo "<p class='kit-description'>".shortstring($item->description()->html(), 100)."</p></a></li>";
								}
							}
						}
					}
					echo "</ul>";
				?>
		</section>
		<?php endif ?>
	</main>
</div>


<?php snippet('footer') ?>