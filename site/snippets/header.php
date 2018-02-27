<?php snippet('head') ?>
<?php snippet('functions') ?>

<!-- HEADER -->



<header class="main-nav">
	<nav>
		<a href="<?php echo $site->url(''.$site->language()) ?>" class="main-logo"><span><?php echo $site->title() ?></span></a>
		<span class="menu-button"><a href="" id="toggle"></a></span>

      	<!-- LANGUAGE MENU -->

      	<div id="languages-navigation" role="navigation">
		  <ul>
		  	<a href="<?php echo $page->url($site->language()->code()) ?>">
			  	<li class="active">
			  		<span><?php echo strtoupper($site->language()->code()) ?></span>
			  	</li>
			  </a>
		    <?php foreach($site->languages() as $language): ?>
		    	<?php if($site->language() != $language ): ?>
	    		<a href="<?php echo $page->url($language->code()) ?>">
				    <li class="hide">
				    	<span><?php echo strtoupper($language->code()) ?></span>
				    </li>
			    </a>
				<?php endif ?>
		    <?php endforeach ?>
		  </ul>
		</div>


		<!-- PAGES NAVIGATION MENU -->

		<ul id="pages-navigation">
		<?php foreach ($site->pages()->visible() as $page): ?>

			<?php if ( $page->class_id() == "progetto" ): ?>
				<li><a href="<?php echo $page->url() ?>" class="<?php if($page->isOpen()) { echo 'active'; } ?>"><span class="<?php if($page->isOpen()) { echo 'active'; } ?>"><?php echo $page->title() ?></span></a>

					<!-- hide the second level menu if the page isns't part of "progetto" or "abstract" -->
					<div class="conatiner-second-level <?php $parent = page()->parent()->class_id(); if( $parent!='progetto' && page()->class_id() != 'progetto') { echo "visuallyhidden"; } ?>">

						<ul class="second-level">
							<?php foreach ( $page->children()->visible() as $intpage): ?>
								<li><a href="<?php echo $intpage->url() ?>" class="<?php e($intpage->isOpen(), 'active'); ?>"><span class="<?php e($intpage->isOpen(), 'active'); ?>"><?php echo $intpage->title() ?></span></a></li>
							<?php endforeach ?>
						</ul>
					</div>
				</li>
			<?php elseif($page->class_id() == "kit"): ?>

				<li><a href="<?php echo $site->index()->findBy('class_id', 'kit')->url() ?>" class="<?php if($site->index()->findBy('class_id', 'kit')->isOpen() and !$site->index()->findBy('class_id', 'percorsi')->isOpen()) { echo 'active'; } else { echo ''; } ?> after-secondmenu-li-menu-mobile"><span class="<?php if($site->index()->findBy('class_id', 'kit')->isOpen and !$site->index()->findBy('class_id', 'percorsi')->isOpen()) { echo 'active'; } else { echo ''; } ?>"><?php echo $page->title() ?></span></a>


					<!-- hide the second level menu if the page isns't part of "kit" -->
					<div class="conatiner-second-level <?php $parent = page()->class_id(); $parent2 = page()->parent()->class_id(); if( $parent != 'kit' && $parent != 'percorsi' && $parent2 != 'percorsi' ) { echo "visuallyhidden"; } ?>">
						<ul class="second-level">
							<?php foreach ( $page->children()->visible() as $intpage): ?>
								<?php if( $intpage->class_id() == 'percorsi' || $intpage->parent()->class_id() == 'percorsi'): ?>
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