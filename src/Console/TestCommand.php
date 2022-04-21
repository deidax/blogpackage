<?php

namespace Deidax\BlogPackage\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class TestCommand extends Command
{
    protected $signature = 'test-command:run';

    protected $description = 'Test Command';

    
    public function handle()
    {
        
        $this->info('Running Test Command');
        $this->call('make:package:model',['class' => 'Models/Post']);
        $this->info('Test Command done.');


    }

}