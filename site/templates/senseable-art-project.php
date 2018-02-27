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
<body class="body senseable-art senseable-art-project">

<header class="header senseable-main-nav">
	<nav>
		<a href="http://www.mci.supsi.ch/senseable-art" class="logo"><h1></h1></a>
		<a href="<?php echo page()->parent()->url() ?>" class="back-button"><span>< Back</span></a>
	</nav>
</header>

<main>

	<!-- COVER WITH TITLE -->

	<div class="project-title" style="background-image: url('<?php echo image(page()->cover())->url() ?>')">
		<div class="overlay"></div>
		<div class="container">
			<h1><?php echo page()->title()->html() ?></h1>
			<div class="project-subtitle"><?php echo page()->subtitle()->kt()->html() ?></div>
			<div class="project-authors"><?php echo page()->authors()->kt()->html() ?></div>
		</div>
	</div>


	<!-- ABSTRACT -->

	<div class="container">
		<h2 id="abstract">Abstract</h2>
		<p class="abstract"><?php echo page()->abstract()->kt() ?></p>
	</div>

	<div class="hr-container">
		<hr>
	</div>

	<!-- DESCRIPTION -->

	<?php if(page()->slideshowinstaed()->isNotEmpty()): ?>
		<div class="container-slideshowinstead">
			<h2 id="people">Description</h2>
		</div>
		<div id="slideshow-container">
			<iframe src="<?php echo page()->slideshowinstaed() ?>" frameborder="0" width="100%" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>
		</div>
	<?php else: ?>

		<div class="container">
			<h2 id="people">Description</h2>
			<?php echo page()->description()->kt() ?>
		</div>

		<div class="hr-container">
			<hr>
		</div>

		<div class="container">
			<h2 id="people">Prototype</h2>
			<?php echo page()->prototype()->kt() ?>
		</div>


	<?php endif ?>

	<?php if(page()->references()->isNotEmpty()): ?>


		<div class="hr-container">
			<hr>
		</div>

		<div class="container references">
			<h2 id="references">References</h2>
			<?php echo page()->references()->kt() ?>
		</div>


	<?php endif ?>

	<!-- GALLERY -->

	<?php if(page()->gallery()->isNotEmpty()): ?>

		<div class="hr-container">
			<hr>
		</div>
	
		<div class="container">
			<h2>Gallery</h2>
			<ul class="gallery">
	        <?php foreach(page()->gallery()->yaml() as $image): ?>
	        <li>
	          <figure>

	          <?php 
	            // retrieve the alt text from the image, if not present, use a generic one
	            $img = $page->image($image);
	            if($img->alt()->isNotEmpty()) {
	              $alt_img = $img->alt()->html();
	            }
	            else {
	              $alt_img = "Project's photo " . page()->title()->html();
	            }
	          ?>

	            <a href="<?php  echo $img? $img->url() : '' ?>" data-lightbox="prova1" data-title="<?php echo $alt_img ?>">
	            <img src="<?php echo $img? $img->url() : '' ?>" alt="<?php echo $alt_img ?>" class="<?php e($img->dimensions()->portrait(), 'portrait', 'landscape'); ?>" />
	        </a>
	          </figure>
	        </li>
	        <?php endforeach ?>
	        </ul>
		</div>

		<div class="hr-container">
			<hr>
		</div>

	<?php endif ?>

	<!-- RESOURCES -->

	<?php if(page()->github()->isNotEmpty() || page()->flickr()->isNotEmpty() || page()->slideshow()->isNotEmpty()): ?>

		<div class="container links">
			<h2>Resources</h2>

			<?php if(page()->github()->isNotEmpty()): ?>
				<a href="<?php echo page()->github()->url() ?>" target="_blank"><img src="<?php echo site()->url(). '/assets/icons/GitHub-Mark-64px.png' ?>"></a>
			<?php endif ?>

			<?php if(page()->flickr()->isNotEmpty()): ?>
				<a href="<?php echo page()->flickr()->url() ?>" target="_blank"><img src="https://s.yimg.com/pw/images/goodies/black-large-chiclet.png"></a>
			<?php endif ?>

		</div>

	<?php endif ?>

    <?php echo js('assets/js/lightbox.js'); ?>


	<footer></footer>


</main>
