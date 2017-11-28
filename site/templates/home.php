<?php snippet('header') ?>

	<main>
		<h1 class="home-main-title desktop"><?php echo $site->subtitle()->html() ?></h1>
		<h1 class="home-main-title mobile"><?php echo $site->second_title()->kt() ?></h1>

		<!-- RESOURCES -->

		<section>
			<h2 class="hidden home-title-container"><?php echo page('risorse')->title()->html() ?></h2>
			<ul class="container-boxes home-page">
			<?php foreach (page('risorse')->children()->visible() as $resource): ?>
				
				<?php if($temp++ < 3 ): ?>


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

				<?php else: ?>
					<?php break ?>
				<?php endif ?>

	      		<?php endforeach ?>
      		</ul>
      		<div id="all-reources-button-contianer">
      			<a href="<?php echo page('risorse')->url()?>" class="button">Vedi tutte le risorse</a>
      		</div>
		</section>

		<!-- end: RESOURCES -->

		<?php if(page('eventi')->isVisible()): ?>

		<!-- EVENTS -->

		<section>
			<header class="home-title-container">
				<hr class="hr-solid">
				<h2 class="title"><?php echo page('eventi')->title()->html() ?></h2>
				<a href="<?php echo page('eventi')->url() ?>" class="link"><span>vedi tutti gli eventi</span></a>
			</header>
			<ul class="container-events">
				<?php foreach (page('eventi')->children()->visible() as $event): ?>
					<li>
						<a href="<?php echo $event->url() ?>" class="link-box">
							<article>
								<time datetime="<?php echo $event->date('Y-m-d') ?>"><?php echo $event->date('d.m.Y') ?></time>
								<h3 class="event-list-title"><?php echo $event->title()->html() ?></h3>
								
								<p class="body"><span class="location"><?php echo $event->partner() ?>, <?php echo $event->place() ?></span> <?php echo $event->short()->html() ?></p>
							</article>
						</a>
					</li>
				<?php endforeach ?>
			</ul>
		</section>

		<!-- end: EVENTS -->

		<?php endif ?>


		<?php snippet('newsletter') ?>
		<?php snippet('enti-promotori') ?>
		<?php snippet('enti-sostenitori') ?>

	</main>

<?php snippet('footer') ?>