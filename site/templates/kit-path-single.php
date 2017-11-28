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



		<article id="article-container">
			<div><?php echo page()->article()->kt() ?></div>
		</article>

		<section>
			<div><?php echo page()->links_to_kit() ?></div>
		</section>
	</main>
</div>


<?php snippet('footer') ?>