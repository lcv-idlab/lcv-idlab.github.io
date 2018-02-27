<!-- SECONDARY NAV -->

<div class="secondary-nav">
	<nav aria-label="secondary">
		<?php foreach($site->page('progetto')->children()->visible() as $page): ?>
			<a href="<?php echo $page->url() ?>" class="<?php e($page->isOpen(), 'active'); ?> sec-nav-button"><span class="<?php e($page->isOpen(), 'active'); ?>"><?php echo $page->title()->html() ?></span></a>
		<?php endforeach ?>
	</nav>
</div>

<!-- end: SECONDARY NAV -->