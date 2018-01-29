<?php snippet('head') ?>
<?php snippet('functions') ?>

<!-- HEADER -->

<header class="main-nav">
	<nav>
		<a href="<?php echo $site->url() ?>" class="main-logo">MCI<span><?php echo " / ".$site->title() ?></span></a>
		<span class="menu-button"><a href="" id="toggle"></a></span>

      	<!-- LANGUAGE MENU -->


		<ul id="pages-navigation">
		<?php foreach ($site->pages()->visible() as $page): ?>

			<?php if ( $page->title() == "progetto" ): ?>
				<li><a href="<?php echo $page->url() ?>" class="<?php if(page('/progetto/abstract/')->isOpen()) { echo 'active'; } ?>"><span class="<?php if(page('/progetto/abstract/')->isOpen()) { echo 'active'; } ?>"><?php echo $page->title() ?></span></a>

					<!-- hide the second level menu if the page isns't part of "progetto" or "abstract" -->
					<div class="conatiner-second-level <?php $parent = page()->parent()->title(); if( $parent!='progetto' && $parent!='abstract' ) { echo "visuallyhidden"; } ?>">

						<ul class="second-level">
							<?php foreach ( $page->children()->visible() as $intpage): ?>
								<li><a href="<?php echo $intpage->url() ?>" class="<?php e($intpage->isOpen(), 'active'); ?>"><span class="<?php e($intpage->isOpen(), 'active'); ?>"><?php echo $intpage->title() ?></span></a></li>
							<?php endforeach ?>
						</ul>
					</div>
				</li>
			<?php elseif($page->title() == "kit"): ?>

				<li><a href="<?php echo page('kit')->url() ?>" class="<?php if(page('/kit/')->isOpen() and !page('/kit/percorsi/')->isOpen()) { echo 'active'; } else { echo ''; } ?> after-secondmenu-li-menu-mobile"><span class="<?php if(page('/kit/')->isOpen and !page('/kit/percorsi/')->isOpen()) { echo 'active'; } else { echo ''; } ?>"><?php echo $page->title() ?></span></a>



					<!-- hide the second level menu if the page isns't part of "kit" -->
					<div class="conatiner-second-level <?php $parent = page()->title(); $parent2 = page()->parent()->title(); if( $parent != 'kit' && $parent != 'percorsi' && $parent2 != 'percorsi' ) { echo "visuallyhidden"; } ?>">

						<ul class="second-level">
							<?php foreach ( $page->children()->visible() as $intpage): ?>
								<?php if( $intpage->title() == 'percorsi' || $intpage->parent()->title() == 'percorsi'): ?>
									<li><a href="<?php echo $intpage->url() ?>" class="<?php e($intpage->isOpen(), 'active'); ?>"><span class="<?php e($intpage->isOpen(), 'active'); ?>"><?php echo $intpage->title() ?></span></a></li>
								<?php endif?>
							<?php endforeach ?>
						</ul>
					</div>


				</li>

			<?php else: ?>
				

				<li><a href="<?php echo $page->url() ?>" class="<?php e($page->isOpen(), 'active'); ?>"><span class="<?php e($page->isOpen(), 'active'); ?>"><?php echo $page->title() ?></span></a></li>

			<?php endif ?>
      		
      	<?php endforeach ?>
      	</ul>
	</nav>
</header>

<!-- end: HEADER -->