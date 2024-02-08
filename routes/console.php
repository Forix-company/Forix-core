<?php

use App\Events\InstallComposerEvent;
use Illuminate\Support\Facades\Artisan;


/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/
Artisan::command('project:init', function () {
    $this->info("initialize the project!");
    event(new InstallComposerEvent());
    $this->info("The project was installed correctly!");
})->purpose('Initialize the project by creating the database, performing migrations, seeding data, and more.');
