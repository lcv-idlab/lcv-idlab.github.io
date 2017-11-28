<!-- 404 -->

<?php snippet('header') ?>

	<main id="page-not-found">
		<h1><?php echo l::get('404') ?></h1>

		<a href="<?php echo $site->url() ?>"><?php echo $site->page_not_found()->html()?></a>
	</main>



<?php snippet('footer') ?>