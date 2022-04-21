<?php

namespace Deidax\BlogPackage\Tests;

use Deidax\BlogPackage\BlogPackageServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
  public function setUp(): void
  {
    parent::setUp();
    // additional setup
  }

  protected function getPackageProviders($app)
  {
    return [
      BlogPackageServiceProvider::class,
    ];
  }

  protected function getEnvironmentSetUp($app)
  {
    // perform environment setup
    // import the CreatePostsTable class from the migration
    include_once __DIR__ . '/../database/migrations/2018_08_08_100000_create_posts_table.php';

    // run the up() method of that migration class
    (new \CreatePostsTable)->up();
  }
}