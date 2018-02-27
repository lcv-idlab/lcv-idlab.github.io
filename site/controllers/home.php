<?php

return function($site, $pages, $page) {
  $practices = $page->children()->visible()->filterBy('intendedTemplate', 'practice');
  
  $practiceTags = array();
  foreach ($practices as $p) {
    $practiceTags = array_merge($practiceTags, split(',', $p->tags()));
  }
  $practiceTags = array_unique($practiceTags);

  $eventsPage = $pages->filterBy('intendedTemplate', 'events')->first();
  if($eventsPage) {
    $events = $eventsPage->children()->visible()->flip()->limit(3);
  } else {
    $events = false;
  }
  
  return compact([
    'practices',
    'practiceTags',
    'events'
  ]);

};
