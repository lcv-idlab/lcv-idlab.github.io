<?php snippet('header') ?>

<main>
  <div class="error-page">
    <h1><?php echo page()->title()->html() ?></h1>
    
    <p><?php echo page()->text()->html() ?></p>
    <p><a href="/" class="link">Vai all'homepage del sito</a></p>
  </div>
</main>
<?php snippet('footer') ?>