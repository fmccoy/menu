<?php

namespace Menu\Link;

use Illuminate\Support\Facades\Request;

class Link
{
  protected $request;
  protected $label;
  protected $uri;
  protected $href;
  protected $slug;
  protected $opts = "";

  public function __construct($label, $uri = null, $opts = [])
  {
    $this->label = $label;
    $this->uri = $uri;
    $this->href = url($uri);
    $this->slug = str_slug($label, $separator = "-");
    $this->opts = $opts;
  }

  public function classes($classes = [])
  {
    $this->opts['classes'] = $classes;
    return $this;
  }

  public function render()
  {
    $active = "";

    if($this->uri == Request::path()) {
      $active = "<span class='sr-only'>(current)</span>";
    }

    return "<a href='{$this->href}' classes='".implode($this->opts['classes'])."'>{$this->label}{$active}</a></li>";
  }

  public function get($key)
  {
    if(isset($this->$key)) {
      return $this->$key;
    }
  }
}