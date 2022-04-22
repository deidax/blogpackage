<?php

namespace Deidax\BlogPackage;

use Deidax\BlogPackage\Console\{InstallBlogPackage, MakeFooCommand};
use Deidax\BlogPackage\View\Components\Alert;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class BlogPackageServiceProvider extends ServiceProvider
{
  public function register()
  {
    $this->app->bind('calculator', function($app) {
      return new Calculator();
    });
    
    $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'blogpackage');
  }

  public function boot()
  {
     // Register the command if we are using the application via the CLI
    if ($this->app->runningInConsole()) {
      $this->commands([
          InstallBlogPackage::class,
          MakeFooCommand::class,
      ]);

      $this->publishes([
        __DIR__.'/../config/config.php' => config_path('blogpackage.php'),
      ], 'config');
      
      $this->publishes([
        __DIR__.'/../resources/views' => resource_path('views/vendor/blogpackage'),
      ], 'views');

      $this->publishes([
        __DIR__.'/../resources/assets' => public_path('blogpackage'),
      ], 'assets');

    }

    $this->registerRoutes();
    $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
    $this->loadViewsFrom(__DIR__.'/../resources/views', 'blogpackage');

    $this->loadViewComponentsAs('blogpackage', [
      Alert::class,
    ]);
    
  }

  protected function registerRoutes()
  {
    Route::group($this->routeConfiguration(), function () {
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
    });
  }

  protected function routeConfiguration()
  {
    return [
        'prefix' => config('blogpackage.prefix'),
        'middleware' => config('blogpackage.middleware'),
    ];
  }
}