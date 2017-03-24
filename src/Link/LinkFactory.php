<?php

namespace Menu\Link;

use Menu\Link\Link;

class LinkFactory
{
  public static function make($label, $uri = null, $opts = [])
  {
    $options = [
      'classes' => '',
      'title' => ''
    ];

    $link = new Link($label, $uri, array_merge( $options, $opts));
    return $link;
  }
}