<?php snippet('header') ?>

<main>  
  <a href="<?php echo page('eventi')->url() ?>" class="link back-button"><span>Torna agli eventi</span></a>

  <article>

    <h1 class="event-title"><?php echo ucfirst( page()->title()->html() ) ?></h1>

    <header class="event-header">
      <div id="line">
        <div id="time">
          <span><?php echo page()->day() ?></span>
          <time datetime="<?php echo page()->date('Y-m-d') ?>"><?php echo page()->date('d.m.Y') ?></time>
          <p><?php echo page()->from() ?> &mdash; <?php echo page()->to() ?></p>
        </div>
        <div id="place">
          <p><?php echo page()->partner()->html() ?></p>
          <p><?php echo page()->place()->html() ?></p>
        </div>
      </div>
    </header>

    <div class="event-content">
      <div class="aside">
        <address>
          <div id="address">
            <p><strong><?php echo page()->partner()->html() ?></strong></p>
            <p><?php echo page()->address()->html() ?></p>
            <p><?php echo page()->cap()->html() ?> <?php echo page()->place()->html() ?></p>
          </div>
          <div id="contacts">
            <p><?php echo page()->phone()->html() ?></p>
            <p><?php echo page()->email()->html() ?></p>
          </div>
        </address>
        <img src="<?php echo page()->image()->url() ?>" alt="<?php echo page()->image()->alt() ?>">
      </div>
      <div class="content">
        <?php echo page()->long()->kt()->html() ?>
      </div>
    </div>
  </article>

</main>

<?php snippet('footer') ?>