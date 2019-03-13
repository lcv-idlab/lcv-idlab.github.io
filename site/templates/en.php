<?php snippet('head') ?>

<main>
	<h1 class="title title-project"><?php echo page()->page_title()->html() ?></h1>
	
	<div class="en-intro">
		<h2 class="headline"><?php echo page()->subtitle()->html() ?></h2>

		<?php echo page()->paragraph()->kt() ?>

		<a href="<?php echo site()->url() ?>" title="Visit the main site" class="button button-download"><?php echo page()->button_text() ?></a>

	</div>

</main>



<!-- FOOTER -->

<footer>
  <div class="contacts">
      <div id="author">
        <?php echo page()->page_title()->html() ?>
      </div>

      <a href="mailto:info.mci@supsi.ch" class="link" id="contact-email">info.mci@supsi.ch</a>

      <div id="license">
      	<?php echo page()->license()->html() ?>
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