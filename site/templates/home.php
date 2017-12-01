<?php snippet('header') ?>

	<main>

		<h1 class="home-main-title desktop"><?php echo $site->subtitle()->html() ?></h1>
		<h1 class="home-main-title mobile"><?php echo $site->second_title()->kt() ?></h1>

		<div id="home-main-content">
			<h2><?php echo page()->main_subtitle()->kt() ?></h2>

			<div id="kit-list-icons">
				<img src="/content/2-kit/2-opere/1-descrizione/descrivere-le-opere.png">
				<img src="/content/2-kit/2-opere/1-descrizione/descrivere-le-opere.png" id="small">
				<img src="/content/2-kit/2-opere/1-descrizione/descrivere-le-opere.png" id="medium">
				<img src="/content/2-kit/2-opere/1-descrizione/descrivere-le-opere.png" id="large">
			</div>

			<section>

				<h3>kit</h3>
				<div><?php echo page()->kit_intro()->kt() ?></div>

				<div id="condividi">
					<p>Condividete con noi le vostre esperienze!</p>
					<a href="mailto:info.mci@supsi.ch"><div class="button">scrivici</div></a>
				</div>

			</section>

		</div>


		<?php snippet('enti-promotori') ?>
		<?php snippet('enti-sostenitori') ?>
	</main>

<?php snippet('footer') ?>