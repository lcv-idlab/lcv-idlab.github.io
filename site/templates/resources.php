<?php snippet('header') ?>

<main>

	<h1 class="title"><?php echo page()->title()->html() ?></h1>

	<section>
		<h2 class="hidden home-title-container" id="risorse-home"><?php echo page('risorse')->title()->html() ?></h2>
		<ul class="container-boxes">
		<?php foreach (page('risorse')->children()->visible() as $resource): ?>
		<li>
		
			<!-- Experience -->
			<?php if($resource->intendedTemplate() === "resource-experience" || $resource->intendedTemplate() === "resource-experience-audio"): ?>
				<article class="experience">
					<h3 class="headline"><a href="<?php echo $resource->url() ?>" class="resource-link"><?php echo $resource->title()->html() ?></a></h3>
					<!--
					<p class="partner"><?php echo $resource->partner()->html() ?>, <?php echo $resource->location() ?></p>
					-->
					<p class="body"><?php echo $resource->short()->html() ?></p>
				</article>
			<?php if( $resource->main_image()->isNotEmpty() ): ?>
				<?php 
		            // retrieve the alt text from the image, if not present, use a generic one
		            $img = $resource->image($resource->main_image());
		            if($img->alt()->isNotEmpty()) {
		              $alt_img = $img->alt()->html();
		            }
		            else {
		              $alt_img = "Fotografia rappresentativa dell'evento " . $resource->title()->html();
		            }
		          ?>
		          <a href="<?php echo $resource->url() ?>"><img src="<?php echo $img->url() ?>" alt="<?php echo $alt_img ?>"></a>
			<?php endif ?>

			<!-- Document -->
			<?php elseif($resource->intendedTemplate() === "resource-document"): ?>
				<article class="document">
					<h3 class="headline"><a href="<?php echo $resource->url() ?>"  class="resource-link"><?php echo $resource->title()->html() ?></a></h3>
					<p class="subtitle"><?php echo $resource->subtitle()->html() ?></p>
					<p class="body"><?php echo $resource->short()->html() ?></p>
				</article>
				<?php if( $resource->main_image()->isNotEmpty() ): ?>
				<?php 
		            // retrieve the alt text from the image, if not present, use a generic one
		            $img = $resource->image($resource->main_image());
		            if($img->alt()->isNotEmpty()) {
		              $alt_img = $img->alt()->html();
		            }
		            else {
		              $alt_img = "Fotografia rappresentativa dell'evento " . $resource->title()->html();
		            }
		          ?>
		          <a href="<?php echo $resource->url() ?>"><img src="<?php echo $img->url() ?>" alt="<?php echo $alt_img ?>"></a>
			<?php endif ?>
			<?php endif ?>
		</li>
  		<?php endforeach ?>
  		</ul>
	</section>

</main>

<?php snippet('footer') ?>
