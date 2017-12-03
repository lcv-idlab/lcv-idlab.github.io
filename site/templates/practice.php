<?php snippet('header') ?>

<?php snippet('menu', ['showHome' => true]) ?>

<div class="wrapper" id="content" role="main">
  

  <article role="main" class="post" itemscope itemtype="http://schema.org/BlogPosting">

    <header class="post-header">
      <a href="<?php echo $site->url() ?>" class="back-to-home">Torna alla home</a>
      <h1 id="content" class="post-title" itemprop="name headline"><?php echo $page->title()->html() ?></h1>    
    </header>
  
    <dl class="practice-meta" role="complementary">
      <dt>Categorie</dt>
      <dd><?php echo join(', ', split(',', $page->tags())); ?></dd>
      <?php foreach ($page->meta()->toStructure() as $meta): ?>
      <dt><?php echo $meta->name()->html() ?></dt>
      <dd><?php echo $meta->value()->html() ?></dd>
      <?php endforeach ?>
    </dl>
    
    <div class="practice-content" itemprop="articleBody">
      <?php echo $page->text()->kt() ?>
    </div>

  </article>


</div>

<?php snippet('footer') ?>
