<?php

namespace Deidax\BlogPackage;

use Deidax\BlogPackage\Console\{InstallBlogPackage, MakeFooCommand};
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
    }

    $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

    
  }
}