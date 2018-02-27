<?php snippet('header') ?>

	<main id="main">

		<h1 class="visuallyhidden">Mediazione Cultura Inclusione</h1>

		<?php snippet('homepage-kit') ?>

		<section id="kit-part">
			<div class="top-line"></div>
			<h2><?php echo page()->main_subtitle() ?></h2>

			<a href="<?php echo page('kit')->url() ?>">
				<div id="kit-home-descritpion"><?php echo page()->kit_intro()->kt() ?></div>
			</a>
			
			<div id="condividi">
				<p><?php echo page()->write_us() ?></p>
				<a href="mailto:info.mci@supsi.ch"><div class="button"><?php echo page()->write_us_button() ?></div></a>
			</div>

		</section>




		<?php snippet('enti-promotori') ?>
		<?php snippet('enti-sostenitori') ?>
	</main>

<?php snippet('footer') ?>