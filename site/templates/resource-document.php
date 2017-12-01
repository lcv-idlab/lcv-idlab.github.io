<?php snippet('header') ?>

  <main>

    <a href="<?php echo page('risorse')->url() ?>" class="back-button"><?php echo "< ".l::get('back') ?></a>
    
    <div class="title-article">
      <h1><?php echo ucfirst( page()->title()->html() ) ?></h1>
    </div>

    <div class="resource-document">

    
      <?php if( page()->main_image()->isNotEmpty() ): ?>

        <?php 
          // retrieve the alt text from the image, if not present, use a generic one
          $img = page()->image(page()->main_image());
          if($img->alt()->isNotEmpty()) {
            $alt_img = $img->alt()->kt()->html();
          }
          else {
            $alt_img = "Fotografia rappresentativa dell'evento " . page()->title()->html();
          }
        ?>

        <img src="<?php echo $img->url() ?>" alt="<?php echo $alt_img ?>">
      <?php endif ?>
    </div>

    <div class="resource-document-text">
      <div class="border-top">
        <div class="aside">

          <!--

          <h3 id="date">Data pubblicazione</h3>
          <time class="body" datetime="<?php echo page()->date('Y-m-d') ?>"><?php echo page()->date('d.m.Y') ?></time>
          <h3 id="authors">Autori</h3>
          <ul class="body">
            <?php foreach (page()->authors()->toStructure() as $author): ?>
              <li><?php echo "{$author->name()->html()} {$author->surname()->html()}" ?></li>
            <?php endforeach ?>
          </ul>

          -->

          <!-- document download button -->
          <h3>Documenti scaricabili</h3>

          <?php if(page()->docs()->isNotEmpty()): ?>
          <?php foreach(page()->docs()->toStructure() as $doc): ?>
            <a href="<?php echo page()->document($doc->file())->url() ?>" target="_blank" title="<?php echo $doc->button_label() ?>" class="button button-download"><?php echo $doc->button_label() ?></a>
          <?php endforeach ?>
          <?php endif ?>

        </div>
        <div id="article">
          <?php if(page()->subtitle()->isNotEmpty()): ?>
            <h2 class="subtitle"><?php echo page()->subtitle()->html() ?></h2>
          <?php endif ?>
          <?php echo page()->long()->kt()->html() ?>
        </div>
      </div>
    </div>

  </main>
  
<?php snippet('footer') ?>