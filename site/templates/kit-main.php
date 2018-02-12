<?php snippet('header') ?>

<div id="kit">
	<main>
		
		<div id="kit-title">
			<h1 class="title"><?php echo page()->title()->html() ?></h1>
			<!-- <div></div> -->
		</div>

		<header id="main-header">
			<div class="decoration-wrapper">

					<div id="kit-description" class="description-open"><?php echo page()->description()->kt() ?></div>

					<div id="more-text"><span><?php echo l::get('more-text') ?></span><span class="hidden-item"><?php echo l::get('less-text') ?></span></div>
					
					<div class="linear-gradient"></div>

					

			</div>
		</header>

		<div id="categories-container">

		<?php foreach ($page->children() as $cat): ?>

			<?php if ($cat->intendedTemplate() == "kit-category"): ?>

			<section id="<?php $url = $cat->url(); $pos = strripos($url, '/'); echo substr($url, $pos+1); ?>" class="category-single">

				<!-- CATEGORY TITLE -->
				<header>
					<div class="cat-title-h-line"></div>
					<h2><?php echo ucfirst($cat->title()) ?></h2>
					<!--
					<div class="cat-button-open">
						<span class="cat-button-open-span"></span>
						<span class="cat-button-open-span"></span>
					</div>
					-->
				</header>

				<!-- SINGLE KITS -->
				<div class="category-container">
					<ul class="single-kit">
					<?php foreach ($cat->children()->visible() as $kit): ?>
						<li>
							<a href="<?php echo $kit->url() ?>">	
								<?php if($kit->icon()->isNotEmpty()): ?>
								<div class="kit-icon">
									<img src="<?php echo $kit->image($kit->icon())->url() ?>" alt="<?php ucfirst($kit->title()) ?>">
									<?php else: ?>
										<img src="<?php echo ($kirby->urls()->assets()) ?>/icons/empty-kit-icon.png">
									<?php endif ?>
								</div>
								
								<h3><?php echo ucfirst($kit->title()) ?></h3>
								<p class="kit-description"><?php echo shortstring($kit->description()->html(), 200) ?></p>
							</a>
						</li>
					<?php endforeach ?>
					</ul>
				</div>
				
			</section>

			<?php endif ?>

		<?php endforeach ?>
		</div>


		<section id="documents-download">
			<div id="download-div-line"></div>
			<h2><?php echo ucfirst(l::get('download')) ?></h2>

			<ul>
				<li>
					<?php $linkd = ""; foreach(page()->download_final_doc_pdfs()->toStructure() as $itemd) { if( $itemd->lang() == $site->language()->code()) { $linkd = page()->document($itemd->pdf())->url(); break; } else { $linkd = page()->document($itemd->pdf())->url(); }} ?>
					<a href="<?php echo $linkd ?>"><img src="<?php echo page()->image(page()->download_final_doc_img())->url() ?>"></a>
					<h3><?php echo page()->download_final_doc()?></h3>
					<ul class="download_multi_lang">
						<?php foreach(page()->download_final_doc_pdfs()->toStructure() as $itemdd): ?>
							<li><a href="<?php echo page()->document($itemdd->pdf())->url()  ?>"><?php echo $itemdd->lang() ?></a></li>
						<?php endforeach ?>
					</ul>
				</li>
				<li>
					<?php $linkp = ""; foreach(page()->download_final_poster_pdfs()->toStructure() as $itemp) { if( $itemp->lang() == $site->language()->code()) { $linkp = page()->document($itemp->pdf())->url(); break; } else { $linkp = page()->document($itemp->pdf())->url(); } } ?>
					<a href="<?php echo $linkp ?>"><img src="<?php echo page()->image(page()->download_final_poster_img())->url() ?>"></a>
					<h3><?php echo page()->download_final_poster()?></h3>
					<ul class="download_multi_lang">
						<?php foreach(page()->download_final_poster_pdfs()->toStructure() as $itempp): ?>
							<li><a href="<?php echo page()->document($itempp->pdf())->url() ?>"><?php echo $itempp->lang() ?></a></li>
						<?php endforeach ?>
					</ul>
				</li>
			</ul>
		</section>

	</main>
</div>

<?php snippet('footer') ?>