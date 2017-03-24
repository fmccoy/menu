<?php

namespace Menu\Menu;

use Illuminate\Support\Facades\Request;
use Menu\Menu\Menu;
use Menu\Link\Link;

class MenuFactory
{
  public static function make($items = [], $name = null)
  {
    if(!$name) {
      $name = 'default';
    }

    $menu = new Menu($items, $name);
    
    return $menu;
  }

}