<?php snippet('head') ?>

<main>

	<div class="title-article">
      <h1><?php echo ucfirst( page()->title()->html() ) ?></h1>
    </div>

    <?php if(page()->gallery()->isNotEmpty()): ?>

    <?php echo js('assets/js/lightbox.js'); ?>

    <section class="resource-experience-gallery" id="gallery">
      <h2>Fotografie dell'evento</h2>

      
      <ul>
        <?php foreach(page()->gallery()->yaml() as $image): ?>
        <li>
          <figure>

          <?php 
            // retrieve the alt text from the image, if not present, use a generic one
            $img = $page->image($image);
            if($img->alt()->isNotEmpty()) {
              $alt_img = $img->alt()->html();
            }
            else {
              $alt_img = "Fotografia dell'evento " . page()->title()->html();
            }
          ?>

            <a href="<?php  echo $img? $img->url() : '' ?>" data-lightbox="prova1" data-title="<?php echo $alt_img ?>">
            <img src="<?php echo $img? $img->url() : '' ?>" alt="<?php echo $alt_img ?>" class="<?php e($img->dimensions()->portrait(), 'portrait', 'landscape'); ?>" />
        </a>
          </figure>
        </li>
        <?php endforeach ?>
        </ul>
      

    </section>

  <?php endif ?>


</main>

<!-- FOOTER -->

<footer>
  <div class="contacts">
      <div id="author">
      	<a href="/en"><?php echo page('en')->page_title()->kt() ?></a></br>
        <?php echo page('en')->footer_title()->kt() ?>
      </div>

      <a href="mailto:info.mci@supsi.ch" class="link" id="contact-email">info.mci@supsi.ch</a>

      <div id="license">
      	<?php echo page('en')->license()->html() ?>
        <a href="http://creativecommons.org/licenses/by-sa/4.0/" target="_blank" rel="license"><img alt="License Creative Commons" style="border-width:0" src="/assets/images/cc-by-sa.png" /></a>
      </div>
    </div>
</footer>

<!--- end FOOTER -->

<!--- Google Analytics -->

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-85628221-2', 'auto');
  ga('send', 'pageview');

</script>

</body>
</html>