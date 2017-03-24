<?php

namespace Menu\Menu;

use Menu\Link\Link;
use Request;

class Menu
{
  protected $name;

  protected $items;

  protected $opts;

  public function __construct($items = [], $name = null, $opts = [])
  {
    $this->name = $name;
    $this->items = $items;
    $this->opts = $opts;
  }

  public function classes(array $classes = [])
  {
    $this->opts['classes'] = $classes;
    return $this;
  }

  public function getClasses()
  {
    return implode($this->opts['classes'], " ");
  }

  public function addLink($label, $href, $opts = [])
  {
    $items = $this->items;
    $items[] = Link::make($label, $href, $opts)->classes(['nav-item']);
    $this->items = $items;
    return $this;
  }

  public function menu() {
    return $this->items;
  }

  public function getLinks()
  {
    $html = "";

    foreach($this->items as $link) {
      
      $path =  Request::path();

      if($link->get('uri') == $path) {
        $html .= "<li class='active'>";
      } else {
        $html .= "<li>";
      }

      $html .= $link->render();
      $html .= "</li>";

    }
    
    return $html;
  }

  public function render()
  {
    return "<ul class='{$this->getClasses()}'>{$this->getLinks()}</ul>";
  }

}