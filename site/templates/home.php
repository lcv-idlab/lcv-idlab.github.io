<?php snippet('header') ?>

	<main>

		<h1 class="home-main-title desktop"><?php echo $site->subtitle()->html() ?></h1>
		<h1 class="home-main-title mobile"><?php echo $site->second_title()->kt() ?></h1>

		<div id="home-top-content">
			<h2><?php echo page()->main_subtitle()->kt() ?></h2>
		</div>

		<section id="kit-part">

			<a href="<?php echo page('kit')->url() ?>">
				<article>
					<h3>kit</h3>
					<div class="decoration-wrapper">

						<div id="kit-list-icons">
							<img src="/content/2-kit/2-opere/1-descrizione/descrivere-le-opere.png" id="one">
							<img src="/content/2-kit/1-comunicazione/2-design/design-inclusivo.png" id="two">
							<img src="/content/2-kit/3-orientation/1-guidare-il-visitatore/accompagnare-il-visitatore.png" id="three">
						</div>


						<div id="kit-home-descritpion"><?php echo page()->kit_intro()->kt() ?></div>

					</div>
				</article>
			</a>
			
			<div id="condividi">
				<p>Condividete con noi le vostre esperienze!</p>
				<a href="mailto:info.mci@supsi.ch"><div class="button">scrivici</div></a>
			</div>

		</section>




		<?php snippet('enti-promotori') ?>
		<?php snippet('enti-sostenitori') ?>
	</main>

<?php snippet('footer') ?>