

			<div id="single-article-container">
			<?php foreach (page()->article()->toStructure() as $article): ?>
				<div class="section-h-line"></div>
				<div class="section-container">
					<h2  id="<?php echo str_replace(' ', '-', strtolower($article->section_title())) ?>"><?php echo $article->section_title() ?></h2>
					<?php echo $article->content()->kt() ?>
				</div>
			<?php endforeach ?>
				<div class="section-h-line"></div>
				<div class="section-container evaluate">
					<h2  id="evaluate"><?php echo l::get('evaluate') ?></h2>
					<?php echo page()->parent()->verify()->kt() ?>
					<div id="article_end"></div>
				</div>

				<?php page()->modules() ?>


				<li class="three"><a href="#<?php echo str_replace(' ', '-', strtolower($article->section_title())) ?>"><?php echo $item->section_title() ?></a></li>




				<?php if($item->option_type() == "one"): ?>
							<?php if($prev != $item->option_type() && $prev != "") echo "</li></ul> one"; ?>
							<li class="one"><?php echo $item->section_title() ?>
						<?php elseif($item->option_type() == "two"): ?>
							<?php if($prev != $item->option_type() && $prev != "") echo "</li></ul> two"; ?>
							<li class="two"><?php echo $item->section_title() ?>
						<?php elseif($item->option_type() == "three"): ?>
							<?php if($prev != $item->option_type() && $prev != "") echo "</li> three" ?>
							<li class="three"><?php echo $item->section_title() ?>
						<?php endif ?>




						<a href="#<?php echo str_replace(' ', '-', strtolower($item->section_title())) ?>"><?php echo $item->section_title() ?></a>



						<?php if($ul_count == 2): ?></li>
							</ul>
							</ul>
							<?php elseif($ul_count == 1): ?></li></ul></li>
							<?php else: ?></li>
							<?php endif ?>





      	<div id="language-menu">
	      	<ul>
			<?php foreach($site->languages() as $language): ?>
				<li <?php e($site->language() == $language, 'class="active"') ?>>
					<a href="<?php echo page()->url($language->code()) ?>">
						<?php echo html($language->name()) ?>
					</a>
				</li>
			<?php endforeach ?>
			</ul>
		</div>