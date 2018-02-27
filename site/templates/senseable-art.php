<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title><?php echo $site->title()->html() ?> | <?php echo $page->title()->html() ?></title>
  <meta name="description" content="Experiments in art-mediation via technology and the human senses">
  <meta property="og:url" content="http://www.mci.supsi.ch/senseable-art" />
  <meta property="og:title" content="Senseable Art workshop">
  <meta property="og:type" content="website" />
  <meta property="og:image" content="<?= url('assets/images/senseable-art-workshop.jpg') ?>">
  <meta property="og:description" content="The action-research points at designing other codes for making cultural artifacts accessible, perceivable and understandable to all, both visually impaired and sighted people.">

  <!-- css -->
  <?php echo css('assets/css/main.css'); ?>
  <?php echo css('assets/sass/lightbox.css'); ?>

  <!-- js -->
  <?php echo js('assets/js/nav.js'); ?>
  <?php echo js('assets/js/jquery.min.js'); ?>

</head>
<body class="body senseable-art">

<header class="header senseable-main-nav">
	<nav>
		<a href="http://www.mci.supsi.ch" class="logo"><h1></h1></a>
		<span class="senseable-menu-button"><a href="" id="toggle"></a></span>
		<ul>
			<li><a href="<?php echo page()->url() ?>/#workshop" class="link-button" target="_self">Workshop</a> / </li>
			<li><a href="<?php echo page()->url() ?>/#people" class="link-button">People</a> / </li>
			<li><a href="<?php echo page()->url() ?>/#projects" class="link-button">Projects</a> / </li>
			<li><a href="<?php echo page()->url() ?>/#info" class="link-button">Info</a></li>

      	</ul>
	</nav>
</header>

<main>

	<div class="workshop-title">
		<div class="container">
			<h1><?php echo page()->title()->html() ?></h1>
			<div class="workshop-subtitle"><?php echo page()->subtitle()->kt()->html() ?></div>
			<p class="place-time"><?php echo page()->place()->html() ?>, <?php echo page()->date_time()->html() ?></p>
		</div>
	</div>


	<div class="container">
		<h2 id="workshop">Workshop</h2>
		<p class="description"><?php echo page()->workshop_description()->html() ?></p>
	</div>

	<div class="hr-container">
		<hr>
	</div>

	<div class="container">
		<h2 id="people">People</h2>
		<p class="description"><?php echo page()->people_description()->html() ?></p>

		<div class="people-lists">
			<div class="list">
				<h3><?php echo page()->experts_title()->html() ?></h3>
				<ul>
				<?php foreach (page()->experts()->toStructure() as $item ): ?>
					<li><?php if($item->link()->isNotEmpty()): ?><a href="<?php echo $item->link() ?>" target="_blank"><?php endif ?><?php echo $item->name()->html() ?> <?php echo $item->surname()->html() ?><?php if($item->affiliation()->isNotEmpty()): ?>, <?php echo $item->affiliation()->html() ?><?php endif ?><?php if($item->link()->isNotEmpty()): ?></a><?php endif ?></li>
				<?php endforeach ?>
				</ul>
			</div>

			<div class="list">
				<h3><?php echo page()->guests_speakers_title()->html() ?></h3>
				<ul>
				<?php foreach (page()->guests_speakers()->toStructure() as $item ): ?>
					<li><?php if($item->link()->isNotEmpty()): ?><a href="<?php echo $item->link() ?>" target="_blank"><?php endif ?><?php echo $item->name()->html() ?> <?php echo $item->surname()->html() ?><?php if($item->affiliation()->isNotEmpty()): ?>, <?php echo $item->affiliation()->html() ?><?php endif ?><?php if($item->link()->isNotEmpty()): ?></a><?php endif ?></li>
				<?php endforeach ?>
				</ul>
			</div>

			<div class="list">
				<h3><?php echo page()->remote_speakers_title()->html() ?></h3>
				<ul>
				<?php foreach (page()->remote_speakers()->toStructure() as $item ): ?>
					<li><?php if($item->link()->isNotEmpty()): ?><a href="<?php echo $item->link() ?>" target="_blank"><?php endif ?><?php echo $item->name()->html() ?> <?php echo $item->surname()->html() ?><?php if($item->affiliation()->isNotEmpty()): ?>, <?php echo $item->affiliation()->html() ?><?php endif ?><?php if($item->link()->isNotEmpty()): ?></a><?php endif ?><?php if($item->event_time()->isNotEmpty()): ?><br><?php echo $item->event_time() ?><?php endif ?></li>
				<?php endforeach ?>
				</ul>
			</div>

			<div class="list">
				<h3><?php echo page()->other_partecipants_title()->html() ?></h3>
				<ul>
				<?php foreach (page()->other_partecipants()->toStructure() as $item ): ?>
					<li><?php echo $item->name()->html() ?> <?php echo $item->surname()->html() ?></li>
				<?php endforeach ?>
				</ul>
			</div>

			<div class="list">
				<h3><?php echo page()->research_mentors_title()->html() ?></h3>
				<ul>
				<?php foreach (page()->research_mentors()->toStructure() as $item ): ?>
					<li><?php echo $item->name()->html() ?> <?php echo $item->surname()->html() ?><?php if($item->affiliation()->isNotEmpty()): ?>, <?php echo $item->affiliation()->html() ?><?php endif ?></li>
				<?php endforeach ?>
				</ul>
			</div>

			<div class="list">
				<h3><?php echo page()->coordinator_title()->html() ?></h3>
				<ul>
				<?php foreach (page()->coordinator()->toStructure() as $item ): ?>
					<li><?php echo $item->name()->html() ?> <?php echo $item->surname()->html() ?><?php if($item->affiliation()->isNotEmpty()): ?>, <?php echo $item->affiliation()->html() ?><?php endif ?></li>
				<?php endforeach ?>
				</ul>
			</div>
			
		</div>
	</div>


	<div class="hr-container">
		<hr>
	</div>


	<div class="container">
		<h2 id="projects">Projects</h2>

		<div class="project-lists">
			<ul>
			<?php foreach(page()->projects()->toStructure() as $item): ?>
				<li class="project">
				<a href="<?php if($item->link()->isNotEmpty()): ?><?php echo(page()->url() . '/' . $item->link()->html())?><?php endif ?>">
					<img src="<?php if($item->project_picture()->isNotEmpty()): ?><?php echo image($item->project_picture())->url() ?><?php endif ?>">
					<h3><?php echo $item->title()->html() ?></h3>
				</a>
				</li>
			<?php endforeach ?>
			</ul>
		</div>
	</div>


	<div class="hr-container">
		<hr>
	</div>

	<div class="container">
		<div class="info-items">
			<div class="info-info">
				<h2 id="info">Info</h2>
				<p>The workshop is organized by Laboratory of Visual Culture within the research project <a href="http://www.mci.supsi.ch" target="_blank">Mediation Culture Inclusion</a> and in collaboration with MASI Lugano.</p>
			</div>
			<div class="info-more" id="location">
				<h2>Location</h2>
				<p>Campus Trevano SUPSI<br>Lugano, Switzerland</p>
			</div>
			<div class="info-more" id="license">
				<h2>License</h2>
				<a href="https://creativecommons.org/licenses/by-nc-sa/4.0/" target="_blank"><img src="https://creativecommons.org/wp-content/themes/creativecommons.org/images/chooser_cc.png">
				<img src="https://creativecommons.org/wp-content/themes/creativecommons.org/images/chooser_by.png">
				<img src="https://creativecommons.org/wp-content/themes/creativecommons.org/images/chooser_nc.png">
				<img src="https://creativecommons.org/wp-content/themes/creativecommons.org/images/chooser_sa.png"></a>
				<p>Unless otherwise stated</p>
			</div>
			<div class="info-more" id="gallery">
				<h2>Workshop gallery</h2>
				<a href="<?php echo page()->gallery() ?>" target="_blank"><img src="https://s.yimg.com/pw/images/goodies/black-large-chiclet.png"></a>
			</div>
		</div>
	</div>

	<footer></footer>


</main>
