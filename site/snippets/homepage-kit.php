<!-- HOMEPAGE KIT -->

<section id="homepage-kit">

	<ul>
	<?php foreach(page('kit')->children()->children() as $item): ?>

		<?php if($item->intendedTemplate() === 'kit-single' && $item->visible()): ?>
			<li style="display:none">
				<a href="<?php echo $item->url() ?>">
					<img src="<?php echo $item->image($item->icon())->url() ?>" alt="<?php echo $item->title() ?>">
					<p><?php echo $item->title() ?></p>
				</a>
			</li>
		<?php endif ?>

	<?php endforeach ?>
	</ul>

</section>


<!-- end: HOMEPAGE KIT -->