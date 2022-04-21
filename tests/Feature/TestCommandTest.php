<?php

namespace Deidax\BlogPackage\Tests\Feature;

use Deidax\BlogPackage\Console\TestCommand;
use Illuminate\Console\Application;
use Illuminate\Support\Facades\Artisan;
use Orchestra\Testbench\TestCase;

class TestCommandTest extends TestCase
{
   /** @test **/
   public function it_does_a_certain_thing()
   {
        Application::starting(function ($artisan) {
            $artisan->add(app(TestCommand::class));
        });

        // Running the command
        Artisan::call('test-command:run');

       // Assertions...
   }
}