<?php snippet('header') ?>

<main>
  <h1 class="title"><?php echo page()->title()->html() ?></h1>

  <ul class="container-events">
    <?php foreach ( page()->children()->visible() as $event ): ?>
      <li>
        <a href="<?php echo $event->url() ?>" class="link-box">
          <article>
            <time datetime="<?php echo $event->date('Y-m-d') ?>"><?php echo $event->date('d.m.Y') ?></time>
            <h2 class="event-list-title"><?php echo $event->title() ?></h2>
            <div>
              <span class="location"><?php echo $event->partner() ?>, <?php echo $event->place() ?></span>
              <span><?php echo $event->short()->html() ?></span>
            </div>
          </article>
        </a>
      </li>
    <?php endforeach ?>
  </ul>

</main>
<?php snippet('footer') ?>