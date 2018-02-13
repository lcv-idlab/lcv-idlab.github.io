<?php snippet('header') ?>

<main>
	
	<h1 class="title"><?php echo page()->title()->html() ?></h1>

	<div class="contacts-contacts">
		<address><?php echo page()->main()->kt() ?></address>
		<ul>
		<?php foreach( page()->contacts()->toStructure() as $contact ): ?>
			<li>
				<address>
					<strong><?php echo $contact->name()->html() ?> <?php echo $contact->surname()->html() ?></strong>
					<?php echo $contact->phone()->kt() ?>
					<a href="mailto:<?php echo $contact->email()->html() ?>" class="email-contacts"><?php echo $contact->email()->html() ?></a>
				</address>
			</li>
		<?php endforeach ?>
		</ul>
	</div>

	<section class="contacts-colophon">
		<h2 class="title">colophon</h2>

		<div class="colophon-container">

			<div class="colophon-section">

				<div class="colophon-coordinamento">
					<h3><?php echo ucfirst(l::get('coordination')) ?></h3>
					<ul>
					<?php foreach ( page('progetto/team')->people()->toStructure() as $people ): ?>
						 <?php if($people->colophon() == "coordinamento"): ?>
						<li><a href="<?php echo page('progetto/team')->url() ?>/#<?php echo str_replace(' ', '_', strtolower($people->name()->html())) ?>_<?php echo str_replace(' ', '_', strtolower($people->surname())) ?>"><?php echo $people->name()->html() ?> <?php echo $people->surname() ?></a></li>
						 <?php endif ?>
					<?php endforeach ?>
					</ul>
				</div>

				<div class="colophon-collaborazione">
					<h3><?php echo ucfirst(l::get('in-collaboration-with')) ?></h3>
					<ul>
					<?php foreach ( page('progetto/team')->people()->toStructure() as $people ): ?>
						 <?php if($people->colophon() == "collaborazione"): ?>
						<li><a href="<?php echo page('progetto/team')->url() ?>/#<?php echo str_replace(' ', '_', strtolower($people->name()->html())) ?>_<?php echo str_replace(' ', '_', strtolower($people->surname())) ?>"><?php echo $people->name()->html() ?> <?php echo $people->surname() ?></a></li>
						 <?php endif ?>
					<?php endforeach ?>
					</ul>
				</div>

			</div>

			<div class="colophon-section">

				<div class="colophon-promosso">
					<h3><?php echo ucfirst(l::get('promoted-by')) ?></h3>
					<ul>
					<?php foreach ( page('progetto/promotori')->promotori()->toStructure() as $promotori ): ?>
						<li><a href="<?php echo page('progetto/promotori')->url() ?>/#<?php echo strtolower($promotori->name()->html()) ?>"><?php echo $promotori->name()->html() ?></a></li>
					<?php endforeach ?>
					</ul>
				</div>

				<div class="colophon-partner">
					<h3><?php echo ucfirst(l::get('partners')) ?></h3>
					<ul>
					<?php foreach ( page('progetto/partner')->partners()->toStructure() as $partner ): ?>
						<li><a href="<?php echo page('progetto/partner')->url() ?>/#<?php echo str_replace(' ', '_', strtolower($partner->name()->html())) ?>"><?php echo $partner->name()->html() ?></a></li>
					<?php endforeach ?>
					</ul>
				</div>

			</div>

			<div class="colophon-section">
				<h3><?php echo ucfirst(l::get('supported-by')) ?></h3>
				<ul>
				<?php foreach ( page('footer/enti-sostenitori')->sostenitori()->toStructure() as $item ): ?>
					<li><?php echo $item->name()->html() ?></li>
				<?php endforeach ?>
				</ul>
			</div>

		</div>

	</section>

</main>

<?php //snippet('enti-promotori') ?>
<?php //snippet('enti-sostenitori') ?>
<?php snippet('footer') ?>