<?php

namespace Menu\Menu;
use Illuminate\Support\Facades\Facade;

class MenuFacade extends Facade
{
  public static function getFacadeAccessor()
  {
    return 'menu';
  }
}