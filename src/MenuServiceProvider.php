<?php

namespace Menu;

use Illuminate\Support\ServiceProvider;
use Menu\Menu\MenuManager;
use Menu\Menu\MenuFactory;

class MenuServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        // Bind The Manager Instance
        $this->app->singleton('menu', function ($app) {
            return new MenuManager($this->registerMenus());
        });
    }

    public function registerMenus()
    {
        return [
            'navbar' => $this->navbarMenu(),
            'sidebar' => $this->sidebarMenu(),
            'super' => $this->superMenu(),
        ];
    }

    public function superMenu()
    {
        $super = MenuFactory::make( [], 'super')
            ->classes(['nav', 'navbar-nav', 'navbar-right'])
            ->addLink('Front', 'front')
            ->addLink('Products', 'products');
        return $super;
    }

    public function navbarMenu()
    {
        $navbar = MenuFactory::make([], 'navbar')
          ->classes(['nav', 'navbar-nav', 'navbar-right'])
          ->addLink('Front', 'front')
          ->addLink('Products', 'products');
        return $navbar;
    }

    public function sidebarMenu()
    {
        $sidebar = MenuFactory::make([], 'sidebar')
          ->classes(['nav', 'nav-sidebar'])
          ->addLink('Front', 'front')
          ->addLink('Products', 'products');
        return $sidebar;
    }
}
