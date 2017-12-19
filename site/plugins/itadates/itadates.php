<?php

function itadate($date) {
  $monthNames = [
    'gennaio',
    'febbraio',
    'marzo',
    'aprile',
    'maggio',
    'giugno',
    'luglio',
    'agosto',
    'settembre',
    'ottobre',
    'novembre',
    'dicembre'
  ];

  $t = strtotime($date);
  $m = intval(date('n', $t)) - 1;
  $d = date('j', $t);
  $y = date('Y', $t);
  $str = $monthNames[$m];

  return "$d $str $y";
}
