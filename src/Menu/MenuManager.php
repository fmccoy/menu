<?php

namespace Menu\Menu;

class MenuManager
{
  protected $menus;

  public function __construct($menus = [])
  {
    $this->menus = $menus;
  }

  public function get($key)
  {  
    if(isset($this->menus[$key])) {
      return $this->menus[$key];
    }
  }

  public function addMenu(Menu $menu)
  {
    $menus = $this->menus;
    $menus[] = $menu;
    $this->menus = $menus;
    return $this;
  }

  public function show($key)
  {
    echo $this->get($key)->render();
  }

}